<?php
// print_pre(decodeStr('M3E0o2yirUVWewEb3Q'));
// print_pre(decodeStr('M3A0p2yNrUNWewEb3Q'));
$menuActive = "statistics";
$listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js?v='.date('YmdHis').'"></script>';

$slected = $_REQUEST['slected'];
$smarty->assign("slected", $slected);

/*## Start Group Agency #####*/
$callGroup = callGroupstatic($config['cmg']['masterkeyagen']);
$smarty->assign("callGroup", $callGroup);
/*## End Group Agency #####*/

/*## Start Group News #####*/
$callGroupNews = callGroupCard($config['cmg']['masterkey']);
$smarty->assign("callGroupNews", $callGroupNews);
/*## End Group News #####*/

/*## Start Group News #####*/
$callGroupChart = callGroupstatic($config['cmg']['masterkey']);
$smarty->assign("callGroupChart", $callGroupChart);
// print_pre($callGroupChart->_numOfRows);
/*## End Group News #####*/

/*## Start Group Agency #####*/
$callGroupYear = callGroupstatic($config['cmg']['masterkeyyear']);
$smarty->assign("callGroupYear", $callGroupYear);
/*## End Group Agency #####*/

 /*## Start SEO #####*/

 $valPageHomeSeoTitle ="สถิตินวัตกรรมระดับกรม";
 $valPageHomeSeoDesc ="";
 $valPageHomeSeokey ="";
 $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey);
 $smarty->assign("seo", $valDataHomeSiteSeo);

 /*## End SEO #####*/


$settingPage = array(
    "page" => $menuActive,
    "template" => "index.tpl",
    "display" => "page"
);

$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);