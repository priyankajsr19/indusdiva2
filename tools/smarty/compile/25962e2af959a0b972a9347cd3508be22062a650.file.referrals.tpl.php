<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 23:09:54
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/referrals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139009606454ecb76a5683b2-59438207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25962e2af959a0b972a9347cd3508be22062a650' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/referrals.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139009606454ecb76a5683b2-59438207',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
	<style type="text/css">
		a:hover{
			color:blue;
			text-decoration:underline !important;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".edit-review").click(function(){
				var reviewID = $(this).attr('rel');
				$("#editReviewID").val(reviewID);
				$("#editReviewArea").val($("#"+reviewID+"_review").text());
				$("#editReviewTitle").val($("#"+reviewID+"_title").text());

				if($(this).attr('approved') == '1')
					$("#approveReview").attr('checked','checked');
					
				$("#reviewEditForm").fadeIn();
			});
		});
	</script>
	
		<script type="text/javascript" src="../js/jquery/jquery-ui-1.8.10.custom.min.js"></script>
		<script type="text/javascript">
			var dateObj = new Date();
			var hours = dateObj.getHours();
			var mins = dateObj.getMinutes();
			var secs = dateObj.getSeconds();
			if (hours < 10) { hours = "0" + hours; }
			if (mins < 10) { mins = "0" + mins; }
			if (secs < 10) { secs = "0" + secs; }
			var time = " "+hours+":"+mins+":"+secs;

			$(function() {
				$("#date_from").datepicker({
					prevText:"",
					nextText:"",
					dateFormat:"yy-mm-dd"});
			});

			$(function() {
				$("#date_to").datepicker({
					prevText:"",
					nextText:"",
					dateFormat:"yy-mm-dd"});
			});
		</script>
	
</head>
<body>
    <?php if (isset($_smarty_tpl->getVariable('referrer_details',null,true,false)->value)){?>
	    <p>
    	    Referrer: <?php echo $_smarty_tpl->getVariable('referrer_details')->value['name'];?>
<br>
    	    Total Orders: <?php echo $_smarty_tpl->getVariable('referrer_details')->value['total_orders'];?>
<br>
    	    Total Paid: <?php echo $_smarty_tpl->getVariable('referrer_details')->value['total_paid'];?>

    	</p>
    <?php }?>
	<?php if (isset($_smarty_tpl->getVariable('referredOrders',null,true,false)->value)){?>
	    <div style="margin:20 auto;">
		<fieldset style="margin-bottom:10px;">
    	<legend><img src="../img/admin/tab-tools.gif" />Referred Orders</legend>
    		<table id="stats_table" class="table" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th colspan="1" style="width:200px">Order ID</th>
						<th colspan="1" style="width:100px">Name</th>
						<th colspan="1" style="width:250px">Address</th>
						<th colspan="1" style="width:100px">Phone</th>
						<th colspan="1" style="width:200px">Total Paid</th>
						<th colspan="1" style="width:200px">Date Register</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('referredOrders')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
?>
					<tr>
						<td colspan="1" >
							<a href="?tab=AdminOrders&id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>
&vieworder&token=<?php echo $_smarty_tpl->getVariable('orderToken')->value;?>
">
								<?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>

							</a>
						</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>
</td>
						<td colspan="1" style="text-align: left">
                             <?php echo $_smarty_tpl->tpl_vars['order']->value['address'];?>

                        </td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['order']->value['phone_mobile'];?>
</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['order']->value['total_paid'];?>
</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['order']->value['date_register'];?>
</td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
        </fieldset>
	</div>
	<?php }?>
	<?php if (isset($_smarty_tpl->getVariable('referredCustomers',null,true,false)->value)){?>
	    <div style="margin:20 auto;">
		<fieldset style="margin-bottom:10px;">
    	<legend><img src="../img/admin/tab-tools.gif" />Referred Customers</legend>
    		<table id="stats_table" class="table" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th colspan="1" style="width:200px">Name</th>
						<th colspan="1" style="width:200px">Date Register</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['customer'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('referredCustomers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['customer']->key => $_smarty_tpl->tpl_vars['customer']->value){
?>
					<tr>
						<td colspan="1" >
							<a href="?tab=AdminCustomers&id_customer=<?php echo $_smarty_tpl->tpl_vars['customer']->value['id_customer'];?>
&viewcustomer&token=<?php echo $_smarty_tpl->getVariable('customerToken')->value;?>
">
								<?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>

							</a>
						</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['customer']->value['date_add'];?>
</td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
        </fieldset>
	</div>
	<?php }?>
	<div style="margin:20 auto;">
		<fieldset style="margin-bottom:10px;">
    	<legend><img src="../img/admin/tab-tools.gif" />Referrals list</legend>
    		<form action="" method="POST" style="margin-bottom:15px;">
    			From: <input type="text" id="date_from" name="date_from" value="<?php echo $_smarty_tpl->getVariable('date_from')->value;?>
"/>
    			To: <input type="text" id="date_to" name="date_to" value="<?php echo $_smarty_tpl->getVariable('date_to')->value;?>
"/>
    			<input type="submit" value="Update" />
    		</form>
    		<table id="stats_table" class="table" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th colspan="1" style="width:200px">Customer</th>
						<th colspan="1" style="width:100px">Registered</th>
						<th colspan="1" style="width:100px">Orders</th>
						<th colspan="1" style="width:200px">Friends with Orders</th>
						<th colspan="1" style="width:200px">Avg Order Value</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['referral'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('referrals')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['referral']->key => $_smarty_tpl->tpl_vars['referral']->value){
?>
					<tr>
						<td colspan="1" >
							<a href="?tab=AdminCustomers&id_customer=<?php echo $_smarty_tpl->tpl_vars['referral']->value['customerID'];?>
&viewcustomer&token=<?php echo $_smarty_tpl->getVariable('customerToken')->value;?>
">
								<?php echo $_smarty_tpl->tpl_vars['referral']->value['name'];?>

							</a>
						</td>
						<td colspan="1" style="text-align: center">
                            <?php if ($_smarty_tpl->tpl_vars['referral']->value['total_registered']>0){?>
                               <a href="?tab=AdminReferrals&getReferrerData=1&token=<?php echo $_smarty_tpl->getVariable('token')->value;?>
&referrer=<?php echo $_smarty_tpl->tpl_vars['referral']->value['customerID'];?>
">
                                   <?php echo $_smarty_tpl->tpl_vars['referral']->value['total_registered'];?>

                               </a>
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['referral']->value['total_registered'];?>

                            <?php }?>
                        </td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['referral']->value['total_orders'];?>
</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['referral']->value['total_friends_orders'];?>
</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['referral']->value['avg_order'];?>
</td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
        </fieldset>
	</div>
</body>
</html>
