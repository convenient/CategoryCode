<?php
/* @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
$entityCode = Mage_Catalog_Model_Category::ENTITY;
$installer->updateAttribute(
    $entityCode,
    'code',
    'required',
    false
);

$installer->endSetup();
