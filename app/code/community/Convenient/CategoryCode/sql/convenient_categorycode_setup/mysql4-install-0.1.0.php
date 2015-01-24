<?php
/* @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$entityCode = Mage_Catalog_Model_Category::ENTITY;

$entityTypeId = $installer->getEntityTypeId($entityCode);
$attributeSetId = $installer->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $installer->getAttributeGroupId($entityTypeId, $attributeSetId, 'General Information');

$installer->addAttribute(
    $entityCode,
    'code',
    array(
        'type' => 'varchar',
        'label' => 'Code',
        'input' => 'text',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible' => true,
        'backend' => 'convenient_categorycode/attribute_backend_code',
        'unique' => true,
        'required' => true,
        'user_defined' => true,
        'note' => 'Unique identifier'
    )
);

$installer->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'code',
    '2'
);

$installer->endSetup();
