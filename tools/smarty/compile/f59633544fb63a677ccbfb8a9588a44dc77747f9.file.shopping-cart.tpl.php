<?php /* Smarty version Smarty-3.0.7, created on 2015-08-18 04:07:23
         compiled from "/var/www/indusdiva.com/themes/violettheme/beta/shopping-cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167479237355d26223617753-87966218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f59633544fb63a677ccbfb8a9588a44dc77747f9' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/beta/shopping-cart.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167479237355d26223617753-87966218',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php if (isset($_smarty_tpl->getVariable('empty',null,true,false)->value)){?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.'),$_smarty_tpl);?>
</p>
<?php }elseif($_smarty_tpl->getVariable('PS_CATALOG_MODE')->value){?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'This store has not accepted your new order.'),$_smarty_tpl);?>
</p>
<?php }else{ ?>
	<script type="text/javascript">
	// <![CDATA[
	var baseDir = '<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
';
	var currencySign = '<?php echo html_entity_decode($_smarty_tpl->getVariable('currencySign')->value,2,"UTF-8");?>
';
	var currencyRate = '<?php echo floatval($_smarty_tpl->getVariable('currencyRate')->value);?>
';
	var currencyFormat = '<?php echo intval($_smarty_tpl->getVariable('currencyFormat')->value);?>
';
	var currencyBlank = '<?php echo intval($_smarty_tpl->getVariable('currencyBlank')->value);?>
';
	var txtProduct = "<?php echo smartyTranslate(array('s'=>'product'),$_smarty_tpl);?>
";
	var txtProducts = "<?php echo smartyTranslate(array('s'=>'products'),$_smarty_tpl);?>
";
	// ]]>
	</script>
	<p style="display:none" id="emptyCartWarning" class="warning"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.'),$_smarty_tpl);?>
</p>
<div id="co_content">
	<div id="co_left_column">
		<div id="order-detail-content" class="table_block" style="width:750px;margin:0 7px;">
			<table id="cart_summary" class="std">
				<thead>
					<tr>
						<th class="cart_product first_item"><?php echo smartyTranslate(array('s'=>'Product'),$_smarty_tpl);?>
</th>
						<th class="cart_description item" style="text-align:left;"><?php echo smartyTranslate(array('s'=>'Description'),$_smarty_tpl);?>
</th>
						<th class="cart_availability item"><?php echo smartyTranslate(array('s'=>'Availablity'),$_smarty_tpl);?>
</th>
						<th class="cart_unit item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'Unit price'),$_smarty_tpl);?>
</th>
						<th class="cart_quantity item"><?php echo smartyTranslate(array('s'=>'Qty'),$_smarty_tpl);?>
</th>
						<th class="cart_total last_item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'Sub Total'),$_smarty_tpl);?>
</th>
					</tr>
				</thead>
				<tfoot>
					<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
						<?php if ($_smarty_tpl->getVariable('priceDisplay')->value){?>
							<tr class="cart_total_price">
								<td colspan="5"><?php echo smartyTranslate(array('s'=>'Sub Total'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?> <?php echo smartyTranslate(array('s'=>'(tax excl.)'),$_smarty_tpl);?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>
</td>
								<td class="price" id="total_product"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_products')->value),$_smarty_tpl);?>
</td>
							</tr>
						<?php }else{ ?>
							<tr class="cart_total_price">
								<td colspan="5"><?php echo smartyTranslate(array('s'=>'Sub Total'),$_smarty_tpl);?>
<?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>
</td>
								<td class="price" id="total_product"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_products_wt')->value),$_smarty_tpl);?>
</td>
							</tr>
						<?php }?>
					<?php }else{ ?>
						<tr class="cart_total_price">
							<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total:'),$_smarty_tpl);?>
</td>
							<td class="price" id="total_product"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_products')->value),$_smarty_tpl);?>
</td>
						</tr>
					<?php }?>
					<tr class="cart_total_voucher" <?php if ($_smarty_tpl->getVariable('total_discounts')->value==0){?>style="display: none;"<?php }?>>
						<td colspan="5">
						<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
							<?php if ($_smarty_tpl->getVariable('priceDisplay')->value){?>
								<?php echo smartyTranslate(array('s'=>'Total vouchers/discounts'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?> <?php echo smartyTranslate(array('s'=>'(tax excl.)'),$_smarty_tpl);?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo smartyTranslate(array('s'=>'Total vouchers/discounts'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?> <?php echo smartyTranslate(array('s'=>'(tax incl.)'),$_smarty_tpl);?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>

							<?php }?>
						<?php }else{ ?>
							<?php echo smartyTranslate(array('s'=>'Total vouchers:'),$_smarty_tpl);?>

						<?php }?>
						</td>
						<td class="price-discount" id="total_discount">
						<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
							<?php if ($_smarty_tpl->getVariable('priceDisplay')->value){?>
								<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_discounts_tax_exc')->value),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_discounts')->value),$_smarty_tpl);?>

							<?php }?>
						<?php }else{ ?>
							<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_discounts_tax_exc')->value),$_smarty_tpl);?>

						<?php }?>
						</td>
					</tr>
					<tr class="cart_total_voucher" <?php if ($_smarty_tpl->getVariable('total_wrapping')->value==0){?>style="display: none;"<?php }?>>
						<td colspan="5">
						<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
							<?php if ($_smarty_tpl->getVariable('priceDisplay')->value){?>
								<?php echo smartyTranslate(array('s'=>'Total gift-wrapping'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?> <?php echo smartyTranslate(array('s'=>'(tax excl.)'),$_smarty_tpl);?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo smartyTranslate(array('s'=>'Total gift-wrapping'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?> <?php echo smartyTranslate(array('s'=>'(tax incl.)'),$_smarty_tpl);?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>

							<?php }?>
						<?php }else{ ?>
							<?php echo smartyTranslate(array('s'=>'Total gift-wrapping:'),$_smarty_tpl);?>

						<?php }?>
						</td>
						<td class="price-discount" id="total_wrapping">
						<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
							<?php if ($_smarty_tpl->getVariable('priceDisplay')->value){?>
								<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_wrapping_tax_exc')->value),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_wrapping')->value),$_smarty_tpl);?>

							<?php }?>
						<?php }else{ ?>
							<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_wrapping_tax_exc')->value),$_smarty_tpl);?>

						<?php }?>
						</td>
					</tr>
					<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
						<?php if ($_smarty_tpl->getVariable('priceDisplay')->value){?>
							<tr class="cart_total_delivery" <?php if ($_smarty_tpl->getVariable('shippingCost')->value<=0){?> style="display:none;"<?php }?>>
								<td colspan="5"><?php echo smartyTranslate(array('s'=>'Shipping'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?> <?php echo smartyTranslate(array('s'=>'(tax excl.)'),$_smarty_tpl);?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>
</td>
								<td class="price" id="total_shipping"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('shippingCostTaxExc')->value),$_smarty_tpl);?>
</td>
							</tr>
						<?php }else{ ?>
							<tr class="cart_total_delivery"<?php if ($_smarty_tpl->getVariable('shippingCost')->value<=0){?> style="display:none;"<?php }?>>
								<td colspan="5"><?php echo smartyTranslate(array('s'=>'Shipping'),$_smarty_tpl);?>
<?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>
</td>
								<td class="price" id="total_shipping" ><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('shippingCost')->value),$_smarty_tpl);?>
</td>
							</tr>
						<?php }?>
					<?php }else{ ?>
						<tr class="cart_total_delivery"<?php if ($_smarty_tpl->getVariable('shippingCost')->value<=0){?> style="display:none;"<?php }?>>
							<td colspan="5"><?php echo smartyTranslate(array('s'=>'Shipping:'),$_smarty_tpl);?>
</td>
							<td class="price" id="total_shipping" ><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('shippingCostTaxExc')->value),$_smarty_tpl);?>
</td>
						</tr>
					<?php }?>
		
		
					<?php if ($_smarty_tpl->getVariable('use_taxes')->value){?>
					<tr class="cart_total_price">
						<td colspan="5" style="font-size: 15px;">
							<?php if ($_smarty_tpl->getVariable('display_tax_label')->value){?>
								<?php echo smartyTranslate(array('s'=>'Order Total (tax incl.):'),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo smartyTranslate(array('s'=>'Total:'),$_smarty_tpl);?>

							<?php }?>
						</td>
						<td class="price" id="total_price"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_price')->value),$_smarty_tpl);?>
</td>
					</tr>
		
					<?php }else{ ?>
					<tr class="cart_total_price">
						<td colspan="5" style="font-size: 15px;"><?php echo smartyTranslate(array('s'=>'Total:'),$_smarty_tpl);?>
</td>
						<td class="price" id="total_price"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_price_without_tax')->value),$_smarty_tpl);?>
</td>
					</tr>
					<?php }?>
				</tfoot>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
					<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, null);?>
					<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, null);?>
					<?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, null);?>
					<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./shopping-cart-product-line.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
					<?php if (isset($_smarty_tpl->getVariable('customizedDatas',null,true,false)->value[$_smarty_tpl->getVariable('productId',null,true,false)->value][$_smarty_tpl->getVariable('productAttributeId',null,true,false)->value])){?>
						<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('customizedDatas')->value[$_smarty_tpl->getVariable('productId')->value][$_smarty_tpl->getVariable('productAttributeId')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value){
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
							<tr id="product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
" class="alternate_item cart_item">
								<td colspan="5">
									<?php  $_smarty_tpl->tpl_vars['datas'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['datas']->key => $_smarty_tpl->tpl_vars['datas']->value){
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['datas']->key;
?>
										<?php if ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->getVariable('CUSTOMIZE_FILE')->value){?>
											<div class="customizationUploaded">
												<ul class="customizationUploaded">
													<?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value){
?><li><img src="<?php echo $_smarty_tpl->getVariable('pic_dir')->value;?>
<?php echo $_smarty_tpl->tpl_vars['picture']->value['value'];?>
_small" alt="" class="customizationUploaded" /></li><?php }} ?>
												</ul>
											</div>
										<?php }elseif($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->getVariable('CUSTOMIZE_TEXTFIELD')->value){?>
											<ul class="typedText">
												<?php  $_smarty_tpl->tpl_vars['textField'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['typedText']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['textField']->key => $_smarty_tpl->tpl_vars['textField']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['typedText']['index']++;
?><li><?php if ($_smarty_tpl->tpl_vars['textField']->value['name']){?><?php echo $_smarty_tpl->tpl_vars['textField']->value['name'];?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Text #'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['typedText']['index']+1;?>
<?php }?><?php echo smartyTranslate(array('s'=>':'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['textField']->value['value'];?>
</li><?php }} ?>
											</ul>
										<?php }?>
									<?php }} ?>
								</td>
								<td class="cart_quantity">
									<div style="float:right">
										<a rel="nofollow" class="cart_quantity_delete" id="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('cart.php',true);?>
?delete&amp;id_product=<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
&amp;ipa=<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
&amp;id_customization=<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
&amp;token=<?php echo $_smarty_tpl->getVariable('token_cart')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Delete this customization'),$_smarty_tpl);?>
" width="11" height="13" class="icon" /></a>
									</div>
									<div id="cart_quantity_button" style="float:left">
									<a rel="nofollow" class="cart_quantity_up" id="cart_quantity_up_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('cart.php',true);?>
?add&amp;id_product=<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
&amp;ipa=<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
&amp;id_customization=<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
&amp;token=<?php echo $_smarty_tpl->getVariable('token_cart')->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/quantity_up.gif" alt="<?php echo smartyTranslate(array('s'=>'Add'),$_smarty_tpl);?>
" width="14" height="9" /></a><br />
									<?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<($_smarty_tpl->tpl_vars['customization']->value['quantity']-$_smarty_tpl->getVariable('quantityDisplayed')->value)||$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1){?>
									<a rel="nofollow" class="cart_quantity_down" id="cart_quantity_down_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('cart.php',true);?>
?add&amp;id_product=<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
&amp;ipa=<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
&amp;id_customization=<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
&amp;op=down&amp;token=<?php echo $_smarty_tpl->getVariable('token_cart')->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
">
										<img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/quantity_down.gif" alt="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
" width="14" height="9" />
									</a>
									<?php }else{ ?>
									<a class="cart_quantity_down" style="opacity: 0.3;" id="cart_quantity_down_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
" href="#" title="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
">
										<img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/quantity_down.gif" alt="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
" width="14" height="9" />
									</a>
									<?php }?>
									</div>
									<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
" name="quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_hidden"/>
									<input size="2" type="text" value="<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
" class="cart_quantity_input" name="quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
"/>
								</td>
								<td class="cart_total"></td>
							</tr>
							<?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable($_smarty_tpl->getVariable('quantityDisplayed')->value+$_smarty_tpl->tpl_vars['customization']->value['quantity'], null, null);?>
						<?php }} ?>
						<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']-$_smarty_tpl->getVariable('quantityDisplayed')->value>0){?><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./shopping-cart-product-line.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?><?php }?>
					<?php }?>
				<?php }} ?>
				</tbody>
			<?php if (sizeof($_smarty_tpl->getVariable('discounts')->value)||isset($_smarty_tpl->getVariable('cart_points_discount',null,true,false)->value)&&$_smarty_tpl->getVariable('cart_points_discount')->value>0){?>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('discounts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discount']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discount']->iteration=0;
 $_smarty_tpl->tpl_vars['discount']->index=-1;
if ($_smarty_tpl->tpl_vars['discount']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value){
 $_smarty_tpl->tpl_vars['discount']->iteration++;
 $_smarty_tpl->tpl_vars['discount']->index++;
 $_smarty_tpl->tpl_vars['discount']->first = $_smarty_tpl->tpl_vars['discount']->index === 0;
 $_smarty_tpl->tpl_vars['discount']->last = $_smarty_tpl->tpl_vars['discount']->iteration === $_smarty_tpl->tpl_vars['discount']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discountLoop']['first'] = $_smarty_tpl->tpl_vars['discount']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discountLoop']['last'] = $_smarty_tpl->tpl_vars['discount']->last;
?>
					<tr class="cart_discount <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['discountLoop']['last']){?>last_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['discountLoop']['first']){?>first_item<?php }else{ ?>item<?php }?>" id="cart_discount_<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
">
						<td class="cart_discount_name" colspan="4" style="text-align:right">
							<?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>

							<?php if ($_smarty_tpl->tpl_vars['discount']->value['description']!=''){?>
								: <?php echo $_smarty_tpl->tpl_vars['discount']->value['description'];?>

							<?php }?>
						</td>
						<td class="cart_discount_delete"><a href="<?php if ($_smarty_tpl->getVariable('opc')->value){?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order-opc.php',true);?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
<?php }?>?deleteDiscount=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
" title="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" class="icon" width="11" height="13" /></a></td>
						<td class="cart_discount_price"><span class="price-discount">
							<?php if ($_smarty_tpl->tpl_vars['discount']->value['value_real']>0){?>
								<?php if (!$_smarty_tpl->getVariable('priceDisplay')->value){?><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php }else{ ?><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?>
							<?php }?>
						</span></td>
					</tr>
				<?php }} ?>
				<?php if (isset($_smarty_tpl->getVariable('cart_points_discount',null,true,false)->value)&&$_smarty_tpl->getVariable('cart_points_discount')->value>0){?>
					<tr class="cart_discount" id="cart_points">
						<td class="cart_discount_name" colspan="4" style="text-align:right">
							Violet Coins redeemed: <?php echo $_smarty_tpl->getVariable('cart_redeem_points')->value;?>

						</td>
						<td class="cart_discount_delete"><a href="<?php if ($_smarty_tpl->getVariable('opc')->value){?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order-opc.php',true);?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
<?php }?>?deletePoints=1" title="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" class="icon" width="11" height="13" /></a></td>
						<td class="cart_discount_price">
							<span class="price-discount">
								<?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('cart_points_discount')->value*-1),$_smarty_tpl);?>

							</span>
						</td>
					</tr>
				<?php }?>
				</tbody>
			<?php }?>
			</table>
		</div>
		
		<?php if ($_smarty_tpl->getVariable('voucherAllowed')->value){?>
		<div id="cart_redeem" style="padding: 0 0 30px 0">
			<?php if (isset($_smarty_tpl->getVariable('errors_discount',null,true,false)->value)&&$_smarty_tpl->getVariable('errors_discount')->value){?>
				<ul class="error">
				<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('errors_discount')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
					<li><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['error']->value,'htmlall','UTF-8');?>
</li>
				<?php }} ?>
				</ul>
			<?php }?>
			<div style="text-align:right;padding-right:0.7em;">
				<input type="checkbox" id="chk_redeem" class="redeem_check" >
				<label for="chk_redeem" style="font-size:12px;display:inline-block"><?php echo smartyTranslate(array('s'=>'Redeem Violet Coins or vouchers'),$_smarty_tpl);?>
</label>
			</div>
			<form action="<?php if ($_smarty_tpl->getVariable('opc')->value){?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order-opc.php',true);?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
<?php }?>" method="post" id="voucher">
				<fieldset>
					<div style="padding:20px 20px 20px 150px;border-top:1px dashed #cacaca;border-bottom:1px dashed #cacaca;display:none;" class="redemption_control">
						<p>
							<span style="font-size:15px;width:175px;display:inline-block;<?php if (!isset($_smarty_tpl->getVariable('can_redeem_points',null,true,false)->value)){?>color:#939393<?php }?>"><?php echo smartyTranslate(array('s'=>'Redeem Violet Coins'),$_smarty_tpl);?>
</span>
							<?php if (isset($_smarty_tpl->getVariable('can_redeem_points',null,true,false)->value)&&(isset($_smarty_tpl->getVariable('balance_points',null,true,false)->value)&&$_smarty_tpl->getVariable('balance_points')->value>0)||isset($_smarty_tpl->getVariable('redeem_points',null,true,false)->value)&&$_smarty_tpl->getVariable('redeem_points')->value>0){?>
								<input type="text" id="redeem_points" name="redeem_points" value="<?php if (isset($_smarty_tpl->getVariable('redeem_points',null,true,false)->value)&&$_smarty_tpl->getVariable('redeem_points')->value){?><?php echo $_smarty_tpl->getVariable('redeem_points')->value;?>
<?php }?>" />
								    <span style="font-size:12px;color:#939393;">[<?php echo $_smarty_tpl->getVariable('balance_points')->value-$_smarty_tpl->getVariable('cart_redeem_points')->value;?>
 Redeemable]</span>
							<?php }else{ ?>
								<span style="font-size:11px;color:#939393">(You can redeem coins from third valid order)</span>
							<?php }?>
						</p>
						<p>
							<span style="font-size:15px;width:175px;display:inline-block"><?php echo smartyTranslate(array('s'=>'Use voucher (if any)'),$_smarty_tpl);?>
</span>
							<input type="text" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->getVariable('discount_name',null,true,false)->value)&&$_smarty_tpl->getVariable('discount_name')->value){?><?php echo $_smarty_tpl->getVariable('discount_name')->value;?>
<?php }?>" />
						</p>
						<p class="submit" style="padding-left:275px;">
							<input type="hidden" name="submitDiscount" /><input type="submit" name="submitAddDiscount" value="<?php echo smartyTranslate(array('s'=>'Redeem!'),$_smarty_tpl);?>
" class="button"/>
						</p>
					</div>
					<?php if ($_smarty_tpl->getVariable('displayVouchers')->value){?>
						<h4><?php echo smartyTranslate(array('s'=>'Take advantage of our offers:'),$_smarty_tpl);?>
</h4>
						<div id="display_cart_vouchers">
						<?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('displayVouchers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value){
?>
							<span onclick="$('#discount_name').val('<?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
');return false;" class="voucher_name"><?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
</span> - <?php echo $_smarty_tpl->tpl_vars['voucher']->value['description'];?>
 <br />
						<?php }} ?>
						</div>
					<?php }?>
				</fieldset>
			</form>
		</div>
		<?php }?>
		<div id="HOOK_SHOPPING_CART"><?php echo $_smarty_tpl->getVariable('HOOK_SHOPPING_CART')->value;?>
</div>
		
		
		<div id="cart_navigation" class="cart_navigation">
			<?php if (!$_smarty_tpl->getVariable('opc')->value){?>
			<a id="place_order_button" rel="nofollow" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('order.php',true);?>
?step=1<?php if ($_smarty_tpl->getVariable('back')->value){?>&amp;back=<?php echo $_smarty_tpl->getVariable('back')->value;?>
<?php }?>" class="placeorder"></a><?php }?>
			<a rel="nofollow" href="<?php if ((isset($_SERVER['HTTP_REFERER'])&&strstr($_SERVER['HTTP_REFERER'],'order.php'))||!isset($_SERVER['HTTP_REFERER'])){?><?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('index.php');?>
<?php }else{ ?><?php echo Tools::secureReferrer(smarty_modifier_escape($_SERVER['HTTP_REFERER'],'htmlall','UTF-8'));?>
<?php }?>" 
				class="button" title="<?php echo smartyTranslate(array('s'=>'Continue shopping'),$_smarty_tpl);?>
" style="width:151px;margin-top:5px;float:left;margin-bottom:5px;">&laquo; <?php echo smartyTranslate(array('s'=>'Continue Shopping'),$_smarty_tpl);?>
</a>
		</div>
		
		<div class="clear"></div>
		<p class="cart_navigation_extra">
			<span id="HOOK_SHOPPING_CART_EXTRA"><?php echo $_smarty_tpl->getVariable('HOOK_SHOPPING_CART_EXTRA')->value;?>
</span>
		</p>
		<?php }?>
		</div>
	<?php if (!isset($_smarty_tpl->getVariable('summary_only',null,true,false)->value)&&!isset($_smarty_tpl->getVariable('empty',null,true,false)->value)){?>
	<div id="co_rht_col">
		<div class="co_rht_box">
	   		<div id="order_summary_title" class="rht_box_heading">Order Summary</div>
	   		<div id="order_summary_content" class="rht_box_info">
	   		<table><tbody>
	   			<?php if ($_smarty_tpl->getVariable('productNumber')->value>0){?>
	   			<tr>
	   				<td class="row_title">Items</td>
	   				<td>:</td>
	   				<td class="row_val"><span class="ajax_cart_quantity" style="font-size:12px;"><?php echo $_smarty_tpl->getVariable('productNumber')->value;?>
</span></td>
	   			</tr>
	   			<tr>
	   				<td class="row_title">Sub Total</td>
	   				<td>:</td>
	   				<td class="row_val"><span class="ajax_cart_total"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_products_wt')->value),$_smarty_tpl);?>
</span></td>
	   			</tr>
	   			<tr>
	   				<td class="row_title">Shipping</td>
	   				<td>:</td>
	   				<?php if ($_smarty_tpl->getVariable('shippingCost')->value>0){?>
	   					<td class="row_val"><span class="ajax_cart_shipping_cost" id="rht_bar_shipping"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('shippingCost')->value),$_smarty_tpl);?>
</span></td>
	   				<?php }else{ ?>
	   					<td class="row_val"><span id="rht_bar_shipping"> FREE</span></td>
	   				<?php }?>
	   			</tr>
	   			<tr><td height="5px" colspan="2"></td></tr>
	   			<tr>
	   				<td class="row_title"><span style="font-weight: bold; color:#5f5f5f;">Order Total</span></td>
	   				<td>:</td>
	   				<td class="row_val"><span style="font-weight:bold;" class="ajax_block_cart_total"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('total_price')->value),$_smarty_tpl);?>
</span></td>
	   			</tr>
	   			<?php }?>
			</tbody></table>
	   		</div>
	   	</div>
	   	
	   	<div class="co_rht_box">
	   		<div id="free_shipping_info" class="rht_box_info cart_free_shipping" style="<?php if ($_smarty_tpl->getVariable('free_ship')->value>0&&!$_smarty_tpl->getVariable('isVirtualCart')->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
	   			
	   			<span id="free_shipping_balance" style="font-size: 13px; padding:5px 0px 5px 0px;"><?php echo Tools::displayPriceSmarty(array('price'=>$_smarty_tpl->getVariable('free_ship')->value),$_smarty_tpl);?>
</span>
	   			<span>away from free shipping on your order!</span>
	   			<div style="font-size: 15px; padding:0px 10px;"></div>
	   		</div>
	   	</div>
	</div>
	<?php }?>
	
		<script type="text/javascript">
			$(document).ready(function(){
				$('#chk_redeem').removeAttr('checked');

				if($('#redeem_points').val() || $('#discount_name').val()) 
				{
					$('#chk_redeem').attr('checked','checked');
					$(".redemption_control").show();
				}
				
				$('#chk_redeem').click(function(){
					if($("#chk_redeem ").is(':checked'))
						$(".redemption_control").show();
					else
						$(".redemption_control").hide();
				});

				$('#place_order_button').click(function(e){
					if($('#redeem_points').val() || $('#discount_name').val())
					{
						if(!confirm('Continue place order without redeeming?'))
							e.preventDefault();
					}
				});
			});

		</script>
	
</div>

