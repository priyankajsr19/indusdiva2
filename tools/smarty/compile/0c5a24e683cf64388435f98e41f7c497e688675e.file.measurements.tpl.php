<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 18:56:28
         compiled from "/var/www/indusdiva.com/themes/violettheme/measurements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:801079904548ee184645224-77700373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5a24e683cf64388435f98e41f7c497e688675e' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/measurements.tpl',
      1 => 1380178894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '801079904548ee184645224-77700373',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
//<![CDATA[

	$(document).ready(function() {
		$('.measure_link').fancybox({
			fitToView : true,
			margin:0,
			padding:0
		});

	    $('.delete_measurement').click(function(e){
			if(!confirm('Delete this measurement?'))
				e.preventDefault();
		});
	});

//]]>
</script>


<div style="width:970px;">
        <?php $_smarty_tpl->tpl_vars['selitem'] = new Smarty_variable('measurements', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./myaccount_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div class="vtab-content">
		<h1 style="padding:10px 0;text-align:center;border-bottom:1px dashed #cacaca">Measurements</h1>
		<?php if (isset($_smarty_tpl->getVariable('blouse_measurements',null,true,false)->value)){?>
		<div style="border-bottom:1px dashed #cacaca;float:left; clear:both; width:100%;margin:10px;padding:10px 0">
		    <h2>BLOUSE MEASUREMENTS</h2>
		    <div style="width:440px;padding:0px;float:right">
		        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/blouse-measurement-choli.jpeg" alt="measurement info"/>
			</div>
		    <?php  $_smarty_tpl->tpl_vars['measurement'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blouse_measurements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['measurement']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['measurement']->key => $_smarty_tpl->tpl_vars['measurement']->value){
 $_smarty_tpl->tpl_vars['measurement']->index++;
 $_smarty_tpl->tpl_vars['measurement']->first = $_smarty_tpl->tpl_vars['measurement']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['blouse_measurements']['first'] = $_smarty_tpl->tpl_vars['measurement']->first;
?>
		        <ul class="measurement-list">
		            <li style="padding:5px 0;text-align:center;border-bottom:1px dashed #cacaca;text-transform:capitalize;font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['measurement']->value['name_measurement'];?>
</li>
		            <li><span class="measurement-label">A. Front Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['A'];?>
</li>
		            <li class="even"><span class="measurement-label">B. Back Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['B'];?>
</li>
		            <li><span class="measurement-label">C. Neck Deep: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['C'];?>
</li>
		            <li class="even"><span class="measurement-label">D. Front Shape: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['D'];?>
</li>
		            <li><span class="measurement-label">E. Bust: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['E'];?>
</li>
		            <li class="even"><span class="measurement-label">F. Upper Waist: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['F'];?>
</li>
		            <li><span class="measurement-label">G. Arm Hole: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['G'];?>
</li>
		            <li class="even"><span class="measurement-label">H. Sleeve Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['H'];?>
</li>
		            <li><span class="measurement-label">I. Sleeve Loose: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['I'];?>
</li>
		            <li class="even"><span class="measurement-label">J. Back Deep: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['J'];?>
</li>
		            <li><span class="measurement-label">K. Shoulder: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['K'];?>
</li>
		            <li class="even"><span class="measurement-label">L. Long Choli Front Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['L'];?>
</li>
		            <li style="padding:10px;margin-top:10px;border-top:1px dashed #cacaca;">
		                <a class="span_link measure_link fancybox.ajax" style="display:inline-block; float:left" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?&modal=1&m=1&type=1&id_measurement=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['id_measurement'];?>
"><span>Update</span></a>
		                <a class="span_link delete_measurement" style="display:inline-block; float:right" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?delete=1&id=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['customer_measurement_id'];?>
"><span style="color:red">Delete</span></a>
		            </li>
		        </ul>
		        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['blouse_measurements']['first']==true){?>
		        	<div style="clear:both;width:100%"></div>
		        <?php }?>
		    <?php }} ?>
		    
		</div>
		
		<?php }?>
		
		<?php if (isset($_smarty_tpl->getVariable('skirt_measurements',null,true,false)->value)){?>
		<div style="border-bottom:1px dashed #cacaca;float:left; clear:both;width:100%">
			<div style="width:520px;float:left">
			    <h2>INSKIRT/LEHENGA MEASUREMENTS</h2>
			    <?php  $_smarty_tpl->tpl_vars['measurement'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('skirt_measurements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['measurement']->key => $_smarty_tpl->tpl_vars['measurement']->value){
?>
			        <ul class="measurement-list">
			            <li style="padding:5px 0;text-align:center;border-bottom:1px dashed #cacaca;text-transform:capitalize;font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['measurement']->value['name_measurement'];?>
</li>
			            <li><span class="measurement-label">A. Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['A'];?>
</li>
			            <li class="even"><span class="measurement-label">B. Waist: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['B'];?>
</li>
			            <li><span class="measurement-label">C. Hips: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['C'];?>
</li>
			            <li style="padding:10px;margin-top:10px;border-top:1px dashed #cacaca;">
			                <a class="span_link measure_link fancybox.ajax" style="display:inline-block; float:left" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?&modal=1&m=1&type=2&id_measurement=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['id_measurement'];?>
"><span>Update</span></a>
			                <a class="span_link delete_measurement" style="display:inline-block; float:right" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?delete=1&id=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['customer_measurement_id'];?>
"><span style="color:red">Delete</span></a>
			            </li>
			        </ul>
			    <?php }} ?>
			</div>
			<div style="width:240px;padding:0px;float:right">
				<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/skirt-measurement.jpg" alt="measurement info"/>
			</div>
		</div>
		<?php }?>
		
		<?php if (isset($_smarty_tpl->getVariable('kurta_measurements',null,true,false)->value)){?>
		<div style="border-bottom:1px dashed #cacaca;float:left; clear:both; width:100%">
		    <h2>KURTA MEASUREMENTS</h2>
		    <div style="width:220px;padding:0px;float:right">
		        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/kurta2.png" alt="measurement info" width="100%"/>
			</div>
		    <?php  $_smarty_tpl->tpl_vars['measurement'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kurta_measurements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['measurement']->key => $_smarty_tpl->tpl_vars['measurement']->value){
?>
		        <ul class="measurement-list">
		            <li style="padding:5px 0;text-align:center;border-bottom:1px dashed #cacaca;text-transform:capitalize;font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['measurement']->value['name_measurement'];?>
</li>
		            <li><span class="measurement-label">A. Top Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['A'];?>
</li>
		            <li class="even"><span class="measurement-label">B. Body Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['B'];?>
</li>
		            <li><span class="measurement-label">C. Shoulder: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['C'];?>
</li>
		            <li class="even"><span class="measurement-label">D. Arm Hole: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['D'];?>
</li>
		            <li><span class="measurement-label">E. Sleeve Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['E'];?>
</li>
		            <li class="even"><span class="measurement-label">F. Sleeve Loose: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['F'];?>
</li>
		            <li><span class="measurement-label">G. Neck Deep: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['G'];?>
</li>
		            <li class="even"><span class="measurement-label">H. Front Shape: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['H'];?>
</li>
		            <li><span class="measurement-label">I. Chest: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['I'];?>
</li>
		            <li class="even"><span class="measurement-label">J. Waist: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['J'];?>
</li>
		            <li><span class="measurement-label">K. Hips: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['K'];?>
</li>
		            <li style="padding:10px;margin-top:10px;border-top:1px dashed #cacaca;">
		                <a class="span_link measure_link fancybox.ajax" style="display:inline-block; float:left" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?&modal=1&m=1&type=3&id_measurement=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['id_measurement'];?>
"><span>Update</span></a>
		                <a class="span_link delete_measurement" style="display:inline-block; float:right" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?delete=1&id=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['customer_measurement_id'];?>
"><span style="color:red">Delete</span></a>
		            </li>
		        </ul>
		    <?php }} ?>
		</div>
		<?php }?>
		
		<?php if (isset($_smarty_tpl->getVariable('anarkali_measurements',null,true,false)->value)){?>
		<div style="border-bottom:1px dashed #cacaca;float:left; clear:both; width:100%">
		    <h2>ANARKALI KURTA MEASUREMENTS</h2>
		    <div style="width:220px;padding:0px;float:right">
		        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/anarkali-2.png" alt="measurement info" width="100%"/>
			</div>
		    <?php  $_smarty_tpl->tpl_vars['measurement'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('anarkali_measurements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['measurement']->key => $_smarty_tpl->tpl_vars['measurement']->value){
?>
		        <ul class="measurement-list">
		            <li style="padding:5px 0;text-align:center;border-bottom:1px dashed #cacaca;text-transform:capitalize;font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['measurement']->value['name_measurement'];?>
</li>
		            <li><span class="measurement-label">A. Top Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['A'];?>
</li>
		            <li class="even"><span class="measurement-label">B. Body Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['B'];?>
</li>
		            <li><span class="measurement-label">C. Shoulder: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['C'];?>
</li>
		            <li class="even"><span class="measurement-label">D. Arm Hole: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['D'];?>
</li>
		            <li><span class="measurement-label">E. Sleeve Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['E'];?>
</li>
		            <li class="even"><span class="measurement-label">F. Sleeve Loose: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['F'];?>
</li>
		            <li><span class="measurement-label">G. Neck Deep: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['G'];?>
</li>
		            <li class="even"><span class="measurement-label">H. Front Shape: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['H'];?>
</li>
		            <li><span class="measurement-label">I. Chest: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['I'];?>
</li>
		            <li class="even"><span class="measurement-label">J. Waist: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['J'];?>
</li>
		            <li><span class="measurement-label">K. Hips: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['K'];?>
</li>
		            <li style="padding:10px;margin-top:10px;border-top:1px dashed #cacaca;">
		                <a class="span_link measure_link fancybox.ajax" style="display:inline-block; float:left" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?&modal=1&m=1&type=5&id_measurement=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['id_measurement'];?>
"><span>Update</span></a>
		                <a class="span_link delete_measurement" style="display:inline-block; float:right" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?delete=1&id=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['customer_measurement_id'];?>
"><span style="color:red">Delete</span></a>
		            </li>
		        </ul>
		    <?php }} ?>
		</div>
		<?php }?>
		
		<?php if (isset($_smarty_tpl->getVariable('salwar_measurements',null,true,false)->value)){?>
		<div style="width:100%;border-bottom:1px dashed #cacaca;float:left; clear:both;">
			<div style="width:520px;float:left">
			    <h2>SALWAR MEASUREMENTS</h2>
			    <?php  $_smarty_tpl->tpl_vars['measurement'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('salwar_measurements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['measurement']->key => $_smarty_tpl->tpl_vars['measurement']->value){
?>
			        <ul class="measurement-list">
			            <li style="padding:5px 0;text-align:center;border-bottom:1px dashed #cacaca;text-transform:capitalize;font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['measurement']->value['name_measurement'];?>
</li>
			            <li><span class="measurement-label">A. Waist: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['A'];?>
</li>
			            <li class="even"><span class="measurement-label">B. Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['B'];?>
</li>
			            <li><span class="measurement-label">C. Knee Length: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['C'];?>
</li>
			            <li class="even"><span class="measurement-label">D. Knee Loose: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['D'];?>
</li>
			            <li><span class="measurement-label">E. Thigh: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['E'];?>
</li>
			            <li class="even"><span class="measurement-label">F. Ankle Loose: </span><?php echo $_smarty_tpl->tpl_vars['measurement']->value['F'];?>
</li>
			            <li style="padding:10px;margin-top:10px;border-top:1px dashed #cacaca;">
			                <a class="span_link measure_link fancybox.ajax" style="display:inline-block; float:left" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?&modal=1&m=1&type=4&id_measurement=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['id_measurement'];?>
"><span>Update</span></a>
			                <a class="span_link delete_measurement" style="display:inline-block; float:right" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
measurement.php?delete=1&id=<?php echo $_smarty_tpl->tpl_vars['measurement']->value['customer_measurement_id'];?>
"><span style="color:red">Delete</span></a>
			            </li>
			        </ul>
			    <?php }} ?>
			</div>
			<div style="width:240px;padding:0px;float:right">
				<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
styles/salwar-measurement.jpg" alt="measurement info"/>
			</div>
		</div>
		<?php }?>
		
		
		<?php if (!isset($_smarty_tpl->getVariable('blouse_measurements',null,true,false)->value)&&!isset($_smarty_tpl->getVariable('salwar_measurements',null,true,false)->value)&&!isset($_smarty_tpl->getVariable('anarkali_measurements',null,true,false)->value)&&!isset($_smarty_tpl->getVariable('kurta_measurements',null,true,false)->value)&&!isset($_smarty_tpl->getVariable('skirt_measurements',null,true,false)->value)){?>
		    <p style="font-size:18px;text-align:center;color:#cacaca">No saved Measurements</p>
		<?php }?>
	</div>
</div>
