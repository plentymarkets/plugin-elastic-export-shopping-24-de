<?php

namespace ElasticExportShopping24DE\Migrations;

use BasicPriceSearchEngine\Catalog\DataProviders\BaseFieldsDataProvider;
use BasicPriceSearchEngine\Catalog\Providers\CatalogTemplateProvider;
use Plenty\Exceptions\ValidationException;
use Plenty\Modules\Catalog\Contracts\CatalogContentRepositoryContract;
use Plenty\Modules\Catalog\Contracts\CatalogRepositoryContract;
use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Modules\Catalog\Contracts\TemplateContract;
use Plenty\Modules\DataExchange\Contracts\ExportRepositoryContract;

/**
 * Class CatalogMigration
 *
 * @package BasicPriceSearchEngine\Migrations
 */
class CatalogMigration
{

    /** @var TemplateContainerContract */
    private $templateContainer;

    /** @var ExportRepositoryContract */
    private $exportRepository;

    /** @var CatalogContentRepositoryContract */
    private $catalogContentRepository;

    /** @var CatalogRepositoryContract */
    private $catalogRepositoryContract;

    public function __construct(
        TemplateContainerContract $templateContainer,
        ExportRepositoryContract $exportRepository,
        CatalogContentRepositoryContract $catalogContentRepository,
        CatalogRepositoryContract $catalogRepositoryContract
    )
    {
        $this->templateContainer = $templateContainer;
        $this->exportRepository = $exportRepository;
        $this->catalogContentRepository = $catalogContentRepository;
        $this->catalogRepositoryContract = $catalogRepositoryContract;
    }

    public function run()
    {
        $elasticExportFormats = $this->exportRepository->search(['formatKey' => 'Shopping24DE-Plugin']);

        foreach($elasticExportFormats->getResult() as $format)
        {
            try
            {
                $this->updateCatalogData($format->name);
            }
            catch( \Exception $e )
            {
            }
        }
    }

    /**
     * @param $name
     *
     * @return bool
     * @throws \Exception
     */
    public function updateCatalogData($name)
    {
        // register the template
        $template = $this->registerTemplate();

        // create a new catalog
        $catalog = $this->create($name, $template->getIdentifier())->toArray();

        $data = [];
        $values = pluginApp(BaseFieldsDataProvider::class)->get();
        foreach($values as $value) {
            $dataProviderKey = utf8_encode($this->getDataProviderByIdentifier($value['key']));
            $data['mappings'][$dataProviderKey]['fields'][] = [
                'key' => utf8_encode($value['key']),
                'sources' => [
                    [
                        'fieldId' => utf8_encode($value['default']),
                        'key' => $value['fieldKey'],
                        'lang' => 'de',
                        'type' => $value['type'],
                        'id' => $value['id']
                    ]
                ]
            ];
        }

        // update created catalog data
        try
        {
            $this->catalogContentRepository->update($catalog['id'], $data);
        }
        catch(\Exception $e)
        {
        }

        return true;
    }

    /**
     * @param string $identifier
     * @return string
     */
    private function getDataProviderByIdentifier(string $identifier)
    {
        if (preg_match('/productDescription.attributes./', $identifier)) {
            return 'secondaryGeneral';
        }

        if(preg_match('/bulletPoints/', $identifier)) {
            return 'bulletPoints';
        }

        return 'general';
    }

    /**
     * @return TemplateContract
     */
    private function registerTemplate()
    {
        return $this->templateContainer->register(
            'BasicPriceSearchEngine',
            'BasicPriceSearchEngine',
            CatalogTemplateProvider::class
        );
    }

    /**
     * @param $name
     * @param $templateIdentifier
     *
     * @return mixed
     * @throws ValidationException
     */
    public function create($name ,$templateIdentifier)
    {
        return $this->catalogRepositoryContract->create(['name' => $name, 'template' => $templateIdentifier]);
    }
}