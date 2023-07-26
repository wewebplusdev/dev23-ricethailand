<?php
// print_pre(decodeStr('M3E0o2yirUVWewEb3Q'));
// print_pre(decodeStr('M3A0p2yNrUNWewEb3Q')); 
$valSetVersionTemp = "?v=".date('YmdHis');
$menuActive = "activity";
$menuDetail = "detail";
$listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js'.$valSetVersionTemp.'"></script>';
// print_pre($url->segment[1]);
$GroupID = $url->segment[1];
$ContantID = $url->segment[3];

switch ($url->segment[2]) {
    case 'detail':
        $smarty->assign("NavbarsActive", $GroupID);

        $searchYear = $_GET['searchYear'];
        $searchAgency = $_GET['searchAgency'];
        $searchSdate = $_GET['searchSdate'];
        $searchEdate = $_GET['searchEdate'];
        $searchKeyword = $_GET['searchKeyword'];
        $smarty->assign("searchYear", $searchYear);
        $smarty->assign("searchAgency", $searchAgency);
        $smarty->assign("searchSdate", $searchSdate);
        $smarty->assign("searchEdate", $searchEdate);
        $smarty->assign("searchKeyword", $searchKeyword);
        
        $search = "?";
        $search .= "searchYear=".$searchYear."&searchAgency=".$searchAgency."&searchSdate=".$searchSdate."&searchEdate=".$searchEdate."&searchKeyword=".$searchKeyword."";
        $smarty->assign("search", $search);

        $listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/scriptDetail2.js'.$valSetVersionTemp.'"></script>';
        $callNewsDetailData = callNewsDetailData($ContantID);
        $smarty->assign("callNewsDetailData", $callNewsDetailData);

        /*## Start Check Tag #####*/
        // $smarty->assign("tagArr", unserialize($callNewsDetailData->fields['tag']));
        $callDataTag = callDataTag(unserialize($callNewsDetailData->fields['tag']));
        $smarty->assign("callDataTag", $callDataTag);
        /*## End Check Tag #####*/

        $callNewsDetailDataFooter = callNewsDetailFooter($GroupID,15,$ContantID);
        $smarty->assign("callNewsDetailDataFooter", $callNewsDetailDataFooter);

        $Call_DataDetaiAlbum = Call_DataDetaiAlbum($callNewsDetailData->fields['id']);
        $smarty->assign("Call_DataDetaiAlbum", $Call_DataDetaiAlbum);

        $Call_DataDetailFile = Call_DataDetailFile($callNewsDetailData->fields['id']);
        $smarty->assign("Call_DataDetailFile", $Call_DataDetailFile);

        $callDwnData = callDownloadData($callNewsDetailData->fields['dwnid']);
        $smarty->assign("callDwnData", $callDwnData);
        $smarty->assign("table_cmg", $config['cmg']['db']);
        /*## Start Check next id and previous id #####*/
        $callmapID = callmapID(callNewsDetailMapID($GroupID, null, null, $ordernews, $searchYear, $searchAgency, $searchSdate, $searchEdate, $searchKeyword));
        // $callmapID = callmapID(callNewsDetailFooter($GroupID));
        // print_pre($callmapID);
        foreach ($callmapID as $keycallmapID => $valuecallmapID) {
            if($ContantID == $valuecallmapID){
                if($callmapID[$keycallmapID-1] !== null ){
                    $nextid = $callmapID[$keycallmapID-1];
                    $displaynext = '';
                }else{
                    $nextid = '';
                    $displaynext = 'invisible';
                }
                if($callmapID[$keycallmapID+1] !== null ){
                    $previous = $callmapID[$keycallmapID+1];
                    $displaypre= '';
                }else{
                    $previous = '';
                    $displaypre= 'invisible';
                }
                break;
            }
        }
        $smarty->assign("nextid", $nextid);
        $smarty->assign("nextpage", $displaynext);
        $smarty->assign("previousid", $previous);
        $smarty->assign("previouspage", $displaypre);
        /*## End Check next id and previous id #####*/

        /*## Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $config['cms']['masterkey'] . '_' . urldecode($callNewsDetailData->fields['id'])])) {
        setcookie("VIEW_DETAIL_" . $config['cms']['masterkey'] . '_' . urldecode($callNewsDetailData->fields['id']), true, time() + 600);
        $viewContent = updateView($callNewsDetailData->fields['id'], $config['cms']['masterkey']);
        }
        /*## End Update View #####*/

        /*## Start SEO #####*/
        if($callNewsDetailData->fields['pic'] !== ''){
            $fullpath_pic = fileinclude($callNewsDetailData->fields['pic'],'real',$callNewsDetailData->fields['masterkey'],'link');
        }else{
            $fullpath_pic = '';
        }
        $valPageHomeSeoTitle =($callNewsDetailData->fields['metatitle']!='' ? $callNewsDetailData->fields['metatitle'] : $callNewsDetailData->fields['subject']);
        $valPageHomeSeoDesc =($callNewsDetailData->fields['description']!='' ? $callNewsDetailData->fields['description'] : '');
        $valPageHomeSeokey =($callNewsDetailData->fields['keywords']!='' ? $callNewsDetailData->fields['keywords'] : '');
        $valPageHomeSeoPic =($callNewsDetailData->fields['pic']!='' ? $fullpath_pic : '');
        $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey,$valPageHomeSeoPic);
        $smarty->assign("seo", $valDataHomeSiteSeo);
        /*## End SEO #####*/

        $urlfull = _FullUrl;
        $smarty->assign("urlfull", $urlfull);
        
        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail2.tpl",
            "display" => "page"
        );
        break;


    default:
	
		$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/assets/css/datepicker.css'.$valSetVersionTemp.'">';
		$listjs[] = '<script src="front/controller/script/'.$menuActive.'/js/bootstrap-datepicker.js'.$valSetVersionTemp.'"></script>';
		$listjs[] = '<script src="front/controller/script/'.$menuActive.'/js/bootstrap-datepicker-thai.js'.$valSetVersionTemp.'"></script>';
		$listjs[] = '<script src="front/controller/script/'.$menuActive.'/js/locales/bootstrap-datepicker.th.js'.$valSetVersionTemp.'"></script>';
		$listjs[] = '<script src="front/controller/script/'.$menuActive.'/js/datepicker.js'.$valSetVersionTemp.'"></script>';
		
	
		$dataNewsGroupDetail =callNewsGroupDetail($GroupID);
		$valNavEnd = $dataNewsGroupDetail->fields['subject'];
		$smarty->assign("valNavEnd", $valNavEnd);
		
        
        $smarty->assign("NavbarsActive", $GroupID);

        $limitnews = 16;
        $searchYear = $_GET['searchYear'];
        $searchAgency = $_GET['searchAgency'];
        $searchSdate = $_GET['searchSdate'];
        $searchEdate = $_GET['searchEdate'];
        $searchKeyword = $_GET['searchKeyword'];
        $smarty->assign("searchYear", $searchYear);
        $smarty->assign("searchAgency", $searchAgency);
        $smarty->assign("searchSdate", $searchSdate);
        $smarty->assign("searchEdate", $searchEdate);
        $smarty->assign("searchKeyword", $searchKeyword);
        // print_pre($keywordAgency);

        $search = "?";
		if($searchSdate!="" || $searchEdate!="" || $searchKeyword!=""){
			$search .= "searchSdate=".$searchSdate."&searchEdate=".$searchEdate."&searchKeyword=".$searchKeyword."";
		}else{
			$search = "";
		}
        $smarty->assign("search", $search);

        $ordernews = $_GET['order'];
        $pagenow = $_GET['page'];
        if ($pagenow == '') {
            $pagenow = '1';
        }
        $callNewsDetail = callNewsDetail($GroupID, $page['on'], $limitnews, $ordernews, $searchYear, $searchAgency, $searchSdate, $searchEdate, $searchKeyword);
        $smarty->assign("callNewsDetail", $callNewsDetail);

         /*## Start SEO #####*/
         $valPageHomeSeoTitle = $callNewsDetail->fields['subjectg'];
         $valPageHomeSeoDesc ="";
         $valPageHomeSeokey ="";
         $valPageHomeSeoPic ="";
         $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey,$valPageHomeSeoPic);
         $smarty->assign("seo", $valDataHomeSiteSeo);
         /*## End SEO #####*/

         /*## Set up pagination #####*/
         $pagination['total'] = $callNewsDetail->_maxRecordCount;
         $pagination['totalpage'] = ceil(($pagination['total'] / $limitnews));
         $pagination['limit'] = $limitnews;
         $pagination['curent'] = $page['on'];
         $pagination['method'] = $page;
         $smarty->assign("pagination",$pagination);
         /*## Set up pagination #####*/
 
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
$smarty->assign("menuDetail", $menuDetail);
$smarty->assign("fileInclude", $settingPage);