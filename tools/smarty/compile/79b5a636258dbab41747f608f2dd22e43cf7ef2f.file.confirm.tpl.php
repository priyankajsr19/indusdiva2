<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 22:24:20
         compiled from "/var/www/indusdiva.com/modules/paypal/confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:356306488549063bcaa8c86-75018980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79b5a636258dbab41747f608f2dd22e43cf7ef2f' => 
    array (
      0 => '/var/www/indusdiva.com/modules/paypal/confirm.tpl',
      1 => 1373373711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '356306488549063bcaa8c86-75018980',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><div id="co_content">
	<div id="co_left_column">
		<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, null);?>
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./order-steps.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		
	   	<div id="payment_confirm" style="margin:20px 160px;padding:0 0 20px 0;width:650px;float:left">
	   			<h1 style="border-bottom:1px dashed #cacaca;padding:10px;text-align:center">Confirm Payment</h1>
				<form action="<?php echo $_smarty_tpl->getVariable('this_path_ssl')->value;?>
<?php echo $_smarty_tpl->getVariable('mode')->value;?>
submit.php" method="post">
					<?php if (isset($_smarty_tpl->getVariable('ppToken',null,true,false)->value)){?><input type="hidden" name="token" value="<?php echo stripslashes(smarty_modifier_escape($_smarty_tpl->getVariable('ppToken')->value,'htmlall'));?>
" /><?php }?>
					<?php if (isset($_smarty_tpl->getVariable('payerID',null,true,false)->value)){?><input type="hidden" name="payerID" value="<?php echo stripslashes(smarty_modifier_escape($_smarty_tpl->getVariable('payerID')->value,'htmlall'));?>
" /><?php }?>
					<p style="margin-top:20px;">
						- <?php echo smartyTranslate(array('s'=>'The total amount of your order is','mod'=>'paypal'),$_smarty_tpl);?>

							<span id="amount_<?php echo $_smarty_tpl->getVariable('currency')->value->id;?>
" class="price"><?php echo Product::convertPriceWithCurrency(array('price'=>$_smarty_tpl->getVariable('total')->value,'currency'=>$_smarty_tpl->getVariable('currency')->value),$_smarty_tpl);?>
</span> <?php if ($_smarty_tpl->getVariable('use_taxes')->value==1){?><?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'paypal'),$_smarty_tpl);?>
<?php }?>
					</p>
					<p>
						- <?php echo smartyTranslate(array('s'=>'We accept the following currency to be sent by PayPal: ','mod'=>'paypal'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->getVariable('currency')->value['name'];?>
</b>
							<input type="hidden" name="currency_payement" value="<?php echo $_smarty_tpl->getVariable('currency')->value->id;?>
" />
					</p>
					<p>
					</p>
					<p class="cart_navigation" style="width:630px;float:left;border-top:1px dashed #cacaca;padding-top:20px;">
						<?php if (isset($_smarty_tpl->getVariable('paypalError',null,true,false)->value)){?>
							<a href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
?step=3" class="button_large"><?php echo smartyTranslate(array('s'=>'Return','mod'=>'paypal'),$_smarty_tpl);?>
</a><br /><br />
							<span style="color: red;"><?php echo smartyTranslate(array('s'=>'Session expired, please go back and try again','mod'=>'paypal'),$_smarty_tpl);?>
</span>
						<?php }else{ ?>
							<a href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
?step=3" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'paypal'),$_smarty_tpl);?>
</a>
							<input type="submit" name="submitPayment" value="<?php echo smartyTranslate(array('s'=>'Pay with PayPal','mod'=>'paypal'),$_smarty_tpl);?>
" class="exclusive_large" />
						<?php }?>
					</p>
				</form>
		</div>
	</div>
</div>