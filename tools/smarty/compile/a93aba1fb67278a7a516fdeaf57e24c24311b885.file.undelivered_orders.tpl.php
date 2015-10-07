<?php /* Smarty version Smarty-3.0.7, created on 2015-02-03 13:52:05
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/undelivered_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24851346254d0852d884cb9-66466297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a93aba1fb67278a7a516fdeaf57e24c24311b885' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/undelivered_orders.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24851346254d0852d884cb9-66466297',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div style="width:1230px;margin:20 auto;">
<fieldset style="margin-bottom:10px;">
	<legend><img src="../img/admin/tab-tools.gif" />Shipped but not delivered</legend>
	<h2>Total: <?php echo count($_smarty_tpl->getVariable('orders')->value);?>
</h2>
	<table id="stats_table" class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th colspan="1">Order ID</th>
				<th colspan="1">Carrier</th>
				<th colspan="1">Shipping Date</th>
				<th colspan="1">Tracking Number</th>
				<th colspan="1">City</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('orders')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
?>
			<tr>
				<td class="title"><?php echo $_smarty_tpl->tpl_vars['order']->value['OrderID'];?>
</td>
				<td class="title"><?php echo $_smarty_tpl->tpl_vars['order']->value['Carrier'];?>
</td>
				<td class="title"><?php echo $_smarty_tpl->tpl_vars['order']->value['ShippingDate'];?>
</td>
				<td class="title"><?php echo $_smarty_tpl->tpl_vars['order']->value['TrackingCode'];?>
</td>
				<td class="title"><?php echo $_smarty_tpl->tpl_vars['order']->value['city'];?>
</td>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
</fieldset>
</div>

