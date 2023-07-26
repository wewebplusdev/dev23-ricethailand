<?php
// print_pre($_GET['searchFile']);
if (!empty($_GET['searchFile'])) {
    $keywordSearch = $_GET['searchFile'];
    $smarty->assign("fileSearch", $_GET['searchFile']);
} else {
    $keywordSearch = false;
}


$downloadPre = downloadShow($keywordSearch);
$smarty->assign("downloadSelect", $downloadPre);
