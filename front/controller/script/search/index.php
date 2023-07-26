<?php
// print_pre(decodeStr('M3E0o2yirUVWewEb3Q'));
// print_pre(decodeStr('M3A0p2yNrUNWewEb3Q'));
$menuActive = "search";
$smarty->assign("menuActive", $menuActive);
$listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js"></script>';

switch ($url->segment[1]) {
    default:

        $limitnews = 6;
        $keyword = $_GET['searchKeyword'];
        $keywordtag = intval($_GET['tag']);
        // $smarty->assign("keywordtag", $keywordtag);
        $ordernews = $_GET['order'];
        $pagenow = $_GET['page'];
        if ($pagenow == '') {
            $pagenow = '1';
        }
        $typeSearch = $_REQUEST['typeSch'] ? $_REQUEST['typeSch'] : "1" ;
        $typeOption = $_REQUEST['typeOption'] ? $_REQUEST['typeOption'] : "1" ;
        $dateStart = $_REQUEST['trip-start'];
        $dateEnd = $_REQUEST['trip-end'];

        // /*## Start GET TAG ID #####*/
        // if(!empty($keyword)){
        //     $callTag = callTag($keyword);
        // }
        // if(!empty($keywordtag)){
        //     $callTagName = callTagName($keywordtag);
        //     $smarty->assign("callTagName", $callTagName);
        // }
        // /*## END GET TAG ID #####*/

        $newhashtag = array();
        if (empty($keywordtag)) {
            if ($typeOption == 2) {
                if (!empty($keyword)) {
                    $call_hashtag_page = callTagName(null, $keyword);
                }
                foreach ($call_hashtag_page as $keycall_hashtag => $valuecall_hashtag) {
                    array_push($newhashtag, $valuecall_hashtag['id']);
                }
                // setting txt search 
                $txt =" AND (";
                foreach ($newhashtag as $keynewhashtag => $valuenewhashtag) {
                    if ($keynewhashtag > 0) {
                        $txt .= " OR ";
                    }
                    $txt .= "" . $config['cms']['db'] . "." . $config['cms']['db'] . "_tag REGEXP '.*;s:[0-9]+:\"".$valuenewhashtag."\".*'";
                }
                $txt .=")";

                /*## Start News #####*/
                $callNews = callNews($page['on'], $limitnews,null, $ordernews, $callTag, $txt, $dateStart, $dateEnd);
                /*## END News #####*/
            }else{
                /*## Start News #####*/
                $callNews = callNews($page['on'], $limitnews,$keyword, $ordernews, $callTag, $txt, $dateStart, $dateEnd);
                /*## END News #####*/
            }
        }else{
            $typeSearch = 2;
            $typeOption = 2;

            $call_hashtag_page = callTagName($keywordtag);
            $keyword = $call_hashtag_page->fields['subject'];
            foreach ($call_hashtag_page as $keycall_hashtag => $valuecall_hashtag) {
                array_push($newhashtag, $valuecall_hashtag['id']);
            }
            // setting txt search 
            $txt =" AND (";
            foreach ($newhashtag as $keynewhashtag => $valuenewhashtag) {
                if ($keynewhashtag > 0) {
                    $txt .= " OR ";
                }
                $txt .= "" . $config['cms']['db'] . "." . $config['cms']['db'] . "_tag REGEXP '.*;s:[0-9]+:\"".$valuenewhashtag."\".*'";
            }
            $txt .=")";
           
            /*## Start News #####*/
            $callNews = callNews($page['on'], $limitnews,null , $ordernews, $callTag, $txt, $dateStart, $dateEnd);
            /*## END News #####*/
        }
        $smarty->assign("callNews", $callNews);

        $smarty->assign("typeSearch", $typeSearch);
        $smarty->assign("typeOption", $typeOption);
        $smarty->assign("dateStart", $dateStart);
        $smarty->assign("dateEnd", $dateEnd);
        $smarty->assign("keyword", $keyword);


         /*## Start SEO #####*/
    
         $valPageHomeSeoTitle ="ค้นหา";
         $valPageHomeSeoDesc ="";
         $valPageHomeSeokey ="";
         $valPageHomeSeoPic ="";
         $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey,$valPageHomeSeoPic);
         $smarty->assign("seo", $valDataHomeSiteSeo);
         
         /*## End SEO #####*/

        $pagination['total'] = $callNews->_maxRecordCount;
        $pagination['totalpage'] = ceil(($pagination['total'] / $limitnews));
        $pagination['limit'] = $limitnews;
        $pagination['curent'] = $page['on'];
        $pagination['method'] = $page;
        $smarty->assign("pagination",$pagination);

        $urlfull = _FullUrl;
        $smarty->assign("urlfull", $urlfull);

        $URL = _URL;
        $smarty->assign("URL", $URL);
        
        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}

$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);