<?php
$groupID = $_REQUEST['id'];
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'select'){
    // print_pre($_REQUEST);
    $agenID = $_REQUEST['idagen'];
    $dataArr = array();
    $callGroupNews = callGroupCard($config['cmg']['masterkey'],$groupID,$agenID); // get count news where group
    $callGroup = callGroup($agenID);

    if($callGroup->_numOfRows == 1){
        // foreach($groupID as $keygroupID => $valuegroupID){ // foreach agency id
        //     $callNewChart = callNewChart($agenID,$valuegroupID); // get news where agency id and group id
        //     $dataArr['chart'][$valuegroupID][$keygroupID]['name'] = $callGroup->fields['subject'];
        //     $dataArr['chart'][$valuegroupID][$keygroupID]['y'] = $callNewChart->_numOfRows;
        //     $dataArr['chart'][$valuegroupID][$keygroupID]['color'] = $callGroup->fields['col'];
        // }

        foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
            $callGroupAll = callGroup();
            foreach ($callGroupAll as $keycallGroupAll => $valuecallGroupAll) { // foreach agency id
                if($callGroup->fields['id'] == $valuecallGroupAll['id']){ // send nul parameter เพื่อให้ return numrow จริง
                    $where = null;
                }else{ // send false parameter เพื่อให้ return numrow 0
                    $where = 2;
                }
                $callNewChart = callNewChart($valuecallGroupAll[0],$valuegroupID,$where); // get news where agency id and group id
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['name'] = $valuecallGroupAll['subject'];
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['y'] = $callNewChart->_numOfRows;
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['color'] = $valuecallGroupAll['col'];
            }
        }
    }else{
        foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
            $callGroupAll = callGroup();
            foreach ($callGroupAll as $keycallGroupAll => $valuecallGroupAll) { // foreach agency id
                $callNewChart = callNewChart($valuecallGroupAll[0],$valuegroupID); // get news where agency id and group id
                // print_pre($callNewChart->fields);
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['name'] = $valuecallGroupAll['subject'];
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['y'] = $callNewChart->_numOfRows;
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['color'] = $valuecallGroupAll['col'];
            }
        }
    }
    // print_pre($callGroup);
    $dataArr['card'] = $callGroupNews;
    echo json_encode($dataArr);
    // print_pre($dataArr);
}else{
    $dataArr = array();
    foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
        $callGroup = callGroup();
        foreach ($callGroup as $keycallGroup => $valuecallGroup) { // foreach agency id
            $callNewChart = callNewChart($valuecallGroup[0],$valuegroupID); // get news where agency id and group id
            // print_pre($callNewChart->fields);
            $dataArr[$valuegroupID][$keycallGroup]['name'] = $valuecallGroup['subject'];
            $dataArr[$valuegroupID][$keycallGroup]['y'] = $callNewChart->_numOfRows;
            $dataArr[$valuegroupID][$keycallGroup]['color'] = $valuecallGroup['col'];
        }
    }
    echo json_encode($dataArr);
    // print_pre($dataArr);
}











#######################################################################################

