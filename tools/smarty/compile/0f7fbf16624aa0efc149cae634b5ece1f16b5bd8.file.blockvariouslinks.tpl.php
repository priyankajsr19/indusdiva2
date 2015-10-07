<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 07:29:02
         compiled from "/var/www/indusdiva.com/themes/violettheme/modules/blockvariouslinks/beta/blockvariouslinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136596920755d13fe6977d91-86428424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f7fbf16624aa0efc149cae634b5ece1f16b5bd8' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/modules/blockvariouslinks/beta/blockvariouslinks.tpl',
      1 => 1371901138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136596920755d13fe6977d91-86428424',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="footer_wrapper">
    <div class="footer">
    <div class="footer-links">
        <ul>
            <li><strong>Company Information</strong></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
about-us.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>About us</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
contact-us.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Contact Us</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
careers.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Careers</a></li>
        </ul>
        <ul>
            <li><strong>Need Help?</strong></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
faqs.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>FAQs</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
shipping-policy.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Shipping Policy</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
return-policy.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Return Policy</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
history.php" rel="nofollow">Track Your Order</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
sitemaps/" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Popular Searches</a></li>
        </ul>
        <ul>
            <li><strong>My Account</strong></li>
            <?php if ($_smarty_tpl->getVariable('cookie')->value->isLogged()){?>
            	 <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
vcoins.php" rel="nofollow">My Account</a></li>
            	 <li><a id="referral_button" rel="nofollow" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
referral.php">Tell a friend</a></li>
            <?php }else{ ?>
            	<li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
authentication.php?back=index.php" rel="nofollow">Login/Register</a></li>
            <?php }?>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
clubv.php" rel="nofollow">Club V</a></li>
            <li><a class="lnk_shopping_bag <?php if ($_smarty_tpl->getVariable('cart_qties')->value!=0){?>hidden<?php }?>" href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
order.php" rel="nofollow">My Shopping Bag</a></li>
        </ul>
        <ul>
            <li><strong>Security and Privacy</strong></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
security.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Security</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
privacy.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Privacy Policy</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_dir')->value;?>
terms.php" <?php if (!isset($_smarty_tpl->getVariable('follow_footerlinks',null,true,false)->value)){?>rel="nofollow"<?php }?>>Terms and Conditions</a></li>
        </ul>
        <ul style="" class="payment-logos right">
            <li><b>We Accept</b></li>
            <li>
            	<img data-href="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
payment-banner.png" alt="payment gateway" width="222" height="72" style="margin:7px 0px;" class="lazy"/>
            	<noscript>
            	<img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
payment-banner.png" alt="payment gateway" width="222" height="72" style="margin:7px 0px;" />
            	</noscript>
            </li>
            <li style="text-align: right"><b>And Cash On Delivery</b></li>
		</ul>

    </div>

    <div class="follow-us right" style="display:none">
    	<p class="left snetwork"></p>
    	<div class="append left"><strong>Follow us on:</strong></div>
    	<a href="" class="icon-facebook"></a>
    	<a href="" class="icon-twitter"></a>
    </div>
    <div id="copyright" style="clear:both;">&copy;  All rights reserved.</div>
	</div>
	
	<script type="text/javascript">
		adroll_adv_id = "WU73JCHMIRH4ZOCGOQUWUE";
		adroll_pix_id = "62UYB34GCBG5HEVPPCDS6F";
		(function () {
		var oldonload = window.onload;
		window.onload = function(){
		   __adroll_loaded=true;
		   var scr = document.createElement("script");
		   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
		   scr.setAttribute('async', 'true');
		   scr.type = "text/javascript";
		   scr.src = host + "/j/roundtrip.js";
		   ((document.getElementsByTagName('head') || [null])[0] ||
		    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
		   if(oldonload){oldonload()}};
		}());
	</script>
	
</div>

