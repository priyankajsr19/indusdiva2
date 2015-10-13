<?php /* Smarty version Smarty-3.0.7, created on 2015-10-07 14:49:35
         compiled from "C:\xampp\htdocs\indusdiva2/themes/violettheme/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78155614e3a77e2109-87202397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2078b9870221b64b01dcc1ffc5beaf07a4c85495' => 
    array (
      0 => 'C:\\xampp\\htdocs\\indusdiva2/themes/violettheme/index.tpl',
      1 => 1444162496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78155614e3a77e2109-87202397',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\xampp\htdocs\indusdiva2\tools\smarty\plugins\modifier.escape.php';
?><?php echo $_smarty_tpl->getVariable('HOOK_HOME')->value;?>

    
    <div id="grid">
    <ul>
    	<li id="ban1">
    		<a href ="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
513-menswear">
    	        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
banners/Menswear_Bottom_20132811.jpg" alt="Indusdiva Menswear Collection">
			</a>
    	</li>
    	<li id="ban2">
    		<a href ="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
513-menswear">
    	        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
banners/Menswear_Bottom_20132811.jpg" alt="Indusdiva Menswear Collection">
			</a>
    	</li>
    	<li id="ban3">
    		<a href ="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
513-menswear">
    	        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
banners/Menswear_Bottom_20132811.jpg" alt="Indusdiva Menswear Collection">
			</a>
    	</li>
    	<li id="ban4">
    		<a href ="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
513-menswear">
    	        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
banners/Menswear_Bottom_20132811.jpg" alt="Indusdiva Menswear Collection">
			</a>
    	</li>
    </ul>

    </div>
<?php if (isset($_smarty_tpl->getVariable('recently_viewed',null,true,false)->value)&&count($_smarty_tpl->getVariable('recently_viewed')->value)>0){?>
<script>
	// execute your scripts when the DOM is ready. this is mostly a good habit
	$(function() {
	
		// initialize scrollable
		$(".scrollable").scrollable();
		$(".scroll").scrollable({ circular: true }).click(function() {
		      $(this).data("scrollable").next();
		      });
	
	});
</script>
<div id="recent_pane" class="product_group_panes" style="padding-top: 10px;">
	<div style="float: left;">
		<span id="recent_head" class="home_pane_title"></span>
		<span class="panes_bar"></span>
	</div>
	<div class="products_block_medium">
		<a class="prev browse left">Prev</a>
		<div class="scrollable">
			<div class="items">
				<?php  $_smarty_tpl->tpl_vars['productitem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recently_viewed')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['productitem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['productitem']->iteration=0;
 $_smarty_tpl->tpl_vars['productitem']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['recentProducts']['index']=-1;
if ($_smarty_tpl->tpl_vars['productitem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['productitem']->key => $_smarty_tpl->tpl_vars['productitem']->value){
 $_smarty_tpl->tpl_vars['productitem']->iteration++;
 $_smarty_tpl->tpl_vars['productitem']->index++;
 $_smarty_tpl->tpl_vars['productitem']->first = $_smarty_tpl->tpl_vars['productitem']->index === 0;
 $_smarty_tpl->tpl_vars['productitem']->last = $_smarty_tpl->tpl_vars['productitem']->iteration === $_smarty_tpl->tpl_vars['productitem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['recentProducts']['first'] = $_smarty_tpl->tpl_vars['productitem']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['recentProducts']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['recentProducts']['last'] = $_smarty_tpl->tpl_vars['productitem']->last;
?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['recentProducts']['first']==true||$_smarty_tpl->getVariable('smarty')->value['foreach']['recentProducts']['index']%5==0){?>
				<div>
					<ul>
						<?php }?>
						<li class="ajax_block_product" rel="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['id_product'];?>
">
							<div class="product_card">
								<?php if ($_smarty_tpl->tpl_vars['productitem']->value['quantity']<=0){?> <img alt="Out Of Stock" src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
out_of_stock_vs.png" style="margin: 0 0; position: absolute; left: 1px; top: 0px;" /> <?php }?> <a href="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_link'];?>
"> <span class="product_image_medium" href="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_link'];?>
"
										title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['productitem']->value['name'],'html','UTF-8');?>
">
										<?php if (isset($_smarty_tpl->getVariable('lazy',null,true,false)->value)&&$_smarty_tpl->getVariable('lazy')->value==1){?> <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
blank.jpg" data-href="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['image_link_medium'];?>
" height="205" width="150" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['productitem']->value['name'],'html','UTF-8');?>
" class="delaylazy" />
										<noscript>
											<img src="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['image_link_medium'];?>
" height="205" width="150" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['productitem']->value['name'],'html','UTF-8');?>
" />
										</noscript>
										<?php }else{ ?> <img src="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['image_link_medium'];?>
" height="205" width="150" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['productitem']->value['name'],'html','UTF-8');?>
" /> <?php }?>
									</span> <span class="product-list-name">
										<h2 class="product_card_name"><?php echo smarty_modifier_escape(smarty_modifier_truncate($_smarty_tpl->tpl_vars['productitem']->value['name'],100,'...'),'htmlall','UTF-8');?>
</h2>
									</span> <span class="product_info">
										<?php if ($_smarty_tpl->getVariable('price_tax_country')->value==110){?>
										<span class="price">
											<?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['productitem']->value['offer_price_in']),$_smarty_tpl);?>

										</span>
										<?php }else{ ?>
										<span class="price">
											<?php echo Product::convertAndShow(array('price'=>$_smarty_tpl->tpl_vars['productitem']->value['offer_price']),$_smarty_tpl);?>

										</span>
										<?php }?>
									</span>
								</a>
							</div>
						</li> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['recentProducts']['index']%5==4||$_smarty_tpl->getVariable('smarty')->value['foreach']['recentProducts']['last']==true){?>
					</ul>
				</div>
				<?php }?> <?php }} ?>
			</div>
		</div>
		<a class="next browse right" style="display: block;">Next</a>
	</div>
</div>
<?php }?>
<div id="fb-root"></div>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId  : '285166361588635',
            xfbml  : true,
            oauth : true
          });
          FB.Event.subscribe('edge.create',function(response) {
              var datastring = 'ajax=true&fb_page_like=1';
              $.ajax({
                  type: 'POST',
                  url: baseDir + 'feedback.php',
                  data: datastring,
                  dataType: 'json',
                  success: function(result){
                      if(result.feedback_status === 'succeeded') {}
                  }
              });
          });
          FB.Event.subscribe('edge.remove',function(response) {
              var datastring = 'ajax=true&fb_page_like=2';
              $.ajax({
                  type: 'POST',
                  url: baseDir + 'feedback.php',
                  data: datastring,
                  dataType: 'json',
                  success: function(result){
                      if(result.feedback_status === 'succeeded'){}
                  }
              });
          });
    };
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=285166361588635";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

