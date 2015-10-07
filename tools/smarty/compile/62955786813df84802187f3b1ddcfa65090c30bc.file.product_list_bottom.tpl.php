<?php /* Smarty version Smarty-3.0.7, created on 2015-10-06 23:16:38
         compiled from "C:\xampp\htdocs\indusdiva2/themes/violettheme/./product_list_bottom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14069561408fea38929-31877247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62955786813df84802187f3b1ddcfa65090c30bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\indusdiva2/themes/violettheme/./product_list_bottom.tpl',
      1 => 1442326236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14069561408fea38929-31877247',
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