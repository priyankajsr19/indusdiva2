<?php /* Smarty version Smarty-3.0.7, created on 2015-07-03 09:52:53
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/customer_points.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45762624855960e1d8cb929-11193961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11c7ed20c9c4c33b3a7771472bc8a443af70dfec' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/customer_points.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45762624855960e1d8cb929-11193961',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<fieldset style="margin-bottom:10px;">
	<legend><img src="../img/admin/tab-tools.gif" />Account Statement</legend>
	<p>
		<ul STYLE="list-style-type: square">
			<li style="padding:5px">Points Redeemed : <?php echo $_smarty_tpl->getVariable('redeemed_points')->value;?>
</li>
			<li style="padding:5px">Points Balance : <?php echo $_smarty_tpl->getVariable('balance_points')->value;?>
</li>
			<li style="padding:5px">Total Referred : <?php echo $_smarty_tpl->getVariable('total_referred')->value;?>
</li>
		</ul>
	</p>
	<div class="block-center" id="block-vbpoints">
		<?php if ($_smarty_tpl->getVariable('vbpoints')->value&&count($_smarty_tpl->getVariable('vbpoints')->value)){?>
		<table id="order-list" class="table" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="first_item" style="text-align:left;">Date</th>
					<th class="item" style="text-align:left;">Description</th>
					<th class="item" style="text-align:right;">Earned</th>
					<th class="item" style="text-align:right;">Deducted</th>
					<th class="last_item" style="text-align:right;">Balance</th>
				</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['vbpoint'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('vbpoints')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vbpoint']->key => $_smarty_tpl->tpl_vars['vbpoint']->value){
?>
				<tr>
					<td class="history_date bold"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['date_add'];?>
</td>
					<td class="" style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['description'];?>
</td>
					<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['points_awarded'];?>
</td>
					<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['points_deducted'];?>
</td>
					<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['balance'];?>
</td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
		<?php }?>
	</div>
</fieldset>