<?php /* Smarty version Smarty-3.0.7, created on 2015-09-04 14:41:01
         compiled from "/var/www/indusdiva.com/themes/violettheme/./currency-change.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176105242355e960253d4a59-79028742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b221374959dca3dda3053b0fa939756b0de4b67f' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/./currency-change.tpl',
      1 => 1373373711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176105242355e960253d4a59-79028742',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="float:left">
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
            <span id="currhead">My currency :</span>
            <span id="currimg"><?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['sign'];?>
</span>
            <span id="currtext"><?php echo $_smarty_tpl->getVariable('currencies')->value[$_smarty_tpl->getVariable('smarty')->value['section']['currency']['index']]['iso_code'];?>
</span>
            <span> | </span>
            <a id='change_curr' href="#">change</a>
        <?php }?>
    <?php endfor; endif; ?>
</div>

    <script type="text/javascript" >
        $(document).ready(function() {
            $("#change_curr").click(function(){
                if( $("#curr_menu").css("display") == 'none' ) {
                    $("#curr_menu").slideDown();
                } else {
                    $("#curr_menu").slideUp();
                }
            });
        });
    </script>

