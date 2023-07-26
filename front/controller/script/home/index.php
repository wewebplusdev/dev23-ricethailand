<?php
// print_pre(decodeStr('M3E0o2yirUVWewEb3Q'));
// print_pre(decodeStr('M3A0p2yNrUNWewEb3Q'));
$menuActive = "home";
$menuDetail = "detail";
$listjs[] = '<script src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js"></script>';

/*## Start SEO #####*/

$valPageHomeSeoTitle ="หน้าหลัก";
$valPageHomeSeoDesc ="";
$valPageHomeSeokey ="";
$valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey);
$smarty->assign("seo", $valDataHomeSiteSeo);

/*## End SEO #####*/

$callGroup = callGroup(null,2);
foreach($callGroup as $keycallGroup => $valuecallGroup){
    $idgroup[$keycallGroup] = $valuecallGroup[0];
}
// print_pre($idgroup);


$callGroupHome = callGroupcountHome('Home');
$data_count = array();
foreach ($callGroupHome as $keycallGroupHome => $valuecallGroupHome) {
	$callNewsGroupHome = callNewsGroupHome($valuecallGroupHome['id']);
	if ($callNewsGroupHome->_numOfRows > 0) {
		$data_count[$keycallGroupHome]['subject'] = $valuecallGroupHome['subject'];
		$data_count[$keycallGroupHome]['data'] = number_format($callNewsGroupHome->_numOfRows);
		$data_count[$keycallGroupHome]['masterkey'] = $callNewsGroupHome->fields['masterkey'];
		$data_count[$keycallGroupHome]['gid'] = $valuecallGroupHome['id'];
	}
}
// print_pre($data_count);
$smarty->assign("data_count", $data_count);

$callNewsGroup1 = callNewsGroup1($idgroup[0],12);
$smarty->assign("callNewsGroup1", $callNewsGroup1);

$numrowcallNewsGroup1 = callNewsGroup1($idgroup[0]);
$smarty->assign("NumRowcallNewsGroup1", $numrowcallNewsGroup1->_numOfRows);

$callNewsGroup2 = callNewsGroup1($idgroup[1],10);
$smarty->assign("callNewsGroup2", $callNewsGroup2);

$numrowcallNewsGroup2 = callNewsGroup1($idgroup[1]);
$smarty->assign("NumRowcallNewsGroup2", $numrowcallNewsGroup2->_numOfRows);


$numrowcallPlanKm = callPlanKm();
$smarty->assign("numrowcallPlanKm", $numrowcallPlanKm->_numOfRows);



$callActivetyGroup = callActivetyGroup(12);
$smarty->assign("callActivetyGroup", $callActivetyGroup);


/*## Start Serive ##*/ 
$callService = callService();
$smarty->assign("callService", $callService);
/*## End Serive ##*/ 

// /*## Start weblink ##*/ 
// $callWeblink = callWeblink();
// $smarty->assign("callWeblink", $callWeblink);
// /*## End weblink ##*/ 

/*## Start About ##*/ 
$callAbout = callAbout();
$smarty->assign("callAbout", $callAbout);
$smarty->assign("datenow", date('Y-m-d'));
/*## End About ##*/ 

/*## Start CoPs ##*/ 
$callNewsList = callNewsList($config['ban']['masterkey']);
$smarty->assign("callNewsList", $callNewsList);
/*## End CoPs ##*/ 

$urlfull = _FullUrl;
$smarty->assign("urlfull", $urlfull);

$settingPage = array(
    "page" => $menuActive,
    "template" => "index.tpl",
    "display" => "page"
);
$smarty->assign("menuActive", $menuActive);
$smarty->assign("menuDetail", $menuDetail);
$smarty->assign("fileInclude", $settingPage);