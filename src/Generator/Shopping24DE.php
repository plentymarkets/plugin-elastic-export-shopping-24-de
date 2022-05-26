<?php

namespace ElasticExportShopping24DE\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use ElasticExport\Helper\ElasticExportPriceHelper;
use ElasticExport\Helper\ElasticExportPropertyHelper;
use ElasticExport\Helper\ElasticExportStockHelper;
use ElasticExport\Services\FiltrationService;
use ElasticExportShopping24DE\Services\AttributeService;
use Plenty\Modules\DataExchange\Contracts\CSVPluginGenerator;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\Attribute\Contracts\AttributeValueNameRepositoryContract;
use Plenty\Modules\Item\Attribute\Models\AttributeValueName;
use Plenty\Modules\Item\Search\Contracts\VariationElasticSearchScrollRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Class Shopping24DE
 * @package ElasticExportShopping24DE\Generator
 */
class Shopping24DE extends CSVPluginGenerator
{
	use Loggable;

    const SHOPPING_24 = 146.00;

	const DELIMITER = "	";

	const GENDER_AGE = 'gender_age';

    /**
     * @var ElasticExportCoreHelper $elasticExportHelper
     */
    private $elasticExportHelper;

	/**
	 * @var ElasticExportStockHelper $elasticExportStockHelper
	 */
    private $elasticExportStockHelper;

	/**
	 * @var ElasticExportPriceHelper $elasticExportPriceHelper
	 */
    private $elasticExportPriceHelper;

	/**
	 * @var ElasticExportPropertyHelper $elasticExportPropertyHelper
	 */
    private $elasticExportPropertyHelper;

    /**
     * @var ArrayHelper $arrayHelper
     */
    private $arrayHelper;

    /**
     * AttributeValueNameRepositoryContract $attributeValueNameRepository
     */
    private $attributeValueNameRepository;

    /**
     * @var array
     */
    private $rows = [];

	/**
	 * @var int
	 */
    private $lines = 0;
    
    /**
     * @var FiltrationService
     */
    private $filtrationService;
    /**
     * @var AttributeService
     */
    private $attributeService;

    /**
     * Shopping24DE constructor.
     *
     * @param ArrayHelper $arrayHelper
     * @param AttributeValueNameRepositoryContract $attributeValueNameRepository
     * @param AttributeService $attributeService
     */
    public function __construct(
        ArrayHelper $arrayHelper,
        AttributeValueNameRepositoryContract $attributeValueNameRepository, 
        AttributeService $attributeService)
    {
        $this->arrayHelper                  = $arrayHelper;
        $this->attributeValueNameRepository = $attributeValueNameRepository;
        $this->attributeService = $attributeService;
    }

    /**
     * @param VariationElasticSearchScrollRepositoryContract $elasticSearch
     * @param array $formatSettings
     * @param array $filter
     */
    protected function generatePluginContent($elasticSearch, array $formatSettings = [], array $filter = [])
    {
		$this->elasticExportHelper = pluginApp(ElasticExportCoreHelper::class);
		$this->elasticExportStockHelper = pluginApp(ElasticExportStockHelper::class);
		$this->elasticExportPriceHelper = pluginApp(ElasticExportPriceHelper::class);
		$this->elasticExportPropertyHelper = pluginApp(ElasticExportPropertyHelper::class);

		$settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');
        $this->attributeService->buildAttributeList($settings);
		$this->filtrationService = pluginApp(FiltrationService::class, ['settings' => $settings, 'filterSettings' => $filter]);

		$this->setDelimiter(self::DELIMITER); //tab sign
		$this->setHeader();

		if($elasticSearch instanceof VariationElasticSearchScrollRepositoryContract)
		{
			$limitReached = false;
			do
			{
				if($limitReached === true)
				{
					break;
				}

				$resultList = $elasticSearch->execute();

				if(!is_null($resultList['error']))
				{
					$this->getLogger(__METHOD__)->error('ElasticExportShopping24DE::logs.esError', [
						'error message ' => $resultList['error'],
					]);
				}
				if(is_array($resultList['documents']) && count($resultList['documents'] ?? []) > 0)
				{
					foreach($resultList['documents'] as $variation)
					{
						if($this->lines == $filter['limit'])
						{
							$limitReached = true;
							break;
						}

						if($this->filtrationService->filter($variation))
						{
							continue;
						}

						try
						{
							$this->buildRow($variation, $settings);
						}
						catch(\Throwable $throwable)
						{
							$this->getLogger(__METHOD__)->error('ElasticExportShopping24DE::logs.buildRowError', [
								'error message ' => $throwable->getMessage(),
								'error line'     => $throwable->getLine(),
								'VariationId'    => (string)$variation['id']
							]);
						}
					}
				}
			}while ($elasticSearch->hasNext());
		}
    }

	/**
	 * Set the csv header
	 */
    private function setHeader()
	{
		$this->addCSVContent([
			'art_name',
			'long_description',
			'image_url',
			'deep_link',
			'price',
			'old_price',
			'currency',
			'delivery_costs',
			'category',
			'brand',
			'gender_age',
			'ean',
			'keywords',
			'art_number',
			'color',
			'clothing_size',
			'cut',
			'link',
			'unit_price'
		]);
	}

	/**
	 * Builds the Rows for the csv.
	 *
	 * @param $variation
	 * @param $settings
	 */
	private function buildRow($variation, $settings)
	{
		if(!array_key_exists($variation['data']['item']['id'], $this->rows))
		{
            $this->fillLines();
            $this->rows = array();
		    
            $this->rows[$variation['data']['item']['id']] = $this->getMain($variation, $settings);

			if($variation['data']['attributes']['attributeValueSetId'] > 0)
			{
				$this->addAttribute($variation);
			}
		}

		if(array_key_exists($variation['data']['item']['id'],  $this->rows) && $variation['data']['attributes'][0]['attributeValueSetId'] > 0)
		{
			$this->addAttribute($variation);
		}
	}

