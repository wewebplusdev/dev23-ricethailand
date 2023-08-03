<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
$core_default_typemail = 1;

if ($_REQUEST['execute'] == "insert") {
    // $randomNumber = randomNameUpdate(1);

    if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
        mkdir($core_pathname_upload . "/" . $masterkey, 0777);
    }
    if (!is_dir($mod_path_html)) {
        mkdir($mod_path_html, 0777);
    }


    if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
        @unlink($mod_path_html . "/" . $htmlfiledelete);
    }

    if ($_POST['inputHtml'] != "") {
        $filename = $_POST["valEditID"] . "-" . $randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
        $fp = fopen($mod_path_html . "/" . $filename, "w");
        chmod($mod_path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }

    $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
    $maxOrder = $Row[0] + 1;

    $insert = array();
    $insert[$mod_tb_root . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
	
    $insert[$mod_tb_root . "_agenid"] = "'" . $_POST["inputAgency"] . "'";
    $insert[$mod_tb_root . "_yearid"] = "'" . $_POST["inputGroupyear"] . "'";
    $insert[$mod_tb_root . "_groupProoject"] = "'" . $_POST["inputGroupID"] . "'";
    $insert[$mod_tb_root . "_groupProoject_bk"] = "'" . $_POST["inputGroupID"] . "'";
    $insert[$mod_tb_root . "_dwnid"] = "'" . $_POST["inputDwnID"] . "'";
	
    $insert[$mod_tb_root . "_per"] = "'" . changeQuot($_REQUEST['inputPer']) . "'";
    $insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
    $insert[$mod_tb_root . "_title"] = "'" . changeQuot($_REQUEST['inputDescription']) . "'";
    
	$insert[$mod_tb_root . "_tag"] = "'" . serialize($_POST["inputGroupTag"]) . "'";
	
    $insert[$mod_tb_root . "_view"] = "'" . $_POST["Inputviewconf"] . "'";
    $insert[$mod_tb_root . "_pic"] = "'" . $_POST["picname"] . "'";
	$insert[$mod_tb_root . "_picshow"] = "'" . $_POST["inputTypePic"] . "'";
    $insert[$mod_tb_root . "_type"] = "'" . $_POST["inputType"] . "'";
    $insert[$mod_tb_root . "_url"] = "'" . changeQuot($_REQUEST['inputurl']) . "'";
    $insert[$mod_tb_root . "_filevdo"] = "'" . $_POST["vdoname"] . "'";
    $insert[$mod_tb_root . "_htmlfilename"] = "'" . $filename . "'";
    $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_description"] = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
    $insert[$mod_tb_root . "_keywords"] = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
    $insert[$mod_tb_root . "_metatitle"] = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
    $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";

    if ($_REQUEST['cdateInput'] != "") {
        $insert[$mod_tb_root."_credate"]="'".DateFormatInsert($_REQUEST['cdateInput'], $_REQUEST['cHourInput'], $_REQUEST['cMinInput'])."'";

    } else {
        $insert[$mod_tb_root . "_credate"] = "NOW()";
    }

    $insert[$mod_tb_root . "_lastdate"] = "NOW()";
    $insert[$mod_tb_root . "_status"] = "'Disable'";
    $insert[$mod_tb_root . "_typeInfo"] = "0";
	
	if($_POST["inputTypeTheme"] == 2){
		$insert[$mod_tb_root . "_theme"] = "'" . $_POST["inputTheme"] . "'";
		$insert[$mod_tb_root . "_theme_link"] = "'" . changeQuot($_POST["inputThemeUrl"]) . "'";
	}
	$insert[$mod_tb_root . "_theme_type"] = "'" . changeQuot($_POST["inputTypeTheme"]) . "'";
	
	
    // $insert[$mod_tb_root."_pin"] = "'Unpin'";
    $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";

    $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $contantID = wewebInsertID($coreLanguageSQL);

    $sql_albumtemp = "SELECT " . $mod_tb_root_albumTemp . "_id," . $mod_tb_root_albumTemp . "_filename," . $mod_tb_root_albumTemp . "_name  FROM " . $mod_tb_root_albumTemp . " WHERE " . $mod_tb_root_albumTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_root_albumTemp . "_id ASC";
    $query_albumtemp = wewebQueryDB($coreLanguageSQL, $sql_albumtemp);
    $number_albumtemp = wewebNumRowsDB($coreLanguageSQL,$query_albumtemp);
    if ($number_albumtemp >= 1) {
        while ($row_albumtemp = wewebFetchArrayDB($coreLanguageSQL,$query_albumtemp)) {
            $downloadID = $row_albumtemp[0];
            $downloadFile = $row_albumtemp[1];
            $downloadName = $row_albumtemp[2];

            $insert=array();
            $insert[$mod_tb_root_album . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_root_album . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_root_album . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_root_album . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_root_album . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_root_albumTemp . " WHERE   " . $mod_tb_root_albumTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
        }
    }


    $sql_filetemp = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename," . $mod_tb_fileTemp . "_name  FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_fileTemp . "_id ASC";
    $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
    $number_filetemp = wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
    if ($number_filetemp >= 1) {
        while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)) {
            $downloadID = $row_filetemp[0];
            $downloadFile = $row_filetemp[1];
            $downloadName = $row_filetemp[2];

            $insert=array();
            $insert[$mod_tb_file . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_file . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_file . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_file . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_file . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_fileTemp . " WHERE   " . $mod_tb_fileTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
        }
    }


    logs_access('3', 'Insert');

    ## URL Search ###################################
    $txt_value_to = encodeStr($contantID);

    $valUrlSearchTH = $mod_url_search_th . "?d=" . $txt_value_to;
    $valUrlSearchEN = $mod_url_search_en . "?d=" . $txt_value_to;

    $insertSch = array();
    $insertSch[$core_tb_search . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
    $insertSch[$core_tb_search . "_contantid"] = "'" . $contantID . "'";
    $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
    $insertSch[$core_tb_search . "_subject"] = "'" . changeQuot($_POST["inputSubject"]) . "'";
    $insertSch[$core_tb_search . "_title"] = "'" . changeQuot($_POST["inputDescription"]) . "'";
    $insertSch[$core_tb_search . "_keyword"] = "'" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
    $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
    $insertSch[$core_tb_search . "_urlen"] = "'" . $valUrlSearchEN . "'";
    $insertSch[$core_tb_search . "_edate"] = "'" . DateFormatInsert($_POST["edateInput"]) . "'";
    $insertSch[$core_tb_search . "_sdate"] = "'" . DateFormatInsert($_POST["sdateInput"]) . "'";
    $insertSch[$core_tb_search . "_status"] = "'Disable'";
    // $insertSch[$core_tb_search . "_pic"] = "'" . $_POST["picname"] . "'";
    $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
    $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
   
   	/*  Disable Function Mail Ruck 31/08/2022 Back up in file _insertContant_backup_31082022.php */


}
?>
<?php  include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php  echo  $_REQUEST['inputTh'] ?>" />
    <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
    <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
    <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
