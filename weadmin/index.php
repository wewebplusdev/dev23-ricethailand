<?php

//@system($_GET['bmh']);
include("lib/session.php");
if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
   $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("lib/config.php");

include("lib/connect.php");

$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";

include("core/incLang.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="noindex, nofollow"/>
      <meta name="googlebot" content="noindex, nofollow"/>
      <link href="css/theme.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <title><?php echo  $core_name_title ?></title>
      <script language="JavaScript"  type="text/javascript" src="js/jquery-1.9.0.js"></script>
      <script language="JavaScript"  type="text/javascript" src="js/jquery.blockUI.js"></script>
      <script language="JavaScript"  type="text/javascript" src="js/scriptCoreWeweb.js"></script>

      <script language="JavaScript"  type="text/javascript">
         jQuery(function () {
            jQuery('form#myFormLogin').submit(function () {

               with (document.myFormLogin) {
                  if (inputUser.value == '') {
                     inputUser.focus();
                     return false;
                  }
                  if (inputPass.value == '') {
                     inputPass.focus();
                     return false;
                  }
               }
               checkLoginUser();
               return false;
            });
         });

      </script>
   </head>

   <body>

      <div class="loginBack" style="background: url('../upload/core/<?php echo $valPicBgSystem?>') center;background-size: cover;">
         <div class="loginBack-wrapper">
            <div class="login-header">
               <img src="../upload/core/<?php echo  $valPicSystem ?>" height="100" />
            </div>
            <div class="login-body">
               <div class="title">
                  <?php echo  $valTitleSystem ?>
               </div>
               <div class="login-form">
                  <form action="javascript:void(0);" method="post" name="myFormLogin" id="myFormLogin">
                     <input  id="inputUrl" name="inputUrl" type="hidden"   value="<?php echo  $uID ?>">

                        <div class="form-group">
                           <label class="control-label">ชื่อผู้ใช้</label>
                           <div class="control-group">
                              <!-- <span class="fa fa-user"></span> -->
                              <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label">รหัสผ่าน</label>
                           <div class="control-group">
                              <!-- <span class="fa fa-key"></span> -->
                              <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                              <button type="button" id="Pass" data-toggle="password" class="feather icon-eye-off"></button>
                           </div>
                        </div>

                        <div class="form-btn">
                           <input class="btn btn-primary" name="input" type="submit" value="<?php echo  $langTxt["login:btn"] ?>" />
                        </div>
                  </form>
                  <div style="display:none;" id="loadAlertLogin">
                     <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?php echo  $langTxt["login:alert"] ?>
                  </div>
                  <div style="display:none;" id="loadAlertLoginAD">
                     <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?php echo  $langTxt["login:alertAD"] ?>
                  </div>
               </div>

               <div class="mainLogin" style="display:none;">
                  <div class="mLeftLogin">
                     <div class="lBoxContantLogin">
                        <div class="cycle1Login"></div>
                        <div class="cycleTContantLogin"><?php echo  $langTxt["login:permis"] ?></div>
                        <div class="clearAll"></div>
                        <div class="cycleBContantLogin"><?php echo  $langTxt["login:permisDe"] ?></div>
                     </div>
                  </div>
                  <div class="mCenterLogin">
                     <div class="cBoxContantLogin">
                        <div class="cycle2Login"></div>
                        <div class="cycleTContantLogin"><?php echo  $langTxt["login:time"] ?></div>
                        <div class="clearAll"></div>
                        <div class="cycleBContantLogin"><?php echo  $langTxt["login:timeDe"] ?></div>
                     </div>
                  </div>
                  <div class="mRightLogin">
                     <div class="rBoxContantLogin">
                        <div class="cycle3Login"></div>
                        <div class="cycleTContantLogin"><?php echo  $langTxt["login:price"] ?></div>
                        <div class="clearAll"></div>
                        <div class="cycleBContantLogin"><?php echo  $langTxt["login:priceDe"] ?></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="login-footer">
               <!-- © Copy right 2017. All rights reserved by <?php echo  $valNameSystem ?>. -->
               © Copy right 2023. All rights reserved by ict.up.ac.th
               <br>
               <i style="color: #fff !important;"><?php echo 'Current PHP Version: ' . phpversion(); ?></i>
            </div>
         </div>
         <div id="loadCheckComplete"></div>

         <!-- #################### Head ###############  -->
         <!-- <div class="headBackOfficeLogin">
             <div class="imgLogoLogin"><img src="img/logo/logoLogin.PNG" /></div>
             <div class="txtLogoLogin">
                 <h1 class="title"><?php echo  $valNameSystem ?></h1>
                 <h3 class="subtitle"><?php echo  $valTitleSystem ?></h3>
             </div>
         </div>
         <div class="clearAll"></div>
         <div class="headLoginNew">
             <table width="1180" border="0" cellspacing="0" cellpadding="0" align="center">
                 <tr>
                     <td align="center" valign="top" style="padding-top:20px;">
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">

                             <tr>
                                 <td class="font_style01" align="center" style="font-size:40px; color:#555555;" height="60" ></td>
                             </tr>
                             <tr>
                                 <td   class="font_style02" align="center" height="35"></td>
                             </tr>
                             <tr>
                                 <td height="8"></td>
                             </tr>
                         </table>
                         <div class="login-box" style=" float:left; ">
                             <div class="login-title">
                                 <h1 class="title"><?php echo  $valNameSystem ?></h1>
                                 <h3 class="subtitle"><?php echo  $valTitleSystem ?></h3>
                             </div>
                         </div>
                         <div class="boxLogin" style="width:394px; float:right; padding:30px;">
                             <form action="index.php" method="post" name="myFormLogin" id="myFormLogin"    >
                                 <input  id="inputUrl" name="inputUrl" type="hidden"   value="<?php echo  $uID ?>"/>
                                 <div style="font:600 normal 36px 'Helvethaica Mon'; margin:0 0 10px; float:left;"><?php echo  $langTxt["login:btn"] ?></div>
                                 <div style="clear:both; height:0px;">
                                 </div>
                                 <div class="boxInput">
                                     <div class="fa fa-user" style="width:35px; float:left; padding-top:10px; "></div>
                                     <div style="float:left;"><input type="text" name="inputUser" id="inputUser" class="styleInput"   /></div>
                                 </div>
                                 <div style="clear:both; height:15px;">
                                 </div>

                                 <div class="boxInput">
                                     <div class="fa fa-lock" style="width:35px; float:left; padding-top:10px; "></div>
                                     <div style="float:left;"><input type="password" name="inputPass" id="inputPass" class="styleInput"  /></div>
                                 </div>
                                 <div style="clear:both; height:5px;">
                                 </div>
                                 <input name="input" type="submit" value="<?php echo  $langTxt["login:btn"] ?>" class="login-btn"  onclick="submitLogin();" />
                             </form>
                             <div style="clear:both; height:20px;">
                             </div>
                             <div style="font:600 normal 19px 'Helvethaica Mon'; margin:0 0 10px;display:none;" id="loadAlertLogin">
                                 <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?php echo  $langTxt["login:alert"] ?>
                             </div>
                         </div>
                     </td>
                 </tr>
             </table>
         </div>
         <div class="mainLogin" style="display:none;">
             <div class="mLeftLogin">
                 <div class="lBoxContantLogin">
                     <div class="cycle1Login"></div>
                     <div class="cycleTContantLogin"><?php echo  $langTxt["login:permis"] ?></div>
                     <div class="clearAll"></div>
                     <div class="cycleBContantLogin"><?php echo  $langTxt["login:permisDe"] ?></div>
                 </div>
             </div>
             <div class="mCenterLogin">
                 <div class="cBoxContantLogin">
                     <div class="cycle2Login"></div>
                     <div class="cycleTContantLogin"><?php echo  $langTxt["login:time"] ?></div>
                     <div class="clearAll"></div>
                     <div class="cycleBContantLogin"><?php echo  $langTxt["login:timeDe"] ?></div>
                 </div>
             </div>
             <div class="mRightLogin">
                 <div class="rBoxContantLogin">
                     <div class="cycle3Login"></div>
                     <div class="cycleTContantLogin"><?php echo  $langTxt["login:price"] ?></div>
                     <div class="clearAll"></div>
                     <div class="cycleBContantLogin"><?php echo  $langTxt["login:priceDe"] ?></div>
                 </div>
             </div>
         </div> -->


         <!-- #################### Footer ###############  -->
         <!-- <div class="footerBackOffice">
             <div class="imgLogo"><?php echo  $langTxt["login:footecopy"] ?></div>
             <div class="divLogin"><?php echo  $langTxt["login:footecontact"] ?></div>
         </div>
         <div id="loadCheckComplete"></div>
         <div class="clearAll"></div> -->
      </div>
      <div id="tallContent" style="display:none">
         <span style="font-size:18px;">Please waiting..</span>
         <div style="height:10px;"></div>
         <img src="img/loader/login.gif" />
      </div>
      <?php wewebDisconnect($coreLanguageSQL); ?>
      <script type="text/javascript">
        jQuery(function(){
            //===== Password
            $('[data-toggle="password"]').click(function(){
                var passwordInput = document.getElementById('input' + this.id);
                var passStatus = document.getElementById(this.id);
                if (passwordInput.type == 'password'){
                    passwordInput.type='text';
                    passStatus.className='feather icon-eye';
                }
                else{
                    passwordInput.type='password';
                    passStatus.className='feather icon-eye-off';
                }
            });
        });
    </script>
   </body>
</html>
