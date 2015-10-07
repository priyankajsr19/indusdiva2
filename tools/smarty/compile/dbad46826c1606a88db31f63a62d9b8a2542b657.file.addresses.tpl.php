<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 18:56:26
         compiled from "/var/www/indusdiva.com/themes/violettheme/addresses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:821211323548ee182699e27-20212693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbad46826c1606a88db31f63a62d9b8a2542b657' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/addresses.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '821211323548ee182699e27-20212693',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
//<![CDATA[
	var baseDir = '<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
';
	$(document).ready(function(){
		$('.delete_address').click(function(e){
			
			if(!confirm('Delete this address from your Address-Book?'))
				e.preventDefault();
		});
	});
//]]>
</script>
<div style="width:970px;">
        <?php $_smarty_tpl->tpl_vars['selitem'] = new Smarty_variable('addresses', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./myaccount_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div class="vtab-content">
	<div style="border: 1px solid #D0D3D8;box-shadow: 0 1px 3px 0 black;margin-bottom: 1em;padding-bottom: 1em;margin-top:15px;min-height:400px;float:left;width:100%">
		<h1 style="padding:10px 0;text-align:center;border-bottom:1px dashed #cacaca"><?php echo smartyTranslate(array('s'=>'Your Adresses'),$_smarty_tpl);?>
</h1>
		<div id="address_wrapper">
			<a href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('address.php',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Add an address'),$_smarty_tpl);?>
">
				<div id="new_address_card" class="new_address_card" style="cursor:pointer;">
					<span class="new_address_title"">Add a new address</span>
				</div>
			</a>
			<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('addresses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['address']->key;
?>
				<div id="address_link_<?php echo intval($_smarty_tpl->tpl_vars['address']->value['id_address']);?>
" class="selectable address_card_selected ">
						<div class="address_title" style="padding:3px 3px 3px 15px;display:block;">
							
							<a id="removeAddress_<?php echo intval($_smarty_tpl->tpl_vars['address']->value['id_address']);?>
" class="delete_address" title="Delete from Address Book" href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
address.php?id_address=<?php echo intval($_smarty_tpl->tpl_vars['address']->value['id_address']);?>
&delete=1" ></a>
						</div>
						<ul class="address item" id="address_<?php echo intval($_smarty_tpl->tpl_vars['address']->value['id_address']);?>
">
							
							<li class="address_name"><?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['firstname']);?>
 <?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['lastname']);?>
</li>
							<li class="address_address1"><?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['address1']);?>
</li>
							<li class="address_address2"><?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['address2']);?>
</li>
							<li class="address_city"><?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['city']);?>
</li>
							<li class="address_pincode"><?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['postcode']);?>
</li>
							<li class="address_country">Phone: <?php echo addslashes($_smarty_tpl->tpl_vars['address']->value['phone_mobile']);?>
</li>
						</ul>
						<span class="updateaddress"><a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
address.php?id_address=<?php echo intval($_smarty_tpl->tpl_vars['address']->value['id_address']);?>
" title="<?php echo smartyTranslate(array('s'=>'Update'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Update'),$_smarty_tpl);?>
</a></span>
				</div>
			<?php }} ?>
		</div>
	</div>
	</div
</div>