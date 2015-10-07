<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 20:40:02
         compiled from "/var/www/indusdiva.com/themes/violettheme/curated.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1699405005548ef9cae107c2-23964095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '571354a44e5f13e27281e352ebbd86cdf876b46f' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/curated.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1699405005548ef9cae107c2-23964095',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><div style="height:150px;width:990px;margin:10px 0;background:url('<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
banners/divas-closet.jpg') repeat scroll 0 0 transparent">
	<h1 style="padding:45px 60px 0 475px;margin:0;font-size:25px;font-family:Abel">Its all about getting Divalicious with us!</h1>
	<p style="padding:0px 60px;">
		Showcasing our exclusive assortment of hand-picked ensembles just for you, because we do not believe in just dressing up, we believe in making statements.
		Combining the best of ethnicity with contemporary trends and most beautiful of fabrics from every nook and corner of India.
		Diva's closet celebrates the spirit of the IndusDiva lady with &eacute;lan.
	</p>
</div>
<div style="float:left; Width:420px;">
<?php if (isset($_smarty_tpl->getVariable('curated_products_left',null,true,false)->value)){?>
	<ul class="clear">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('curated_products_left')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['index']++;
?>
		<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['index']%7==0){?>block_product_large<?php }else{ ?>block_product_small<?php }?>" rel="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" >
			<div class=" product_card">
			<?php if (!$_smarty_tpl->tpl_vars['product']->value['inStock']){?>
				<img alt="Out Of Stock" src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
out_of_stock_vs.png" style="margin:0 0;position:absolute;left:1px; top:0px;"/>
			<?php }?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
">
					<span href="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
">
							<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['index']%7==0){?>
							<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
blank.jpg" data-href="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_large'];?>
" height="533" width="390" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
"  class="lazy"/>
							<noscript>
								<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_large'];?>
" height="533" width="390" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
" />
							</noscript>
							<?php }else{ ?>
							<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
blank.jpg" data-href="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" height="246" width="180" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
"  class="lazy"/>
							<noscript>
								<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" width="180" height="246" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
" />
							</noscript>
							<?php }?>
					</span>
                   <span class="product-list-name">
	                   <h2 class="product_card_name"><?php echo smarty_modifier_escape(smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],100,'...'),'htmlall','UTF-8');?>
</h2>
                  	</span>
					<span class="product_info">
                       	<?php if ($_smarty_tpl->getVariable('price_tax_country')->value==110){?>
                       		<span class="price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['offer_price_in']),$_smarty_tpl);?>
</span>
                       		<?php if (($_smarty_tpl->tpl_vars['product']->value['discount']>0)){?>
	                       	<span class="strike_price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['mrp_in']),$_smarty_tpl);?>
</span>
	                       	<span class="clear" style="display:block;color:#DA0F00;">(<?php echo $_smarty_tpl->tpl_vars['product']->value['discount'];?>
% Off)</span>
						<?php }?>
                       	<?php }else{ ?>
                       		<span class="price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['offer_price']),$_smarty_tpl);?>
</span>
                       		<?php if (($_smarty_tpl->tpl_vars['product']->value['discount']>0)){?>
	                       	<span class="strike_price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['mrp']),$_smarty_tpl);?>
</span>
	                       	<span class="clear" style="display:block;color:#DA0F00;">(<?php echo $_smarty_tpl->tpl_vars['product']->value['discount'];?>
% Off)</span>
							<?php }?>
						<?php }?>
					</span>
				</a>
			</div>
		</li>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['index']%7==0){?>
		<?php $_smarty_tpl->tpl_vars['countSmall'] = new Smarty_variable(0, null, null);?>
		<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['countSmall'] = new Smarty_variable($_smarty_tpl->getVariable('countSmall')->value+1, null, null);?>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('countSmall')->value%2==0){?>
     		<li style="clear:both;width:10px;"></li>
  		<?php }?>
  		<?php }} ?>
  	</ul>
<?php }?>
</div>
<div style="float:left; Width:550px;">
<?php if (isset($_smarty_tpl->getVariable('curated_products_right',null,true,false)->value)){?>
	<ul class="clear">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('curated_products_right')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['index']++;
?>
		<li class="block_product_medium" rel="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" >
			<div class=" product_card">
			<?php if (!$_smarty_tpl->tpl_vars['product']->value['inStock']){?>
				<img alt="Out Of Stock" src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
out_of_stock_vs.png" style="margin:0 0;position:absolute;left:1px; top:0px;"/>
			<?php }?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
">
					<span href="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
">
							<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
blank.jpg" data-href="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" height="342" width="250" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
"  class="lazy"/>
							<noscript>
								<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" height="342" width="250" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
" />
							</noscript>
					</span>
                   <span class="product-list-name">
	                   <h2 class="product_card_name"><?php echo smarty_modifier_escape(smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],100,'...'),'htmlall','UTF-8');?>
</h2>
                  	</span>
					<span class="product_info">
                       	<?php if ($_smarty_tpl->getVariable('price_tax_country')->value==110){?>
                       		<span class="price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['offer_price_in']),$_smarty_tpl);?>
</span>
                       		<?php if (($_smarty_tpl->tpl_vars['product']->value['discount']>0)){?>
	                       	<span class="strike_price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['mrp_in']),$_smarty_tpl);?>
</span>
	                       	<span class="clear" style="display:block;color:#DA0F00;">(<?php echo $_smarty_tpl->tpl_vars['product']->value['discount'];?>
% Off)</span>
						<?php }?>
                       	<?php }else{ ?>
                       		<span class="price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['offer_price']),$_smarty_tpl);?>
</span>
                       		<?php if (($_smarty_tpl->tpl_vars['product']->value['discount']>0)){?>
	                       	<span class="strike_price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['mrp']),$_smarty_tpl);?>
</span>
	                       	<span class="clear" style="display:block;color:#DA0F00;">(<?php echo $_smarty_tpl->tpl_vars['product']->value['discount'];?>
% Off)</span>
							<?php }?>
						<?php }?>
					</span>
				</a>
			</div>
		</li>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['index']%2==1){?>
     		<li style="clear:both;width:10px;"></li>
  		<?php }?>
  		<?php }} ?>
  	</ul>
<?php }?>
</div>