	/**
	 * Adds the csv lines.
	 */
	private function fillLines()
	{
		foreach($this->rows as $data)
		{
			if(array_key_exists('color', $data) && is_array($data['color']))
			{
				$data['color'] = implode(', ', array_unique($data['color']));
			}

			if(array_key_exists('clothing_size', $data) && is_array($data['clothing_size']))
			{
				$data['clothing_size'] = implode(', ', array_unique($data['clothing_size']));
			}

			$this->addCSVContent(array_values($data));
			$this->lines = $this->lines +1;
		}
	}

    /**
     * Get main information.
     *
     * @param  array   $variation
     * @param  KeyValue $settings
     * @return array
     */
    private function getMain($variation, KeyValue $settings):array
    {
		$priceList = $this->getPriceList($variation, $settings);

        $deliveryCost = $this->getDeliveryCost($variation, $settings);

		$image = $this->getFirstImage($variation, $settings);

        $data = [
            'art_name'          => strip_tags(html_entity_decode($this->elasticExportHelper->getMutatedName($variation, $settings, 80))),
            'long_description'  => preg_replace(array("/\t/","/;/","/\|/"),"",strip_tags(html_entity_decode($this->elasticExportHelper->getMutatedDescription($variation, $settings)))),
            'image_url'         => $image,
            'deep_link'         => $this->elasticExportHelper->getMutatedUrl($variation, $settings, true, false),
            'price'             => $priceList['price'],
            'old_price'         => $priceList['rrp'],
            'currency'          => $priceList['currency'],
            'delivery_costs'    => $deliveryCost,
            'category'          => $this->elasticExportHelper->getCategory((int)$variation['data']['defaultCategories'][0]['id'], $settings->get('lang'), $settings->get('plentyId')),
            'brand'             => html_entity_decode($this->elasticExportHelper->getExternalManufacturerName((int)$variation['data']['item']['manufacturer']['id'])),
            'gender_age'        => $this->elasticExportPropertyHelper->getProperty($variation, (string)'gender_age', self::SHOPPING_24),
            'ean'               => $this->elasticExportHelper->getBarcodeByType($variation, $settings->get('barcode')),
            'keywords'          => html_entity_decode($variation['data']['texts']['keywords']),
            'art_number'        => html_entity_decode($variation['data']['variation']['number']),
            'color'             => [],
            'clothing_size'     => [],
            'cut'               => '',
            'link'              => '',
            'unit_price'        => $this->elasticExportPriceHelper->getBasePrice($variation, (float)$priceList['price'], $settings->get('lang'), '/', false, false, $priceList['currency']),
        ];

        return $data;
    }

	/**
	 * Adds the attributes to the row data.
	 *
	 * @param $variation
	 */
    private function addAttribute($variation)
    {
        foreach ($variation['data']['attributes'] as $attribute) {
            if (array_key_exists($attribute['attributeId'], $this->attributeService
                ->linkedAttributeList[$this->attributeService::AMAZON_ATTRIBUTE_COLOR])) {
                $this->rows[$variation['data']['item']['id']]['color'][] = $this->attributeService
                    ->linkedAttributeList[$this->attributeService::AMAZON_ATTRIBUTE_COLOR][$attribute['attributeId']][$attribute['valueId']];
            }

            if (array_key_exists($attribute['attributeId'], $this->attributeService
                ->linkedAttributeList[$this->attributeService::AMAZON_ATTRIBUTE_SIZE])) {
                $this->rows[$variation['data']['item']['id']]['clothing_size'][] = $this->attributeService
                    ->linkedAttributeList[$this->attributeService::AMAZON_ATTRIBUTE_SIZE][$attribute['attributeId']][$attribute['valueId']];
            }
        }
    }

    /**
     * Get price list formatted.
     *
     * @param $variation
     * @param KeyValue $settings
     * @return array
     */
    private function getPriceList(array $variation, KeyValue $settings):array
    {
        $priceList = $this->elasticExportPriceHelper->getPriceList($variation, $settings, 2, ',');

        if((float)$priceList['price'] > 0)
        {
            return array(
                'price'     => $priceList['price'],
                'rrp'       => $priceList['recommendedRetailPrice'] > $priceList['price'] ? $priceList['recommendedRetailPrice'] : '',
                'currency'  => $priceList['currency'],
            );
        }

        return array(
            'price'     => '',
            'rrp'       => '',
            'currency'  => '',
        );
    }

    /**
     * Get delivery cost.
     *
     * @param $variation
     * @param KeyValue $settings
     * @return string
     */
    private function getDeliveryCost(array $variation, KeyValue $settings):string
    {
        $deliveryCost = $this->elasticExportHelper->getShippingCost($variation['data']['item']['id'], $settings);

        if(!is_null($deliveryCost))
        {
            return number_format((float)$deliveryCost, 2, ',', '');
        }

        return '';
    }

    /**
     * Get the first image depending on the ordering.
     *
     * @param array $variation
     * @param KeyValue $settings
     * @return string
     */
    private function getFirstImage(array $variation, KeyValue $settings):string
    {
        $image = $this->elasticExportHelper->getImageListInOrder($variation, $settings, 1, ElasticExportCoreHelper::ITEM_IMAGES);

        if(count($image ?? []) > 0)
        {
            // return first image
            return $image[0];
        }

        return '';
    }
}
