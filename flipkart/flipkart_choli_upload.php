<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');

//$db = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$sql = "select cp.id_product from ps_category_product cp  
                        inner join ps_product p on p.id_product = cp.id_product
                        inner join temp on temp.code = p.reference
                        where id_category = 141 and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and cp.id_product in (select t1.id_product  from (select cp.id_product from ps_category_product cp inner join ps_product p on p.id_product = cp.id_product inner join temp on temp.code = p.reference where id_category = 141 and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and p.is_customizable = 0) t1 left join ( select distinct id_product from ps_flipkart_feed_product_info) t2 on t1.id_product = t2.id_product where t2.id_product is NULL)";

$header = array("SKU","Brand","Size","Size Unit","Code","Brand Color","Generic Color","For","Min Age","Max Age","Occassion","Neck","Code","EAN/UPC","Main Image","Image 2","Image 3","Image 4","Image 5","Palette Image","Description","Sales Package","Season","Fabric","Care","Pattern","Pack Of","Search Tags","Video URL");

$cdata = tocsv($header) . "\n";
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
		$this_color = "TODO";
		if( stripos($product->color,",") !== false || stripos($product->color,"and") !== false)
			$this_color = "Multicolor";
		else {
			$colors = array("White","Black","Grey","Beige","Blue","Light Blue","Dark Blue","Green","Light Green","Dark Green","Yellow","Orange","Red","Maroon","Pink","Gold","Silver","Brown","Purple");
			foreach($colors as $color) {
				if( stripos($product->color,"$color") !== false ) {
					$this_color = $color;
					break;
				}
			}
		}
		$data[] = $this_color;
		
		$data[] = "Women's";
		//Age
		$data[] = "";
		$data[] = "";
	
		//occasion
		$data[] = "TODO";
		//Neck
		$data[] = "TODO";
		
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
	

		//sales pack, season
		$data[] = "";
		$data[] = "";
		
		//Fabric
		$datum = array("Brasso","Brocade","Chiffon","Cotton","Crepe","Georgette","Linen","Lycra","Nylon","Polyester","Rayon","Satin","Silk","Suede","Velvet","Viscose");
		usort($datum, "lsort");
		$fabric = array_unique($datum);
		$this_data = array();
		foreach($datum as $d) {
			if( stripos($product->name, $d) !== false || stripos($product->description, $d) !== false || stripos($product->work_type, $d) !== false ) {
				array_push($this_data,$d);
			}
		}
		if( count($this_data) > 0 ) {
			$data[] = implode("::", $this_data);
		} else {
			$data[] = "TODO";
		}
		
		
		//Fabric care
		$data[] = "Dry cleaning is the best method to wash an apparel made of soft and delicate material. Never wrap silk apparel in plastic and trap the moisture; this could change the color and quality of the fabric in no time.";
		
	
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
		
		//pack of	
		$data[] = "";
		
		//search tags
		$data[] = "Blouse::Choli::Women";

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
	return strlen($a) < strlen($b);
}
