<?php

// $callGroup = callGroup();
// // print_pre($callGroup->_numOfRows);
// $ResultArr = array();
// foreach ($callGroup as $keycallGroup => $valuecallGroup) {
//     $callNewChart = callNewChart($valuecallGroup[0]);
//     // print_pre($callNewChart->fields);
//     $ResultArr[$keycallGroup]['name'] = $valuecallGroup['subject'];
//     $ResultArr[$keycallGroup]['y'] = $callNewChart->_numOfRows;
//     $ResultArr[$keycallGroup]['color'] = $valuecallGroup['col'];
// }
// // echo json_encode($ResultArr);
// print_pre($ResultArr);
// die('t4est');
$callGroupHome = callGroupHome(null,2);
foreach($callGroupHome as $keycallGroupHome => $valuecallGroupHome){
    $idgroup[$keycallGroupHome] = $valuecallGroupHome[0];
}
// print_pre($idgroup);
$callGroup = callGroupApi();
$ResultArr = array();
foreach ($callGroup as $keycallGroup => $valuecallGroup) {
    // print_pre($valuecallGroup);
    $callNewChart = callNewChartHome($valuecallGroup[0],$idgroup);
    // print_pre($callNewChart->fields);
    $ResultArr[$keycallGroup]['name'] = $valuecallGroup['subject'];
    $ResultArr[$keycallGroup]['y'] = $callNewChart->_numOfRows;
    $ResultArr[$keycallGroup]['color'] = $valuecallGroup['col'];
}
echo json_encode($ResultArr);
