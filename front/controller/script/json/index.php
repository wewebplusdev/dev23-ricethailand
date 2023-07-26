<?php
$menuActive = "json";
if (!empty($url->segment[1])) {
    $explo1 = explode(".json",$url->segment[1]);
    $explo2 = explode("Thai",$explo1[0]);

    $masterkey = $explo2[0]; //masterkey
    $group = $explo2[1]; //group
    // print_pre($masterkey);
    // print_pre($group);

    if (!empty($group)){
        $GroupID = $url->segment[1];
        // print_pre($GroupID);
    
        switch ($masterkey) {
            case 'nw':
                $callNews = jsonNews($masterkey,$group,100);
                $callNameGroup = jsonGroupNews($masterkey,$callNews->fields[7]); //ส่ง group ไปค้นหา
                $linkRSSDetail = _URL."news/".$callNameGroup->fields[0]."/detail";
                $TitleRSS = $callNameGroup->fields[2];
                $urlRss = _URL.'news/'.$group;
                // print_pre($linkRSSDetail);
                require_once _DIR . '/front/controller/script/'.$menuActive.'/create.php';
    
                break;
            case 'act':
                $callNews = jsonAct($masterkey,$group,100);
                $callNameGroup = jsonGroupAct($masterkey,$callNews->fields[7]); //ส่ง group ไปค้นหา
                $linkRSSDetail = _URL."activity/".$callNameGroup->fields[0]."/detail";
                $TitleRSS = $callNameGroup->fields[2];
                $urlRss = _URL.'activity/'.$group;
                // print_pre($linkRSSDetail);
                require_once _DIR . '/front/controller/script/'.$menuActive.'/create.php';
    
                break;
				
            case 'dt':
				$callNews = jsonDownload($masterkey,$group,100);
				$linkRSSDetail = _URL."download";
				$TitleRSS = "แผนการจัดการความรู้";
				$urlRss = _URL.'kmplan/'.$group;
                // print_pre($linkRSSDetail);
                require_once _DIR . '/front/controller/script/'.$menuActive.'/createDownload.php';
    
                break;
				
            default:
                http_response_code(401);
                $output = array(
                    'status'    => false,
                    'statuscode'    => 400,
                    'msg'       => 'An error occurred, the process information was not found to run.',
                );
                die(json_encode($output));
            break;
        }
    }
}else{
    http_response_code(401);
    $output = array(
        'status'    => false,
        'statuscode'    => 400,
        'msg'       => 'An error occurred, the process information was not found to run.',
    );
    die(json_encode($output));
}