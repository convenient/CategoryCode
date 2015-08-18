<?php

// Change 'code' as not required

$entityCode = Mage_Catalog_Model_Category::ENTITY;
$this->updateAttribute(
    $entityCode,
    'code',
    'is_required',
    false
);
