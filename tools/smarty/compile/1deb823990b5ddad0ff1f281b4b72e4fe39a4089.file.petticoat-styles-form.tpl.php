<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 01:56:28
         compiled from "/var/www/indusdiva.com/themes/violettheme/petticoat-styles-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1465426770548f43f4a15c46-48625720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1deb823990b5ddad0ff1f281b4b72e4fe39a4089' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/petticoat-styles-form.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1465426770548f43f4a15c46-48625720',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div rel="text-headline" style="background:#F4F2F3">
	<div class="panel" id="panel"  style="float:left;margin:0px 10px 0px;border:1px dashed #cacaca;width:<?php if (isset($_smarty_tpl->getVariable('default_displayed',null,true,false)->value)&&$_smarty_tpl->getVariable('default_displayed')->value){?>830<?php }else{ ?>530<?php }?>px">
		<div style="border-bottom:1px dashed #cacaca">
			<h1>CLICK TO SELECT A STYLE</h1>
		</div>
		<div style="position:relative">
		    <?php if (isset($_smarty_tpl->getVariable('default_displayed',null,true,false)->value)&&$_smarty_tpl->getVariable('default_displayed')->value){?>
		    <div class="style-select" rel="0" style="float:left;position:relative;margin:20px" data-image="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/0-small.png">
				<div class="style-name">As Shown</div>
				<div><img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/0-medium.png" width="200" height="383"></div>
				<div style="line-height:1.2em; text-align:left;">As shown in the product image</div>
			</div>
			<?php }?>
			<div class="style-select" rel="13" style="float:left;position:relative;margin:20px" data-image="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/13-small.png">
				<div class="style-name">A-Line</div>
				<div><img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/13-medium.png" width="200" height="383"></div>
				<div style="line-height:1.2em; text-align:left;">These classic skirts are comfortable to wear and carry on daily basis.</div>
			</div>
			<div class="style-select" rel="14" style="float:left;position:relative; margin:20px" data-image="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/14-small.png">
				<div class="style-name">Fish Cut</div>
				<div><img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/14-medium.png" width="173" height="383"></div>
				<div style="line-height:1.2em; text-align:left;">These are body hugging skirts for evening and party wear.</div>
			</div>
		</div>
	</div>	
</div>