<?php


// $breadcrumb->add(array("Download", $linklang ."/download"));

require_once _DIR . '/front/controller/script/download/page/index.php';
$settingPage = array(
    "page" => "download",
    "template" => "index.tpl",
    "display" => "page"
);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "mainpage/header.tpl");
$smarty->assign("footer", "mainpage/footer.tpl");
$smarty->assign("footerjs", "mainpage/footer-js.tpl");
//
if (!empty($url->uri['file'])) {
    $fileDecode = decodeStr($url->uri['file']);
    $tableDownload = decodeStr($url->uri['t']);

    $filename = explode(".", $fileDecode);
    $dataFile = explode("/", $filename[0]);



    if (!empty($_SESSION["download-" . end($dataFile)])) {
       // echo $_SESSION["download-" . end($dataFile)] - time();
        if ($_SESSION["download-" . end($dataFile)] - time() <= 0) {
            $functionSave = TRUE;
        } else {
            $functionSave = FALSE;
        }

    } else {
        $functionSave = TRUE;
    }


    if (!empty($functionSave)) {

        //setcookie("download-" . end($dataFile), $setcookie, time() + (60 * $cookie_dowload_savecouter), _FullUrl);
        $_SESSION["download-" . end($dataFile)] = time() + (60 * $cookie_dowload_savecouter);
        /* save counter download start ********************************************************************************** */
        $sql = "SELECT " . $tableDownload . "_download FROM $tableDownload WHERE " . $tableDownload . "_filename like '" . end($dataFile) . "%'";
        // print_pre($sql);
        // die();
        $rs = $db->execute($sql);

        $record[$tableDownload . "_download"] = $rs->fields[$tableDownload . "_download"] + 1;
        $updateSQL = $db->GetUpdateSQL($rs, $record);
        $rsUpdate = $db->execute($updateSQL);

        /* mod download */ 
        $sql = "SELECT " . $tableDownload . "_download FROM $tableDownload WHERE " . $tableDownload . "_file like '" . end($dataFile) . "%'";
        $rs = $db->execute($sql);

        $record[$tableDownload . "_download"] = $rs->fields[$tableDownload . "_download"] + 1;
        $updateSQL = $db->GetUpdateSQL($rs, $record);
        $rsUpdate = $db->execute($updateSQL);
        /* mod download */ 
        

        /* save counter download end ********************************************************************************** */
    }

    $file_extension = $filename[count($filename) - 1];
    $myDateArray = explode(".", $downloadFile);
    $path = $fileDecode;

    // print_pre($path);
    // die();
    if (file_exists($path)) {

        //  logs("download", $pageOn, FALSE);
        header('Content-Description: File Transfer');
        header('Content-Type: application/' . $file_extension);
        header('Content-Disposition: attachment; filename="' . urldecode($url->uri['n']) . '.' . $file_extension . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        ob_clean();
        ob_end_flush();
        $handle = fopen($path, "rb");
        while (!feof($handle)) {
            echo fread($handle, 1000);
        }

        exit();
    } else {
        //  print_pre($path);
        echo "no have";
    }
}
