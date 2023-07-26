<?php
// print_pre(decodeStr('M3E0o2yirUVWewEb3Q'));
// print_pre(decodeStr('M3A0p2yNrUNWewEb3Q'));
$menuActive = "service";
$listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js"></script>';
$ContantID = $url->segment[2];
switch ($url->segment[1]) {
    case 'detail':
        $callNewsDetailMenu = callNewsDetail($ContantID);
        $smarty->assign("callNewsDetailMenu", $callNewsDetailMenu);
        
        $DataFile = Call_DataDetaiAlbum($callNewsDetailMenu->fields['id']);
        $smarty->assign("DataFile", $DataFile);

        $Call_DataDetailFile = Call_DataDetailFile($callNewsDetailMenu->fields['id']);
        $smarty->assign("Call_DataDetailFile", $Call_DataDetailFile);

         /*## Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $config['cmf']['masterkey'] . '_' . urldecode($callNewsDetailMenu->fields['id'])])) {
            setcookie("VIEW_DETAIL_" . $config['cmf']['masterkey'] . '_' . urldecode($callNewsDetailMenu->fields['id']), true, time() + 600);
            $viewContent = updateView($callNewsDetailMenu->fields['id'], $config['cms']['masterkey']);
        }
        /*## End Update View #####*/

         /*## Start SEO #####*/
         if($callNewsDetailMenu->fields['pic'] !== ''){
            $fullpath_pic = fileinclude($callNewsDetailMenu->fields['pic'],'real',$callNewsDetailMenu->fields['masterkey'],'link');
        }else{
            $fullpath_pic = '';
        }
        $valPageHomeSeoTitle =($callNewsDetailMenu->fields['metatitle']!='' ? $callNewsDetailMenu->fields['metatitle'] : $callNewsDetailMenu->fields['subject']);
        $valPageHomeSeoDesc =($callNewsDetailMenu->fields['description']!='' ? $callNewsDetailMenu->fields['description'] : '');
        $valPageHomeSeokey =($callNewsDetailMenu->fields['keywords']!='' ? $callNewsDetailMenu->fields['keywords'] : '');
        $valPageHomeSeoPic =($callNewsDetailMenu->fields['pic']!='' ? $fullpath_pic : '');
        $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey,$valPageHomeSeoPic);
        $smarty->assign("seo", $valDataHomeSiteSeo);
        /*## End SEO #####*/
        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail.tpl",
            "display" => "page"
        );
        break;
    default:
        $limitnews = 15;
        $keyword = $_GET['keyword'];
        $ordernews = $_GET['order'];
        $pagenow = $_GET['page'];
        if ($pagenow == '') {
            $pagenow = '1';
        }
        $callNewsDetailMenu = callNews($page['on'], $limitnews,$keyword, $ordernews);
        $smarty->assign("callNewsDetailMenu", $callNewsDetailMenu);

        /*## Start SEO #####*/

        $valPageHomeSeoTitle ="การบริการ";
        $valPageHomeSeoDesc ="";
        $valPageHomeSeokey ="";
        $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey);
        $smarty->assign("seo", $valDataHomeSiteSeo);

        /*## End SEO #####*/

        $pagination['total'] = $callNewsDetailMenu->_maxRecordCount;
        $pagination['totalpage'] = ceil(($pagination['total'] / $limitnews));
        $pagination['limit'] = $limitnews;
        $pagination['curent'] = $page['on'];
        $pagination['method'] = $page;
        $smarty->assign("pagination",$pagination);

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