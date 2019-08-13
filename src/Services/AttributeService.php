<?php

namespace ElasticExportShopping24DE\Services;


use Plenty\Modules\Item\Attribute\Contracts\AttributeRepositoryContract;
use Plenty\Modules\Item\Attribute\Models\Attribute;
use Plenty\Modules\Item\Attribute\Models\AttributeValue;
use Plenty\Modules\Item\Attribute\Models\AttributeValueMarketName;
use Plenty\Repositories\Models\PaginatedResult;

class AttributeService
{
    const AMAZON_ATTRIBUTE_COLOR = 'Color';
    const AMAZON_ATTRIBUTE_SIZE = 'Size';
    
    /**
     * @var AttributeRepositoryContract
     */
    private $attributeRepositoryContract;
    
    public $linkedAttributeList;

    /**
     * AttributeService constructor.
     * @param AttributeRepositoryContract $attributeRepositoryContract
     */
    public function __construct(AttributeRepositoryContract $attributeRepositoryContract)
    {
        $this->attributeRepositoryContract = $attributeRepositoryContract;
    }
    
    public function buildAttributeList($settings)
    {
        $page = 1;
        $totalCount = null;
        
        $attributeList = $this->attributeRepositoryContract->all();

        if ($attributeList instanceof PaginatedResult) {
            $totalCount = $attributeList->getTotalCount();

            // pagination iteration
            while ($totalCount > 0) {
                $this->iterateAttributeList($attributeList, $settings);

                $page++;
                $totalCount = $totalCount - 50;

                $attributeList = $this->attributeRepositoryContract->all(['*'], 50, $page);
            }
        }
    }

    private function iterateAttributeList(PaginatedResult $attributeList, $settings)
    {
        foreach ($attributeList->getResult() as $attribute) {

            if ($attribute instanceof Attribute) {
                if (strlen($attribute->amazonAttribute) > 0 && 
                    ($attribute->amazonAttribute == self::AMAZON_ATTRIBUTE_COLOR 
                        || $attribute->amazonAttribute == self::AMAZON_ATTRIBUTE_SIZE)) {
                    
                    $attributeValues = $this->getAttributeValues($attribute->values, $settings);
                    $this->linkedAttributeList[$attribute->amazonAttribute][$attribute->id] = $attributeValues;
                }
            }
        }
    }
    
    private function getAttributeValues($attributeValues, $settings)
    {
        $attributeValueList = [];
        
        foreach ($attributeValues as $attributeValue) {
            if ($attributeValue instanceof AttributeValue) {
                $attributeValueMarketNames = $attributeValue->valueMarketNames;
                foreach ($attributeValueMarketNames as $attributeValueMarketName) {
                    if ($attributeValueMarketName instanceof AttributeValueMarketName) {
                        if ($attributeValueMarketName->lang == $settings->get('lang')) {
                            $attributeValueList[$attributeValue->id] = $attributeValueMarketName->name;
                            break;
                        }
                    }
                }
            }
        }
        
        return $attributeValueList;
    }
}