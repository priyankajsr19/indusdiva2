<?php /* Smarty version Smarty-3.0.7, created on 2014-12-31 10:47:19
         compiled from "/var/www/indusdiva.com/modules/paypal/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140462568554a386dfa63cd1-50243665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d5c000f3f95dacd2e359dd968682689976c1d6d' => 
    array (
      0 => '/var/www/indusdiva.com/modules/paypal/error.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140462568554a386dfa63cd1-50243665',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php ob_start(); ?><a href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
"><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'paypal'),$_smarty_tpl);?>
</a>
<span class="navigation-pipe"><?php echo $_smarty_tpl->getVariable('navigationPipe')->value;?>
</span><?php echo smartyTranslate(array('s'=>'PayPal','mod'=>'paypal'),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['path']=ob_get_clean();?>
<div style="width:750px; border:1px solid black; float:left;margin:20px 120px;border: 1px solid #D0D3D8;box-shadow: 0 1px 3px 0 black;padding:10px">
		<h1 style="border-bottom:1px dashed #cacaca;padding:10px;text-align:center">Payment Error</h1>
		<p>There were some errors while processing your payment.</p>
		<p>Please try again later.</p>
<p style="text-align:center"><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
/order?step=3" class="button_small" style="margin:auto" title="<?php echo smartyTranslate(array('s'=>'Back','mod'=>'paypal'),$_smarty_tpl);?>
">&laquo; <?php echo smartyTranslate(array('s'=>'Back','mod'=>'paypal'),$_smarty_tpl);?>
</a></p>
</div>
