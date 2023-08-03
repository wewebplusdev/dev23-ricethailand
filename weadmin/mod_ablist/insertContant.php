<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

if($_REQUEST['execute'] == "insert") {
    $randomNumber = randomNameUpdate(2);

    if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
        mkdir($core_pathname_upload . "/" . $masterkey, 0777);
    }

    if (!is_dir($mod_path_html)) {
        mkdir($mod_path_html, 0777);
    }

    if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
        @unlink($mod_path_html . "/" . $htmlfiledelete);
    }

    if ($_REQUEST['inputHtml'] != "") {
        $filename = "html-".$randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_REQUEST['inputHtml']);
        $fp = fopen($mod_path_html . "/" . $filename, "w");
        chmod($mod_path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }
    

    $sql    = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
    $Query  = wewebQueryDB($coreLanguageSQL, $sql);
    $Row    = wewebFetchArrayDB($coreLanguageSQL, $Query);
    $maxOrder = $Row[0] + 1;

    $insert=array();
    $insert[$mod_tb_root . "_language"]             = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_root . "_masterkey"]            = "'" . $_REQUEST["masterkey"] . "'";
    if($_REQUEST['inputLt'] == 'Thai'){
        $insert[$mod_tb_root . "_subject"]          = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
        $insert[$mod_tb_root . "_title"]        = "'" . changeQuot($_REQUEST['inputComment']) . "'";
        $insert[$mod_tb_root . "_htmlfilename"]     = "'" . $filename . "'";
        $insert[$mod_tb_root . "_description"]      = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
        $insert[$mod_tb_root . "_keywords"]         = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
        $insert[$mod_tb_root . "_metatitle"]        = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    }else{
        $insert[$mod_tb_root . "_subjecten"]        = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
        $insert[$mod_tb_root . "_titleen"]        = "'" . changeQuot($_REQUEST['inputComment']) . "'";
        $insert[$mod_tb_root . "_htmlfilenameen"]   = "'" . $filename . "'";
        $insert[$mod_tb_root . "_descriptionen"]    = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
        $insert[$mod_tb_root . "_keywordsen"]       = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
        $insert[$mod_tb_root . "_metatitleen"]      = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    }
    $insert[$mod_tb_root . "_pic"] = "'" . $_POST["picname"] . "'";
    $insert[$mod_tb_root . "_crebyid"]  = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_creby"]    = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_lastby"]   = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_credate"]  = "NOW()";
    $insert[$mod_tb_root . "_lastdate"] = "NOW()";
    $insert[$mod_tb_root . "_status"]   = "'Disable'";
    $insert[$mod_tb_root . "_typec"] = "'" . $_REQUEST["inputTypeC"] . "'";
    $insert[$mod_tb_root . "_urlc"] = "'" . $_REQUEST["inputurlc"] . "'";
    $insert[$mod_tb_root . "_target"] = "'" . $_REQUEST["inputTarget"] . "'";
    // $insert[$mod_tb_root . "_outdesc"] = "'" . $_REQUEST["inputurlcdesc"] . "'";
    $insert[$mod_tb_root . "_order"]    = "'" . $maxOrder . "'";

    $sql        = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query      = wewebQueryDB($coreLanguageSQL, $sql);
    $contantID  = wewebInsertID($coreLanguageSQL);

    
    $sql_filetemp = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename," . $mod_tb_fileTemp . "_name  FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_fileTemp . "_id ASC";
    $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
    $number_filetemp = wewebNumRowsDB($coreLanguageSQL, $query_filetemp);
    if ($number_filetemp >= 1) {
        while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL, $query_filetemp)) {
            $downloadID = $row_filetemp[0];
            $downloadFile = $row_filetemp[1];
            $downloadName = $row_filetemp[2];

            $insert=array();
            $insert[$mod_tb_file . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_file . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_file . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_file . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_file . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query      = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_fileTemp . " WHERE   " . $mod_tb_fileTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
        }
    }


    logs_access('3', 'Insert About List');
}
?>
<?php  include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php   echo $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php   echo $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php   echo $_REQUEST['inputGh'] ?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>