<?php  
include("lib/session.php");
if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("lib/config.php");
include("lib/connect.php");

$keys = array_keys($_SESSION);
foreach ($keys as $key) {
    //If the key is found in your string, set $found to true
    if (preg_match('/core_session/', $key)) {
        if (preg_match('/core_session_language/', $key)) {
            $_SESSION[$key] = "Thai";
        }else{
            $_SESSION[$key] = "";
        }
    }
}

include("core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="css/theme.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />


    <title><?php   echo $core_name_title; ?></title>
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.7.0.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery.blockUI.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/scriptCoreWeweb.js"></script>

    <script language="JavaScript" type="text/javascript">
        jQuery(function() {
            jQuery('form#myFormLogin').submit(function() {
                with(document.myFormLogin) {
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

            // recaptcha v3
            grecaptcha.ready(function() {
                // do request for recaptcha token
                // response is promise with passed token
                grecaptcha
                    .execute($("#g-recaptcha-response").data("sitekey"), {
                        action: "validate_captcha"
                    })
                    .then(function(token) {
                        // add token value to form
                        document.getElementById("g-recaptcha-response").value = token;
                    });
            });
        });
    </script>

    <style type="text/css">
        @media (max-width: 768px) {
            .loginBack {
                height: auto;
                padding: 40px 15px;
            }

            .new_login .login-form {
                margin-top: 0;
                width: 100%;
                position: relative;
                top: 0;
                transform: translate(0);
            }

            .new_login .login-form .header {
                height: 140px;
                background-size: cover;
            }

            .new_login .login-form .header .brand {
                padding-top: 40px;
            }

            .new_login .login-form .header .brand img {
                width: 160px;
            }

            .new_login .login-form .body .title {
                font-size: 26px;
                margin-bottom: 20px;
            }

            .new_login .login-form .body .title small {
                font-size: 17px;
            }

            .new_login .login-form .body {
                padding: 30px 20px;
            }

            .new_login .footerBackOffice,
            .new_login .footerBackOffice * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .new_login .footerBackOffice {
                position: relative;
                min-width: inherit;
                padding: 15px 15px;
            }

            .new_login .footerBackOffice>div,
            .new_login .footerBackOffice>div>div {
                display: block;
                width: auto;
                padding: 0;
            }

            .new_login .footerBackOffice .imgLogo {
                margin: 0 0 10px 0;
                text-align: center;
                font-size: 11px;
            }

            .new_login .footerBackOffice .divLogin {
                margin: 0;
                text-align: center;
                font-size: 12px;
            }
        }
    </style>

</head>

<body class="new_login" style="background: url('../upload/core/<?php   echo $valPicBgSystem ?>') center;background-size: cover;">
    <div class="loginBack">
        <div class="login-form">
            <div class="header" style="background: url('../upload/core/<?php   echo $valPicHeaderSystem ?>') center;">
                <div class="brand">
                    <img src="../upload/core/<?php   echo $valPicSystem ?>" alt="">
                </div>
            </div>
            <div class="body">
                <div class="title">
                    ยินดีต้อนรับเข้าสู่ระบบ
                    <small><?php   echo $valNameSystem ?></small>
                </div>

                <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                    <input id="inputUrl" name="inputUrl" type="hidden" value="<?php   echo  $uID ?>">
                    <input id="inputSite" name="inputSite" type="hidden" value="">
                    <div class="select-site">
                            <div class="form-group">
                                <div class="input-group -box-input">
                                    <span class="input-group-addon">
                                        <label class="control-label">ชื่อผู้ใช้</label>
                                    </span>
                                    <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group -box-input">
                                    <span class="input-group-addon">
                                        <label class="control-label">รหัสผ่าน</label>
                                    </span>
                                    <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                                </div>
                            </div>
                            <div class="form-btn">
                                <script src="https://www.google.com/recaptcha/api.js?render=<?php   echo $recaptcha_sitekey; ?>"></script>
                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" data-sitekey="<?php   echo $recaptcha_sitekey; ?>">
                                <input class="btn btn-primary submit" name="input" type="submit" value="<?php   echo  $langTxt["login:btn"] ?>"/>
                            </div>
                        <div class="border-line"><span>หรือ</span></div>
                        <div class="form-btn btn-register">
                            <input class="btn btn-primary" name="input" type="submit" value="<?php   echo  $langTxt["regis:btn"] ?>" onclick="submitregister();" />
                        </div>
                        <div class="flex-right"><a href="javascript:void(0);" onclick="forGetPass()">ลืมรหัสผ่าน</a></div>
                    </div>

                    <div class="show-site">
                        <div class="form-group wg-item">
                            <!-- <div class="cover">
                                <a href="javascript:void(0);" class="link">
                                    <img src="https://www.w3schools.com/css/paris.jpg" alt="Paris">
                                    <div class="desc">Knowledge and Information Systems</div>
                                </a>
                            </div>
                            <div class="cover">
                                <a href="javascript:void(0);" class="link">
                                    <img src="https://www.w3schools.com/css/paris.jpg" alt="Paris">
                                    <div class="desc">DIOS Systems</div>
                                </a>
                            </div> -->
                        </div>
                    </div>

                    <div style="display:none;" id="loadAlertLogin">
                        <img src="img/btn/error.png" align="absmiddle" hspace="10" /><span id="text-append"></span>
                    </div>
                    <!-- <div style="display:none;" id="loadAlertreCaptcha">
                        <img src="img/btn/error.png" align="absmiddle" hspace="10" /><?php   echo  $langTxt["regis:alertRecap"] ?>
                    </div> -->
                    <div style="display:none;margin-top: 15px;" id="loadAlertLoginOA"></div>

                </form>

            </div>
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
        <span style="font-size:18px;">Please waiting..</span>
        <div style="height:10px;"></div>
        <img src="img/loader/login.gif" />
    </div>
    <?php   wewebDisconnect($coreLanguageSQL); ?>
</body>

</html>