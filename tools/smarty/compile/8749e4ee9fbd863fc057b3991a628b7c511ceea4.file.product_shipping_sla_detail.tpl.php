<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 14:41:19
         compiled from "/var/www/indusdiva.com/themes/violettheme/./product_shipping_sla_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155978253255e960374bf489-76278602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8749e4ee9fbd863fc057b3991a628b7c511ceea4' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./product_shipping_sla_detail.tpl',
      1 => 1384440769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155978253255e960374bf489-76278602',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><?php if (isset($_smarty_tpl->getVariable('product',null,true,false)->value->shipping_estimate)&&$_smarty_tpl->getVariable('product')->value->shipping_estimate!=''){?>
    <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->shipping_estimate,'htmlall','UTF-8');?>

<?php }?>
<br />
<?php if (!isset($_smarty_tpl->getVariable('nocust',null,true,false)->value)){?>
    For orders that include customizations, please add an additional 7 days for shipping. 
<?php }?>
All orders are shipped by reputed international couriers and may take another 3 to 10 business days to get delivered depending upon the delivery location.
<br />
The estimate provided does not include business holidays and weekends.
<br />
<a href="#shipping-charges" class="shipping_link span_link">Know more about your shipping charges</a>
