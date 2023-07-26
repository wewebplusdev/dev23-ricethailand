<?php
$menuActive = "pageredirect";
$pageredirectPage = new pageredirectPage;
$segment = $url->segment[1];
$array_param = explode("|", decodeStr($segment));

switch ($array_param[0]) {
    case 'cms': // cms
        $callcms = $pageredirectPage->callcms($array_param[1], $array_param[2]);
        if ($callcms->_numOfRows > 0) {
            /*## Start Update View #####*/
            if (!isset($_COOKIE['VIEW_CMS' . $callcms->fields['masterkey'] . '_' . urldecode($callcms->fields['id'])])) {
                setcookie("VIEW_CMS" . $callcms->fields['masterkey'] . '_' . urldecode($callcms->fields['id']), true, time() + 600);
                $viewContent = $callSetWebsite->updateView($callcms->fields['id'], $callcms->fields['masterkey'], $config['cms']['db']);
            }
            /*## End Update View #####*/
            http_response_code(301);
            $url_target = $array_param[3] ? $array_param[3] : 'urlc';
            header('location:' . path_url($callcms->fields[$url_target]));
        }else{
            http_response_code(301);
            header('location:' . $linklang . "/404");
        }
        break;
    
    default:
        http_response_code(301);
        header('location:' . $linklang . "/home");
        break;
}

exit();