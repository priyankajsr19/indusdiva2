<?php /* Smarty version Smarty-3.0.7, created on 2015-02-03 13:51:52
         compiled from "/var/www/indusdiva.com/themes/violettheme/admin/deliverystats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70715195754d085204b9a67-48712913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f8264ace2caf3d918bed180832380328813f686' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/admin/deliverystats.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70715195754d085204b9a67-48712913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('admin_css')->value;?>
" />
	<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('current_theme_css')->value;?>
" />
	
	<style type="text/css">
		
		#stats_table{
			width:1200px;
			font-size:12px;
	 	}
	 	
	 	#stats_table td{
	 		text-align:center;
	 	}
	 	
	</style>
</head>
<body>
<div style="width:1230px;margin:20 auto;">
<fieldset style="margin-bottom:10px;">
	<legend><img src="../img/admin/tab-tools.gif" /><a href="deliverystats.php">Shipped products</a></legend>
	<table id="stats_table" class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th colspan="1"></th>
				<th colspan="3">Last Two days</th>
				<th colspan="3">2-4 days</th>
				<th colspan="3">4-7 days</th>
				<th colspan="3"> > 7 days</th>
			</tr>
			<tr>
				<th colspan="1">Provider</th>
				<th colspan="1">Shipped</th><th colspan="1">Delivered</th><th colspan="1">UnDelivered</th>
				<th colspan="1">Shipped</th><th colspan="1">Delivered</th><th colspan="1">UnDelivered</th>
				<th colspan="1">Shipped</th><th colspan="1">Delivered</th><th colspan="1">UnDelivered</th>
				<th colspan="1">Shipped</th><th colspan="1">Delivered</th><th colspan="1">UnDelivered</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="title">Blue Dart</td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['twoday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['twoday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=7&range1=2&range2=0"><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['twoday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['fourday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['fourday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=7&range1=4&range2=2"><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['fourday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['sevenday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['sevenday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=7&range1=7&range2=4"><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['sevenday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['longer']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['longer']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=7&range1=1000&range2=7"><?php echo $_smarty_tpl->getVariable('bluedartDetails')->value['longer']['undelivered'];?>
</a></td>
			</tr>
			<tr>
				<td class="title"> Quantium</td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['twoday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['twoday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=10&range1=2&range2=0"><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['twoday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['fourday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['fourday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=10&range1=4&range2=2"><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['fourday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['sevenday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['sevenday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=10&range1=7&range2=4"><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['sevenday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['longer']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['longer']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=10&range1=1000&range2=7"><?php echo $_smarty_tpl->getVariable('quantiumDetails')->value['longer']['undelivered'];?>
</a></td>
			</tr>
			<tr>
				<td class="title">Aramex</td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['twoday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['twoday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=6&range1=2&range2=0"><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['twoday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['fourday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['fourday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=6&range1=4&range2=2"><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['fourday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['sevenday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['sevenday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=6&range1=7&range2=4"><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['sevenday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['longer']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['longer']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=6&range1=1000&range2=7"><?php echo $_smarty_tpl->getVariable('aramexDetails')->value['longer']['undelivered'];?>
</a></td>
			</tr>
			<tr>
				<td class="title">Speedpost</td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['twoday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['twoday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=11&range1=2&range2=0"><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['twoday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['fourday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['fourday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=11&range1=4&range2=2"><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['fourday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['sevenday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['sevenday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=11&range1=7&range2=4"><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['sevenday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['longer']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['longer']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=11&range1=1000&range2=7"><?php echo $_smarty_tpl->getVariable('speedpostDetails')->value['longer']['undelivered'];?>
</a></td>
			</tr>
			<tr>
				<td class="title">AFL</td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['twoday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['twoday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=12&range1=2&range2=0"><?php echo $_smarty_tpl->getVariable('aflDetails')->value['twoday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['fourday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['fourday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=12&range1=4&range2=2"><?php echo $_smarty_tpl->getVariable('aflDetails')->value['fourday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['sevenday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['sevenday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=12&range1=7&range2=4"><?php echo $_smarty_tpl->getVariable('aflDetails')->value['sevenday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['longer']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('aflDetails')->value['longer']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=12&range1=1000&range2=7"><?php echo $_smarty_tpl->getVariable('aflDetails')->value['longer']['undelivered'];?>
</a></td>
			</tr>
			<tr>
				<td class="title">Sab Express</td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['twoday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['twoday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=13&range1=2&range2=0"><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['twoday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['fourday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['fourday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=13&range1=4&range2=2"><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['fourday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['sevenday']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['sevenday']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=13&range1=7&range2=4"><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['sevenday']['undelivered'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['longer']['shipped'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['longer']['delivered'];?>
</td>
				<td><a href="deliverystats.php?getlist=1&carrierid=13&range1=1000&range2=7"><?php echo $_smarty_tpl->getVariable('sabexDetails')->value['longer']['undelivered'];?>
</a></td>
			</tr>
		</tbody>
	</table>
</fieldset>
</div>
</body>
</html>
