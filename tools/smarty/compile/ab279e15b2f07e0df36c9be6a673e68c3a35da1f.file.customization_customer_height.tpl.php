<?php /* Smarty version Smarty-3.0.7, created on 2015-09-03 18:40:19
         compiled from "/var/www/indusdiva.com/themes/violettheme//customization_customer_height.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65732828955e846bb3ec023-18025283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab279e15b2f07e0df36c9be6a673e68c3a35da1f' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme//customization_customer_height.tpl',
      1 => 1376281125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65732828955e846bb3ec023-18025283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="clearfix" id="cust_height">
    <label for="cust_height_ft" style="font-size:15px;text-align:left">Select your height:</label>
    <?php if ((($tmp = @$_smarty_tpl->getVariable('as_shown')->value)===null||$tmp==='' ? false : $tmp)==true){?>
        <select id="cust_height_ft" name="cust_height_ft" class="cust_height">
    <?php }else{ ?>
        <select id="cust_height_ft" name="cust_height_ft" disabled='disabled' class="cust_height">
    <?php }?>
        <option value='-1'>Feet</option>
        <option value='0'>0</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
    </select>
    <?php if ((($tmp = @$_smarty_tpl->getVariable('as_shown')->value)===null||$tmp==='' ? false : $tmp)==true){?>
        <select id="cust_height_in" name="cust_height_in" class="cust_height">
    <?php }else{ ?>
        <select id="cust_height_in" name="cust_height_in" disabled='disabled' class="cust_height">
    <?php }?>
        <option value='-1'>Inch</option>
        <option value='0'>0</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
        <option value='10'>10</option>
        <option value='11'>11</option>
    </select>
    <p>This helps us provide the perfect length to your outfit</p>
</div>
