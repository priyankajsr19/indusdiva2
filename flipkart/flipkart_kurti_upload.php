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

foreach($res as $row) {
	$id_product = $row['id_product'];
	$product = new Product($id_product, true, 1 );

	$groups = $product->getAttributesGroups(1);
	foreach($groups as $group) {
		$data = array();
		$data[] = "ID-".$id_product."-".$group['attribute_name'];
		$data[] = "IndusDiva";
		$data[] = $group['attribute_name'];
		$data[] = "Number";
		$data[] = $product->reference;
	
		$data[] = $product->color;
		//Color
		$this_value = "TODO";
		if( stripos($product->color,",") !== false || stripos($product->color,"and") !== false)
			$this_value = "Multi";
		else {
			$datum = array("White","Black","Grey","Beige","Blue","Light Blue","Dark Blue","Green","Light Green","Dark Green","Yellow","Orange","Red","Maroon","Pink","Gold","Silver","Brown","Purple");
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
		
		$data[] = "Women's";
		//Age
		$data[] = "";
		$data[] = "";
	

		//Sleeve
		if( stripos($product->sleeves,"3/4") !== false )
			$sleeve = "3/4 Sleeve";
		elseif (stripos($product->sleeves,"three") !== false)
			$sleeve = "3/4 Sleeve";
		elseif( stripos($product->sleeves,"less") !== false)
			$sleeve = "Sleeveless";
		elseif( stripos($product->sleeves,"half") !== false)
			$sleeve = "Half Sleeve";
		elseif( stripos($product->sleeves,"1/2") !== false )
			$sleeve = "Half Sleeve";
		elseif( stripos($product->sleeves,"full") !== false)
			$sleeve = "Full Sleeve";
		elseif( stripos($product->sleeves,"long") !== false)
			$sleeve = "Full Sleeve";
		else
			$sleeve = "TODO";
		$data[] = $sleeve;
		
		//Pattern
		$datum = array(
			"Animal Print" => array("Animal", "Animal Print"),
			"Checkered" => array("Checkered","Checks","Checker","Check"),
			"Floral Print" => array("Floral","Floral Print","Floal Prints"),
			"Geometric Print" => array("Geometric","Geometrics","Geometrics print","Geometric Print"),
			"Graphic Print" => array("Graphics","Graphic","Graphics Print","Graphic Print"),
			"Polka Print" => array("Polka","Polka print"),
			"Printed" => array("Printed","Prints","Print"),
			"Solid" => array("Solid"),
			"Striped" => array("Stripes","Striped","Stripe")
		);
	        $this_data = array();
		foreach($datum as $key=>$set) {
			usort($set,"lsort");
			$set = array_unique($set);
			foreach($set as $d) {
				if( stripos($product->name, $d) !== false || stripos($product->description, $d) !== false || stripos($product->work_type, $d) !== false ) {
					array_push($this_data,$key);
					break;
				}
			}
		}
		if( count($this_data) > 0 ) {
			$data[] = implode("::", $this_data);
		} else {
			$data[] = "TODO";
		}
		
		//occasion
		$id_categories = $product->getCategories();
		$this_occasion = array();
		if( in_array(41, $id_categories) )
			array_push($this_occasion, 'Festive');
		if( in_array(42, $id_categories) )
			array_push($this_occasion, 'Wedding');
		if( in_array(43, $id_categories) )
			array_push($this_occasion, 'Wedding');
		if( in_array(44, $id_categories) )
			array_push($this_occasion, 'Casual');
		if( in_array(45, $id_categories) )
			array_push($this_occasion, 'Formal');
		if( in_array(46, $id_categories) )
			array_push($this_occasion, 'Semi Formal');
		if( in_array(47, $id_categories) )
			array_push($this_occasion, 'Party');
		if( in_array(48, $id_categories) )
			array_push($this_occasion, 'Traditional');
		
		if( count($this_occasion) > 0 ) {
			$data[] = implode("::", $this_occasion);
		} else {
			$data[] = "TODO";
		}
	
		//group id
		if( isset($product->id_group) && !empty($product->id_group)) {	
			$groupProduct = new Product((int)$product->id_group);
			$data[] = $groupProduct->reference;
		} else
			$data[] = $product->reference;

		$data[] = "'0000000000000";
		
		//Images
		$c = 0;
		$solrProduct = SolrSearch::getProductsForIDs(array($product->id),$c);
		$data[] = str_replace('large','thickbox',$solrProduct[0]['image_link_large']);
		$c = 2;

		foreach($solrProduct[0]['image_links'] as $oImage) {
			if( $oImage !== $solrProduct[0]['image_link_large'] ) {	
				$data[] = str_replace('large','thickbox',$oImage);
				$c++;
				if( $c == 6)
					break;
			}
		}
		for($i =  5-(count($solrProduct[0]['image_links'])); $i >0 ; $i--)
			$data[] = "";

		//palette
		$data[] = "";
		
		//description
		$data[] = strip_tags($product->description);
	

		//sales pack, season, fabric
		$data[] = "";
		$data[] = "";
		$data[] = $product->fabric;
		
		//Fabric care
		$data[] = "Dry cleaning is the best method to wash an apparel made of soft and delicate material. Never wrap silk apparel in plastic and trap the moisture; this could change the color and quality of the fabric in no time.";
		//pack of	
		$data[] = "";
		
		//search tags
		$data[] = "Kurti, Tunic, Ethnicwear, Tops";

		//video URL
		$data[] = "";
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

