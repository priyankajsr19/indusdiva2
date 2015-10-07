<?php /* Smarty version Smarty-3.0.7, created on 2015-07-03 09:52:53
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/customer_wishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184923766355960e1dab3ca5-05786738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60992495715c3eff0b1d22bce087d431ac192e9b' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/customer_wishlist.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184923766355960e1dab3ca5-05786738',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<fieldset style="margin-bottom:10px;">
	<legend><img src="../img/admin/tab-tools.gif" />Wishlist</legend>
	
	<div class="block-center" id="block-wishlist_items">
		<?php if ($_smarty_tpl->getVariable('wishlist_items')->value&&count($_smarty_tpl->getVariable('wishlist_items')->value)){?>
		<table id="order-list" class="table" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="first_item" style="text-align:left;">Date</th>
					<th class="item" style="text-align:left;">ID</th>
					<th class="item" style="text-align:right;">Code</th>
					<th class="last_item" style="text-align:right;">Name</th>
				</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('wishlist_items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<tr>
					<td class="history_date bold"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_add'];?>
</td>
					<td class="" style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['item']->value['id_product'];?>
</td>
					<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['item']->value['reference'];?>
</td>
					<td class="" style="text-align:right;">
                                            <a style="text-decoration:underline;" href="<?php echo $_smarty_tpl->tpl_vars['item']->value["link"];?>
" target="__new"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                                        </td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
		<?php }else{ ?>
			<span>No items in wishlist</span>
		<?php }?>
	</div>
</fieldset>
