<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 01:56:21
         compiled from "/var/www/indusdiva.com/themes/violettheme/wishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89385113655e8acedc529e9-82218633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6dd9cbd21553b9fed8079382f8ad38dac02a901' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/wishlist.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89385113655e8acedc529e9-82218633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?>
<script type="text/javascript">
//<![CDATA[

//]]>
</script>


<div style="width:970px;">
        <?php $_smarty_tpl->tpl_vars['selitem'] = new Smarty_variable('wishlist', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./myaccount_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div class="vtab-content">
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        <h1 style="padding:10px 0;text-align:center;border-bottom:1px dashed #cacaca">Wishlist</h1>
        <?php if (isset($_smarty_tpl->getVariable('wishlist_products',null,true,false)->value)&&$_smarty_tpl->getVariable('wishlist_products')->value){?>
        <div id="products_block"  class="products_block">
            <ul id="product_list" class="clear product_list">
                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('wishlist_products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['wishlist_products']['index']=-1;
if ($_smarty_tpl->tpl_vars['product']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['wishlist_products']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['wishlist_products']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
                    <li class="ajax_block_product" rel="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" >
            			<div class=" product_card">
            			    <?php if (!$_smarty_tpl->tpl_vars['product']->value['inStock']){?>
            				    <img alt="Out Of Stock" src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
out_of_stock_vs.png" style="margin:0 0;position:absolute;left:1px; top:0px;"/>
            			    <?php }?>
            			    
            				<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
">
            					<span class="product_image_large" href="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
">
            						<?php if (isset($_smarty_tpl->getVariable('lazy',null,true,false)->value)&&$_smarty_tpl->getVariable('lazy')->value==1){?>
            							<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
blank.jpg" data-href="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" height="342" width="250" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
"  class="lazy"/>
            							<noscript>
            								<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" height="342" width="250" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
" />
            							</noscript>
            						<?php }else{ ?>
            							<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image_link_list'];?>
" height="342" width="250" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
" />
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
                                   	<?php }else{ ?>
                                   		<span class="price"><?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['product']->value['offer_price']),$_smarty_tpl);?>
</span>
            						<?php }?>
            					</span>
            					<a class="span_link delete_measurement" style="display:inline-block; text-align:center" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
wishlist.php?delete=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
            					    <span style="color:red">Remove</span>
            					</a>
            				</a>
            			</div>
            		</li>
            		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['wishlist_products']['index']%3==2&&$_smarty_tpl->getVariable('smarty')->value['foreach']['wishlist_products']['last']==false){?>
                 		<li style="font-size:0px;line-height:0px;border-top:1px solid #D1A6E0;border-bottom:1px solid #D1A6E0;clear:both; margin:5px 25px;width:740px;height:2px;padding:0;"></li>
              		<?php }?>
                <?php }} ?>
            </ul>
        </div>
        <?php }else{ ?>
        <p style="text-align:center">You have empty wishlist. Start adding products!</p>   
        <?php }?>
        
	</div>
</div>
