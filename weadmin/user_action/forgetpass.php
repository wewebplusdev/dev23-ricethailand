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

                <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>

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

                    function forgetpass(){
                        if($('#inputEmail').val() === ""){
                            $('#inputEmail').focus();
                            return false;
                        }
                        const email = $("#inputEmail").val();
                        if(!validateEmail(email)){
                            $('#inputEmail').focus();
                            return false;
                        }
                        forGetPassAjax();
                            // console.log('submit');
                            return false;
                    }

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

                <body class="new_login" style="background: url('') center;background-size: cover;">
                    <div class="loginBack">
                        <div class="form-section-1">
                            <!-- START SECTION CHANGE FORM -->
                            <div class="login-form register-form success-regis">
                                <!--<div class="header" style="background: url('../upload/core/<?php   echo $valPicHeaderSystem?>') center;"> --> <!--/* PATH DEFAULT*/-->
                                <div class="header" style="background: url('') center;"> 
                                    <div class="brand img-header">
                                        <img src="../img/login/regis.svg" alt="">
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="title">
                                        ลืมรหัสผ่าน
                                        <!-- <small><?php   echo $valNameSystem?></small> -->
                                    </div>
                                    <form class="form-default" action="forgetpassSend.php" method="post" name="myForm" id="myForm">
                                        <div class="form-group form-register">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <label class="control-label">Email</label>
                                                </span>
                                                <input class="form-control" type="email" name="inputEmail" id="inputEmail" placeholder="">
                                            </div>
                                        </div>
                                        <div class="btn-flex">
                                            <div class="form-btn btn-register">
                                                <div class="btn btn-primary btn-register" onclick="goBack();"><div class="btn-register-back"><?php   echo  $langTxt["regis:btnback"] ?></div></div>
                                            </div>
                                            <div class="form-btn btn-register">
                                                <script src="https://www.google.com/recaptcha/api.js?render=<?php   echo $recaptcha_sitekey; ?>"></script>
                                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" data-sitekey="<?php   echo $recaptcha_sitekey; ?>">
                                                <div class="btn btn-primary btn-register" onclick="forgetpass();"><div class="btn-register-back"><?php   echo $langTxt["regis:btnsubmit"] ?></div></div>
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
                            <!-- END SECTION CHANGE FORM -->
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
                                        แจ้งจดหมายขอเปลี่ยนรหัสผ่านเรียบร้อยแล้ว
                                        <small class="default top">กรุณาตรวจสอบจดหมายตาม Email ที่ท่านได้แจ้งไว้</small>
                                        <br>
                                    </div>
                                    <div class="btn btn-primary btn-register btn-small" onclick="backLogin();"><div class="btn-register-back"><?php   echo $langTxt["regis:btnsubmit"] ?></div></div>
                                </div>
                            </div>
                            <!-- END SECTION REGISTER COMPLETE -->
                        </div>
                        <div id="loadCheckComplete"></div>
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
