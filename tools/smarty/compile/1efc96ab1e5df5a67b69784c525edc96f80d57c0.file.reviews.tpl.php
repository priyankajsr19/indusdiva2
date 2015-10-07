<?php /* Smarty version Smarty-3.0.7, created on 2014-12-29 11:11:19
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/reviews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20460707854a0e97fb39401-15912640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1efc96ab1e5df5a67b69784c525edc96f80d57c0' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/reviews.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20460707854a0e97fb39401-15912640',
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
</head>
<body>
	<div style="margin:20 auto;">
		<fieldset style="margin-bottom:10px;">
			<legend><img src="../img/admin/tab-tools.gif" /><a href="deliverystats.php">Reviews</a></legend>
			<form action="<?php echo $_smarty_tpl->getVariable('currentIndex')->value;?>
&token=<?php echo $_smarty_tpl->getVariable('token')->value;?>
" method="post" id="reviewEditForm" style="display:<?php if (isset($_smarty_tpl->getVariable('review',null,true,false)->value)){?>block<?php }else{ ?>none<?php }?>;width:520px;margin-left:200px">
				<input type="hidden" name="reviewID" value="<?php if (isset($_smarty_tpl->getVariable('review',null,true,false)->value)){?>$review->id<?php }?>" id="editReviewID" />
				<label>Title</label>
				<input type="text" name="reviewTitle" value="<?php if (isset($_smarty_tpl->getVariable('review',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('review')->value->title;?>
<?php }?>" id="editReviewTitle" style="width:300px;"/><br><br>
				<label>Review</label>
				<textarea rows="10" cols="50" id="editReviewArea" name="reviewContent" style="width:300px;"><?php if (isset($_smarty_tpl->getVariable('review',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('review')->value->content;?>
<?php }?></textarea><br><br>
				<input style="margin-left:205px" type="checkbox" name="approveReview" id="approveReview"/><label style="float:none;margin-left:5px;font-weight:normal">Approve</label> 
				<div style="text-align:right;padding:5px">
					<input type="submit" name="editReview" class="eclusive button" value="Save" style="text-align: right"/>
				</div>
			</form>
			<div>
				<?php $_smarty_tpl->tpl_vars['pageNo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['pageNo']->step = 1;$_smarty_tpl->tpl_vars['pageNo']->total = (int)ceil(($_smarty_tpl->tpl_vars['pageNo']->step > 0 ? $_smarty_tpl->getVariable('pages')->value+1 - (1) : 1-($_smarty_tpl->getVariable('pages')->value)+1)/abs($_smarty_tpl->tpl_vars['pageNo']->step));
if ($_smarty_tpl->tpl_vars['pageNo']->total > 0){
for ($_smarty_tpl->tpl_vars['pageNo']->value = 1, $_smarty_tpl->tpl_vars['pageNo']->iteration = 1;$_smarty_tpl->tpl_vars['pageNo']->iteration <= $_smarty_tpl->tpl_vars['pageNo']->total;$_smarty_tpl->tpl_vars['pageNo']->value += $_smarty_tpl->tpl_vars['pageNo']->step, $_smarty_tpl->tpl_vars['pageNo']->iteration++){
$_smarty_tpl->tpl_vars['pageNo']->first = $_smarty_tpl->tpl_vars['pageNo']->iteration == 1;$_smarty_tpl->tpl_vars['pageNo']->last = $_smarty_tpl->tpl_vars['pageNo']->iteration == $_smarty_tpl->tpl_vars['pageNo']->total;?>
				<a href="<?php echo $_smarty_tpl->getVariable('currentIndex')->value;?>
&token=<?php echo $_smarty_tpl->getVariable('token')->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['pageNo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pageNo']->value;?>
</a>
				<?php }} ?>
			</div>
			<table id="stats_table" class="table" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th colspan="1" style="width:100px">User</th>
						<th colspan="1" style="width:300px">Product</th>
						<th colspan="1" style="width:50px">Rating</th>
						<th colspan="1" style="width:200px">Title</th>
						<th colspan="1" style="width:350px">Review</th>
						<th colspan="1" style="width:50px">Review</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['review'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('reviews')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['review']->key => $_smarty_tpl->tpl_vars['review']->value){
?>
					<tr>
						<td colspan="1" >
							<a href="?tab=AdminCustomers&id_customer=<?php echo $_smarty_tpl->tpl_vars['review']->value['customerID'];?>
&viewcustomer&token=<?php echo $_smarty_tpl->getVariable('customerToken')->value;?>
">
								<?php echo $_smarty_tpl->tpl_vars['review']->value['customer_name'];?>

							</a>
						</td>
						<td colspan="1" ><?php echo $_smarty_tpl->tpl_vars['review']->value['name'];?>
</td>
						<td colspan="1" style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['review']->value['grade'];?>
</td>
						<td colspan="1" ><span id="<?php echo $_smarty_tpl->tpl_vars['review']->value['id_product_comment'];?>
_title"><?php echo $_smarty_tpl->tpl_vars['review']->value['title'];?>
</span></td>
						<td colspan="1" style="padding:5px 0">
							<span id="<?php echo $_smarty_tpl->tpl_vars['review']->value['id_product_comment'];?>
_review"><?php echo $_smarty_tpl->tpl_vars['review']->value['content'];?>
</span>
							<span class="edit-review" rel="<?php echo $_smarty_tpl->tpl_vars['review']->value['id_product_comment'];?>
" approved="<?php echo $_smarty_tpl->tpl_vars['review']->value['validate'];?>
" style="color:green;text-decoration:underline;cursor:pointer">[edit]</span>
						</td>
						<td colspan="1" style="text-align:center">
							<?php if ($_smarty_tpl->tpl_vars['review']->value['deleted']==1){?>
								<img src="../img/admin/disabled.gif" />
								<a href="<?php echo $_smarty_tpl->getVariable('currentIndex')->value;?>
&token=<?php echo $_smarty_tpl->getVariable('token')->value;?>
&restore=1&reviewID=<?php echo $_smarty_tpl->tpl_vars['review']->value['id_product_comment'];?>
">Restore</a>
							<?php }elseif($_smarty_tpl->tpl_vars['review']->value['validate']==1){?>
								<img src="../img/admin/enabled.gif" />
							<?php }else{ ?>
								<a href="<?php echo $_smarty_tpl->getVariable('currentIndex')->value;?>
&token=<?php echo $_smarty_tpl->getVariable('token')->value;?>
&approve=1&reviewID=<?php echo $_smarty_tpl->tpl_vars['review']->value['id_product_comment'];?>
">Approve</a>
								<a href="<?php echo $_smarty_tpl->getVariable('currentIndex')->value;?>
&token=<?php echo $_smarty_tpl->getVariable('token')->value;?>
&disapprove=1&reviewID=<?php echo $_smarty_tpl->tpl_vars['review']->value['id_product_comment'];?>
">Disapprove</a>
							<?php }?>
						</td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
		</fieldset>
	</div>
</body>
</html>
