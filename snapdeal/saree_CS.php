<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');

//$db = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$id_category = 2;

$sql = "select cp.id_product from ps_category_product cp  
                        inner join ps_product p on p.id_product = cp.id_product
                        inner join temp on temp.code = p.reference
                        where id_category = $id_category and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and cp.id_product in (select t1.id_product  from (select cp.id_product from ps_category_product cp inner join ps_product p on p.id_product = cp.id_product inner join temp on temp.code = p.reference where id_category = $id_category and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 ) t1 left join ( select distinct id_product from ps_flipkart_feed_product_info) t2 on t1.id_product = t2.id_product where t2.id_product is NULL)";

$res = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$header = array("Web page Number","SKU Code","Product Name","MRP","SELLING PRICE","FULFILLMENT MODE","COURIER TYPE","Inventory","Shipping Time in Days");
$cdata = tocsv($header) . "\n";

$number = 1;
foreach($res as $row) {
	$id_product = $row['id_product'];
	$product = new Product($id_product, true, 1 );

	$data = array();

	$data[] = $number++;
	$data[] = $product->reference;
	$data[] = $product->name;
	$data[] = "";

	$data[] = (int)round( Tools::convertPrice($product->getPriceWithoutReduct(),4) );
	$data[] = (int)round( Tools::convertPrice($product->getPrice(),4));
	$data[] = ""; 
	$data[] = ""; 
	$data[] = (int)Product::getQuantity($id_product);
	$data[] = (int)$product->shipping_sla;

	$cdata .= tocsv($data) . "\n";
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
