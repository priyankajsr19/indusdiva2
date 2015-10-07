<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 18:56:36
         compiled from "/var/www/indusdiva.com/themes/violettheme/referral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:954702750548ee18c108b50-63074798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7a87b34ff5ea16bdc42d6e9f166515fc9cf6fa' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/referral.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '954702750548ee18c108b50-63074798',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
//<![CDATA[
	var baseDir = '<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
';
//]]>
</script>
<div style="width:970px;">
	<?php $_smarty_tpl->tpl_vars['selitem'] = new Smarty_variable('referral', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./myaccount_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div class="vtab-content" style="margin:0 5px 0 10px; width:800px;">
		
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
		<div class="block-center" id="block-vbpoints">
			<?php if (isset($_smarty_tpl->getVariable('countInvited',null,true,false)->value)&&$_smarty_tpl->getVariable('countInvited')->value>0){?>
				<p class="warning"><?php echo $_smarty_tpl->getVariable('countInvited')->value;?>
 invitations will be sent shortly.</p>
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('countInvited',null,true,false)->value)&&$_smarty_tpl->getVariable('countInvalid')->value>0&&isset($_smarty_tpl->getVariable('countInvalid',null,true,false)->value)&&$_smarty_tpl->getVariable('countInvalid')->value>0){?>
				<p class="warning"><?php echo $_smarty_tpl->getVariable('countInvalid')->value;?>
 emails already registered.</p>
			<?php }?>
			<div id="referral-panel" style="text-align:left;border:1px dashed #cacaca;margin-bottom:20px; padding:10px 20px;">
				<form id="referral-form" action="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
referral.php" method="post">
					<div id="ref_error_container" class="error_container">
						<h4>There are errors:</h4>
						<ol>
							<li class="incorrect_email"><label for="ref_email" class="error incorrect_email">Please add correct emails (seperated by commas)</label></li>
						</ol>
					</div>
					<p style="padding-left:0">
						Earn while you share! Invite your friends to the gorgeous Indusdiva family and earn 50 Indusdiva Coins when your pal makes the first purchase. 
						So go ahead and share the joy of shopping and reward yourself on the go. 
						<a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
idrewards.php" target="_blank"><span style="color:#589942;" class="span_link">Click here to know more.</span></a>
					</p>
					<div>
						<p class="required text" style="padding:5px 0px 0px;">
							<label for="ref_emails" style="font-weight:bold"><?php echo smartyTranslate(array('s'=>'E-mails (seperated by commas)'),$_smarty_tpl);?>
</label>
							<br />
							<textarea class="text required email_names" type="text" id="ref_emails" name="ref_emails" value="" style="width:100%;height:150px;font-size:13px"></textarea>
						</p>
						<p style="padding-left:0;margin:0">
							<a class="cs_import">
								<span style="width:125px;display:inline-block">Import from GMail, Yahoo, MSN and more</span>
								<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
yahoo.png" />
								<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
google.png" />
								<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
msn.png" />
							</a>
						</p>
						
						<input id="submit_referral" type="submit" value="Send Invites" class="button exclusive_large" style="margin:auto; margin-top:10px;" />
					</div>
				</form>
				<p style="padding:10px 0 0 0">Sharing the spirit of shopping was never so easy, use your unique referral link and invite your friends over. 
				Copy and paste this anywhere on the World Wide Web and keep adding to your treasure house of Indusdiva Coins.
				</p>
				<p style="padding-left:0">
					<span style="font-weight:bold;padding:0 10px 0 0">Your unique referral link:</span>
					<span style="color:#636363;font-weight:bold"><?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
