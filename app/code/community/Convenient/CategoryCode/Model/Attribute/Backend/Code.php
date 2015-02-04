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

        $code = $object->getData($attributeName);
        if ($code === false) {
            return $this;
        }
        if ($code=='') {
            $code = $object->getData('name') . '-' . $object->getData('path');
        }

        $object->setData($attributeName, $object->formatUrlKey($code));

        return $this;
    }
}
