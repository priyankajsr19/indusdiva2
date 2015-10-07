<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 14:41:19
         compiled from "/var/www/indusdiva.com/themes/violettheme/./product_detail_shipping_sla.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201275122655e960373fe228-12764931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9a3ee4445980904c53fd011c1ddb1137916cbcb' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./product_detail_shipping_sla.tpl',
      1 => 1384440769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201275122655e960373fe228-12764931',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('product')->value->shipping_sla=="1"){?>
    <p style="border-bottom:1px dashed #cacaca;padding:5px 0;clear:both; font-weight:bold; color:#008500">
        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
btruck.png" width="20px" height="20px" style="float:left"/>
        <span style="margin-left:10px">Shipped in 24 hours</span>
    </p>
<?php }else{ ?>
<!-- 
    <p style="border-bottom:1px dashed #cacaca;padding:5px 0;clear:both;font-weight:bold; color:#008500">
        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
btruck.png" width="20px" height="20px" style="float:left"/>
        <span style="margin-left:10px">Shipped in <?php echo $_smarty_tpl->getVariable('product')->value->shipping_sla;?>
 days</span>
    </p>
 -->
<?php }?>
