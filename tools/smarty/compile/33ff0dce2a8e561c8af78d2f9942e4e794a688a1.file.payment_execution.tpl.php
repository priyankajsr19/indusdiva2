<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 00:10:35
         compiled from "/var/www/indusdiva.com/modules/checkout/payment_execution.tpl" */ ?>
<?php /*%%SmartyHeaderCode:815002973548f2b2375d172-88960716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33ff0dce2a8e561c8af78d2f9942e4e794a688a1' => 
    array (
      0 => '/var/www/indusdiva.com/modules/checkout/payment_execution.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '815002973548f2b2375d172-88960716',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p id="pay-twoco" class="payment_module">
    <input type="radio" name="payMethod" value="twoco" style="margin-left:30px;font-size:15px;"/>
    Credit Card
    <span style="width:100px; display:inline-block; overflow:hidden; vertical-align:middle">
    	<img src="http://www.indusdiva.com/img/card-types.jpg" alt="card-types" style="vertical-align:middle"/>
    </span>
</p>

<form id="twoco-form" name="checkout_confirmation" action="<?php echo $_smarty_tpl->getVariable('CheckoutUrl')->value;?>
" method="post" />
    <input type="hidden" name="lang" value="<?php echo $_smarty_tpl->getVariable('lang_iso')->value;?>
">
    <input type="hidden" name="sid" value="<?php echo $_smarty_tpl->getVariable('sid')->value;?>
" />
    <input type="hidden" name="total" value="<?php echo $_smarty_tpl->getVariable('total')->value;?>
" />
    <input type="hidden" name="cart_order_id" value="<?php echo $_smarty_tpl->getVariable('cart_order_id')->value;?>
" />
    <input type="hidden" name="card_holder_name" value="<?php echo $_smarty_tpl->getVariable('card_holder_name')->value;?>
" />
    <input type="hidden" name="street_address" value="<?php echo $_smarty_tpl->getVariable('street_address')->value;?>
" />
    <input type="hidden" name="street_address2" value="<?php echo $_smarty_tpl->getVariable('street_address2')->value;?>
" />
    <input type="hidden" name="city" value="<?php echo $_smarty_tpl->getVariable('city')->value;?>
" />
    <input type="hidden" name="state" value="<?php if ($_smarty_tpl->getVariable('state')->value){?><?php echo $_smarty_tpl->getVariable('state')->value->name;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('outside_state')->value;?>
<?php }?>" />
    <input type="hidden" name="zip" value="<?php echo $_smarty_tpl->getVariable('zip')->value;?>
" />
    <input type="hidden" name="country" value="<?php echo $_smarty_tpl->getVariable('country')->value;?>
" />

    <input type="hidden" name="ship_name" value="<?php echo $_smarty_tpl->getVariable('ship_name')->value;?>
" />
    <input type="hidden" name="ship_street_address" value="<?php echo $_smarty_tpl->getVariable('ship_street_address')->value;?>
" />
    <input type="hidden" name="ship_street_address2" value="<?php echo $_smarty_tpl->getVariable('ship_street_address2')->value;?>
" />
    <input type="hidden" name="ship_city" value="<?php echo $_smarty_tpl->getVariable('ship_city')->value;?>
" />
    <input type="hidden" name="ship_state" value="<?php if ($_smarty_tpl->getVariable('ship_state')->value){?><?php echo $_smarty_tpl->getVariable('ship_state')->value->name;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('outside_state')->value;?>
<?php }?>" />
    <input type="hidden" name="ship_zip" value="<?php echo $_smarty_tpl->getVariable('ship_zip')->value;?>
" />
    <input type="hidden" name="ship_country" value="<?php echo $_smarty_tpl->getVariable('ship_country')->value;?>
" />
    <input type="hidden" name="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" />
    <input type="hidden" name="phone" value="<?php echo $_smarty_tpl->getVariable('phone')->value;?>
" />
    <input type="hidden" name="demo" value="<?php echo $_smarty_tpl->getVariable('demo')->value;?>
" />
	<input type="hidden" name="secure_key" value="<?php echo $_smarty_tpl->getVariable('secure_key')->value;?>
" />
    <input type="hidden" name="x_receipt_link_url" value="<?php echo $_smarty_tpl->getVariable('x_receipt_link_url')->value;?>
" />
    
</form>