<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 14:41:01
         compiled from "/var/www/indusdiva.com/themes/violettheme/./currency-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62268906955e96025bd07f8-74270538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19f085f7c0c37ea3916813f03ee2486999d474ae' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./currency-menu.tpl',
      1 => 1373373711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62268906955e96025bd07f8-74270538',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="curr_menu">
    <div class="curr_msg">Please choose your Currency.</div>
    <ul class="clearfix">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['name'] = 'currency';
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('currencies')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['currency']['total']);
?>
            <?php if ($_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['id_currency']==$_smarty_tpl->getVariable('cookie')->value->id_currency){?> 
                <li class="selected">
            <?php }else{ ?>
                <li>
            <?php }?>
                    <a class="clearfix" title="<?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['name'];?>
" href="javascript:setCurrency(<?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['id_currency'];?>
);">
                        <span class="currimg curr_<?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['iso_code'];?>
"></span>
                        <span class="currsign"><?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['sign'];?>
</span>
                        <?php if ($_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['sign']!=$_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['iso_code']){?>
                            <span class="currtext"><?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['iso_code'];?>
</span>
                        <?php }?>
                    </a>
                </li>
        <?php endfor; endif; ?>
    </ul>
</div>
<div id="currencies_block_top" style="display:none">
    <form id="setCurrency" action="<?php echo $_smarty_tpl->getVariable('request_uri')->value;?>
" method="post">
        <input type="hidden" name="id_currency" id="id_currency" value="" />
        <input type="hidden" name="SubmitCurrency" value="" />
    </form>
</div>
