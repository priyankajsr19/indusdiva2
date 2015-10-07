<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 18:56:32
         compiled from "/var/www/indusdiva.com/themes/violettheme/discount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1533223195548ee18813ad50-77373342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80d7dadb96d137270e6e5be653f3b376cdb59890' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/discount.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1533223195548ee18813ad50-77373342',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?>

<script type="text/javascript">
//<![CDATA[
	var baseDir = '<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
';
//]]>
</script>

<div style="width:970px;">
        <?php $_smarty_tpl->tpl_vars['selitem'] = new Smarty_variable('vouchers', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./myaccount_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div class="vtab-content">
		<div style="border: 1px solid #D0D3D8;box-shadow: 0 1px 3px 0 black;margin-bottom: 1em;padding-bottom: 1em;margin-top:15px;min-height:400px;float:left;width:100%">
		<h1 style="padding:10px 0;text-align:center;border-bottom:1px dashed #cacaca">Your Vouchers</h1>
		<?php if (isset($_smarty_tpl->getVariable('discount',null,true,false)->value)&&count($_smarty_tpl->getVariable('discount')->value)&&$_smarty_tpl->getVariable('nbDiscounts')->value){?>
		<table class="discount std">
			<thead>
				<tr>
					<th class="discount_code first_item">Code</th>
					<th class="discount_description item">Description</th>
					<th class="discount_quantity item">Quantity</th>
					<th class="discount_value item">Value</th>
					<th class="discount_minimum item"><?php echo smartyTranslate(array('s'=>'Minimum'),$_smarty_tpl);?>
</th>			
					<th class="discount_expiration_date last_item"><?php echo smartyTranslate(array('s'=>'Expiration date'),$_smarty_tpl);?>
</th>
				</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['discountDetail'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('discount')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discountDetail']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discountDetail']->iteration=0;
 $_smarty_tpl->tpl_vars['discountDetail']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']=-1;
if ($_smarty_tpl->tpl_vars['discountDetail']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['discountDetail']->key => $_smarty_tpl->tpl_vars['discountDetail']->value){
 $_smarty_tpl->tpl_vars['discountDetail']->iteration++;
 $_smarty_tpl->tpl_vars['discountDetail']->index++;
 $_smarty_tpl->tpl_vars['discountDetail']->first = $_smarty_tpl->tpl_vars['discountDetail']->index === 0;
 $_smarty_tpl->tpl_vars['discountDetail']->last = $_smarty_tpl->tpl_vars['discountDetail']->iteration === $_smarty_tpl->tpl_vars['discountDetail']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['discountDetail']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['discountDetail']->last;
?>
				<tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['index']%2){?>alternate_item<?php }?>">
					<td class="discount_code"><?php echo $_smarty_tpl->tpl_vars['discountDetail']->value['name'];?>
</td>
					<td class="discount_description"><?php echo $_smarty_tpl->tpl_vars['discountDetail']->value['description'];?>
</td>
					<td class="discount_quantity" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['discountDetail']->value['quantity_for_user'];?>
</td>
					<td class="discount_value" style="text-align:center">
						<?php if ($_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==1||$_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==5){?>
							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['discountDetail']->value['value'],'htmlall','UTF-8');?>
%
						<?php }elseif($_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==2||$_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==4){?>
							<?php echo Product::convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discountDetail']->value['value']),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php echo smartyTranslate(array('s'=>'Free shipping'),$_smarty_tpl);?>

						<?php }?>
					</td>
					<td class="discount_minimum" style="text-align:center">
						<?php if ($_smarty_tpl->tpl_vars['discountDetail']->value['minimal']==0){?>
							<?php echo smartyTranslate(array('s'=>'none'),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php echo Product::convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discountDetail']->value['minimal']),$_smarty_tpl);?>

						<?php }?>
					</td>
					
					<td class="discount_expiration_date" style="text-align:center"><?php echo Tools::dateFormat(array('date'=>$_smarty_tpl->tpl_vars['discountDetail']->value['date_to']),$_smarty_tpl);?>
</td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
		<p>
			*<?php echo smartyTranslate(array('s'=>'Tax included'),$_smarty_tpl);?>

		</p>
		<?php }else{ ?>
			 <p style="font-size:18px;text-align:center;color:#cacaca">You do not have any vouchers</p>
		<?php }?>
	</div>
	</div>
</div>