<?php /* Smarty version Smarty-3.0.7, created on 2015-09-03 17:31:30
         compiled from "/var/www/indusdiva.com/themes/violettheme/order-daily-status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75054442855e8369a6174f7-30219509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb8527f4bf9993803c5b5c3e48596725a1a752c' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/order-daily-status.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75054442855e8369a6174f7-30219509',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['color1'] = new Smarty_variable('#FCF6CF', null, null);?>    
<?php $_smarty_tpl->tpl_vars['color2'] = new Smarty_variable('#FEFEF2', null, null);?>   
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, null);?>

<table border="1" style="border-color: #CCC; text-align: left; background-color:#FEFEF2;border-collapse:collapse; margin:10px 0 10px 0">
    <thead>
        <tr>
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['name'] = 'head';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('headers')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total']);
?>
                <?php if ((1 & $_smarty_tpl->getVariable('i')->value++ / 1)){?>
                    <?php $_smarty_tpl->tpl_vars['cellbg'] = new Smarty_variable($_smarty_tpl->getVariable('color1')->value, null, null);?>
                <?php }else{ ?>  
                    <?php $_smarty_tpl->tpl_vars['cellbg'] = new Smarty_variable($_smarty_tpl->getVariable('color2')->value, null, null);?>
                <?php }?>   
                <th width="<?php echo $_smarty_tpl->getVariable('headers')->value[$_smarty_tpl->getVariable('smarty')->value['section']['head']['index']][1];?>
" style="background-color:<?php echo $_smarty_tpl->getVariable('cellbg')->value;?>
"><?php echo $_smarty_tpl->getVariable('headers')->value[$_smarty_tpl->getVariable('smarty')->value['section']['head']['index']][0];?>
</th>
            <?php endfor; endif; ?>
        </tr>   
    <thead> 
    <tbody>
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['row']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['name'] = 'row';
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('result')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total']);
?>
            <tr>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ((1 & $_smarty_tpl->getVariable('i')->value++ / 1)){?>
                        <?php $_smarty_tpl->tpl_vars['cellbg'] = new Smarty_variable($_smarty_tpl->getVariable('color1')->value, null, null);?>
                    <?php }else{ ?> 
                        <?php $_smarty_tpl->tpl_vars['cellbg'] = new Smarty_variable($_smarty_tpl->getVariable('color2')->value, null, null);?>
                    <?php }?>     
                    <td style="background-color:<?php echo $_smarty_tpl->getVariable('cellbg')->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</td>
                <?php }} ?>
            </tr>
        <?php endfor; endif; ?> 
    </tbody>
</table>
