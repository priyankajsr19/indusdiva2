<?php /* Smarty version Smarty-3.0.7, created on 2015-09-03 17:31:10
         compiled from "/var/www/indusdiva.com/themes/violettheme/./products-pane-small.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76617766255e83686855a55-93808651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '689233fbdecfef68f9c39619d9b6c8a68d121b12' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./products-pane-small.tpl',
      1 => 1380605776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76617766255e83686855a55-93808651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="products_block"  class="products_block_medium">
    <?php if (isset($_smarty_tpl->getVariable('products',null,true,false)->value)){?>
        <!-- Products list -->
        <ul id="product_list_small" class="clear product_list clearfix">
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['index']++;
?>
                <li class="ajax_block_product" rel="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" >
                    <?php $_smarty_tpl->tpl_vars['productitem'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value, null, null);?>
                    <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./product_card_small.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                </li>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['index']%4==3){?>
                    <li style="font-size:0px;line-height:0px;border-top:1px solid #D1A6E0;border-bottom:1px solid #D1A6E0;clear:both; margin:15px 25px;width:740px;height:2px;padding:0;"></li>
                    <?php }?>
                <?php }} ?>
        </ul>
        <div id="bottom-placeholder" style="height:20px;padding:0;border:1px solid #333333;display:none;clear:both;"></div>
        <?php if (isset($_smarty_tpl->getVariable('nextPage',null,true,false)->value)&&$_smarty_tpl->getVariable('nextPage')->value){?>
            <div id="load_more">
                <span id="see_more">See More</span>
                <span id="loading" style="display:none"><img alt="" src="http://static.violetbag.com/img/loader.gif"></span>
            </div>
        <?php }?>
        <!-- /Products list -->
    <?php }?>
</div>
