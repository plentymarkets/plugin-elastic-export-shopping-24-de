<?php

namespace ElasticExportShopping24DE\Catalog\DataProviders;

use Plenty\Modules\Catalog\Contracts\TemplateContract;
use Plenty\Modules\Catalog\DataProviders\BaseDataProvider;

/**
 * Class GeneralDataProvider
 *
 * @package ElasticExportShopping24DE\Catalog\DataProviders
 */
class GeneralDataProvider extends BaseDataProvider
{
    public function getRows(): array
    {
        return [
            //required
            [
                'key' => 'art_name',
                'label' => 'Art Name',
                'required' => true
            ],
            [
                'key' => 'long_description',
                'label' => 'Long Description',
                'required' => false
            ],
            [
                'key' => 'image_url',
                'label' => 'Image URL',
                'required' => false
            ],
            [
                'key' => 'deeplink',
                'label' => 'Deeplink',
                'required' => false,
                'hidden' => true
            ],
            [
                'key' => 'price',
                'label' => 'Price',
                'required' => false
            ],
            [
                'key' => 'price_old',
                'label' => 'Price old',
                'required' => false
            ],
            [
                'key' => 'currency',
                'label' => 'Curency',
                'required' => false
            ],
            [
                'key' => 'delivery_costs',
                'label' => 'Delivery Costs',
                'required' => false
            ],
            [
                'key' => 'category',
                'label' => 'Category',
                'required' => false,
                'hidden' => true
            ],
            [
                'key' => 'brand',
                'label' => 'brand',
                'required' => false
            ],
            [
                'key' => 'gender_age',
                'label' => 'Gender Age',
                'required' => false
            ],
            [
                'key' => 'ean',
                'label' => 'EAN',
                'required' => false
            ],
            [
                'key' => 'keywords',
                'label' => 'Keywords',
                'required' => false
            ],
            [
                'key' => 'art_number',
                'label' => 'Art Number',
                'required' => false
            ],
            [
                'key' => 'color',
                'label' => 'Color',
                'required' => false
            ],
            [
                'key' => 'clothing_size',
                'label' => 'Clothing Size',
                'required' => false
            ],
            [
                'key' => 'cut',
                'label' => 'Cut',
                'required' => false
            ],
            [
                'key' => 'link',
                'label' => 'Link',
                'required' => false
            ],
            [
                'key' => 'unit_price',
                'label' => 'Unit Price',
                'required' => false
            ]

        ];
    }


    public function setTemplate(TemplateContract $template) {}

    public function setMapping(array $mapping) {}
}