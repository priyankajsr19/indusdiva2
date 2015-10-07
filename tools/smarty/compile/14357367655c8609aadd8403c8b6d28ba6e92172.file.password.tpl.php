<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 21:49:13
         compiled from "/var/www/indusdiva.com/themes/violettheme/password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1687108872548f0a01678ce5-36181587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14357367655c8609aadd8403c8b6d28ba6e92172' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/password.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1687108872548f0a01678ce5-36181587',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><script>

	$(document).ready(function() {
		
		$('#password_reset_form').submit(function(e){
			var containerAccount = $('#new_password_errors');
			// validate the form when it is submitted
			var validator = $("#password_reset_form").validate({
				errorContainer: containerAccount,
				errorLabelContainer: $("ol", containerAccount),
				wrapper: 'li',
				meta: "validate",
				rules: {
					retype_password: {equalTo:"#new_password"}
				}
			});
			if(!validator.form())
				e.preventDefault();
			
		});
		
		$('#email_form').submit(function(e){
			var containerAccount = $('#email_errors');
			// validate the form when it is submitted
			var validator = $("#email_form").validate({
				errorContainer: containerAccount,
				errorLabelContainer: $("ol", containerAccount),
				wrapper: 'li',
				meta: "validate"
			});
			if(!validator.form())
				e.preventDefault();
			
		});
	});

</script>
<div style="width:980px;padding:50px 0 0">
<div style="width:450px;margin:auto;">
	
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	<?php if (isset($_smarty_tpl->getVariable('confirmation',null,true,false)->value)&&$_smarty_tpl->getVariable('confirmation')->value==1){?>
		<p class="success"><?php echo smartyTranslate(array('s'=>'Your password has been successfully reset and has been sent to your e-mail address:'),$_smarty_tpl);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('email')->value,'htmlall','UTF-8');?>
</p>
	<?php }elseif(isset($_smarty_tpl->getVariable('confirmation',null,true,false)->value)&&$_smarty_tpl->getVariable('confirmation')->value==2){?>
		<p class="success"><?php echo smartyTranslate(array('s'=>'A confirmation e-mail has been sent to your address:'),$_smarty_tpl);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('email')->value,'htmlall','UTF-8');?>
</p>
	<?php }elseif(isset($_smarty_tpl->getVariable('password_reset',null,true,false)->value)&&$_smarty_tpl->getVariable('password_reset')->value==1){?>
		<p><?php echo smartyTranslate(array('s'=>'Please enter your new password.'),$_smarty_tpl);?>
</p>
		<div id="new_password_errors" class="error_container">
			<h4>There are errors:</h4>
			<ol>
				<li><label for="new_password" class="error">Please select a password</label></li>
				<li><label for="retype_password" class="error">Password and confirmation dont match!</label></li>
			</ol>
		</div>
		<form id="password_reset_form" action="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('request_uri')->value,'htmlall','UTF-8');?>
" method="post" class="std">
			<fieldset>
				<h1><?php echo smartyTranslate(array('s'=>'Forgot your password'),$_smarty_tpl);?>
</h1>
				<p class="text">
					<label for="email"><?php echo smartyTranslate(array('s'=>'email:'),$_smarty_tpl);?>
</label>
					<label for="email"><?php echo $_smarty_tpl->getVariable('email')->value;?>
</label>
					<input class="text" type="hidden" id="email" name="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
"/>
				</p>
				<p class="text">
					<label for="password">New Password</label>
					<input class="text required" type="password" id="new_password" name="new_password" style="width:236px"/>
				</p>
				<p class="text">
					<label for="retype_password">Retype New Password</label>
					<input class="text required" type="password" id="retype_password" name="retype_password" style="width:236px"/>
				</p>
				<p class="submit">
					<input type="submit" class="button_large" id="SubmitPassword" name="SubmitPassword" value="<?php echo smartyTranslate(array('s'=>'Reset and Login'),$_smarty_tpl);?>
" />
				</p>
			</fieldset>
		</form>
	<?php }else{ ?>
		<div id="email_errors" class="error_container">
			<h4>There are errors:</h4>
			<ol>
				<li><label for="email" class="error">Please enter a valid email</label></li>
			</ol>
		</div>
		<form id="email_form" action="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('request_uri')->value,'htmlall','UTF-8');?>
" method="post" class="std">
			<fieldset>
			<h1 class="form_title" style="font-size:18px;"><?php echo smartyTranslate(array('s'=>'Forgot your password'),$_smarty_tpl);?>
</h1>
				<p><?php echo smartyTranslate(array('s'=>'Please enter the e-mail address used to register. We will e-mail you your new password.'),$_smarty_tpl);?>
</p>
				<p class="text">
					<label for="email" style="width:87px"><?php echo smartyTranslate(array('s'=>'E-mail:'),$_smarty_tpl);?>
</label>
					<input class="required email" type="text email" id="email" name="email" value="<?php if (isset($_POST['email'])){?><?php echo stripslashes(smarty_modifier_escape($_POST['email'],'htmlall','UTF-8'));?>
<?php }?>" />
				</p>
				<p class="submit" style="padding:0px !important;">
					<input type="submit" class="button_large" style="margin:auto" value="<?php echo smartyTranslate(array('s'=>'Retrieve Password'),$_smarty_tpl);?>
" />
				</p>
			</fieldset>
		</form>
	<?php }?>
	<p class="clear">
		<a href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('authentication.php');?>
" title="<?php echo smartyTranslate(array('s'=>'Back to Login'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Back to Login'),$_smarty_tpl);?>
</a>
	</p>
</div>
</div>