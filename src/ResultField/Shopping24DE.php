<?php

namespace ElasticExportShopping24DE\ResultField;

use Plenty\Modules\DataExchange\Contracts\ResultFields;
use Plenty\Modules\DataExchange\Models\FormatSetting;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\Search\Mutators\ImageMutator;
use Plenty\Modules\Cloud\ElasticSearch\Lib\Source\Mutator\BuiltIn\LanguageMutator;
use Plenty\Modules\Item\Search\Mutators\SkuMutator;
use Plenty\Modules\Item\Search\Mutators\DefaultCategoryMutator;

class Shopping24DE extends ResultFields
{
    /*
     * @var ArrayHelper
     */
    private $arrayHelper;

    /**
     * Shopping24DE constructor.
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;
    }

    public function generateResultFields(array $formatSettings = []):array
    {
        $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

        $reference = $settings->get('referrerId') ? $settings->get('referrerId') : -1;

        $itemDescriptionFields = ['texts.urlPath'];
        $itemDescriptionFields[] = 'texts.keywords';

        switch($settings->get('nameId'))
        {
            case 1:
                $itemDescriptionFields[] = 'texts.name1';
                break;
            case 2:
                $itemDescriptionFields[] = 'texts.name2';
                break;
            case 3:
                $itemDescriptionFields[] = 'texts.name3';
                break;
            default:
                $itemDescriptionFields[] = 'texts.name1';
                break;
        }

        if($settings->get('descriptionType') == 'itemShortDescription'
            || $settings->get('previewTextType') == 'itemShortDescription')
        {
            $itemDescriptionFields[] = 'texts.shortDescription';
        }

        if($settings->get('descriptionType') == 'itemDescription'
            || $settings->get('descriptionType') == 'itemDescriptionAndTechnicalData'
            || $settings->get('previewTextType') == 'itemDescription'
            || $settings->get('previewTextType') == 'itemDescriptionAndTechnicalData')
        {
            $itemDescriptionFields[] = 'texts.description';
        }
        $itemDescriptionFields[] = 'texts.technicalData';

        //Mutator
        /**
         * @var ImageMutator $imageMutator
         */
        $imageMutator = pluginApp(ImageMutator::class);
        $imageMutator->addMarket($reference);
        /**
         * @var LanguageMutator $languageMutator
         */
        $languageMutator = pluginApp(LanguageMutator::class, [[$settings->get('lang')]]);
        /**
         * @var SkuMutator $skuMutator
         */
        $skuMutator = pluginApp(SkuMutator::class);
        $skuMutator->setMarket($reference);
        /**
         * @var DefaultCategoryMutator $defaultCategoryMutator
         */
        $defaultCategoryMutator = pluginApp(DefaultCategoryMutator::class);
        $defaultCategoryMutator->setPlentyId($settings->get('plentyId'));

        $fields = [
            [
                //item
                'item.id',
                'item.manufacturer.id',

                //variation
                'id',
                'variation.availability.id',
                'variation.stockLimitation',
                'variation.vatId',
                'variation.model',

                //images
                'images.item.type',
                'images.item.path',
                'images.item.position',
                'images.item.fileType',
                'images.variation.type',
                'images.variation.path',
                'images.variation.position',
                'images.variation.fileType',

                //unit
                'unit.content',
                'unit.id',

                //defaultCategories
                'defaultCategories.id',

                //barcodes
                'barcodes.code',
                'barcodes.type',

                //attributes
                'attributes.attributeValueSetId',
            ],

            [
                $imageMutator,
                $languageMutator,
                $skuMutator,
                $defaultCategoryMutator
            ],
        ];
        foreach($itemDescriptionFields as $itemDescriptionField)
        {
            $fields[0][] = $itemDescriptionField;
        }

        return $fields;
//        $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');
//
//        if($settings->get('variations') == 'mainVariations')
//        {
//            $this->setGroupByList(['groupBy.itemIdGetPrimaryVariation']);
//        }
//
//        $itemDescriptionFields = ['urlContent'];
//        $itemDescriptionFields[] = ($settings->get('nameId')) ? 'name' . $settings->get('nameId') : 'name1';
//
//        if($settings->get('descriptionType') == 'itemShortDescription'
//            || $settings->get('previewTextType') == 'itemShortDescription')
//        {
//            $itemDescriptionFields[] = 'shortDescription';
//        }
//
//        if($settings->get('descriptionType') == 'itemDescription'
//            || $settings->get('descriptionType') == 'itemDescriptionAndTechnicalData'
//            || $settings->get('previewTextType') == 'itemDescription'
//            || $settings->get('previewTextType') == 'itemDescriptionAndTechnicalData')
//        {
//            $itemDescriptionFields[] = 'description';
//        }
//
//        if($settings->get('descriptionType') == 'technicalData'
//            || $settings->get('descriptionType') == 'itemDescriptionAndTechnicalData'
//            || $settings->get('previewTextType') == 'technicalData'
//            || $settings->get('previewTextType') == 'itemDescriptionAndTechnicalData')
//        {
//            $itemDescriptionFields[] = 'technicalData';   done
//        }
//
//        return [
//            'itemBase'=> [
//                'id',                 done
//                'producerId',         done
//            ],
//
//            'itemDescription' => [
//                'params' => [
//                    'language' => $settings->get('lang') ? $settings->get('lang') : 'de',
//                ],
//                'fields' => $itemDescriptionFields,       done
//            ],
//
//            'variationImageList' => [
//                'params' => [
//                    'type' => 'item_variation',
//                    'referenceMarketplace' => $settings->get('referrerId') ? $settings->get('referrerId') : -1,
//                ],
//                'fields' => [
//                    'type',           done
//                    'path',           done
//                    'position',       done
//                ]
//            ],
//
//            'variationRecommendedRetailPrice' => [
//                'params' => [
//                    'referrerId' => $settings->get('referrerId'),
//                ],
//                'fields' => [
//                    'price',          todo grab from idl
//                ],
//            ],
//
//            'variationBase' => [
//                'availability',               done
//                'attributeValueSetId',        done
//                'model',                      done
//                'limitOrderByStockSelect',    done
//                'unitId',                     done
//                'customNumber',               todo grab from idl
//                'content',                    done
//            ],
//
//            'variationBarcodeList' => [
//                'variationId',                not needed
//                'code',                       done
//                'barcodeId',                  ?
//                'barcodeType',                done
//                'barcodeName',                ?
//            ],
//
//            'variationRetailPrice' => [
//                'params' => [
//                    'referrerId' => $settings->get('referrerId'),
//                ],
//                'fields' => [
//                    'price',                  todo grab from idl
//                ],
//            ],
//
//            'variationStandardCategory' => [
//                'params' => [
//                    'plentyId' => $settings->get('plentyId'),
//                ],
//                'fields' => [
//                    'categoryId',             done
//                    'plentyId',
//                    'manually',
//                ],
//            ],
//
//            'itemPropertyList' => [
//                'itemPropertyId',             todo grab from idl
//                'propertyId',                 todo grab from idl
//                'propertyValue',              todo grab from idl
//                'propertyValueType',          todo grab from idl
//            ],
//        ];
    }
}
