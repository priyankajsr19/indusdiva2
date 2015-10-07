<?php /* Smarty version Smarty-3.0.7, created on 2015-06-11 11:21:25
         compiled from "C:\xampp\htdocs\indusdiva/themes/violettheme/./product_shipping_sla.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16547557921dd9c5b86-94361126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c23ee6485e04a60547a21a48afdb8e99b18c223' => 
    array (
      0 => 'C:\\xampp\\htdocs\\indusdiva/themes/violettheme/./product_shipping_sla.tpl',
      1 => 1433380398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16547557921dd9c5b86-94361126',
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
