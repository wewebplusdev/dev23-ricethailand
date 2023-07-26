<?php
$menuActive = "defult";
// $listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js"></script>';

switch ($url->segment[1]) {

    default:
        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}

$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
