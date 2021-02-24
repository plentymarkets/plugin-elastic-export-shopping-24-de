<?php

namespace ElasticExportShopping24DE\Catalog\DataProviders;

/**
 * Class BaseFieldsDataProvider
 *
 * @package ElasticExportShopping24DE\Catalog\DataProviders
 */
class BaseFieldsDataProvider
{
    /**
     * @return array
     */
    public function get():array
    {
        return [
            [
                'key' => 'art_name',
                'label' => 'Name',
                'required' => true,
                'default' => 'itemText-name1',
                'type' => 'text',
                'fieldKey' => 'name1',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'long_description',
                'label' => 'Article Id',
                'required' => false,
                'default' => 'itemText-description',
                'type' => 'text',
                'fieldKey' => 'description',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'image_url',
                'label' => 'Image URL',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'deeplink',
                'label' => 'Deeplink',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null,

            ],
            [
                'key' => 'price',
                'label' => 'Price',
                'required' => false,
                'default' => 'salesPrice-1',
                'type' => 'sales-price',
                'fieldKey' => 'price',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'price_old',
                'label' => 'Price Old',
                'required' => false,
                'default' => 'salesPrice-2',
                'type' => 'sales-price',
                'fieldKey' => 'price',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'currency',
                'label' => 'Currency',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'brand',
                'label' => 'Brand',
                'required' => false,
                'default' => 'item-manufacturerExternalName',
                'type' => 'item',
                'fieldKey' => 'manufacturer.externalName',
                'isMapping' => false,
                'id' => null
            ],
//            [
//                'key' => 'brand',
//                'label' => 'Brand',
//                'required' => false,
//                'default' => 'item-manufacturerName',
//                'type' => 'item',
//                'fieldKey' => 'manufacturer.name',
//                'isMapping' => false,
//                'id' => null
//            ],
            [
                'key' => 'gender_age',
                'label' => 'Gender Age',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'art_number',
                'label' => 'Art Number',
                'required' => false,
                'default' => 'variation-number',
                'type' => 'variation',
                'fieldKey' => 'number',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'color',
                'label' => 'Color',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'clothing_size',
                'label' => 'Clothing Size',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null,
            ],
            [
                'key' => 'cut',
                'label' => 'Cut',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null
            ],
            [
                'key' => 'unit_price',
                'label' => 'Unit Price',
                'required' => false,
                'default' => '',
                'type' => '',
                'fieldKey' => '',
                'isMapping' => false,
                'id' => null
            ]
        ];
    }
}
