<?php /* Smarty version Smarty-3.0.7, created on 2015-06-11 11:22:09
         compiled from "C:\xampp\htdocs\indusdiva/themes/violettheme//brandsizes/generic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4708557922093d9570-17892634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf623e7bba75590a06ec624d0b8016ee689b175e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\indusdiva/themes/violettheme//brandsizes/generic.tpl',
      1 => 1433380396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4708557922093d9570-17892634',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="sz_popup">
    <ul class="tabs clearfix">
        <li id="lnk_this" class="active">SIZE CHART</li>
        <li id="lnk_intl" class="inactive">SIZE GUIDE</li>
    </ul>
    <div class="sz_popup_wrap" id="intl_size_chart" style="display:none; width:auto">
        <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('tpl_dir')->value)."./intl_size_map.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </div>
    <div class="sz_popup_wrap" id="this_size_chart" style="display:block: width:auto">
        <div style="margin:0px auto" class="sizechart_data">
            <div style="border-bottom:1px dashed #cacaca">
                <h1>SIZE CHART</h1>
            </div>
	    <?php echo $_smarty_tpl->getVariable('sizechart_data')->value;?>

        </div>
    </div>
</div>


<script type="text/javascript">
$("#lnk_this").click(function(){
    $("#intl_size_chart").hide();
    $("#this_size_chart").show();
    $(this).removeClass("inactive").addClass("active");
    $("#lnk_intl").removeClass("active").addClass("inactive");
});
$("#lnk_intl").click(function(){
    $("#intl_size_chart").show();
    $("#this_size_chart").hide();
    $(this).removeClass("inactive").addClass("active");
    $("#lnk_this").removeClass("active").addClass("inactive");
});
</script>

