<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
if($execute == "update") {
    $randomNumber = randomNameUpdate(2);

    if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
        mkdir($core_pathname_upload . "/" . $masterkey, 0777);
    }
    
    if (!is_dir($mod_path_html)) {
        mkdir($mod_path_html, 0777);
    }

    if(@file_exists($mod_path_html."/".$_REQUEST['inputHtmlDel'])) {
        @unlink($mod_path_html."/".$_REQUEST['inputHtmlDel']);
    }

    if ($_REQUEST['inputHtml'] != "")   {
        $filename = "html-".$_REQUEST["valEditID"]."-".$randomNumber.".html";
        $HTMLToolContent=str_replace("\\\"","\"",$_REQUEST['inputHtml']);
        $fp = fopen ($mod_path_html."/".$filename, "w");
        chmod($mod_path_html."/".$filename,0777);
        fwrite($fp,$HTMLToolContent);
        fclose($fp);
    }

    $update = [];
    if($_REQUEST['inputLt'] == 'Thai'){
        $update[] = $mod_tb_root . "_subject            = '" . changeQuot($_REQUEST['inputSubject']) . "'";
        $update[] = $mod_tb_root . "_title            = '" . changeQuot($_REQUEST['inputComment']) . "'";
        $update[] = $mod_tb_root . "_htmlfilename  	    = '" . $filename . "'";
        $update[] = $mod_tb_root . "_description        = '" . changeQuot($_REQUEST['inputTagDescription']) . "'";
        $update[] = $mod_tb_root . "_keywords           = '" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
        $update[] = $mod_tb_root . "_metatitle          = '" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    }else{
        $update[] = $mod_tb_root . "_subjecten          = '" . changeQuot($_REQUEST['inputSubject']) . "'";
        $update[] = $mod_tb_root . "_titleen            = '" . changeQuot($_REQUEST['inputComment']) . "'";
        $update[] = $mod_tb_root . "_htmlfilenameen     = '" . $filename . "'";
        $update[] = $mod_tb_root . "_descriptionen      = '" . changeQuot($_REQUEST['inputTagDescription']) . "'";
        $update[] = $mod_tb_root . "_keywordsen         = '" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
        $update[] = $mod_tb_root . "_metatitleen        = '" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    }
    $update[] = $mod_tb_root . "_lastbyid   = '" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $update[] = $mod_tb_root . "_lastby     = '" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $update[] = $mod_tb_root . "_lastdate   = NOW()";
    $update[] = $mod_tb_root . "_typec = '" . $_REQUEST["inputTypeC"] . "'";
    $update[] = $mod_tb_root . "_urlc = '" . changeQuot($_REQUEST["inputurlc"]) . "'";
    $update[] = $mod_tb_root . "_target  	='".$_POST['inputTarget']."'";
    $sql    = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_REQUEST["valEditID"] . "' ";
    $Query  = wewebQueryDB($coreLanguageSQL, $sql);
    logs_access('3', 'Update About');
}
?>
<?php  include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $_REQUEST['module_orderby'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
</form>            
<script language="JavaScript" type="text/javascript">document.myFormAction.submit();</script>