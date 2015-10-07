<?php /* Smarty version Smarty-3.0.7, created on 2015-05-19 13:16:26
         compiled from "/var/www/indusdiva.com/themes/violettheme/manufacturer-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:740648729555aea5272e367-37542745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccdcf889601c7715a0b0aa3e9fa311edd7f3ee8b' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/manufacturer-list.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '740648729555aea5272e367-37542745',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><?php ob_start(); ?><?php echo smartyTranslate(array('s'=>'Brands'),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['path']=ob_get_clean();?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./breadcrumb.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="AllBrandsLetterListLabel">
	<span class="brands-index" style="width:980px;display:block;">
		<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('brandsIndex')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['brand']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['brand']->iteration=0;
 $_smarty_tpl->tpl_vars['brand']->index=-1;
if ($_smarty_tpl->tpl_vars['brand']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['brand']->key;
 $_smarty_tpl->tpl_vars['brand']->iteration++;
 $_smarty_tpl->tpl_vars['brand']->index++;
 $_smarty_tpl->tpl_vars['brand']->first = $_smarty_tpl->tpl_vars['brand']->index === 0;
 $_smarty_tpl->tpl_vars['brand']->last = $_smarty_tpl->tpl_vars['brand']->iteration === $_smarty_tpl->tpl_vars['brand']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['brandIndex']['first'] = $_smarty_tpl->tpl_vars['brand']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['brandIndex']['last'] = $_smarty_tpl->tpl_vars['brand']->last;
?>
			<?php if (count($_smarty_tpl->tpl_vars['brand']->value)>0){?>
				<span class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['brandIndex']['first']){?>brand-index-first<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['brandIndex']['last']){?>brand-index-last<?php }?>"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</span>
			<?php }else{ ?>
				<span class="no_brands <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['brandIndex']['first']){?>brand-index-first<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['brandIndex']['last']){?>brand-index-last<?php }?>"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</span>
			<?php }?>
		<?php }} ?>
	</span>
</div>

<?php if (isset($_smarty_tpl->getVariable('errors',null,true,false)->value)&&$_smarty_tpl->getVariable('errors')->value){?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }else{ ?>
	<?php if ($_smarty_tpl->getVariable('nbManufacturers')->value>0){?>
	<?php  $_smarty_tpl->tpl_vars['brandGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cols')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['brandGroup']->key => $_smarty_tpl->tpl_vars['brandGroup']->value){
?>
		<div style="width:180px;float:left;">
			<?php  $_smarty_tpl->tpl_vars['charBrands'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['brandGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['charBrands']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['charBrands']->iteration=0;
 $_smarty_tpl->tpl_vars['charBrands']->index=-1;
if ($_smarty_tpl->tpl_vars['charBrands']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['charBrands']->key => $_smarty_tpl->tpl_vars['charBrands']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['charBrands']->key;
 $_smarty_tpl->tpl_vars['charBrands']->iteration++;
 $_smarty_tpl->tpl_vars['charBrands']->index++;
 $_smarty_tpl->tpl_vars['charBrands']->first = $_smarty_tpl->tpl_vars['charBrands']->index === 0;
 $_smarty_tpl->tpl_vars['charBrands']->last = $_smarty_tpl->tpl_vars['charBrands']->iteration === $_smarty_tpl->tpl_vars['charBrands']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['manufacturers']['first'] = $_smarty_tpl->tpl_vars['charBrands']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['manufacturers']['last'] = $_smarty_tpl->tpl_vars['charBrands']->last;
?>
				<?php if (count($_smarty_tpl->tpl_vars['charBrands']->value)>0){?>
					<div class="brands-group">
						<span class="brands-index"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</span>
						<ul class="manufacturers_list">
							<?php  $_smarty_tpl->tpl_vars['manufacturer'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['charBrands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->key => $_smarty_tpl->tpl_vars['manufacturer']->value){
?>
								<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['manufacturers']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['manufacturers']['last']){?>last_item<?php }else{ ?>item<?php }?>"> 
									<span><?php if ($_smarty_tpl->tpl_vars['manufacturer']->value['nb_products']>0){?><a class="brand-name" href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('link')->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']),'htmlall','UTF-8');?>
"><?php }?>
											<?php echo smarty_modifier_escape(smarty_modifier_truncate($_smarty_tpl->tpl_vars['manufacturer']->value['name'],60,'...'),'htmlall','UTF-8');?>

											<?php if ($_smarty_tpl->tpl_vars['manufacturer']->value['nb_products']>0){?></a><?php }?>
									</span>
								</li>
							<?php }} ?>
						</ul>
					</div>
				<?php }?>
			<?php }} ?>
		</div>	
	<?php }} ?>
			</li>
		</ul>
	<?php }?>
<?php }?>
