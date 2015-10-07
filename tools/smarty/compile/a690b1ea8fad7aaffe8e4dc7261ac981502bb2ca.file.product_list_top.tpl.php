<?php /* Smarty version Smarty-3.0.7, created on 2015-10-06 23:16:32
         compiled from "C:\xampp\htdocs\indusdiva2/themes/violettheme/./product_list_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3137561408f8bbf2c9-35125529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a690b1ea8fad7aaffe8e4dc7261ac981502bb2ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\indusdiva2/themes/violettheme/./product_list_top.tpl',
      1 => 1442326242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3137561408f8bbf2c9-35125529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="search-nav-bar">
		<div class="nresults"><span class="big"><?php echo intval($_smarty_tpl->getVariable('nbProducts')->value);?>
</span>&nbsp;<?php if ($_smarty_tpl->getVariable('nbProducts')->value==1){?><?php echo smartyTranslate(array('s'=>'result'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'results'),$_smarty_tpl);?>
<?php }?></div> 
<?php if (isset($_smarty_tpl->getVariable('p',null,true,false)->value)&&$_smarty_tpl->getVariable('p')->value){?>
	<div class="nav-pagination"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./pagination.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?></div>
<?php }?>
		<div class="search-sort"><?php if (!isset($_smarty_tpl->getVariable('instantSearch',null,true,false)->value)||(isset($_smarty_tpl->getVariable('instantSearch',null,true,false)->value)&&!$_smarty_tpl->getVariable('instantSearch')->value)){?><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./product-sort.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?><?php }?></div>
</div>
	