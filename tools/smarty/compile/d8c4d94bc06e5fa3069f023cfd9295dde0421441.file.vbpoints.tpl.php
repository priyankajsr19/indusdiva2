<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 18:10:20
         compiled from "/var/www/indusdiva.com/themes/violettheme/vbpoints.tpl" */ ?>
<?php /*%%SmartyHeaderCode:664129311548ed6b48ed627-18559620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8c4d94bc06e5fa3069f023cfd9295dde0421441' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/vbpoints.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '664129311548ed6b48ed627-18559620',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
//<![CDATA[
	var baseDir = '<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
';
	
	$('a.points_help').cluetip({
			splitTitle: '|',
			arrows: true
		});
	
//]]>
</script>

<div style="width:970px;">
        <?php $_smarty_tpl->tpl_vars['selitem'] = new Smarty_variable('points', null, null);?>
        <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./myaccount_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div class="vtab-content">
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./errors.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<div style="width:100%;padding-bottom:15px;float:left;">
			<div style="padding:15px 5px;width:150px;height:45px;float:left;text-align:center;">
				<span style="text-align:left;font-size:30px;"><?php echo $_smarty_tpl->getVariable('earned_points')->value;?>
</span>
				<br/>
				<span style="padding:0 5px;">Indusdiva Coins Earned </span>
				<a id="points_help" href="#" title="5 Indusdiva Coins =  1 USD. You can redeem these coins against your future orders."><img src="<?php echo $_smarty_tpl->getVariable('img_dir')->value;?>
icon/help.png" height="12" width="12"/></a>
			</div>
			<div style="padding:15px 5px;width:150px;height:45px;float:left;text-align:center;border-left:1px dotted #cacaca">
				<span style="text-align:left;font-size:30px;"><?php echo $_smarty_tpl->getVariable('redeemed_points')->value;?>
</span>
				<br/>
				<span style="padding:0 5px;">Coins Redeemed</span>
			</div>
			<div style="padding:15px 5px;width:150px;height:45px;float:left;text-align:center;border-left:1px dotted #cacaca">
				<span style="text-align:left;font-size:30px;"><?php echo $_smarty_tpl->getVariable('balance_points')->value;?>
</span>
				<br/>
				<span style="padding:0 5px;">Indusdiva Coins Available</span>
			</div>
			<div style="padding:5px 10px 5px 20px;;width:270px;min-height:65px;float:left;text-align:left;border-left:1px dotted #cacaca">
				<ul>
					<li>
						<?php if (isset($_smarty_tpl->getVariable('total_referred',null,true,false)->value)&&$_smarty_tpl->getVariable('total_referred')->value>0){?>
							<span style="text-align:left;font-size:15px;"><?php echo $_smarty_tpl->getVariable('total_referred')->value;?>
</span>
							<?php if ($_smarty_tpl->getVariable('total_referred')->value==1){?>
								<span style="padding:0 5px;">Friend referred</span>
							<?php }else{ ?>
								<span style="padding:0 5px;">Friends referred</span>
							<?php }?>
						<?php }else{ ?>
							<span>No friends referred </span>
							<a href="<?php echo $_smarty_tpl->getVariable('base_dir_ssl')->value;?>
referral.php" ><span style="font-size:11px; color:#939393">[Invite Now]</span></a>
						<?php }?>
					</li>
					<li>
						<?php if (isset($_smarty_tpl->getVariable('reviews_approved',null,true,false)->value)&&$_smarty_tpl->getVariable('reviews_approved')->value>0){?>
							<span style="text-align:left;font-size:15px;"><?php echo $_smarty_tpl->getVariable('reviews_approved')->value;?>
</span>
							<span style="padding:0 5px;">Products reviewed</span>
						<?php }else{ ?>
							<span>No products reviewed</span>
						<?php }?>
					</li>
					<li>
						<?php if (isset($_smarty_tpl->getVariable('social_points',null,true,false)->value)&&$_smarty_tpl->getVariable('social_points')->value>0){?>
							<span style="text-align:left;font-size:15px;"><?php echo $_smarty_tpl->getVariable('social_points')->value;?>
</span>
							<span style="padding:0 5px;">Coins for social love </span>
							<br /><span style="font-size:11px; color:#939393;padding:0 5px">(Facebook like and Google plus share)</span>
						<?php }else{ ?>
							<span>No social love coins. Start sharing!</span>
							<br /><span style="font-size:11px; color:#939393;">(Click on Google Plus & Facebook Like buttons</span> 
							<br /><span style="font-size:11px; color:#939393;">on your favorite products and earn coins!)</span>
						<?php }?>
					</li>
				</ul>
			</div>
			<div style="border-top: 1px dotted #CACACA;float: left;margin-top: 5px;padding-top: 5px;text-align: right;width: 100%;">
				<a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
idrewards.php" target="_blank"><span style="color:#589942;" class="span_link">How do I earn more coins?</span></a>
			</div>
		</div>
		<h2 style="border-bottom: 1px dotted #cacaca;clear:both;"><?php echo smartyTranslate(array('s'=>'Account statement'),$_smarty_tpl);?>
</h2>
		<div class="block-center" id="block-vbpoints">
			<?php if ($_smarty_tpl->getVariable('vbpoints')->value&&count($_smarty_tpl->getVariable('vbpoints')->value)){?>
			<table id="order-list" class="std">
				<thead>
					<tr>
						<th class="first_item" style="text-align:left;"><?php echo smartyTranslate(array('s'=>'Date'),$_smarty_tpl);?>
</th>
						<th class="item" style="text-align:left;"><?php echo smartyTranslate(array('s'=>'Description'),$_smarty_tpl);?>
</th>
						<th class="item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'Earned'),$_smarty_tpl);?>
</th>
						<th class="item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'Deducted'),$_smarty_tpl);?>
</th>
						<th class="last_item" style="text-align:right;"><?php echo smartyTranslate(array('s'=>'Balance'),$_smarty_tpl);?>
</th>
					</tr>
				</thead>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['vbpoint'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('vbpoints')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['vbpoint']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['vbpoint']->iteration=0;
 $_smarty_tpl->tpl_vars['vbpoint']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']=-1;
if ($_smarty_tpl->tpl_vars['vbpoint']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vbpoint']->key => $_smarty_tpl->tpl_vars['vbpoint']->value){
 $_smarty_tpl->tpl_vars['vbpoint']->iteration++;
 $_smarty_tpl->tpl_vars['vbpoint']->index++;
 $_smarty_tpl->tpl_vars['vbpoint']->first = $_smarty_tpl->tpl_vars['vbpoint']->index === 0;
 $_smarty_tpl->tpl_vars['vbpoint']->last = $_smarty_tpl->tpl_vars['vbpoint']->iteration === $_smarty_tpl->tpl_vars['vbpoint']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['vbpoint']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['vbpoint']->last;
?>
					<tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['index']%2){?>alternate_item<?php }?>">
						<td class="history_date bold"><?php echo Tools::dateFormat(array('date'=>$_smarty_tpl->tpl_vars['vbpoint']->value['date_add'],'full'=>0),$_smarty_tpl);?>
</td>
						<td class="" style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['description'];?>
</td>
						<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['points_awarded'];?>
</td>
						<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['points_deducted'];?>
</td>
						<td class="" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['vbpoint']->value['balance'];?>
</td>
					</tr>
				<?php }} ?>
				</tbody>
			</table>
			<div id="block-order-detail" class="hidden" style="padding:10px 0px; float:left">&nbsp;</div>
			<?php }else{ ?>
				<p class="warning"><?php echo smartyTranslate(array('s'=>'You have not placed any orders.'),$_smarty_tpl);?>
</p>
			<?php }?>
		</div>
	</div>
</div>