?vbref=<?php echo $_smarty_tpl->getVariable('customer_id')->value;?>
</span>
				</p>
		</div>
			<?php if (isset($_smarty_tpl->getVariable('referrals',null,true,false)->value)&&count($_smarty_tpl->getVariable('referrals')->value)){?>
			<h2 style="border-bottom:1px dotted #cacaca"><?php echo smartyTranslate(array('s'=>'My Referrals'),$_smarty_tpl);?>
</h2>
			<table id="referral-list" class="std">
				<thead>
					<tr>
						<th class="first_item" style="text-align:left;"><?php echo smartyTranslate(array('s'=>'Date Invite'),$_smarty_tpl);?>
</th>
						<th class="item" style="text-align:left;"><?php echo smartyTranslate(array('s'=>'Name'),$_smarty_tpl);?>
</th>
						<th class="item" style="text-align:left;"><?php echo smartyTranslate(array('s'=>'Email'),$_smarty_tpl);?>
</th>
						<th class="item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'Registered'),$_smarty_tpl);?>
</th>
						<th class="last_item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'First Order delivered'),$_smarty_tpl);?>
</th>
					</tr>
				</thead>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['referral'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('referrals')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['referral']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['referral']->iteration=0;
 $_smarty_tpl->tpl_vars['referral']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']=-1;
if ($_smarty_tpl->tpl_vars['referral']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['referral']->key => $_smarty_tpl->tpl_vars['referral']->value){
 $_smarty_tpl->tpl_vars['referral']->iteration++;
 $_smarty_tpl->tpl_vars['referral']->index++;
 $_smarty_tpl->tpl_vars['referral']->first = $_smarty_tpl->tpl_vars['referral']->index === 0;
 $_smarty_tpl->tpl_vars['referral']->last = $_smarty_tpl->tpl_vars['referral']->iteration === $_smarty_tpl->tpl_vars['referral']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['referral']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['referral']->last;
?>
					<tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['index']%2){?>alternate_item<?php }?>">
						<td class="history_date bold" style="text-align:left;"><?php echo Tools::dateFormat(array('date'=>$_smarty_tpl->tpl_vars['referral']->value['date_add'],'full'=>0),$_smarty_tpl);?>
</td>
						<td class="" style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['referral']->value['name'];?>
</td>
						<td class="" style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['referral']->value['email'];?>
</td>
						<td class="" style="text-align:center;"><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/available.gif" width="14" height="14" /></td>
						<?php if ($_smarty_tpl->tpl_vars['referral']->value['total_delivered']>0){?>
							<td class="" style="text-align:center;"><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/available.gif" width="14" height="14" /></td>
						<?php }else{ ?>
							<td class="" style="text-align:center;"> - </td>
						<?php }?>
					</tr>
				<?php }} ?>
				</tbody>
			</table>
			<div id="block-order-detail" class="hidden" style="padding:10px 0px; float:left">&nbsp;</div>
			<?php }else{ ?>
				<?php if (isset($_smarty_tpl->getVariable('referrals_invited',null,true,false)->value)&&$_smarty_tpl->getVariable('referrals_invited')->value>0){?>
					<p class="warning">None of your friends have signed up at Indusdiva.com</p>
				<?php }else{ ?>
					<p class="warning"><?php echo smartyTranslate(array('s'=>'You have not invited any of your friends.'),$_smarty_tpl);?>
</p>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div>

<script type="text/javascript">
			
				var csPageOptions = {
					  domain_key:"W76TRN28M7YPWJ47TJBP", 
					  textarea_id:"ref_emails"
					};
				
				$(document).ready(function() {

					jQuery.validator.addMethod("email_names", function(value, element) {
						var emailList = value;
						var patt=new RegExp("^.*[<]?([a-z0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z0-9]+[._a-z0-9-]*\.[a-z0-9]+)>?$","i");
						//var regex = /^[a-z0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z0-9]+[._a-z0-9-]*\.[a-z0-9]+$/
						var emails = emailList.split(",");
						if(emails.length < 1) return false;
						for (var i = 0; i < emails.length; i++)
						{
							if(!patt.exec(emails[i].trim())) return false;
						}
					  	
						return true;
					}, "Please specify the correct domain for your documents");
					
					
					$('#referral-form').submit(function(e){
						var container = $('#ref_error_container');
						// validate the form when it is submitted
						var validator = $("#referral-form").validate({
							errorContainer: container,
							errorLabelContainer: $("ol", container),
							wrapper: 'li',
							meta: "validate"
						});

						if(!validator.form())						
						{
							e.preventDefault();
						}
						else if(!isValidEmails())
						{
							e.preventDefault();
							$('#ref_error_container').show();
							$('#ref_error_container ol').show();
							$('.incorrect_email').show();
						}
					});
				});
			
			</script>
			
	<script type="text/javascript" src="https://api.cloudsponge.com/address_books.js"></script>