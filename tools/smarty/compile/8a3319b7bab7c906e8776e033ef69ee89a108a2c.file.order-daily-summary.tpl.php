<?php /* Smarty version Smarty-3.0.7, created on 2015-09-03 17:31:30
         compiled from "/var/www/indusdiva.com/themes/violettheme/order-daily-summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50889103555e8369a484622-01903328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a3319b7bab7c906e8776e033ef69ee89a108a2c' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/order-daily-summary.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50889103555e8369a484622-01903328',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="1" style="background-color:#FEFEF2;border-collapse:collapse; margin:10px 0 10px 0">
    <caption style="font-weight:bold">Summary of Orders</caption>
    <tbody>
        <tr>
            <td style="width:400px"> Total orders </td>
            <td> <?php echo $_smarty_tpl->getVariable('total_orders')->value;?>
 </td>
        </tr>
        <tr>
            <td style="width:400px"> On Track </td>
            <td> <?php echo $_smarty_tpl->getVariable('on_track')->value;?>
 </td>
        </tr>
        <tr>
            <td style="width:400px"> Not Shiped </td>
            <td> <?php echo $_smarty_tpl->getVariable('not_shipped')->value;?>
 </td>
        </tr>
        <tr>
            <td style="width:400px"> In Customization for more than 5 days </td>
            <td> <?php echo $_smarty_tpl->getVariable('in_cust')->value;?>
 </td>
        </tr>
        <tr>
            <td style="width:400px"> In Sourcing and execeeded half the time to delivery date </td>
            <td> <?php echo $_smarty_tpl->getVariable('in_sourcing')->value;?>
 </td>
        </tr>
    </tbody>
</table>
