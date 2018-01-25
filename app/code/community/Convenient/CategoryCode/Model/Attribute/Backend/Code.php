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
        if ($code == '') {
            $code = $this->prepareCategoryCode($object);
        }

        $object->setData($attributeName, $object->formatUrlKey($code));

        return $this;
    }

    /**
     * @param $object
     * @return array|string
     * @author Luke Rodgers <lukerodgers90@gmail.com>
     * @author Rafal Szafarkiewicz <rs@amp.co>
     */
    public function prepareCategoryCode($object)
    {
        $code = array();
        $parents = $object->getParentCategories();
        foreach ($parents as $parent) {
            if ($parent->getLevel() > 1 && $parent->getId() != $object->getId()) {
                $code[] = $parent->getName();
            }
        }
        $code[] = $object->getName();
        $code = implode('-', $code);
        return $code;
    }
}