$groupID = $_REQUEST['id'];
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'select'){
    // print_pre($_REQUEST);
    $agenID = $_REQUEST['idagen'];
    $dataArr = array();
    $callGroupNews = callGroupCard($config['cmg']['masterkey'],$groupID,$agenID); // get count news where group
    $callGroup = callGroup($agenID);

    if($callGroup->_numOfRows == 1){
        // foreach($groupID as $keygroupID => $valuegroupID){ // foreach agency id
        //     $callNewChart = callNewChart($agenID,$valuegroupID); // get news where agency id and group id
        //     $dataArr['chart'][$valuegroupID][$keygroupID]['name'] = $callGroup->fields['subject'];
        //     $dataArr['chart'][$valuegroupID][$keygroupID]['y'] = $callNewChart->_numOfRows;
        //     $dataArr['chart'][$valuegroupID][$keygroupID]['color'] = $callGroup->fields['col'];
        // }

        foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
            $callGroupAll = callGroup();
            foreach ($callGroupAll as $keycallGroupAll => $valuecallGroupAll) { // foreach agency id
                if($callGroup->fields['id'] == $valuecallGroupAll['id']){ // send nul parameter เพื่อให้ return numrow จริง
                    $where = null;
                }else{ // send false parameter เพื่อให้ return numrow 0
                    $where = 2;
                }
                $callNewChart = callNewChart($valuecallGroupAll[0],$valuegroupID,$where); // get news where agency id and group id
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['name'] = $valuecallGroupAll['subject'];
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['y'] = $callNewChart->_numOfRows;
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['color'] = $valuecallGroupAll['col'];
            }
        }
    }else{
        foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
            $callGroupAll = callGroup();
            foreach ($callGroupAll as $keycallGroupAll => $valuecallGroupAll) { // foreach agency id
                $callNewChart = callNewChart($valuecallGroupAll[0],$valuegroupID); // get news where agency id and group id
                // print_pre($callNewChart->fields);
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['name'] = $valuecallGroupAll['subject'];
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['y'] = $callNewChart->_numOfRows;
                $dataArr['chart'][$valuegroupID][$keycallGroupAll]['color'] = $valuecallGroupAll['col'];
            }
        }
    }
    // print_pre($callGroup);
    $dataArr['card'] = $callGroupNews;
    echo json_encode($dataArr);
    // print_pre($dataArr);
}elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == 'year'){
    $DataByYear = array();
    $NameYear = array();
    $callGroupPro = callGroupPro();
    $callYear = callYear();
    $callYearName = callYear();
    $numRow = array();
    foreach($callYearName as $keycallYearName => $valuecallYearName){
        $NameYear[] = $valuecallYearName['subject'];
        $callNewChartApiCard = callNewChartApi(null,$valuecallYearName['id']);
        $numRow['table'][$keycallYearName]['count'] = $callNewChartApiCard->_numOfRows;
        $numRow['table'][$keycallYearName]['name']= $valuecallYearName['subject'];
    }
    foreach($callGroupPro as $keycallGroupPro => $valuecallGroupPro){
        foreach($callYear as $keycallYear => $valuecallYear){
            $callNewChartApi = callNewChartApi($valuecallGroupPro['id'],$valuecallYear['id']);
            $DataByYear['chart'][$keycallGroupPro]['data'][] = $callNewChartApi->_numOfRows;
            $DataByYear['chart'][$keycallGroupPro]['name'] = $valuecallGroupPro['subject'];
        }
    }
    $DataByYear['category'] = $NameYear;
    $DataByYear['table'] = $numRow;
    // print_pre($numRow);
    echo json_encode($DataByYear);
    // print_pre($DataByYear);
}
elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == 'agency'){
    $callGroup = callGroupApi();
    $DataByYear = array();
    foreach($callGroup as $keygroupID => $valuegroupID){ // foreach group id
        $callNewChart = callNewChart($valuegroupID['id']); // get news where agency id and group id
        $dataArr['chart'][$keygroupID]['name'] = $valuegroupID['subject'];
        $dataArr['chart'][$keygroupID]['y'] = $callNewChart->_numOfRows;
        $dataArr['chart'][$keygroupID]['color'] = $valuegroupID['col'];

        $dataArr['card'][$keygroupID]['name'] = $valuegroupID['subject'];
        $dataArr['card'][$keygroupID]['count'] = $callNewChart->_numOfRows;
    }
    // print_pre($dataArr);
    // $dataArr['card'] = $callGroupNews;
    echo json_encode($dataArr);
}
else{
    $dataArr = array();
    foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
        // $callGroup = callNewChartApi($valuegroupID);
        $callGroup = callGroupApi();
        foreach ($callGroup as $keycallGroup => $valuecallGroup) { // foreach agency id
            $callNewChart = callNewChart($valuecallGroup[0],$valuegroupID); // get news where agency id and group id
            // print_pre($callNewChart->fields);
            $dataArr['chart'][$valuegroupID][$keycallGroup]['name'] = $valuecallGroup['subject'];
            $dataArr['chart'][$valuegroupID][$keycallGroup]['y'] = $callNewChart->_numOfRows;
            $dataArr['chart'][$valuegroupID][$keycallGroup]['color'] = $valuecallGroup['col'];
        }
    }
    // print_pre($callGroupNews);
    // print_pre($dataArr);
    echo json_encode($dataArr);
}
