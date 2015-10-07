<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 22:29:41
         compiled from "/var/www/indusdiva.com/themes/violettheme/bulk-enquiry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174533524548f137d48a0f6-81494590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '356099257ae89c32de9e466ef3c55d12bd1e0773' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/bulk-enquiry.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174533524548f137d48a0f6-81494590',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
$(document).ready(function() {
	$('#enquiry_form').submit(function(e) {
		var container = $('#enquiry_error_container');
		// validate the form when it is submitted
		var validator = $("#enquiry_form").validate( {
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			meta: "validate"
		} );
		if(!validator.form())
			e.preventDefault();
	} );
});
</script>

<div style="width:980px;">
	<?php if (isset($_smarty_tpl->getVariable('display_thanks',null,true,false)->value)&&$_smarty_tpl->getVariable('display_thanks')->value){?>
	<div style="margin:auto;width:600px;border: 1px solid #D0D3D8;box-shadow: 0 1px 3px 0 black;padding:10px">
		<h1 style="padding:10px 0; border-bottom:1px dashed #cacaca;text-align:center">ENQUIRY SENT</h1>
		<div>
			<h2 style="text-align:center;padding:20px;font-size:18px;color:#A41E21">Thank you for writing to us!</h2>
			<p>
				Thanks for your interest in partnering with us, we will contact you shortly with regards to your enquiry.
			</p>
		</div>
	</div>
	<?php }else{ ?>
	<form id="enquiry_form" action="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('bulkenquiries.php',true);?>
" method="post" class="" style="margin:auto;width:600px;border: 1px solid #D0D3D8;box-shadow: 0 1px 3px 0 black;padding:10px">
		<div id="enquiry_error_container" class="error_container">
			<h4>There are errors:</h4>
			<ol>
				<li><label for="phone" class="error">Please enter your phone number</label></li>
				<li><label for="country" class="error">Please enter country</label></li>
				<li><label for="enquiry" class="error">Non empty enquiry please</label></li>
			</ol>
		</div>
		<fieldset>
			<h1 style="padding:10px 0; border-bottom:1px dashed #cacaca;text-align:center">BULK ENQUIRY</h1>
			<p>
				<span style="width:100px;display:inline-block"><label>Phone:</label></span><br />
				<input type="text" name="phone" id="phone" class="required text"/>
			</p>
			<p>
				<span style="width:100px;display:inline-block"><label>Your Country:</label></span><br />
				<input type="text" name="country" id="country" class="required text"/>
			</p>
			<p>
				<label>Your enquiry:</label> <br/>
		   		<textarea value="" name="enquiry" id="enquiry" type="text" rows="4" class="text required" style="width:500px;"></textarea>
		   	</p>
		</fieldset>
		<p class="submit2" style="padding:0">
			<input type="submit" name="submitEnquiry" id="submitEnquiry" value="Send Enquiry" class="button" style="margin:auto;width:150px;"/>
		</p>
		</form>
	<?php }?>
</div>
