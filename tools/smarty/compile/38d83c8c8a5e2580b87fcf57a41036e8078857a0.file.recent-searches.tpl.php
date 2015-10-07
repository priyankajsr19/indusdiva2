<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 20:12:37
         compiled from "/var/www/indusdiva.com/themes/violettheme/recent-searches.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40653733548ef35d1f2555-82685208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38d83c8c8a5e2580b87fcf57a41036e8078857a0' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/recent-searches.tpl',
      1 => 1378963868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40653733548ef35d1f2555-82685208',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><?php if (isset($_smarty_tpl->getVariable('popularcategories',null,true,false)->value)&&!empty($_smarty_tpl->getVariable('popularcategories',null,true,false)->value)&&$_smarty_tpl->getVariable('popularcategories')->value=="true"){?>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Sarees.php" title="Indusdiva Sarees">Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Temple-Sarees.php" title="Indusdiva Sarees">Temple Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Mysore-Silk-Sarees.php" title="Indusdiva Sarees">Mysore Silk Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Half-And-Half-Sarees.php" title="Indusdiva Sarees">Half And Half Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Lehenga-Sarees.php" title="Indusdiva Sarees">Lehenga Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Kanjeevaram-Sarees.php" title="Indusdiva Sarees">Kanjeevaram Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Chikankari-Sarees.php" title="Indusdiva Sarees">Chikankari Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Bridal-Sarees.php" title="Indusdiva Sarees">Bridal Sarees</a><br/>
    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
Banarasi-Sarees.php" title="Indusdiva Sarees">Banarasi Sarees</a><br/>
<?php }else{ ?>
    <h1><?php echo smartyTranslate(array('s'=>'Recent Searches'),$_smarty_tpl);?>
</h1>
    <?php if (isset($_smarty_tpl->getVariable('keywords',null,true,false)->value)){?>
        <ul>
            <?php  $_smarty_tpl->tpl_vars['keyword'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('keywords')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['keyword']->key => $_smarty_tpl->tpl_vars['keyword']->value){
?>
                <li class="search_keywords">
                    <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
products/<?php echo urlencode($_smarty_tpl->tpl_vars['keyword']->value);?>
" title=""><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['keyword']->value,'htmlall');?>
</a>
                </li>
            <?php }} ?>
        </ul>
    <?php }else{ ?>
        <?php  $_smarty_tpl->tpl_vars['pageNo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pageNo']->key => $_smarty_tpl->tpl_vars['pageNo']->value){
?>
            <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
sitemaps/<?php echo $_smarty_tpl->tpl_vars['pageNo']->value;?>
" title="" class="search_keywords"><?php echo $_smarty_tpl->tpl_vars['pageNo']->value;?>
</a>
        <?php }} ?>
        <a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
sitemaps/popular-categories" title="" class="search_keywords">popular categories</a>
    <?php }?>
<?php }?>
