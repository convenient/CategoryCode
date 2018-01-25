<?php
// Generate and set code for existing categories

$categories = Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect('name');
$categoryCodeModel = Mage::getModel('convenient_categorycode/attribute_backend_code');
$resource = Mage::getModel('catalog/category')->getResource();

/** @var Mage_Catalog_Model_Category $category */
foreach ($categories as $category) {
    $categoryCode = $category->getData('code');
    // Don't save the code if it's already set
    if ($categoryCode === false || $categoryCode != '') {
        continue;
    }

    $obj = new Varien_Object([
        'entity_id' => $category->getId(),
        'code' => $category->formatUrlKey($categoryCodeModel->prepareCategoryCode($category)),
        'store_id' => Mage_Core_Model_App::ADMIN_STORE_ID
    ]);

    $resource->saveAttribute($obj, 'code');
}
