<?php

include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/init.php');

$sql = "select id_product from ps_product";
$result = Db::getInstance()->ExecuteS($sql);
//echo '<pre>';print_r ($result);

 foreach ($result as $row ) {
 	$productId = $row;
 	$a = $productId['id_product'];
 	echo'<pre>';
 	echo $a;
    $sql = "insert into ps_product_tag values ($a , 4210)";
      $result = Db::getInstance()->ExecuteS($sql);
  }

?>