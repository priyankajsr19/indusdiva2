<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 19:36:49
         compiled from "/var/www/indusdiva.com/themes/violettheme/address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78181722754903c79166ea0-94179725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4ec21e1712494d1ab975eb32e247b47735b4039' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/address.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78181722754903c79166ea0-94179725',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/indusdiva.com/tools/smarty/plugins/modifier.escape.php';
?>
<script type="text/javascript">
// <![CDATA[
	var baseDir = '<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
';
//]]>
</script>

<script type="text/javascript">
// <![CDATA[
idSelectedCountry = <?php if (isset($_POST['id_country'])){?><?php echo intval($_POST['id_country']);?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->id_country)){?><?php echo intval($_smarty_tpl->getVariable('address')->value->id_country);?>
<?php }else{ ?>false<?php }?><?php }?>;
idSelectedState = <?php if (isset($_POST['id_state'])){?><?php echo intval($_POST['id_state']);?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->id_state)){?><?php echo intval($_smarty_tpl->getVariable('address')->value->id_state);?>
<?php }else{ ?>false<?php }?><?php }?>;
countries = new Array();
countriesNeedIDNumber = new Array();
countriesNeedZipCode = new Array();
<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['states'])&&$_smarty_tpl->tpl_vars['country']->value['contains_states']){?>
		countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = new Array();
		<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['country']->value['states']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
?>
			countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
].push({'id' : '<?php echo $_smarty_tpl->tpl_vars['state']->value['id_state'];?>
', 'name' : '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['state']->value['name'],'htmlall','UTF-8');?>
'});
		<?php }} ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['country']->value['need_identification_number']){?>
		countriesNeedIDNumber.push(<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
);
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['need_zip_code'])){?>
		countriesNeedZipCode[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = <?php echo $_smarty_tpl->tpl_vars['country']->value['need_zip_code'];?>
;
	<?php }?>
<?php }} ?>

$(function(){
	$('.id_state option[value=<?php if (isset($_POST['id_state'])){?><?php echo $_POST['id_state'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->id_state)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->id_state,'htmlall','UTF-8');?>
<?php }?><?php }?>]').attr('selected', 'selected');
});

