# Convenient_CategoryCode

CMS blocks have `identifier`.
Products have `sku`.
Categories have ... `url_key`? ... `entity_id`? 

Neither of these options are really up to snuff, `url_key` can be malleable and `entity_id` is not very developer friendly.

This model adds a unique attribute `code` to `Mage_Catalog_Model_Category`.

You can use it like

```
$category = Mage::getModel('catalog/category')->loadByAttribute('code', 'unique_code_value');

//or
$categories = Mage::getResourceModel('catalog/category_collection');
$categories->addAttributeToSelect(array('code'));

```
