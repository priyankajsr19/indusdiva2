<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 07:29:00
         compiled from "/var/www/indusdiva.com/themes/violettheme/beta/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52546493755d13fe4721996-97789165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3800af34629e6461b48c39f57633bd751d089f0' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/beta/header.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52546493755d13fe4721996-97789165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->getVariable('lang_iso')->value;?>
">
	<head>
		<title><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_title')->value,'htmlall','UTF-8');?>
</title>
<?php if (isset($_smarty_tpl->getVariable('meta_description',null,true,false)->value)&&$_smarty_tpl->getVariable('meta_description')->value){?>
		<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_description')->value,'html','UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('meta_keywords',null,true,false)->value)&&$_smarty_tpl->getVariable('meta_keywords')->value){?>
		<meta name="keywords" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_keywords')->value,'html','UTF-8');?>
" />
<?php }?>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<?php if (isset($_smarty_tpl->getVariable('og_meta',null,true,false)->value)&&$_smarty_tpl->getVariable('og_meta')->value){?>
		<meta property="og:title" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('og_title')->value,'htmlall','UTF-8');?>
"/>
		<meta property="og:type" content="product"/>
		<meta property="og:url" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('og_page_url')->value,'htmlall','UTF-8');?>
"/>
		<meta property="og:image" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('og_image_url')->value,'htmlall','UTF-8');?>
"/>
		<meta property="og:description" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('og_description')->value,'htmlall','UTF-8');?>
"/>
<?php }else{ ?>
		<meta property="og:title" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_title')->value,'htmlall','UTF-8');?>
"/>
		<meta property="og:type" content="website"/>
		<meta property="og:image" content="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
img/violetbag.jpg"/>
		<meta property="og:description" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_description')->value,'html','UTF-8');?>
"/>
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('canonical_url',null,true,false)->value)){?>
		<link rel="canonical" href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('canonical_url')->value,'htmlall','UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('p',null,true,false)->value)&&$_smarty_tpl->getVariable('p')->value){?>
	<?php if ($_smarty_tpl->getVariable('pages_nb')->value>1&&$_smarty_tpl->getVariable('p')->value!=$_smarty_tpl->getVariable('pages_nb')->value){?>
		<?php $_smarty_tpl->tpl_vars['p_next'] = new Smarty_variable($_smarty_tpl->getVariable('p')->value+1, null, null);?>
		<link rel="next" href="<?php echo $_smarty_tpl->getVariable('paginationBaseUrl')->value;?>
<?php echo $_smarty_tpl->getVariable('link')->value->goPage($_smarty_tpl->getVariable('requestPage')->value,$_smarty_tpl->getVariable('p_next')->value);?>
" />
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('p')->value!=1){?>
		<?php $_smarty_tpl->tpl_vars['p_previous'] = new Smarty_variable($_smarty_tpl->getVariable('p')->value-1, null, null);?>
		<link rel="prev" href="<?php echo $_smarty_tpl->getVariable('paginationBaseUrl')->value;?>
<?php echo $_smarty_tpl->getVariable('link')->value->goPage($_smarty_tpl->getVariable('requestPage')->value,$_smarty_tpl->getVariable('p_previous')->value);?>
" />
	<?php }?>
<?php }?>
		<meta property="og:site_name" content="VioletBag.com"/>
		<meta property="fb:app_id" content="277196482292288"/>
		
		<meta name="robots" content="<?php if (isset($_smarty_tpl->getVariable('nobots',null,true,false)->value)){?>no<?php }?>index,follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
favicon.ico?<?php echo $_smarty_tpl->getVariable('img_update_time')->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
favicon.ico?<?php echo $_smarty_tpl->getVariable('img_update_time')->value;?>
" />
		<script type="text/javascript">
			var baseDir = '<?php echo $_smarty_tpl->getVariable('content_dir')->value;?>
';
			var static_token = '<?php echo $_smarty_tpl->getVariable('static_token')->value;?>
';
			var token = '<?php echo $_smarty_tpl->getVariable('token')->value;?>
';
			var priceDisplayPrecision = <?php echo $_smarty_tpl->getVariable('priceDisplayPrecision')->value*$_smarty_tpl->getVariable('currency')->value->decimals;?>
;
			var priceDisplayMethod = <?php echo $_smarty_tpl->getVariable('priceDisplay')->value;?>
;
			var roundMode = <?php echo $_smarty_tpl->getVariable('roundMode')->value;?>
;

			
		</script>
<?php if (isset($_smarty_tpl->getVariable('css_files',null,true,false)->value)){?>
	<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('css_files')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value){
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
	<?php }} ?>
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('js_files',null,true,false)->value)){?>
	<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('js_files')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
	<?php }} ?>