<?php if (isset($_smarty_tpl->getVariable('id_address',null,true,false)->value)&&isset($_smarty_tpl->getVariable('selected_country',null,true,false)->value)){?>
var selectedCountry = <?php if (isset($_smarty_tpl->getVariable('selected_country',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('selected_country')->value;?>
<?php }else{ ?>false<?php }?>;
<?php }else{ ?>
var selectedCountry = idSelectedCountry;
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('id_address',null,true,false)->value)&&isset($_smarty_tpl->getVariable('selected_state',null,true,false)->value)){?>
var selectedState = <?php echo $_smarty_tpl->getVariable('selected_state')->value;?>
;
<?php }else{ ?>
var selectedState = idSelectedState;
<?php }?>

	$(document).ready(function(){
	if(selectedCountry)
	{
		$('#id_country').val(selectedCountry);
		updateState();
		updateNeedIDNumber();
		updateZipCode();
	}
	else
		$('#id_country').val(0);
	if(selectedState)
	{
		$('.id_state').show();
		$('#id_state').val(selectedState);
	}
});
	


	$(document).ready(function() {
		// add the rule here
		 $.validator.addMethod("valueNotEquals", function(value, element, arg){
		  return arg != value;
		 }, "Value must not equal arg.");
		 
		$('#address_form').submit(function(e){
			var container = $('#error_container');
			// validate the form when it is submitted
			var validator = $("#address_form").validate({
				errorContainer: container,
				errorLabelContainer: $("ol", container),
				wrapper: 'li',
				meta: "validate",
				rules: {
					phone_mobile: {
					      required: {depends:function(){$(this).val($.trim($(this).val()));return true;} }
					},
					postcode: {
					      required: {depends:function(){$(this).val($.trim($(this).val()));return true;} }
					},
					id_country: { valueNotEquals: "0" }
				}
			});
			if(!validator.form())
				e.preventDefault();
			
		});

		(function($){
		    $(function(){
		      $('#id_country').selectToAutocomplete();
		    });
		  })(jQuery);
	});

//]]>
</script>
<style type="text/css">

</style>
<div style="width:980px;padding:15px 0">
<div class="vtab-bar">
		<ul id="my_account_links">
			<li><div class="vtab-bar-link"><a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
identity.php" title="<?php echo smartyTranslate(array('s'=>'Information'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Personal Info'),$_smarty_tpl);?>
</a></div></li>
			<li><div class="vtab-bar-link"><a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
history.php" title="<?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
</a></li>
			<?php if (isset($_smarty_tpl->getVariable('returnAllowed',null,true,false)->value)&&$_smarty_tpl->getVariable('returnAllowed')->value){?>
				<li><div class="vtab-bar-link"><a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
order-follow.php" title="<?php echo smartyTranslate(array('s'=>'Merchandise returns'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Returns'),$_smarty_tpl);?>
</a></div></li>
			<?php }?>
			<li class="selected"><div class="vtab-bar-link"><a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
addresses.php" title="<?php echo smartyTranslate(array('s'=>'My Address Book'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My Address Book'),$_smarty_tpl);?>
</a></div></li>
			
			<?php if (isset($_smarty_tpl->getVariable('voucherAllowed',null,true,false)->value)&&$_smarty_tpl->getVariable('voucherAllowed')->value){?>
				<li><div class="vtab-bar-link"><a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
discount.php" title="<?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My vouchers'),$_smarty_tpl);?>
</a></div></li>
			<?php }?>
		</ul>
	</div>
	<div class="vtab-content">
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<div style="width:700px;">
		<!-- our error container -->
		<div id="error_container" class="error_container">
			<h4>There are errors</h4>
			<ol>
				<li><label for="firstname" class="error">Please enter your first name</label></li>
				<li><label for="lastname" class="error">Please enter your last name</label></li>
		
				<li><label for="address1" class="error">Please enter your address</label></li>
				<li><label for="postcode" class="error">Please enter a valid POST/ZIP code</label></li>
				<li><label for="city" class="error">Please enter your city</label></li>
				<li><label for="phone_mobile" class="error">Please enter your phone number (10 digits numeric)</label></li>
				<li><label for="id_country" class="error">Please select your country</label></li>
			</ol>
		</div>
		<form id="address_form" action="<?php echo $_smarty_tpl->getVariable('link')->value->getPageLink('address.php',true);?>
" method="post" class="std">
			<fieldset>
				<h1 style="padding:10px 0; border-bottom:1px dashed #cacaca;text-align:center"><?php if (isset($_smarty_tpl->getVariable('id_address',null,true,false)->value)){?><?php echo smartyTranslate(array('s'=>'Your address'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'New address'),$_smarty_tpl);?>
<?php }?></h1>
				
			<?php  $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ordered_adr_fields')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->key => $_smarty_tpl->tpl_vars['field_name']->value){
?>
				
				<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='firstname'){?>
				<p class="required text">
					<label for="firstname"><?php echo smartyTranslate(array('s'=>'First name'),$_smarty_tpl);?>
</label>
					<input type="hidden" name="token" value="<?php echo $_smarty_tpl->getVariable('token')->value;?>
" />
					<input type="text" class="required text" name="firstname" id="firstname" value="<?php if (isset($_POST['firstname'])){?><?php echo $_POST['firstname'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->firstname)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->firstname,'htmlall','UTF-8');?>
<?php }?><?php }?>" />
					<sup>*</sup>
				</p>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='lastname'){?>
				<p class="required text">
					<label for="lastname"><?php echo smartyTranslate(array('s'=>'Last name'),$_smarty_tpl);?>
</label>
					<input type="text" class="required text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])){?><?php echo $_POST['lastname'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->lastname)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->lastname,'htmlall','UTF-8');?>
<?php }?><?php }?>" />
					<sup>*</sup>
				</p>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='address1'){?>
				<p class="required text">
					<label for="address1"><?php echo smartyTranslate(array('s'=>'Address'),$_smarty_tpl);?>
</label>
					<textarea id="address1" class="required text" name="address1" rows="3"><?php if (isset($_POST['address1'])){?><?php echo $_POST['address1'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->address1)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->address1,'htmlall','UTF-8');?>
<?php }?><?php }?></textarea>
					<sup>*</sup>
				</p>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='postcode'){?>
				<p class="required postcode text">
					<label for="postcode"><?php echo smartyTranslate(array('s'=>'Post/Zip Code'),$_smarty_tpl);?>
</label>
					<input type="text" id="postcode" class="text" name="postcode" value="<?php if (isset($_POST['postcode'])){?><?php echo $_POST['postcode'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->postcode)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->postcode,'htmlall','UTF-8');?>
<?php }?><?php }?>" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" />
					<sup>*</sup>
				</p>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='city'){?>
				<p class="required text">
					<label for="city"><?php echo smartyTranslate(array('s'=>'City'),$_smarty_tpl);?>
</label>
					<input type="text" class="required text" name="city" id="city" value="<?php if (isset($_POST['city'])){?><?php echo $_POST['city'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->city)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->city,'htmlall','UTF-8');?>
<?php }?><?php }?>" maxlength="64" />
					<sup>*</sup>
				</p>
				<!--
					if customer hasn't update his layout address, country has to be verified
					but it's deprecated
				-->
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='Country:name'||$_smarty_tpl->tpl_vars['field_name']->value=='country'){?>
				
				<div class="required text">
					<label for="id_country"><?php echo smartyTranslate(array('s'=>'Country'),$_smarty_tpl);?>
</label>
					<select name="id_country" id="id_country" autofocus="autofocus" autocorrect="off" autocomplete="off">
						<option value="0" selected="selected"></option>
                        <?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('country_names')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id_country'];?>
" data-alternative-spellings="<?php echo $_smarty_tpl->tpl_vars['country']->value['alternate_name'];?>
" data-relevancy-booster="<?php echo $_smarty_tpl->tpl_vars['country']->value['boost'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country'];?>
</option>
						<?php }} ?>
					</select>
				</div>
				
				<?php }?>
				
				<?php }} ?>
				<script type="text/javascript">
					var ajaxurl = '<?php echo $_smarty_tpl->getVariable('ajaxurl')->value;?>
