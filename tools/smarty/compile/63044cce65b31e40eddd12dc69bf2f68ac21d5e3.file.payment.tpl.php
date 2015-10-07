<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 14:27:04
         compiled from "/var/www/indusdiva.com/modules/bankwire/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55853440155d6e7e0e91186-46865992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63044cce65b31e40eddd12dc69bf2f68ac21d5e3' => 
    array (
      0 => '/var/www/indusdiva.com/modules/bankwire/payment.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55853440155d6e7e0e91186-46865992',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p class="payment_module" style="line-height:33px;">
    <input type="radio" name="payMethod" value="wire" style="margin-left:30px;font-size:15px;"/>
    Pay by Bank Wire Transfer 
    <a href="<?php echo $_smarty_tpl->getVariable('this_path_ssl')->value;?>
payment.php" title="" id="wire-transfer-link" style="display:none">
		Pay by bank wire (order process will be longer)
	</a>
</p>