<?php }?>
		<?php echo $_smarty_tpl->getVariable('HOOK_HEADER')->value;?>

		<script type="text/javascript">
			
				$(document).ready(function() {
					$('#feedback-form').submit(function(e){
						var container = $('#error_container');
						// validate the form when it is submitted
						var validator = $("#feedback-form").validate({
							errorContainer: container,
							errorLabelContainer: $("ol", container),
							wrapper: 'li',
							meta: "validate"
						});
						if(!validator.form())
							e.preventDefault();
						else
						{
							e.preventDefault();
							var dataString = $('#feedback-form').serialize();
							$.ajax(
									{
										type: 'POST',
										url: baseDir + 'feedback.php',
										data: dataString,
										dataType: 'json',
										success: function(result){
											if(result.feedback_status == 'succeeded')
											{
												$('#feedback-form').fadeOut();
												$('#fb_thanks').fadeIn();
												Recaptcha.reload();
												window.setTimeout(function(){
													$.fancybox.close();
													$('#feedback-form').fadeIn();
													$(':input','#feedback-form').not(':button, :submit, :hidden').val('');
													$('#fb_thanks').fadeOut();
												}, 3000);
											}
											else if(result.feedback_status == 'invalid_recaptcha')
											{
												$('.recaptcha_error').fadeIn();
												$('#error_container ol').fadeIn();
												$('#error_container').fadeIn();
											}
										}
									});
						}
					});
		
					$('#feedback_button').fancybox({
							'transitionIn'	:	'elastic',
							'transitionOut'	:	'elastic',
							'speedIn'		:	600, 
							'speedOut'		:	200, 
							'overlayShow'	:	true,
							'height'		:	500,
							'width'			:   700,
			        		'hideOnContentClick':false
					});

				});
			

			$(function(){
		    	$('img.lazy').asynchImageLoader({
		            timeout: 500,
		            effect: 'fadeIn',
		            speed: 1000,
		            event:'load'
		        });
		    });

			var RecaptchaOptions = {
				    theme : 'clean'
			};
		</script>
		
	</head>
	
	<body <?php if ($_smarty_tpl->getVariable('page_name')->value){?>id="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page_name')->value,'htmlall','UTF-8');?>
"<?php }?>>
	<?php if (!$_smarty_tpl->getVariable('content_only')->value){?>
		<?php if (isset($_smarty_tpl->getVariable('restricted_country_mode',null,true,false)->value)&&$_smarty_tpl->getVariable('restricted_country_mode')->value){?>
		<div id="restricted-country">
			<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->getVariable('geolocation_country')->value;?>
</span></p>
		</div>
		<?php }?>
		<div id="violet-bar">
    		<div style="width:980px;margin:auto;">
    			<div id="header_user_info" style="position:absolute;margin:0">
    			    <div style="position:relative; display: block; text-align: left; width: 500px;color:white;float:left">care@violetbag.com | +91-80-65655500 (10 AM to 7 PM (IST), Mon to Sat)</div>
    				<?php if ($_smarty_tpl->getVariable('cookie')->value->isLogged()){?>
    					<a rel="nofollow" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('vcoins.php',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a> 
    					| <span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('cookie')->value->customer_firstname,'htmlall','UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('cookie')->value->customer_lastname,'htmlall','UTF-8');?>
</span>
    					(<a rel="nofollow" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('index.php');?>
?mylogout" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>)
    					
    				<?php }else{ ?>
    					<a rel="nofollow" href="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('authentication.php?back=index.php',true);?>
"><?php echo smartyTranslate(array('s'=>'Log in | Signup','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    				<?php }?>
    			</div>
    		</div>
			
			<div id="feedback-button-panel" style="position:fixed;right:0px; top:250px;">
				<a rel="nofollow" id="feedback_button" href="#feedback-panel" style="cursor: pointer"><img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
feedback.png" alt="feedback" /></a>
			</div>
		</div>
		<div id="page">

			<!-- Header -->
			<div id="header">
				<div id="header_right">
					<div id="header_logo">
						<a  href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('shop_name')->value,'htmlall','UTF-8');?>
">
							<img class="logo" src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
logo.png?<?php echo $_smarty_tpl->getVariable('img_update_time')->value;?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('shop_name')->value,'htmlall','UTF-8');?>
" />
						</a>
					</div>
					<?php echo $_smarty_tpl->getVariable('HOOK_TOP')->value;?>

				</div>
			</div>

			<div id="columns">
			<?php if (isset($_smarty_tpl->getVariable('bannername',null,true,false)->value)){?>
				<a href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('link')->value->getmanufacturerLink($_smarty_tpl->getVariable('manufacturer')->value->id,$_smarty_tpl->getVariable('manufacturer')->value->link_rewrite),'htmlall','UTF-8');?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('manufacturer')->value->name,'htmlall','UTF-8');?>
 products">
					<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
brands/<?php echo $_smarty_tpl->getVariable('bannername')->value;?>
.jpg" width="980"  height="169" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('manufacturer')->value->name,'htmlall','UTF-8');?>
" />
				</a>
			<?php }?>
				<!-- Left -->
				<div id="left_column" class="column">
					<?php echo $_smarty_tpl->getVariable('HOOK_LEFT_COLUMN')->value;?>

				</div>

				<!-- Center -->
				<div id="center_column">
	<?php }?>
