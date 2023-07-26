<?php
$menuActive = "404"; 

# seo setting
Seo('404 not found', '404 not found', '404 not found'); 
$settingPage = array(
    "page" => "404",
    "template" => "index.tpl",
    "display" => "page-404"
);
//print_pre($settingPage);
 
// $smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header-404.tpl");
$smarty->assign("footer", "inc-footer-404.tpl");