';
					var selectedState = <?php echo $_smarty_tpl->getVariable('selected_state')->value;?>
;
					
					$(document).ready(function(){
								$('#id_state option[value=<?php echo $_smarty_tpl->getVariable('selected_state')->value;?>
]').attr('selected', 'selected');
								});
					
				</script>
				<p class="required id_state select">
							<label for="id_state"><?php echo smartyTranslate(array('s'=>'State'),$_smarty_tpl);?>
<sup>*</sup></label>
							<select name="id_state" id="id_state">
								<option value="">-</option>
							</select>
						</p>
				<p class="text">
					<label for="phone_mobile"><?php echo smartyTranslate(array('s'=>'Mobile phone'),$_smarty_tpl);?>
</label>
					<input type="text" id="phone_mobile" class="text" name="phone_mobile" value="<?php if (isset($_POST['phone_mobile'])){?><?php echo $_POST['phone_mobile'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->phone_mobile)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->phone_mobile,'htmlall','UTF-8');?>
<?php }?><?php }?>" />
				</p>
				<p class="required text" id="address_alias" style="display:none">
					<label for="alias"><?php echo smartyTranslate(array('s'=>'Address book title'),$_smarty_tpl);?>
</label>
					<input type="text" id="alias" class="text" name="alias" value="<?php if (isset($_POST['alias'])){?><?php echo $_POST['alias'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->getVariable('address',null,true,false)->value->alias)){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('address')->value->alias,'htmlall','UTF-8');?>
<?php }else{ ?>Address<?php echo $_smarty_tpl->getVariable('address_count')->value+1;?>
<?php }?><?php }?>" />
					<sup>*</sup>
				</p>
				<p class="required"><span><sup>*</sup><?php echo smartyTranslate(array('s'=>'Required field'),$_smarty_tpl);?>
</span></p>
			</fieldset>
			<p class="submit2" style="padding:0">
				<?php if (isset($_smarty_tpl->getVariable('id_address',null,true,false)->value)){?><input type="hidden" name="id_address" value="<?php echo intval($_smarty_tpl->getVariable('id_address')->value);?>
" /><?php }?>
				<?php if (isset($_smarty_tpl->getVariable('back',null,true,false)->value)){?><input type="hidden" name="back" value="<?php echo $_smarty_tpl->getVariable('back')->value;?>
" /><?php }?>
				<?php if (isset($_smarty_tpl->getVariable('mod',null,true,false)->value)){?><input type="hidden" name="mod" value="<?php echo $_smarty_tpl->getVariable('mod')->value;?>
" /><?php }?>
				<?php if (isset($_smarty_tpl->getVariable('select_address',null,true,false)->value)){?><input type="hidden" name="select_address" value="<?php echo intval($_smarty_tpl->getVariable('select_address')->value);?>
" /><?php }?>
				<input type="submit" name="submitAddress" id="submitAddress" value="<?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
" class="button" style="margin:auto;width:150px;"/>
			</p>
			
		</form>
		</div>
		</div>
</div>
