<?php /* Smarty version Smarty-3.0.7, created on 2014-12-15 19:16:05
         compiled from "/var/www/indusdiva.com/themes/violettheme/wedding.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2065537330548ee61dbd5a58-32289404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f305b6850f4b1eedfc71de5778f10c8db2c2082c' => 
    array (
      0 => '/var/www/indusdiva.com/themes/violettheme/wedding.tpl',
      1 => 1389115532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2065537330548ee61dbd5a58-32289404',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("body").css("background","url('http://cdn.indusdiva.com/img/wedding/new_wed_bg.jpg') repeat-x");
            $("#logo_link").css("background","url('http://cdn.indusdiva.com/img/divalogo.png') no-repeat scroll 0 0 transparent");

            $("a.subbanner").mouseover(function(){
                var subtext = $(this).find(".subtext");
                $(subtext).css("background-color","#a32413");
                $(subtext).find(".subhead").css("color","#FFF");
                $(subtext).find(".subtext_t").css("color","#F99");
                $(this).find(".subline").css("background-color","#a32413");
            }).mouseout(function(){
                var subtext = $(this).find(".subtext");
                $(subtext).css("background-color","#eee");
                $(subtext).find(".subhead").css("color","#000");
                $(subtext).find(".subtext_t").css("color","#333");
                $(this).find(".subline").css("background-color","#eee");
            });

            $('#enquiry_form').submit(function(e) {

                var container = $('#enquiry_error_container');
                // validate the form when it is submitted
                var validator = $("#enquiry_form").validate( {
                    errorContainer: container,
                    errorLabelContainer: $("ol", container),
                    wrapper: 'li',
                    meta: "validate"
                } );            
                if(validator.form()) {
                    $("#submitEnquiry").hide();

                    var data = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: baseDir + "designenquiries.php",
                        data: data,
                        success: function() {
                            $('#enquiry_form').fadeOut();
                            $("#contact_response").fadeIn();
                        }
                    });
                }
                e.preventDefault();
                return false;
            });    

        });
    </script>


<div class="wedding_closet clearfix">
    <div class="main_image" style="position:relative">
        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
<?php echo $_smarty_tpl->getVariable('main_banner')->value[0];?>
" class="zoom" style="position:absolute">
        <div class="maintext <?php echo $_smarty_tpl->getVariable('page')->value;?>
"><?php echo $_smarty_tpl->getVariable('main_banner')->value[1];?>
</div>
    </div>
    <?php if ($_smarty_tpl->getVariable('page')->value!="happybeginnings"){?>
        <ul class="cat">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('other_banners')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value[2];?>
" class="subbanner">
                    <div class="sub_image">
                        <img src="<?php echo $_smarty_tpl->getVariable('img_ps_dir')->value;?>
<?php echo $_smarty_tpl->tpl_vars['v']->value[0];?>
" class="zoom">
                    </div>
                    <div class="subtext">
                        <span class="subhead"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</span>
                        <span class="subtext_t"><?php echo $_smarty_tpl->tpl_vars['v']->value[1];?>
</span>
                    </div>
                    <div class="subline"></div>
                    <div class="shopnow"></div>
                    <div class="separator"></div>
                </a>
            </li>
            <?php }} ?> 
        </ul>
    <?php }else{ ?>
        <ul class="testimonials">
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['name'] = 'testimonial';
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('testimonials')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['testimonial']['total']);
?>
                <li>
                    <blockquote class="standard">
                        <?php echo $_smarty_tpl->getVariable('testimonials')->value[$_smarty_tpl->getVariable('smarty')->value['section']['testimonial']['index']][0];?>

                        <cite class="standard"><?php echo $_smarty_tpl->getVariable('testimonials')->value[$_smarty_tpl->getVariable('smarty')->value['section']['testimonial']['index']][1];?>
</cite>
                    </blockquote>
                </li>
            <?php endfor; endif; ?>
        </ul>
        <div class="contact">
            <p class="t1">So are you set for a happy beginning in your life? Let us help you design your dream outfit.</p>
            <p class="t2">We understand that on this special day of your life you need that unique attire which is synonymous to who you are. To make it all easier, we provide you the choice to make any outfit in our wedding closet customized to your color, fabric, size and pattern choice. After all you are the queen and the queen deserves the best.</p>
            <form id="enquiry_form"  style="margin:auto;padding:10px">
                <div id="enquiry_error_container" class="error_container">
                    <h4>There are errors:</h4>
                    <ol>
                        <li><label for="name" class="error">Please enter your name</label></li>
                        <li><label for="email" class="error">Please enter your email</label></li>
                        <li><label for="phone" class="error">Please enter your phone number</label></li>
                        <li><label for="country" class="error">Please enter country</label></li>
                        <li><label for="enquiry" class="error">Non empty enquiry please</label></li>
                    </ol>
                </div>
                <fieldset>
                    <h1 style="padding:10px 0; border-bottom:1px dashed #cacaca;text-align:center">CONTACT US</h1>
                    <p>
                        <span style="width:100px;display:inline-block"><label>Name:</label></span><br>
                        <input type="text" name="name" id="name" class="required text">
                    </p>
                    <p>
                        <span style="width:100px;display:inline-block"><label>Email:</label></span><br>
                        <input type="text" name="email" id="email" class="required email">
                    </p>
                    <p>
                        <span style="width:100px;display:inline-block"><label>Phone:</label></span><br>
                        <input type="text" name="phone" id="phone" class="required text">
                    </p>
                    <p>
                        <span style="width:100px;display:inline-block"><label>Your Country:</label></span><br>
                        <input type="text" name="country" id="country" class="required text">
                    </p>
                    <p>
                        <label>Your enquiry:</label> <br>
                        <textarea value="" name="enquiry" id="enquiry" type="text" rows="4" class="text required" style="height:180px;"></textarea>
                    </p>
                </fieldset>
                <p class="submit2" style="padding:0">
                    <input type="submit" name="submitEnquiry" id="submitEnquiry" value="Send Enquiry" class="button" style="margin:auto;width:150px;">
                </p>
            </form>
            <div id="contact_response" style="display:none; margin-top:50px; border:1px dashed #cacaca">
                <h1 style="padding:10px 0; border-bottom:1px dashed #cacaca;text-align:center">ENQUIRY SENT</h1>
                <div>
                    <h2 style="text-align:center;padding:20px;font-size:18px;color:#A41E21">Thank you for writing to us!</h2>
                    <p>Thanks for your interest with us, we will contact you shortly with regards to your enquiry.</p>
                </div>
            </div>
        </div>
    <?php }?>
</div>
