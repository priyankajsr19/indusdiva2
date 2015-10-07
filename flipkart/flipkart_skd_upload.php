<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');

//$db = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$sql = "select cp.id_product from ps_category_product cp  
                        inner join ps_product p on p.id_product = cp.id_product
			inner join temp on temp.code = p.reference
                        where id_category = 3 and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and cp.id_product in (13358,13371,9182,9183,9184,9185,17163,17164,17165,17166,17167,17168,17169,17170,17171,17172,17173,17174,17175,17176,17177,17178,17179,17180,17181,17182,17183,17184,17185,17186,17187,17188,17189,17190,17191,17192,17193,17194,17195,17196,17197,17198,17199,17200,17201,17202,17212,17213,17487,17488,17489,17490,17491,17492,17493,17494,17495,17496,17497,17498,17499,17500,17501,17502,17503,17504,17505,17506,17507,17508,17509,17510,17511,17512,17650,17651,17652,17653,17654,17655,17656,17657,17658,17659,17660,17661,17662,17663,17664,17665,17666,17667,17668,17669,17670,17671,17672,11861) and p.is_customizable = 0";

$res = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
$cdata = tocsv($header) . "\n";

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
		if( stripos($product->generic_color,",") !== false)
                	$data[] = "Multicolor";
        	else
                	$data[] = $product->generic_color;

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
                        $sleeve = "Other";
		$data[] = $sleeve;
	
		//Pattern
		$patterns = array("Animal Print","Batik","Checkered","Floral","Geometric","Ikat","Paisley","Polka Dots","Printed","Solid","Stripes","Tattoo","batik","checkered","floral","ikat","paisley","polka dots","printed","solid","stripes","checkers","stripe","checker","animal print","print","Striped","Print","Checker","Checkers","Check","check");

	       $this_pattern = array();
		foreach($patterns as $pattern) {
			if( stripos($product->name, $pattern) !== false || stripos($product->description, $pattern) !== false || stripos($product->work_type, $pattern) !== false ) {
				array_push($this_pattern,$pattern);
			}
		}
		if( count($this_pattern) > 0 ) {
			$data[] = implode("::", $this_pattern);
		} else {
			$data[] = "Other";
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
			$data[] = "Other";
		}
	
		//group id
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
		if( is_array($product->tags[1] ) )
			$data[] = implode(";", $product->tags[1]);
		else
			$data[] = "";

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
