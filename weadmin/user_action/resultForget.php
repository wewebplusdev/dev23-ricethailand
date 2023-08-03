<?php  
$check_login_status = 1;
include("../lib/session.php");
if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("../lib/config.php");
include("../lib/connect.php");

$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";

include("../core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
                <link href="../css/theme.css" rel="stylesheet"/>
                <link href="../css/bootstrap.min.css" rel="stylesheet"/>
                <link href="../css/bootstrap-theme.min.css" rel="stylesheet"/>
                <link href="../css/font-awesome.min.css" rel="stylesheet"/>

                <title><?php   echo "".$core_name_title ; ?></title>

                <script language="JavaScript"  type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js?v=<?php   date('YmdHis');?>"></script>

                <script language="JavaScript"  type="text/javascript">
                    jQuery(function () {
                       // recaptcha v3
                       grecaptcha.ready(function () {
                            // do request for recaptcha token
                            // response is promise with passed token
                            grecaptcha
                            .execute($("#g-recaptcha-response").data("sitekey"), { action: "validate_captcha" })
                            .then(function (token) {
                                // add token value to form
                                document.getElementById("g-recaptcha-response").value = token;
                            });
                        });
                    });
                    function ChangePass(){
                        if ($('#inputPass').val() === "") {
                            $('#inputPass').focus();
                            return false;
                        }
						
						if (!CheckPassword(document.myForm.inputPass)) {
							$('#inputPass').focus();
							$('#notePass').css("color", "red")
							return false;
						}else{
							$('#notePass').css("color", "#8496aa")
						}
	 
                        if ($('#inputRePass').val() === "") {
                            $('#inputRePass').focus();
                            return false;
                        }
						
						if (!CheckPassword(document.myForm.inputRePass)) {
							$('#inputRePass').focus();
							$('#noteRePass').css("color", "red")
							return false;
						}else{
							$('#noteRePass').css("color", "#8496aa")
						}

                        if ($('#inputRePass').val() != $('#inputPass').val()) {
                            $('#inputPass').focus();
                            return false;
                        }
                            forGetPassAjax();
                            // console.log('submit');
                            return false;
                    }
                    function loadCheckUser() {
                        with(document.myForm) {
                            var inputValuename = document.myForm.inputUserName.value;
                        }
                        if (inputValuename != '') {
                            checkUsermemberRegister(inputValuename);
                        }
                    }
                    $( document ).ready(function() {
                        var urlParams = new URLSearchParams(window.location.search);
                        console.log(urlParams.get('action'));
                        if(urlParams.get('action') === 'success'){
                            $('.form-section-1').show();
                            $('.form-section-2').hide();
                            $('.form-section-3').hide();
                        }
                        else if(urlParams.get('action') === 'successfully'){
                            $('.form-section-1').hide();
                            $('.form-section-2').show();
                            $('.form-section-3').hide();
                        }
                        else{
                            $('.form-section-1').hide();
                            $('.form-section-2').hide();
                            $('.form-section-3').show();
                        }
                    });

                </script>

                <style type="text/css">
                    @media (max-width: 768px) {
                        .loginBack{height: auto; padding: 40px 15px;}
                        .new_login .login-form{margin-top: 0; width: 100%; position: relative; top: 0; transform: translate(0);}
                        .new_login .login-form .header{height: 140px; background-size: cover;}
                        .new_login .login-form .header .brand{padding-top: 40px;}
                        .new_login .login-form .header .brand img{width: 160px;}
                        .new_login .login-form .body .title{font-size: 26px; margin-bottom: 20px;}
                        .new_login .login-form .body .title small{font-size: 17px;}
                        .new_login .login-form .body{padding: 30px 20px;}
                        .new_login .footerBackOffice,
                        .new_login .footerBackOffice *{
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            box-sizing: border-box;
                        }
                        .new_login .footerBackOffice{position: relative; min-width: inherit; padding: 15px 15px;}
                        .new_login .footerBackOffice > div,
                        .new_login .footerBackOffice > div > div{display: block; width: auto; padding: 0;}
                        .new_login .footerBackOffice .imgLogo{margin: 0 0 10px 0; text-align: center; font-size: 11px;}
                        .new_login .footerBackOffice .divLogin{margin: 0; text-align: center; font-size: 12px;}
                    }
                </style>

                </head>

                <body class="new_login" style="background: url('../../upload/core/<?php   echo $valPicBgSystem?>') center;background-size: cover;">
                    <div class="loginBack">
                    <div class="form-section-1">
                        <!-- START SECTION REGISTER COMPLETE -->
                        <div class="login-form register-form success-regis">
                            <!--<div class="header" style="background: url('../upload/core/<?php   echo $valPicHeaderSystem?>') center;"> --> <!--/* PATH DEFAULT*/-->
                            <div class="header" style="background: url('') center;"> 
                                <div class="brand img-header">
                                    <img src="../img/login/regis.svg" alt="">
                                </div>
                            </div>
                            <div class="body">
                                <div class="title">
                                    เปลี่ยนรหัสผ่าน
                                    <!-- <small><?php   echo $valNameSystem?></small> -->
                                </div>
                                <form class="form-default" action="forgetpassSend.php" method="post" name="myForm" id="myForm">
                                    <input type="hidden" name="action" value="changepass">
                                    <input type="hidden" name="token" value="<?php   echo $_REQUEST['token'] ?>">
                                    <div class="form-group form-register">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label class="control-label">รหัสผ่าน</label>
                                            </span>
                                            <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                                        </div>
                                        <div style="text-align:left;">
                                            	<span class="formFontNoteTxt" id="notePass"><?php  echo  $langTxt["note:password"] ?></span>
                                           	</div>
                                    </div>
                                    <div class="form-group form-register">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label class="control-label">ยืนยันรหัสผ่าน</label>
                                            </span>
                                            <input class="form-control" type="password" name="inputRePass" id="inputRePass" placeholder="">
                                        </div>
                                        <div style="text-align:left;">
                                            	<span class="formFontNoteTxt" id="noteRePass"><?php  echo  $langTxt["note:password"] ?></span>
                                           	</div>
                                    </div>
                                    <div class="btn-flex">
                                        <div class="form-btn btn-register">
                                            <div class="btn btn-primary btn-register" onclick="backLogin();"><div class="btn-register-back"><?php   echo  $langTxt["regis:btnback"] ?></div></div>
                                        </div>
                                        <div class="form-btn btn-register">
                                            <script src="https://www.google.com/recaptcha/api.js?render=<?php   echo $recaptcha_sitekey; ?>"></script>
                                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" data-sitekey="<?php   echo $recaptcha_sitekey; ?>">
                                            <div class="btn btn-primary btn-register" onclick="ChangePass();"><div class="btn-register-back"><?php   echo $langTxt["regis:btnsubmit"] ?></div></div>
                                        </div>
                                    </div>
                                </form>
                                <div style="display:none;" id="loadAlertreCaptcha">
                                    <img src="../img/btn/error.png" align="absmiddle" hspace="10" /><?php   echo  $langTxt["regis:alertRecap"] ?>
                                </div>
                                <div style="display:none;" id="loadAlertLogin">
                                    <img src="../img/btn/error.png" align="absmiddle" hspace="10" /><?php   echo  $langTxt["regis:alertForget"] ?>
                                </div>
                            </div>
                        </div>
                        <!-- END SECTION REGISTER COMPLETE -->
                    </div>
                    <div class="form-section-2" style="display: none;">
                        <!-- START SECTION REGISTER COMPLETE -->
                        <div class="login-form register-form success-regis">
                            <!--<div class="header" style="background: url('../upload/core/<?php   echo $valPicHeaderSystem?>') center;"> --> <!--/* PATH DEFAULT*/-->
                            <div class="header" style="background: url('../upload/core/') center;"> 
                                <div class="brand img-header">
                                    <img src="../img/login/icon-succes.svg" alt="">
                                </div>
                            </div>
                            <div class="body">
                                <div class="title success">
                                    <!-- Verify account successfully.
                                    <small>Please press the confirm button to continue.</small>
                                    <br> -->
                                    ยืนยันการเปลี่ยนรหัสผ่านเรียบร้อยแล้ว
                                    <small class="default top">เปลี่ยนรหัสผ่านเสร็จสมบูรณ์ ยินดีต้อนรับเข้าสู้ระบบ </small>
                                    <small class="default">ขอขอบพระคุณที่ใช้บริการ</small>
                                    <br>
                                </div>
                                <div class="btn btn-primary btn-register btn-small" onclick="backLogin();"><div class="btn-register-back"><?php   echo $langTxt["regis:btnsubmit"] ?></div></div>
                            </div>
                        </div>
                        <!-- END SECTION REGISTER COMPLETE -->
                    </div>
                    <div class="form-section-3" style="display: none;">
                        <!-- START SECTION REGISTER FAIL -->
                        <div class="login-form register-form success-regis">
                            <!--<div class="header" style="background: url('../upload/core/<?php   echo $valPicHeaderSystem?>') center;"> --> <!--/* PATH DEFAULT*/-->
                            <div class="header" style="background: url('../upload/core/') center;"> 
                                <div class="brand img-header">
                                    <img src="../img/login/icon-fail.svg" alt="">
                                </div>
                            </div>
                            <div class="body">
                                <div class="title bad">
                                    <!-- Verify account fail.
                                    <small>Please press the confirm button to continue.</small>
                                    <br> -->
                                    เกิดความผิดพลาดในการขอเปลี่ยนรหัสผ่าน
                                    <small class="default top">ระบบไม่พบข้อมูลการการขอเปลี่ยนรหัสผ่านของท่าน</small>
                                    <small class="default">กรุณาตรวจสอบ link การยืนยันการเป็นสมาชิกใหม่อีกครั้ง </small>
                                    <br>
                                </div>
                                <div class="btn btn-primary btn-register btn-small" onclick="backLogin();"><div class="btn-register-back"><?php   echo $langTxt["regis:btnsubmit"] ?></div></div>
                            </div>
                        </div>
                        <!-- END SECTION REGISTER FAIL -->
                    </div>
                        <div id="loadCheckComplete"></div>
                    </div>

                    <div class="loginBack" style="display: none;">
                        <!-- <div class="loginBack-wrapper">
                            <div class="login-header">
                                <img src="../upload/core/<?php   echo $valPicSystem?>" height="100" />
                            </div>
                            <div class="login-body">
                                <div class="title">
                                    <?php   echo $valTitleSystem?>
                                </div>
                                <div class="login-form">
                                    <form action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                                        <input  id="inputUrl" name="inputUrl" type="hidden"   value="<?php   echo  $uID ?>">

                                        <div class="form-group">
                                            <label class="control-label">ชื่อผู้ใช้</label>
                                            <div class="control-group">
                                                <span class="fa fa-user"></span>
                                                <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="ชื่อผู้ใช้">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">รหัสผ่าน</label>
                                            <div class="control-group">
                                                <span class="fa fa-key"></span>
                                                <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="รหัสผ่าน">
                                            </div>
                                        </div>

                                        <div class="form-btn">
                                            <input class="btn btn-primary" name="input" type="submit" value="<?php   echo  $langTxt["login:btn"] ?>" onclick="submitLogin();" />
                                        </div>
                                    </form>
                                    <div style="display:none;" id="loadAlertLogin">
                                        <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?php   echo  $langTxt["login:alert"] ?>
                                    </div>
                                </div>

                                <div class="mainLogin" style="display:none;">
                                    <div class="mLeftLogin">
                                        <div class="lBoxContantLogin">
                                            <div class="cycle1Login"></div>
                                            <div class="cycleTContantLogin"><?php   echo  $langTxt["login:permis"] ?></div>
                                            <div class="clearAll"></div>
                                            <div class="cycleBContantLogin"><?php   echo  $langTxt["login:permisDe"] ?></div>
                                        </div>
                                    </div>
                                    <div class="mCenterLogin">
                                        <div class="cBoxContantLogin">
                                            <div class="cycle2Login"></div>
                                            <div class="cycleTContantLogin"><?php   echo  $langTxt["login:time"] ?></div>
                                            <div class="clearAll"></div>
                                            <div class="cycleBContantLogin"><?php   echo  $langTxt["login:timeDe"] ?></div>
                                        </div>
                                    </div>
                                    <div class="mRightLogin">
                                        <div class="rBoxContantLogin">
                                            <div class="cycle3Login"></div>
                                            <div class="cycleTContantLogin"><?php   echo  $langTxt["login:price"] ?></div>
                                            <div class="clearAll"></div>
                                            <div class="cycleBContantLogin"><?php   echo  $langTxt["login:priceDe"] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="login-footer">
                                © Copy right 2017. All rights reserved by <?php   echo $valNameSystem?>.
                            </div>
                        </div>

                        <div id="loadCheckComplete"></div> -->

                        <!-- #################### Head ###############  -->
                        <!-- <div class="headBackOfficeLogin">
                            <div class="imgLogoLogin"><img src="img/logo/logoLogin.PNG" /></div>
                            <div class="txtLogoLogin">
                                <h1 class="title"><?php   echo  $valNameSystem ?></h1>
                                <h3 class="subtitle"><?php   echo  $valTitleSystem ?></h3>
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
                                                <h1 class="title"><?php   echo  $valNameSystem ?></h1>
                                                <h3 class="subtitle"><?php   echo  $valTitleSystem ?></h3>
                                            </div>
                                        </div>
                                        <div class="boxLogin" style="width:394px; float:right; padding:30px;">
                                            <form action="index.php" method="post" name="myFormLogin" id="myFormLogin"    >
                                                <input  id="inputUrl" name="inputUrl" type="hidden"   value="<?php   echo  $uID ?>"/>
                                                <div style="font:600 normal 36px 'Helvethaica Mon'; margin:0 0 10px; float:left;"><?php   echo  $langTxt["login:btn"] ?></div>
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
                                                <input name="input" type="submit" value="<?php   echo  $langTxt["login:btn"] ?>" class="login-btn"  onclick="submitLogin();" />
                                            </form>
                                            <div style="clear:both; height:20px;">
                                            </div>
                                            <div style="font:600 normal 19px 'Helvethaica Mon'; margin:0 0 10px;display:none;" id="loadAlertLogin">
                                                <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?php   echo  $langTxt["login:alert"] ?>
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
                                    <div class="cycleTContantLogin"><?php   echo  $langTxt["login:permis"] ?></div>
                                    <div class="clearAll"></div>
                                    <div class="cycleBContantLogin"><?php   echo  $langTxt["login:permisDe"] ?></div>
                                </div>
                            </div>
                            <div class="mCenterLogin">
                                <div class="cBoxContantLogin">
                                    <div class="cycle2Login"></div>
                                    <div class="cycleTContantLogin"><?php   echo  $langTxt["login:time"] ?></div>
                                    <div class="clearAll"></div>
                                    <div class="cycleBContantLogin"><?php   echo  $langTxt["login:timeDe"] ?></div>
                                </div>
                            </div>
                            <div class="mRightLogin">
                                <div class="rBoxContantLogin">
                                    <div class="cycle3Login"></div>
                                    <div class="cycleTContantLogin"><?php   echo  $langTxt["login:price"] ?></div>
                                    <div class="clearAll"></div>
                                    <div class="cycleBContantLogin"><?php   echo  $langTxt["login:priceDe"] ?></div>
                                </div>
                            </div>
                        </div> -->


                        <!-- #################### Footer ###############  -->
                        <!-- <div class="footerBackOffice">
                            <div class="imgLogo"><?php   echo  $langTxt["login:footecopy"] ?></div>
                            <div class="divLogin"><?php   echo  $langTxt["login:footecontact"] ?></div>
                        </div>
                        <div id="loadCheckComplete"></div>
                        <div class="clearAll"></div> -->
                    </div>

<div class="footerBackOffice">
    <div>
	    <div class="imgLogo"><?php   echo  $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php   echo 'Current PHP Version: ' . phpversion(); ?></i></div>
	    <div class="divLogin"><?php   echo  $langTxt["login:footecontact"] ?></div>
	</div>
</div>
                    <div id="tallContent" style="display:none">
                        <span style="font-size:18px;">Please waiting.</span>
                        <div style="height:10px;"></div>
                        <img src="../img/loader/login.gif" />
                    </div>
                    <?php   wewebDisconnect($coreLanguageSQL); ?>
                </body>
                </html>
