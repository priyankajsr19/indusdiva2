<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');

//$db = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$sql = "select cp.id_product from ps_category_product cp  
                        inner join ps_product p on p.id_product = cp.id_product 
                        where id_category = 137 and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1";
$res = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$skus = getSKUs($res);
$header = array('id','name','parent_id', 'variation','size','description','quantity','price','indusdiva_code','keywords','shipping sla','color','generic color','fabric','work type(pattern)','wash care','category', "occasion","region", 'pattern', 'main image','other image 1','other image 2', 'other image 3','other image 4');
$cdata = tocsv($header) . "\n";
foreach($skus as $sku) {

        $id_product = $sku["id_product"];
        $id_sku = $sku["id_sku"];
        $is_parent = $sku["is_parent"];
        $has_children = empty($sku["attribute"])?false:true;
        $size = empty($sku["attribute"])?"":$sku["attribute"]["attribute_name"];
	
	$product = new Product($id_product, true, 1 );
	$data = array();
	$data[] = $id_sku;
	$data[] = $product->name;
	if( $is_parent ) {
		$data[] = "";
		$data[] = "Parent";
		$data[] = "";
	} else {
		$data[] = "ID-$id_product";
		$data[] = "Child";
		$data[] = "Waist: $size inch";
	}
	$data[] = $product->description;
	$data[] = $product->quantity;
	$data[] = round($product->price * 61.02);
	$data[] = $product->reference;
	if( is_array($product->tags[1] ) )
		$data[] = implode(";", $product->tags[1]);
	else
		$data[] = "";
	$data[] = $product->shipping_sla;
	$data[] = $product->color;
	$data[] = $product->generic_color;
	$data[] = $product->fabric;
	$data[] = $product->work_type;
	$data[] = "Dry cleaning is the best method to wash an apparel made of soft and delicate material. Never wrap silk apparel in plastic and trap the moisture; this could change the color and quality of the fabric in no time.";
	$data[] = $product->category;
	//occasion
	$id_categories = $product->getCategories();
	$this_occasion = array();
	if( in_array(69, $id_categories) )
		array_push($this_occasion, 'Wedding');
	if( in_array(70, $id_categories) )
		array_push($this_occasion, 'Wedding');
	if( in_array(71, $id_categories) )
		array_push($this_occasion, 'Casual');
	if( in_array(72, $id_categories) )
		array_push($this_occasion, 'Formal');
	if( in_array(73, $id_categories) )
		array_push($this_occasion, 'Party');
	if( in_array(74, $id_categories) )
		array_push($this_occasion, 'Semi Formal');
	if( in_array(75, $id_categories) )
		array_push($this_occasion, 'Traditional');
	if( in_array(76, $id_categories) )
		array_push($this_occasion, 'Formal');
	
        if( count($this_occasion) > 0 ) {
                $data[] = implode("::", $this_occasion);
        } else {
                $data[] = "Other";
        }

	//region
	$data[] = "Other";

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
    function getSKUs($products) {
        $skus = array();
        foreach($products as $product) {
            $id_product = $product['id_product'];
            $divaProduct = new Product($id_product,true,1);
            
            $attributesGroups = $divaProduct->getAttributesGroups(1);
            if( empty($attributesGroups) ) {
                
                $this_sku = array(
                    "id_product" => $id_product,
                    "id_sku" => "ID-$id_product",
                    "is_parent" => false, 
                    "attribute" => null
                );
                array_push( $skus, $this_sku );
            } else {
                
                $this_sku = array(
                    "id_product" => $id_product, 
                    "id_sku" => "ID-$id_product",
                    "is_parent" => true, 
                    "attribute" => null
                );
                array_push( $skus, $this_sku );

                foreach($attributesGroups as $attribute) {
                    $size = $attribute['attribute_name'];
                    $id_sku = "ID-$id_product-$size";
                    $this_sku = array(
                        "id_product" => $id_product,
                        "id_sku" => $id_sku,
                        "is_parent" => false, 
                        "attribute" => $attribute
                    );
                    array_push( $skus, $this_sku );
                }
            }
            unset($divaProduct);
        }
        return $skus;
    }
    
