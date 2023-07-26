<?php 
$path_root = ""; #ถ้า root ไม่ได้อยู่ public
define("_http", "http");

if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || 
   $_SERVER['HTTPS'] == 1) ||  
   isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&   
   $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
{
   $redirect = _http . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: ' . $redirect);
   exit();
}

define("_DIR", str_replace("\\", '/', dirname(__FILE__)));
define("_URI", basename($_SERVER["REQUEST_URI"]));
define("_URL", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "/");
define("_FullUrl", _http . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define("_Domain", _http . "://" . $_SERVER['HTTP_HOST']);
define("_URLPagination", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "");

require_once _DIR . '/front/libs/config.php'; #load config
require_once _DIR . '/front/libs/setting.php'; #load setting
require_once _DIR . '/front/libs/function.php'; #load function
require_once _DIR . '/front/libs/url.php'; #load url
// die;
require_once _DIR . '/front/libs/Mobile_Detect.php'; #load url
##check divice ##
$detectDivice = new Mobile_Detect;

## load modulus ##
#require_once _DIR . '/front/controller/modulus/breadcrumb.php'; #load breadcrumb
require_once _DIR . '/front/controller/modulus/member.php'; #load member status

// ## Facebook
require_once _DIR . '/front/libs/facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '2290129911118989', // Replace {app-id} with your app id
    'app_secret' => '72681fb65d4ca748a928352baad4060c',
    'default_graph_version' => 'v10.0',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl(_URL . 'member/facebook-callback/', $permissions);
$smarty->assign("loginFacebook", htmlspecialchars($loginUrl));
//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
## End Facebook

## member ##
$member = new member;
if (isset($_SESSION[_URL]['token'])) {
    $member->tokenCheck();
} else {
    if (isset($_COOKIE['token']) && !isset($_SESSION[_URL]['reboot'])) {
        $member->reloadUser();
    } else {
        $member->tokenCreate();
    }
}
$memberID = $member->tokenGetUser();
if (!empty($memberID['member_info'])) {
    $smarty->assign("userinfo", $memberID);
}
$member->saveCookie();

$memberLogin = method_exists($member, 'login_status') ? $member->login_status() : 0;

if (!empty($memberLogin)) {
    $smarty->assign("login", true);
} else {
    $smarty->assign("login", false);
}

// die('test');
## call page ##
$url = new url;

$linklang = configlang($url->pagelang[2]);
// $linklang = _URL;


// print_pre($linklang);
// print_pre($url_show_default);
// die('ex...');

if (empty($url->segment[0])) {
    header("Location:" . $linklang . "/" . $url_show_default);
    exit();
}

$smarty->assign("ul", $linklang);
$smarty->assign("langon", $url->pagelang[2]);

if (!empty($url->uri['terms'])) {
    header("Location:" . $linklang . "/terms/" . $url->uri['terms']);
    exit();
}

$page = pagepagination($url);
$smarty->assign("page", $page);


## popup ##
//print_pre($_SESSION);
if (!empty($_SESSION['alert'])) {
    $smarty->assign("alertpopup", $_SESSION['alert']);
}
if (!empty($_SESSION['alertsubmit'])) {
    $smarty->assign("alertsubmitModal", $_SESSION['alertsubmit']);
}
if (!empty($_SESSION['modalcall'])) {
    $smarty->assign("modalcall", $_SESSION['modalcall']);
}


##  lang ##
$lang = array();
require_once _DIR . '/front/libs/lang/' . $lang_default . '.php'; #load url
if ($lang_default != $url->pagelang[2]) {
    require_once _DIR . '/front/libs/lang/' . $url->pagelang[2] . '.php'; #load url
}


## addon page ##
$loadcate = $url->loadmodulus(array("_mainpage", "home", "member"));
foreach ($loadcate as $loadmodulus) {
    include_once $loadmodulus;
}

## load page ##
$pageload = $url->page();
foreach ($pageload['load'] as $loadpage) {
    include_once $loadpage;
}

## addon API ##
// $load_api = $url->loadmodulus_api();



# assign active menu
if (empty($menuActive)) {
    $menuActive = "home";
}
$smarty->assign("navactive", $menuActive);
// $smarty->assign("social_url", $social_url);
$smarty->assign("lastModify", $lastModify);
$smarty->assign("home", $url_show_default);
$smarty->assign("lang", $lang);
$smarty->assign("assigncss", $listcss);
$smarty->assign("assignjs", $listjs);
$smarty->assign("template", _URL . $path_template[$templateweb][0]);
$smarty->assign("base", _URL);
$smarty->assign("fullurl", _FullUrl);
$smarty->assign("Domain", _Domain);

$smarty->assign("urlPagination", _URLPagination);


// $keyrecaptcha = "6LeGXeEUAAAAAPMtIbEl10Ojy06x3AVTKidFvUIP";
// $smarty->assign("keyrecaptcha", $keyrecaptcha);

####  inc-file
$smarty->assign("incfile", $incfile);

if (!empty($settingPage)) {
    $smarty->display($settingPage['display'] . ".tpl");
}
//$smarty->display("test.tpl");

$db->Close();

#==============================================================##
## page loadder sec ##
// $time = microtime();
// $time = explode(' ', $time);
// $time = $time[1] + $time[0];
// $finish = $time;
// $total_time = round(($finish - $start), 4);
// echo 'Page generated in '.$total_time.' seconds.';
