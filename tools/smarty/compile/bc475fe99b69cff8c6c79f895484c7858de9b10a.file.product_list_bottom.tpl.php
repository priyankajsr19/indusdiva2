<?php /* Smarty version Smarty-3.0.7, created on 2015-06-04 12:09:57
         compiled from "/var/www/html/indusdiva/themes/violettheme/./product_list_bottom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1774777913556ff2bde07d22-64136561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc475fe99b69cff8c6c79f895484c7858de9b10a' => 
    array (
      0 => '/var/www/html/indusdiva/themes/violettheme/./product_list_bottom.tpl',
      1 => 1431660623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1774777913556ff2bde07d22-64136561',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('p',null,true,false)->value)&&$_smarty_tpl->getVariable('p')->value&&$_smarty_tpl->getVariable('start')->value!=$_smarty_tpl->getVariable('stop')->value){?>
<div class="search-nav-bar">
	<div class="nav-pagination">
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./pagination.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
</div>
<?php }?>