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

$header = array("Web page Number","Brand","SKU Code","Product Name","Description","Weight(g)","Length(cm)","Height(cm)","Width(cm)","Freebies","Type","Color","Fabric","Work","Origin","Art Style","Set Contents");

$cdata = tocsv($header) . "\n";

$number = 1;
foreach($res as $row) {
	$id_product = $row['id_product'];
	$product = new Product($id_product, true, 1 );

	$data = array();

	$data[] = $number++;
	$data[] = "IndusDiva";
	$data[] = $product->reference;
	$data[] = $product->name;
	//description
	$data[] = strip_tags($product->description);

	$data[] = "TODO";
	$data[] = "TODO";
	$data[] = "TODO";
	$data[] = "TODO";
	
	//Freebies
	$data[] = "";
	
	//Type
	$types = array(
			"Handloom" => array("Handloom"), 
			"Saree" => array("Saree"), 
			"Jacquard" => array("Jacquard"), 
			"Ikkat" => array("Ikkat"), 
			"Casual/Daily Wear" => array("Casual","Daily"),
			"Tie & Dye" => array("Dye","Tie"),
			"Embroidered" => array("Embroided","Embroidered"),
			"Printed" => array("Print"),
			"Chhabra Fuscia Saree" => array("Chhabra","Fuscia"),
			"Silk" => array("silk")
		);
			
        $t = array();
        foreach($types as $key => $type_a) {
		foreach($type_a as $type) {
                	if( stripos($product->name, $type) !== false || stripos($product->description, $type) !== false ) {
				$t[] = $key;
				break;
                	}
        	}
	}
	$data[] = (count($t) >0 ) ? implode("::", $t) : "TODO";

	//Color
	$this_value = "TODO";
	if( stripos($product->color,",") !== false || stripos($product->color,"and") !== false)
		$this_value = "Multi";
	else {
		$datum = array("Pink","Blue","Purple","White","Brown","Wine","Yellow","Orange","Red","Green","Beige","Black","Turquoise","Violet","Maroon","Saddle-Brown","Dark-Violet","Medium-Slate-Blue","Spring-Green","Pale-Violet-Red","Dark-Slate-Blue","Olive-Drab","Mint-Cream","Cadet-Blue","Honey-Dew","Bisque","Dark-Slate-Gray","Lawn-Green","Thistle","Lime","Magenta","Pale-Turquoise","Dark-Red","Dark-Blue","Orchid", "Fire-Brick","Linen","Dark-Gray","Gold","Dark-Orange","Medium-Aqua-Marine","Antique-White","Lime-Green","Dark-Magenta","Medium-Blue","Medium-Purple","Deep-Pink","Slate-Blue","Chartreuse","Dim-Gray","Light-Golden-Rod-Yellow","Misty-Rose","Lavend");
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
	$datum = array("Velvet","Bhagalpuri Silk","Matka Silk","Pure Georgette","Art Silk","Faux Georgette","Art Crepe","Art Silk","Silk","Net","Tussar Silk","Net","Pure Chiffon","Faux Georgette","Faux Georgette","Cotton Silk","Semi Chiffon","Cotton","Pure Georgette","Chanderi","Satin Stripe","Art Crepe","Faux Tissue","Silk","Faux Organza","Cotton Jute","Polysatin","Supernet","Cotton","Brasso","Pure Crepe","Art Crepe","Tissue","Silk","Polycotton","Pure Crepe","Cotton Silk","Pashmina Silk","Pure Chiffon","Tussar Silk","Kota Doria","Tissue","Faux Pashmina Silk","Maheshwari","Faux Chanderi","Banglore Silk","Raw");
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

	//Work
	$this_value = array();
	$datum = array("Chanderi","Chettinad","Mangalgiri","Baluchari","Patola","Printed","Brocade","Venkatgiri","Jamdani","Bomkai","Bead Work","Border Work","Batik","Banarasi","Booti Work","Lace","Kasavu","Kota Doria","Bandhej","Embroidered","Bagru Printed","Konrad","Kalamkari Printed","Pochampally","Ilkal","Ikkat","Khari Printed","Kanchipuram","Kalamkari","Mysore Silk","Leheria","Kashmiri Work","Gota Patti","Kundan Work","Sonepuri","Dharmavaram","Nowari","Hand Embroidered","Coimbatore","Dhaniakhali","Mirror Work","Narayanpet","Uppada","Bandhani","Dubka Work","Hand Printed","Phulkari","Gharchola","Bengal Tant");
	$datum = array_unique($datum);
	usort($datum, 'lsort');
	foreach($datum as $dt) {
		$value_parts = explode("-", $dt);
		$no = false;
		foreach($value_parts as $p) {
			if(  stripos($product->description,$p) === false ) {
				$no = true;
				break;
			}
		}
		if( $no === false ) {
			$this_value[] = str_replace("-","",$dt);
		}
	}
	$data[] = (count($this_value) >0)?implode("::",$this_value):"TODO";


	//Origin	
	$this_value = array();
	$datum = array("Chanderi","Jaipur","Mysore","Bengal","Kerala","Mangalgiri","Tamil Nadu","Kota","Varanasi","Lucknow","Surat","Maharashtra","Orissa","Assam","Punjab","Maheshwar","Banglore","Hyderabad","Uppada","Rajkot","Dharmavaram","Chettinaad","Bhagalpur","Kanchipuram","Narayanpet","Nagaland","Venkatgiri","Jharkhand","Rasipuram","Patan");
	$datum = array_unique($datum);
	usort($datum, 'lsort');
	foreach($datum as $dt) {
		$value_parts = explode("-", $dt);
		$no = false;
		foreach($value_parts as $p) {
			if(  stripos($product->description,$p) === false && stripos($product->name,$p) === false ) {
				$no = true;
				break;
			}
		}
		if( $no === false ) {
			$this_value[] = str_replace("-","",$dt);
		}
	}
	$data[] = (count($this_value) >0)?implode("::",$this_value):"TODO";
	
	//Art Style	
	$this_value = array();
	$datum = array("Chettinad","Patola","Lucknavi Chikankari","Leheria","Mirror Work","Lace","Bandhej","Block Printed","Embroidered","Meenakari Work","Printed","Batik","Banarasi","Chanderi","Mangalgiri","Baluchari","Booti Work","Bomkai","Aari Work","Brocade","Venkatgiri","Bead Work","Jamdani","Lace","Border Work","Booti Work","Gota Patti","Kasavu","Kota Doria","Bagru Printed","Meenakari Work","Pochampally","Sambalpuri","Dhaniakhali","Mysore Silk","Phulkari","Kashmiri Work","Maheshwari","Madhubani Printed","Paithani","Sonepuri","Hand Embroidered","Khari Printed","Cutdana Work","Narayanpet","Ilkal","Bengal");
	usort($datum, 'lsort');
	$datum = array_unique($datum);
	foreach($datum as $dt) {
		$value_parts = explode("-", $dt);
		$no = false;
		foreach($value_parts as $p) {
			if(  stripos($product->description,$p) === false && stripos($product->name,$p) === false  ) {
				$no = true;
				break;
			}
		}
		if( $no === false ) {
			$this_value[] = str_replace("-","",$dt);
		}
	}
	$data[] = (count($this_value) >0)?implode("::",$this_value):"TODO";

	$data[] = "With Blouse Piece";

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
