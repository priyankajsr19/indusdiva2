<?php /* Smarty version Smarty-3.0.7, created on 2014-12-25 18:25:58
         compiled from "/var/www/indusdiva.com/modules/checkout/payment_return.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1243702640549c095ea614b3-93405783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea16915b1ba115cdecbf2bd17179952557eb09da' => 
    array (
      0 => '/var/www/indusdiva.com/modules/checkout/payment_return.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1243702640549c095ea614b3-93405783',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('status')->value=='ok'){?>
	<p><?php echo smartyTranslate(array('s'=>'Your order has been completed. We are preparing to send its product immediately.','mod'=>'checkout'),$_smarty_tpl);?>

		<br /><br /><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'checkout'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
contact-form.php"><?php echo smartyTranslate(array('s'=>'customer support','mod'=>'checkout'),$_smarty_tpl);?>
</a>.
	</p>
<?php }else{ ?>
	<?php ob_start(); ?><a href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
"><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'paypal'),$_smarty_tpl);?>
</a>
    <span class="navigation-pipe"><?php echo $_smarty_tpl->getVariable('navigationPipe')->value;?>
</span><?php echo smartyTranslate(array('s'=>'PayPal','mod'=>'paypal'),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['path']=ob_get_clean();?>
    <div style="width:750px; border:1px solid black; float:left;margin:20px 120px;border: 1px solid #D0D3D8;box-shadow: 0 1px 3px 0 black;padding:10px">
    		<h1 style="border-bottom:1px dashed #cacaca;padding:10px;text-align:center">Payment Error</h1>
    		<p>There were some errors while processign your payment.</p>
    		<p>Please try again later.</p>
    
    <p style="text-align:center"><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
/order?step=3" class="button_small" style="margin:auto" title="<?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>
">&laquo; <?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>
</a></p>
    </div>
<?php }?>
