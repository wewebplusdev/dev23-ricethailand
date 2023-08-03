<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
// print_pre($_REQUEST);
// die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage Contant</title>
</head>

<body>
    <?php 
        if ($execute == "update") {
            $randomNumber = randomNameUpdate(1);

            if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
                mkdir($core_pathname_upload . "/" . $masterkey, 0777);
            }
            if (!is_dir($mod_path_html)) {
                mkdir($mod_path_html, 0777);
            }


            if (@file_exists($mod_path_html . "/" . $_REQUEST['inputHtmlDel'])) {
                @unlink($mod_path_html . "/" . $_REQUEST['inputHtmlDel']);
            }

            if ($_POST['inputHtml'] != "") {
                $filename = $_POST["valEditID"] . "-" . $randomNumber . ".html";
                $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
                $fp = fopen($mod_path_html . "/" . $filename, "w");
                chmod($mod_path_html . "/" . $filename, 0777);
                fwrite($fp, $HTMLToolContent);
                fclose($fp);
            }




            $update = array();
			
			$update[] = $mod_tb_root . "_agenid='" . changeQuot($_POST['inputAgency']) . "'";
            $update[] = $mod_tb_root . "_yearid='" . $_POST["inputGroupyear"] . "'";
            $update[] = $mod_tb_root . "_groupProoject='" . $_POST["inputGroupID"] . "'";
            $update[] = $mod_tb_root . "_dwnid='" . $_POST["inputDwnID"] . "'";
			
			$update[] = $mod_tb_root . "_per='" . changeQuot($_POST['inputPer']) . "'";
			$update[] = $mod_tb_root . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
			$update[] = $mod_tb_root . "_title='" . changeQuot($_POST['inputDescription']) . "'";
			
            $update[] = $mod_tb_root . "_tag='" . serialize($_POST["inputGroupTag"]) . "'";
			
			$update[] = $mod_tb_root . "_htmlfilename  	='" . $filename . "'";
			$update[] = $mod_tb_root . "_description='" . changeQuot($_POST['inputTagDescription']) . "'";
			$update[] = $mod_tb_root . "_keywords='" . changeQuot($_POST['inputTagKeywords']) . "'";
			$update[] = $mod_tb_root . "_metatitle='" . changeQuot($_POST['inputTagTitle']) . "'";

			$update[] = $mod_tb_root . "_view='" . $_POST["Inputviewconf"] . "'";
			$update[] = $mod_tb_root . "_picshow='" . $_POST["inputTypePic"] . "'";
			
            $update[] = $mod_tb_root . "_url='" . changeQuot($_REQUEST['inputurl']) . "'";
            $update[] = $mod_tb_root . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            $update[] = $mod_tb_root . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            $update[] = $mod_tb_root . "_credate      ='" . DateFormatInsert($cdateInput, $cHourInput, $cMinInput) . "'";

            $update[] = $mod_tb_root . "_lastdate=NOW()";
            $update[] = $mod_tb_root . "_sdate  	='" . DateFormatInsert($sdateInput) . "'";
            $update[] = $mod_tb_root . "_edate  	='" . DateFormatInsert($edateInput) . "'";
			
			if($_POST["inputTypeTheme"] == 2){
				$update[] = $mod_tb_root . "_theme='" . $_POST["inputTheme"] . "'";
				$update[] = $mod_tb_root . "_theme_link='" . changeQuot($_REQUEST['inputThemeUrl']) . "'";
			}
			

            $sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "' ";
            // print_pre($sql);
            $Query = wewebQueryDB($coreLanguageSQL, $sql);


            logs_access('3', 'Update');

            ## URL Search ###################################

            $txt_value_to = encodeStr($_POST["valEditID"]);

            $valUrlSearchTH = $mod_url_search_th . "?d=" . $txt_value_to;
            $valUrlSearchEN = $mod_url_search_en . "?d=" . $txt_value_to;

            $updateSch = array();
            if ($_REQUEST['inputLt'] == "Thai") {
                $updateSch[] = $core_tb_search . "_subject='" . changeQuot($_REQUEST['inputSubject']) . "'";
                $updateSch[] = $core_tb_search . "_title='" . changeQuot($_REQUEST['inputDescription']) . "'";
                $updateSch[] = $core_tb_search . "_keyword='" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
            } else {
                $updateSch[] = $core_tb_search . "_subjecten='" . changeQuot($_REQUEST['inputSubject']) . "'";
                $updateSch[] = $core_tb_search . "_titleen='" . changeQuot($_REQUEST['inputDescription']) . "'";
                $updateSch[] = $core_tb_search . "_keyworden='" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
            }

            $updateSch[] = $core_tb_search . "_url='" . $valUrlSearchTH . "'";
            $updateSch[] = $core_tb_search . "_urlen='" . $valUrlSearchEN . "'";

            $updateSch[] = $core_tb_search . "_sdate  	='" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
            $updateSch[] = $core_tb_search . "_edate  	='" . DateFormatInsert($_REQUEST['edateInput']) . "'";

            $sqlSch = "UPDATE " . $core_tb_search . " SET " . implode(",", $updateSch) . " WHERE " . $core_tb_search . "_contantid='" . $_POST["valEditID"] . "'  AND " . $core_tb_search . "_masterkey='" . $_POST["masterkey"] . "' ";
            $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);

            ?>
    <?php  } ?>
    <?php  include("../lib/disconnect.php"); ?>
    <form action="index.php" method="post" name="myFormAction" id="myFormAction">
        <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $_REQUEST['module_orderby'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
        <input name="inputTh" type="hidden" id="inputTh" value="<?php  echo  $_REQUEST['inputTh'] ?>" />
        <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
        <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
        <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
    </form>
    <script language="JavaScript" type="text/javascript">
        document.myFormAction.submit();
    </script>
</body>

</html>