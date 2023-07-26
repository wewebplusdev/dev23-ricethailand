<?php
$menuActive = "api";
// $listjs[] = '<script type="text/javascript" src="front/controller/script/'.$menuActive.'/js/script.js?v='.$caseFile.'"></script>';
// print_pre($url->segment[1]);
// die();
switch ($url->segment[1]) {
    case 'getDataChartHome':
        require_once _DIR . '/front/controller/script/'.$menuActive.'/getDataChartHome.php';
    break;

    case 'getDataChart':
        require_once _DIR . '/front/controller/script/'.$menuActive.'/getDataChart.php';
    break;

    case 'updateView':
        require_once _DIR . '/front/controller/script/'.$menuActive.'/updateView.php';
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

// $smarty->assign("fileInclude", $settingPage);
// $smarty->assign("header", "inc-header.tpl");
// $smarty->assign("footer", "inc-footer.tpl");