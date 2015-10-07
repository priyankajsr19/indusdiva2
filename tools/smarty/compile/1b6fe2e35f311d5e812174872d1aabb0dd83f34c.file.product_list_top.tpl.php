<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 02:12:01
         compiled from "/var/www/indusdiva.com/themes/violettheme/./product_list_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136356903255e8b099bcf3b9-72218326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b6fe2e35f311d5e812174872d1aabb0dd83f34c' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./product_list_top.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136356903255e8b099bcf3b9-72218326',
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
	