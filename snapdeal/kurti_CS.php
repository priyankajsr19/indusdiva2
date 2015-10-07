<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');

//$db = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$id_category = 4;

$sql = "select cp.id_product from ps_category_product cp  
                        inner join ps_product p on p.id_product = cp.id_product
                        inner join temp on temp.code = p.reference
                        where id_category = $id_category and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and cp.id_product in (select t1.id_product  from (select cp.id_product from ps_category_product cp inner join ps_product p on p.id_product = cp.id_product inner join temp on temp.code = p.reference where id_category = $id_category and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and is_customizable = 0) t1 left join ( select distinct id_product from ps_flipkart_feed_product_info) t2 on t1.id_product = t2.id_product where t2.id_product is NULL)";

$res = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$header = array("Web page Number","SKU Code","Product Name","MRP","SELLING PRICE","FULFILLMENT MODE","COURIER TYPE","Inventory","Shipping Time in Days");
$cdata = tocsv($header) . "\n";

foreach($res as $row) {
	$id_product = $row['id_product'];
	$product = new Product($id_product, true, 1 );
	
	$attributeGroups = $product->getAttributesGroups(1);
	foreach($attributeGroups as $group ) {
		$data = array();

		$data[] = "TODO";
		$data[] = $id_product.'-'.$group['attribute_name'];
		$data[] = $product->name;
		$data[] = "";

		$data[] = (int)round( Tools::convertPrice($product->getPriceWithoutReduct(false, $group['id_product_attribute'])) );
		$data[] = (int)round( Tools::convertPrice($product->getPriceWithoutReduct(true, $group['id_product_attribute'])) );
		$data[] = ""; 
		$data[] = ""; 
		$data[] = "No"; 
		$data[] = ""; 
		$data[] = (int)Product::getQuantity($id_product, $group['id_product_attribute']);
		$data[] = (int)$product->shipping_sla;

		$cdata .= tocsv($data) . "\n";
	}
}
echo $cdata = str_replace( "\r" , "" , $cdata ); exit;

function tocsv($data) {

	$line = '';
	foreach( $data as $value ) {                                            
        	if ( ( !isset( $value ) ) || ( $value == "" ) ) {
			$value = ",";
		} else {
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
		}
		$line .= $value;
	}
	return trim($line);
}
function lsort($a, $b) {
	return strlen($b) - strlen($a);
}
