<?php
class Convenient_CategoryCode_Model_Attribute_Backend_Code extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{
    /**
     * @param Mage_Catalog_Model_Category $object
     * @return $this|Convenient_CategoryCode_Model_Attribute_Backend_Code
     *
     * @author Luke Rodgers <lukerodgers90@gmail.com>
     */
    public function beforeSave($object)
    {
        $attributeName = $this->getAttribute()->getName();

        $urlKey = $object->getData($attributeName);
        if ($urlKey === false) {
            return $this;
        }
        if ($urlKey=='') {
            $urlKey = $object->getName();
        }

        $object->setData($attributeName, $object->formatUrlKey($urlKey));

        return $this;
    }
}
