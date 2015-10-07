<!-- <link rel="stylesheet" type="text/css" href="../themes/violettheme/css/bootstrap.min.css"> -->
      <style type="text/css">
            /*////// RESET STYLES //////*/
          
            img
            {
              -ms-interpolation-mode: bicubic;
              } /* Force IE to smoothly render resized images. */
            body, table, p, a, li, blockquote
            {
              -ms-text-size-adjust:auto; -webkit-text-size-adjust:auto;
              } /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */

      

            /*////// FRAMEWORK STYLES //////*/
            .flexibleContainerCell
            {
              padding-top:20px; padding-Right:20px; padding-Left:20px;
            }
            .flexibleImage
            {
              height:auto;
            }
            .bottomShim
            {
              padding-bottom:20px;
            }
            .imageContent, .imageContentLast
            {
              padding-bottom:20px;
            }
            .nestedContainerCell
            {
              padding-top:20px; padding-Right:20px; padding-Left:20px;
            }

           

            /*////// MOBILE STYLES //////*/
            @media only screen and (max-width: 580px){          
                /*////// CLIENT-SPECIFIC STYLES //////*/
                body
                {
                  width:auto !important; min-width:auto !important;
                  } /* Force iOS Mail to render the email at full width. */

                /*////// FRAMEWORK STYLES //////*/
                /*
                    CSS selectors are written in attribute
                    selector format to prevent Yahoo Mail
                    from rendering media query styles on
                    desktop.
                */
                table[id="emailBody"], table[class="flexibleContainer"]
                {
                  vertical-align: left;
                  width:50%;
                }

                /*
                    The following style rule makes any
                    image classed with 'flexibleImage'
                    fluid when the query activates.
                    Make sure you add an inline max-width
                    to those images to prevent them
                    from blowing out. 
                */
                img[class="flexibleImage"]
                {
                  height:60%; width:40%;
                }

                /*
                    Make buttons in the email span the
                    full width of their container, allowing
                    for left- or right-handed ease of use.
                */
            

                td[class="textContentLast"], td[class="imageContentLast"]

                {
                  padding-top:20px !important;
                }

             
            }
        </style>
 <body>
        <center>
            <table border="0" cellpadding="0" cellspacing="0" height="auto" width="auto" id="bodyTable">
                <tbody><tr>
                    <td align="center" valign="top" id="bodyCell">
                        <!-- EMAIL CONTAINER // -->
                        <!--
                            The table "emailBody" is the email's container.
                            Its width can be set to 100% for a color band
                            that spans the width of the page.
                        -->
                        <table border="0" cellpadding="0" cellspacing="0" width="auto" id="emailBody">

<div  style="background-color: #ffffff !important; margin: 0; padding: 0">
 <style type="text/css">
      
           


           
              @media only screen and (max-width: 580px){          
             body
             {
              width:100px ;
              min-width:100px ;
            } 
           img 
           {
            width:100px ;
              min-width:100px ;
           }
           .dd{
            left: 0%;
           
           }

              }
            
            
        </style>

    <table border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff" width="auto">
        <tbody>
            <tr>
                <td align="center" class="dd">
                
 <table  border="0" cellpadding="0" cellspacing="0" width="auto" class="flexibleContainer">
 
   <tbody>

      <tr>
  
       <td class="flexibleContainerCell">
          <table border="0" cellpadding="0" cellspacing="0" width="auto">
           <tbody>
            <tr>
             <td valign="top" class="imageContent">
              <td   style="padding-bottom: 0px">
                <a href="http://www.indusdiva.com/new-in" target="blank"><img  class="flexibleImage" alt="{$c_name}" src="{$b_image}" style="height: auto; width: auto;" /></a>
               </td>
              </td>
            </tr>
          </tbody>
         </table>
        </td>
    </tr>
  
    <tr>
      <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td align="center" height="40px">
                <span style="font-size:10px;font-family: tahoma, geneva, sans-serif;">care@indusdiva.com |  +91-80-67309079 (24x7) | Connect with us</span>
                &nbsp;
                <a href="https://www.facebook.com/IndusDiva"> <img alt="IndusDiva on Facebook" src="http://www.elabs11.com/content/2011000046/facebook.png" style="width: 21px; height: 21px;" /></a>
                &nbsp;
                <a href="http://twitter.com/IndusDiva"><img alt="IndusDIva on Twitter" src="http://www.elabs11.com/content/2011000046/twitter.png" style="width: 21px; height: 21px;" /></a>
                &nbsp;
                <a href="http://pinterest.com/indusdiva/"><img alt="IndusDiva on Pintrest" src="http://www.elabs11.com/content/2011000046/pintrest.png" style="width: 21px; height: 21px;" /></a>
                &nbsp;
                &nbsp;
                &nbsp;
                <a href="http://www.indusdiva.com?{$utm_url}" style="text-decoration:none;color:#111"><span style="font-size:10px;font-family: tahoma, geneva, sans-serif;">www.indusdiva.com</span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td align="center">
                <span style="font-family: Tahoma, sans-serif; font-size: 10px; line-height: 12px; color: #3b3434; text-align: center;">
                    You opted in to this receive this newsletter from IndusDiva. 
                    Click <a style="text-decoration:underline" href="http://www.indusdiva.com/newsletter.php?unsub_key={$unsub_key}">here</a> to unsubscribe
                </span>`
                <span style="font-size:12px;font-family: tahoma, geneva, sans-serif;">&copy;2012 indusdiva.com</span>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
    
                </td>
            </tr>
        </tbody>
    </table>
</div>

</table>
                        <!-- // EMAIL CONTAINER -->
                    </td>
                </tr>
            </tbody></table>
        </center>
    
</body>