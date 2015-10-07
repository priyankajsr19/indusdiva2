<?php
include(dirname(__FILE__).'/config/config.inc.php');

//will be initialized bellow...
if(intval(Configuration::get('PS_REWRITING_SETTINGS')) === 1)
	$rewrited_url = null;

include(dirname(__FILE__).'/init.php');
include(dirname(__FILE__).'/header.php');
?>
<div style="width:980px;padding:0px;">
    <h1 style="padding: 10px;border-bottom:1px dashed #cacaca">GET 3 FOR THE PRICE OF 2 (G3P2) PROMOTION</h1>
    <h2>HOW DOES THIS SCHEME WORK?</h2>
    <p style="padding:10px;">It’s very easy, all you need to do is pick any 3 products and put them in your shopping bag. Once done, the LOWEST value product gets automatically discounted and is absolutely free. Likewise if you have 4 or 5 products in your bag the cheapest product of them will be 100% discounted,  however if you have 6 products in your cart, then the lowest 2 products will be discounted and will thus be free</p>

      <h2>DO ALL PRODUCTS COME IN THIS SCHEME?</h2>
    <p style="padding:10px;">YES, all products qualify for this scheme.</p>
      <h2>WHAT ABOUT SHIPPING COST AND CUSTOMIZATION COST?</h2>
    <p style="padding:10px;">Like always if your basket value is above $100 shipping is absolutely free Worldwide. And remember shipping is always free in India. Please refer to our shipping policy here <a href="http://www.indusdiva.com/shipping-policy.php" style="color: blue;">http://www.indusdiva.com/shipping-policy.php</a> Customization cost on discounted (Free) products will however have to be paid in full.</p>




 



    <h2>WHAT ABOUT DELIVERIES?</h2>
    <p style="padding:10px;">Please note that products brought in the G3P2 scheme can only be shipped together strictly. If you have three products, the delivery time of the product that has the longest 'Time for Delivery' will be considered. This includes customization time if any,</p>

   <h2>WHAT IF A PRODUCT YOU HAVE CHOSEN IS NOT AVAILABLE?</h2>
    <p style="padding:10px;">At the outset we try to avoid these situations as much as possible, however, in the event that this happens, you will be requested to choose an alternative equivalent value item as a replacement. In case you are not satisfied by that, we will be pleased to issue you store credit of the same value which you can redeem at any other time on any product online at Indusdiva. Finally, if you prefer a refund, we will process a refund of the value of the product that is not delivered. Our customer service team will be there to assist you on your options. </p>
    <h2>PLEASE READ THESE OTHER TERMS TO REDEEM THESE VOUCHERS</h2>

   <p> 1.     You should be registered/logged into your account to avail this offer.<br>

    2.     Order value limit excludes shipping and customization charges.</p>



<!-- 
    <ol style="list-style-type:decimal;padding:10px;">
        <li>15 USD Voucher, valid on orders above USD 100, valid for 30 days from registration</li>
        <li>30 USD Voucher, valid on orders above USD 200, valid for 60 days from registration</li>
        <li>55 USD Voucher, valid on orders above USD 300, valid for 90 days from registration</li>
        <li>You can use one voucher in a single order.</li>
	<li>Order value limit excludes shipping and customization charges.</li>
	<li>You can use the vouchers for all products at IndusDiva.</li>
    </ol> -->
    
</div>
<?php
include(dirname(__FILE__).'/footer.php');
?>
