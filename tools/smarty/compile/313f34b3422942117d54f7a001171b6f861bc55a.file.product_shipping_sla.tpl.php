<?php /* Smarty version Smarty-3.0.7, created on 2015-06-10 16:25:52
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/indusdiva2/themes/violettheme/./product_shipping_sla.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1871034029557817b860f593-39438163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '313f34b3422942117d54f7a001171b6f861bc55a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/indusdiva2/themes/violettheme/./product_shipping_sla.tpl',
      1 => 1433380398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1871034029557817b860f593-39438163',
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
