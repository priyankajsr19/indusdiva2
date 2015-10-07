<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 11:12:07
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/mailer_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1685239540548fc62f5c5d07-32803456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30b18bc00112becf2ddedf0d611da6bb94f67733' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/mailer_confirm.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1685239540548fc62f5c5d07-32803456',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ((($tmp = @$_smarty_tpl->getVariable('error')->value)===null||$tmp==='' ? '' : $tmp)!=''){?>
<div style="border-color:#F00; color:#F00; padding:5px;">
    <?php echo $_smarty_tpl->getVariable('error')->value;?>

</div>
<?php }?>
<div style="background-color: #ffffff !important; margin: 0; padding: 0">
    <?php if ($_smarty_tpl->getVariable('preview')->value=='true'){?>
        <?php echo $_smarty_tpl->getVariable('previewMail')->value;?>

    <?php }?>
</div>