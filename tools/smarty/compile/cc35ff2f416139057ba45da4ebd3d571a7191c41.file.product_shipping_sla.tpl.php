<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 02:12:07
         compiled from "/var/www/indusdiva.com/themes/violettheme/./product_shipping_sla.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139404838055e8b09f2753e2-37734021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc35ff2f416139057ba45da4ebd3d571a7191c41' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./product_shipping_sla.tpl',
      1 => 1384440769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139404838055e8b09f2753e2-37734021',
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
