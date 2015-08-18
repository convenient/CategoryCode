<?php

// Change 'code' as not required

$entityCode = Mage_Catalog_Model_Category::ENTITY;
$installer->updateAttribute(
    $entityCode,
    'code',
    'required',
    false
);
