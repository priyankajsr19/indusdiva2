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
                        where id_category = $id_category and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and cp.id_product in (select t1.id_product  from (select cp.id_product from ps_category_product cp inner join ps_product p on p.id_product = cp.id_product inner join temp on temp.code = p.reference where id_category = $id_category and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and p.is_customizable = 0) t1 left join ( select distinct id_product from ps_flipkart_feed_product_info) t2 on t1.id_product = t2.id_product where t2.id_product is NULL)";

$res = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$header = array("Web page Number","Brand","SKU Code","Product Name","Description","Weight(g)","Length(cm)","Height(cm)","Width(cm)","Freebies","Type","Color","Fabric","Work","Origin","Art Style","Set Contents");

$cdata = tocsv($header) . "\n";

foreach($res as $row) {
	$id_product = $row['id_product'];
	$product = new Product($id_product, true, 1 );
	$attributeGroups = $product->getAttributesGroups(1);
	foreach($attributeGroups as $group ) {
		$data = array();

		$data[] = "TODO";
		$data[] = "IndusDiva";
		$data[] = $id_product.'-'.$group['attribute_name'];
		$data[] = $product->name;
		//description
		$data[] = strip_tags($product->description);

		$data[] = "TODO";
		$data[] = "TODO";
		$data[] = "TODO";
		$data[] = "TODO";
		
		//Freebies
		$data[] = "";

		//Sleeves
		$types = array(
				"Full" => array("Full Sleeve","Full Length","Long Sleeve"), 
				"Half" => array("Half","1/2","Cap","Mega","Layered"), 
				"Sleeveless" => array("sleeveless"), 
				"3/4th" => array("Three Fourth","Three Four Length","3/4","3/4th"), 
			);
		$this_value = "TODO";
		foreach($types as $key => $type_a) {
			foreach($type_a as $type) {
				if( stripos($product->sleeves, $type) !== false ) {
					$this_value = $key;
					break;
				}
				if( $this_value !== 'TODO' )
					break;
			}
		}
		$data[] = $this_value;
		
		//Length
		$data[] = "TODO";

		//Type
		$catIds = $product->getCategories();
		$category_names = array();

		foreach($catIds as $catID)
		{
		    $category = new Category((int)$catID);
		    $category_names[] = $category->getName(1);
		}

		$category_names = array_diff($category_names, array('Home'));
		$categories = implode(',', $category_names);
		$types = array(
				"Daily Wear" => array("daily","regular","casual"),
				"Eveningwear" => array("lounge"),
				"Regular" => array("casual","regular","daily"),
				"Casual" => array("casual","work"),
				"Party Wear" => array("party"),
			);
				
		$this_value = "TODO";
		foreach($types as $key => $type_a) {
			foreach($type_a as $type) {
				if( stripos($categories, $type) !== false ) {
					$this_value = $key;
					break;
				}
			}
			if( $this_value  !== "TODO" )
				break;
		}
		$data[] = $this_value;

		//Color
		$this_value = "TODO";
		if( stripos($product->color,",") !== false || stripos($product->color,"and") !== false)
			$this_value = "Multi";
		else {
			$datum = array("Blue","Pink","Purple","White","Brown","Wine","Yellow","Orange","Red","Green","Beige","Rust","Violet","Black","Turquoise","Cream","Maroon","Grey");
			$datum = array_unique($datum);
			usort($datum, 'lsort');
			foreach($datum as $dt) {
				$value_parts = explode("-", $dt);
				$no = false;
				foreach($value_parts as $p) {
					if( stripos($product->color,$p) === false ) {
						$no = true;
						break;
					}
				}
				if( $no === false ) {
					$this_value = str_replace("-","",$dt);
					break;
				}
			}
		}
		$data[] = $this_value;


		//Fabric
		$this_value = "TODO";
		$datum = array("Chanderi","Cotton","Cotton Silk","Cotton","Cotton","Silk","Cotton Silk","Cotton","Pure Georgette","Faux Georgette","Kota Doria","Cotton Jute","Pashmina Silk","Net","Art Silk","Satin","Art Crepe","Chiffon","Pure Crepe","Faux Chiffon","Crepe Jacquard","Dupion Silk","Corduaroy","Microvelvet","Woolen");
		$datum = array_unique($datum);
		usort($datum, 'lsort');
		foreach($datum as $dt) {
			$value_parts = explode("-", $dt);
			$no = false;
			foreach($value_parts as $p) {
				if( stripos($product->fabric,$p) === false ) {
					$no = true;
					break;
				}
			}
			if( $no === false ) {
				$this_value = str_replace("-","",$dt);
				break;
			}
		}
		$data[] = $this_value;
		
		//Neck
		$types = array(
				"Round Neck" => array("round neck"),
				"Chinese Collar" => array("chinese"),
				"Sweetheart Neck" => array("sweet heart","sweetheart"),
				"Boat Neck" => array("boat neck"),
				"Square Neck" => array("square neck","square"),
				"V-Neck" => array("v-neck"),
			);
				
		$this_value = "TODO";
		foreach($types as $key => $type_a) {
			foreach($type_a as $type) {
				if( stripos($product->description, $type) !== false ) {
					$this_value = $key;
					break;
				}
			}
			if( $this_value  !== "TODO" )
				break;
		}
		$data[] = $this_value;


		//Work
		$types = array(
				"Embroidered" => array("embroidered","enbroid"),
				"Printed" => array("print"),
				"Handcrafted" => array("handcrafted","handmade","hand"),
			);
				
		$this_value = "TODO";
		foreach($types as $key => $type_a) {
			foreach($type_a as $type) {
				if( stripos($product->description, $type) !== false ) {
					$this_value = $key;
					break;
				}
			}
			if( $this_value  !== "TODO" )
				break;
		}
		$data[] = $this_value;


		//Knited or Woven
		$data[] = "Woven";

		//Size
		$data[] = $group["attribute_name"];
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
