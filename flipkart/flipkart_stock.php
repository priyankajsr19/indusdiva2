<?php
include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');
 
$db = Db::getInstance(_PS_USE_SQL_SLAVE_);

$skus = $db->ExecuteS("select id_sku from flipkart_skus");


foreach($skus as $sku) {
	$id_sku = $sku['id_sku'];
	$id_product = str_replace("ID-","",$id_sku);
	$id_product = intval($id_product);
	
	$productObj = new Product($id_product, true, 1);
	
	$attributesGroups = $productObj->getAttributesGroups(1);
	$found = false;
	$hasChild = false;
	$id_product_attribute = NULL;
	foreach($attributesGroups as $attribute) {
		$hasChild = true;
		$size = $attribute['attribute_name'];
		if( $id_sku === "ID-$id_product-$size" ) {
			$id_product_attribute = $attribute['id_product_attribute'];
			$found = true;
			break;
		}
	}

	$mrp_in = round(Product::getPriceStatic($productObj->id, true,$id_product_attribute , 6, NULL, false, false, 1, false, NULL, NULL, IND_ADDRESS_ID));
	$mrp_in_rs = round(Tools::convertPrice($mrp_in,4));
	$offer_price_in = round(Product::getPriceStatic($productObj->id, true, $id_product_attribute, 6, NULL, false, true, 1, false, NULL, NULL, IND_ADDRESS_ID));
	$offer_price_in_rs = round(Tools::convertPrice($offer_price_in, 4));

	$qty = (int)Product::getQuantity($productObj->id, $id_product_attribute);
	$shipping_sla = (int)$productObj->shipping_sla;
	$reference = (string)$productObj->reference;
	$active = (int)$productObj->active;
		
	$sactive = 'ACTIVE';
	if( !$found && $hasChild)
		$sactive = 'INACTIVE';
	else {	
		if( $shipping_sla > 5 || $qty < 1 || (substr($reference, 0, 6) === 'BLR002') || $active === 0)
			$sactive = 'INACTIVE';
		else
			$sactive = 'ACTIVE';
	}
	if( $qty < 0)
		$qty = 0;
		
	echo "$id_sku, $mrp_in_rs, $offer_price_in_rs, $qty, $shipping_sla, $sactive";
	echo PHP_EOL;
	ob_flush();
}
?>
