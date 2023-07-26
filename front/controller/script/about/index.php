<?php
$menuActive = "about";
$listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js"></script>';
$ContantID = $url->segment[1];
switch ($url->segment[1]) {
    default:
        $callNewsDetailMenu = callNewsDetail();
        $smarty->assign("callNewsDetailMenu", $callNewsDetailMenu);

        $callNewsDetail = callNewsDetail($ContantID);
        $smarty->assign("callNewsDetail", $callNewsDetail);
        
        $DataFile = Call_DataDetailFile($callNewsDetail->fields['id']);
        $smarty->assign("DataFile", $DataFile);

        /*## Start SEO #####*/
        if($callNewsDetail->fields['pic'] !== ''){
            $fullpath_pic = fileinclude($callNewsDetail->fields['pic'],'real',$callNewsDetail->fields['masterkey'],'link');
        }else{
            $fullpath_pic = '';
        }
        $valPageHomeSeoTitle =($callNewsDetail->fields['metatitle']!='' ? $callNewsDetail->fields['metatitle'] : $callNewsDetail->fields['subject']);
        $valPageHomeSeoDesc =($callNewsDetail->fields['description']!='' ? $callNewsDetail->fields['description'] : '');
        $valPageHomeSeokey =($callNewsDetail->fields['keywords']!='' ? $callNewsDetail->fields['keywords'] : '');
        $valPageHomeSeoPic =($callNewsDetail->fields['pic']!='' ? $fullpath_pic : '');
        $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey,$valPageHomeSeoPic);
        $smarty->assign("seo", $valDataHomeSiteSeo);
        /*## End SEO #####*/

        /*## Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $config['album']['masterkey'] . '_' . urldecode($callNewsDetail->fields['id'])])) {
            setcookie("VIEW_DETAIL_" . $config['album']['masterkey'] . '_' . urldecode($callNewsDetail->fields['id']), true, time() + 600);
            $viewContent = updateView($callNewsDetail->fields['id'], $config['album']['masterkey']);
        }
        /*## End Update View #####*/

        $urlfull = _FullUrl;
        $smarty->assign("urlfull", $urlfull);
        
        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);