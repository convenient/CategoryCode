<?php

// Generate and set code for existing categories

$categories = Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect('name');

foreach ($categories as $category) {
    $category->save();
}
