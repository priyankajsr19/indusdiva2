<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');

//$db = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$sql = "select cp.id_product from ps_category_product cp  
                        inner join ps_product p on p.id_product = cp.id_product
			inner join temp on temp.code = p.reference
                        where id_category = 2 and p.active = 1 and p.quantity > 0 and p.is_exclusive = 1 and cp.id_product in (17749,17750,17751,17752,17753,17754,17755,17756,17757,17759,17760,17761,17762,17763,17764,17765,17766,17767,17768,17769,17770,17440,17441,17442,17362,17457,17460,17461,17463,17466,17469,17471,17472,17473,17474)";
$res = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

$header = array("SKU","Brand","Code","Brand Color","Generic Color","Occassion","Fabric","Pattern","Type","Embellished","Embroidered","Code","EAN/UPC","Main Image","Image 2","Image 3","Image 4","Image 5","Palette Image","Description","Sales Package","Season","Region","Pack Of","Blouse Piece","Fabric Care","Width","Width Unit","Length","Length Unit","Search Tags","Video URL");

$cdata = tocsv($header) . "\n";
foreach($res as $row) {
	$id_product = $row['id_product'];
	$product = new Product($id_product, true, 1 );

	$data = array();
	$data[] = "ID-".$id_product;
	$data[] = "IndusDiva";
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
		array_push($this_occasion, 'Formal');
	if( in_array(47, $id_categories) )
		array_push($this_occasion, 'Party');
	if( in_array(48, $id_categories) )
		array_push($this_occasion, 'Festive');
	
        if( count($this_occasion) > 0 ) {
                $data[] = implode("::", $this_occasion);
        } else {
                $data[] = "TODO";
        }

	$fabrics = array("Art Silk","Brasso","Brocade","Chanderi","Chiffon","Cotton","Crepe","Georgette","Jacquard","Net","Nylon","Organza","Polycotton","Polyester","Satin","Silk","Synthetic","Tissue","Viscose");
	$this_fabric = "TODO";
	foreach($fabrics as $fabric) {
		if( stripos($product->fabric, $fabric) !== false ) {
			$this_fabric = $fabric;
			break;
		}
	}
	$data[] = $this_fabric;
	

	$patterns = array(
		"Animal Print"=>"Animal Print",
		"Batik" => "Batik",
		"Checkered" => "Checkered",
		"Floral Print" => "Floral",
		"Geometric Print" => "Geometric",
		"Graphic Print" => "Graphic",
		"Polka Print" => "Polka Dots",
		"Polka Print" => "Polka",
		"Printed" => "Printed",
		"Solid" => "Solid",
		"Striped" => "Stripe"
	);

       $this_pattern = array();
        foreach($patterns as $key=>$pattern) {
                if( stripos($product->name, $pattern) !== false || stripos($product->description, $pattern) !== false || stripos($product->work_type, $pattern) !== false ) {
                        array_push($this_pattern,$key);
                }
        }
        if( count($this_pattern) > 0 ) {
                $data[] = implode("::", $this_pattern);
        } else {
                $data[] = "TODO";
        }

	//Type, Embellished, Embroidered
	$types = array("Arani Pattu","Balarampuram","Baluchari","Banarasi","Bandhani","Bapta","Berhampuri","Bhagalpuri","Bomkai","Chanderi","Chettinadu","Chinnalapattu","Coimbatore","Dhaniakhali","Dharmavaram","Gadwal","Garad","Guntur","Ikkat","Ilkal","Jamdani","Kandangi","Kanjivaram","Kantha","Khandua","Kosa","Kota Doria","Kumbakonam","Lehenga Saree","Leheria","Lugade","Madurai","Maheshwari","Mangalagiri","Manipuri","Mattha","Molakalmuru","Mooga","Mundum Neriyathum","Murshidabad","Muslin","Mysore","Narayanpet","Paithani","Patola","Phulia","Phulkari","Pochampally","Puttapaka","Rajshahi","Sambalpuri","Shalu","Shantipur","Sungudi","Tanchoi","Tangail","Thanjavur","That","Thirubuvanam","Venkatagiri","Lucknow Chikankari");
        $this_type = "TODO";
        foreach($types as $type) {
                if( stripos($product->name, $type) !== false || stripos($product->description, $type) !== false ) {
			$this_type = $type;
			break;
                }
        }
	$data[] = $type;

	$embelished = "No";
	$input = array("diamantes","zari","sequin","shimmer","sequin","stone","beads","motifs");
	foreach($input as $i) {
		if( stripos($product->name, $i) !== false || stripos($product->description, $i) !== false || stripos($product->work_type, $i) !== false ) {
			$embelished = "Yes";
		}
	}
	$data[] = $embelished;

	$embroidery = "No";
	$input = array("embroidery","embroidered","embroid");
	foreach($input as $i) {
		if( stripos($product->name, $i) !== false || stripos($product->description, $i) !== false || stripos($product->work_type, $i) !== false) {
			$embroidery = "Yes";
		}
	}
	$data[] = $embroidery;
	$data[] = $product->reference;


	$data[] = "'0000000000000";
	
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

	//sales package, season, region, packof, blousepeice
	$data[] = "";
	$data[] = "";
	$data[] = "TODO";
	$data[] = "";
	$data[] = "Yes";

	//Fabric care
	$data[] = "Dry cleaning is the best method to wash an apparel made of soft and delicate material. Never wrap silk apparel in plastic and trap the moisture; this could change the color and quality of the fabric in no time.";
	
	//width
	$data[] = "1.1176";
	$data[] = "m";
	//length
	$data[] = "6.25";
	$data[] = "m";
	
	if( is_array($product->tags[1] ) )
		$data[] = implode(";", $product->tags[1]);
	else
		$data[] = "";

	//video URL
	$data[] = "";
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
