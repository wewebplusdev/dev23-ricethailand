<?php

$groupID = $_REQUEST['id'];
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'select'){  // use when selcted filter
    ## setting
    $agenID = $_REQUEST['idagen'];
    $yearidID = $_REQUEST['idyear'];
    $dataArr = array();
    ## start section card top
    $callGroupNews = callGroupCard($config['cmg']['masterkey'],$groupID,$agenID,$yearidID); // get count news where group and year
    ## end section card top
    ## start section year chart
    $DataByYear = array();
    $NameYear = array();
    $callGroupPro = callGroupPro(null,$config['cmg']['masterkey']); //get agency id 
    $callGroupProPie = callGroupPro(null,$config['cmg']['masterkey']); //get agency id 
    $callYear = callYear($yearidID); //get year id for chart
    $callYearName = callYear($yearidID); //get year id for table
    $callYearPie = callYear($yearidID); //get year id for table
    $numRow = array();
    foreach($callYearName as $keycallYearName => $valuecallYearName){ //get data for table
        $NameYear[] = $valuecallYearName['subject'];
        $callNewChartApiCard = callNewChartApi(null,$valuecallYearName['id'],$agenID);
        $numRow[$keycallYearName]['count'] = $callNewChartApiCard->_numOfRows;
        $numRow[$keycallYearName]['name']= $valuecallYearName['subject'];
    }
    ## chart column and line
    $DataByYear['action'] = false;
    foreach($callGroupPro as $keycallGroupPro => $valuecallGroupPro){ //get data for chart
        foreach($callYear as $keycallYear => $valuecallYear){
            $callNewChartApi = callNewChartApi($valuecallGroupPro['id'],$valuecallYear['id'],$agenID); //get data from news where agency id
            $DataByYear['chart']['default'][$keycallGroupPro]['data'][] = $callNewChartApi->_numOfRows;
            $DataByYear['chart']['default'][$keycallGroupPro]['name'] = $valuecallGroupPro['subject'];
            $DataByYear['chart']['default'][$keycallGroupPro]['color'] = $valuecallGroupPro['col'];
        }
    }
    ## append chart when select filter year
    if($yearidID > 0){
        ## chart pie
        foreach($callGroupProPie as $keycallGroupProPie => $valuecallGroupProPie){
            foreach($callYearPie as $keycallYearPie => $valuecallYearPie){
                $callNewChartApi = callNewChartApi($valuecallGroupProPie['id'],$valuecallYearPie['id'],$agenID); //get data from news where agency id
                $DataByYear['chart']['other'][$keycallGroupProPie]['y'] = $callNewChartApi->_numOfRows;
                $DataByYear['chart']['other'][$keycallGroupProPie]['name'] = $valuecallGroupProPie['subject'];
                $DataByYear['chart']['other'][$keycallGroupProPie]['color'] = $valuecallGroupProPie['col'];
            }
        }
        ## status action
        $DataByYear['action'] = true;
    }
    $DataByYear['category']['default'] = $NameYear;
    $DataByYear['category']['other'] = $NameYear;
    $DataByYear['table'] = $numRow;
    ## end section year chart

    ## start section agency chart
    $callGroupAgency = callGroupApi($agenID);
    $dataArrayAgency = array();
    foreach($callGroupAgency as $keygroupID => $valuegroupID){ // foreach group id
        $callNewChart = callNewChartApi(null, $yearidID, $valuegroupID['id']); // get news where agency id and group id
        $dataArrayAgency['chart']['default'][$keygroupID]['name'] = $valuegroupID['subject'];
        $dataArrayAgency['chart']['default'][$keygroupID]['y'] = $callNewChart->_numOfRows;
        $dataArrayAgency['chart']['default'][$keygroupID]['color'] = $valuegroupID['col'];

        $dataArrayAgency['card'][$keygroupID]['name'] = $valuegroupID['subject'];
        $dataArrayAgency['card'][$keygroupID]['count'] = $callNewChart->_numOfRows;
    }
    ## end section agency chart

    ## start section group chart
    $dataArrGroup = array();
	$indexCh =0;

    foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
        $callGroupApi = callGroupApi($agenID);
		$indexCh++;
        foreach ($callGroupApi as $keycallGroup => $valuecallGroup) { // foreach agency id
            // $callNewChart = callNewChart($valuecallGroup[0],$valuegroupID); // get news where agency id and group id
            $callNewChart = callNewChartApi($valuegroupID, $yearidID, $valuecallGroup[0]); // get news where agency id and group id
            // print_pre($callNewChart->fields);
            $dataArrGroup['chart'][$indexCh][$keycallGroup]['name'] = $valuecallGroup['subject'];
            $dataArrGroup['chart'][$indexCh][$keycallGroup]['y'] = $callNewChart->_numOfRows;
            $dataArrGroup['chart'][$indexCh][$keycallGroup]['color'] = $valuecallGroup['col'];
            $dataArrGroup['chart'][$indexCh][$keycallGroup]['id'] = $valuegroupID;
        }
    }
    ## end section group chart

    ## start merge array
    $echoData['card'] = $callGroupNews; // card top section
    $echoData['year'] = $DataByYear; // array data year chart
    $echoData['agency'] = $dataArrayAgency; // array data agency chart
    $echoData['group'] = $dataArrGroup; // array data agency chart
    echo json_encode($echoData);
    ## end merge array

    // print_pre($DataByYear);
    // print_pre($callGroupNews);
}elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == 'year'){  // use when on ready
    $DataByYear = array();
    $NameYear = array();
    $callGroupPro = callGroupPro(null,$config['cmg']['masterkey']);
    $callYear = callYear();
    $callYearName = callYear();
    $numRow = array();
    foreach($callYearName as $keycallYearName => $valuecallYearName){
        $NameYear['default'][] = $valuecallYearName['subject'];
        $callNewChartApiCard = callNewChartApi(null,$valuecallYearName['id'],null); // get news where year
        $numRow['table'][$keycallYearName]['count'] = $callNewChartApiCard->_numOfRows;
        $numRow['table'][$keycallYearName]['name']= $valuecallYearName['subject'];
    }
    foreach($callGroupPro as $keycallGroupPro => $valuecallGroupPro){
        foreach($callYear as $keycallYear => $valuecallYear){
            $callNewChartApi = callNewChartApi($valuecallGroupPro['id'],$valuecallYear['id'],null);
            $DataByYear['chart']['default'][$keycallGroupPro]['data'][] = $callNewChartApi->_numOfRows;
            $DataByYear['chart']['default'][$keycallGroupPro]['name'] = $valuecallGroupPro['subject'];
            $DataByYear['chart']['default'][$keycallGroupPro]['color'] = $valuecallGroupPro['col'];
        }
    }
    $DataByYear['category'] = $NameYear;
    $DataByYear['table'] = $numRow;
    // print_pre($numRow);
    echo json_encode($DataByYear);
    // print_pre($DataByYear);
	
}elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == 'agency'){ // use when on ready
    $callGroup = callGroupApi();
    $DataByYear = array();
    foreach($callGroup as $keygroupID => $valuegroupID){ // foreach group id
        $callNewChart = callNewChart($valuegroupID['id']); // get news where agency id and group id
        $dataArr['chart']['default'][$keygroupID]['name'] = $valuegroupID['subject'];
        $dataArr['chart']['default'][$keygroupID]['y'] = $callNewChart->_numOfRows;
        $dataArr['chart']['default'][$keygroupID]['color'] = $valuegroupID['col'];

        $dataArr['card'][$keygroupID]['name'] = $valuegroupID['subject'];
        $dataArr['card'][$keygroupID]['count'] = $callNewChart->_numOfRows;
    }
    // print_pre($dataArr);
    // $dataArr['card'] = $callGroupNews;
    echo json_encode($dataArr);
}else{
    $dataArr = array();
	$indexCh =0;
    foreach($groupID as $keygroupID => $valuegroupID){ // foreach group id
	$indexCh++;
        // $callGroup = callNewChartApi($valuegroupID);
        $callGroup = callGroupApi();
        foreach ($callGroup as $keycallGroup => $valuecallGroup) { // foreach agency id
            $callNewChart = callNewChart($valuecallGroup[0],$valuegroupID); // get news where agency id and group id
            // print_pre($callNewChart->fields);
            $dataArr['chart'][$indexCh][$keycallGroup]['name'] = $valuecallGroup['subject'];
            $dataArr['chart'][$indexCh][$keycallGroup]['y'] = $callNewChart->_numOfRows;
            $dataArr['chart'][$indexCh][$keycallGroup]['color'] = $valuecallGroup['col'];
			 $dataArr['chart'][$indexCh][$keycallGroup]['id'] = $valuegroupID;
        }
    }
    // print_pre($callGroupNews);
   //  print_pre($dataArr);
    echo json_encode($dataArr);
}
