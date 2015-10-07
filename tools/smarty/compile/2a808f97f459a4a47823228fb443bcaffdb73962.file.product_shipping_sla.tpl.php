<?php /* Smarty version Smarty-3.0.7, created on 2015-10-06 23:16:38
         compiled from "C:\xampp\htdocs\indusdiva2/themes/violettheme/./product_shipping_sla.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15404561408fe9f2bf0-09998463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a808f97f459a4a47823228fb443bcaffdb73962' => 
    array (
      0 => 'C:\\xampp\\htdocs\\indusdiva2/themes/violettheme/./product_shipping_sla.tpl',
      1 => 1442326253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15404561408fe9f2bf0-09998463',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('product')->value['shipping_sla']=="1"){?>
    <div style="text-align:left;color:#008500">Shipped in 24 hours</div>
<?php }elseif(sprintf("%d",$_smarty_tpl->getVariable('product')->value['shipping_sla'])<=5){?>
    <div style="text-align:left;color:#008500">Shipped in <?php echo $_smarty_tpl->getVariable('product')->value['shipping_sla'];?>
 days</div>
<?php }?>
