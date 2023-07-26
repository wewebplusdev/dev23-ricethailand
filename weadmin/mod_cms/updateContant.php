<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Contant</title>
</head>
<body>
<?php  
	if($execute=="update"){
		$randomNumber = randomNameupdate(2);

		if(!is_dir($core_pathname_upload."/".$masterkey)) { mkdir($core_pathname_upload."/".$masterkey,0777); }
		if(!is_dir($mod_path_html)) { mkdir($mod_path_html,0777); }


		if(@file_exists($mod_path_html."/".$_REQUEST['inputHtmlDel'])) {
			@unlink($mod_path_html."/".$_REQUEST['inputHtmlDel']);
		}

		if ($_POST['inputHtml']!="")   {
            $filename = "html-".$_POST["valEditID"]."-".$randomNumber.".html";
            $HTMLToolContent=str_replace("\\\"","\"",$_POST['inputHtml']);
            $fp = fopen ($mod_path_html."/".$filename, "w");
            chmod($mod_path_html."/".$filename,0777);
            fwrite($fp,$HTMLToolContent);
            fclose($fp);
        }



		$update=array();
		if($_REQUEST['inputLt']=="Thai"){
		$update[]=$mod_tb_root."_subject='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root."_title='".changeQuot($_POST['inputDescription'])."'";
		$update[]=$mod_tb_root."_htmlfilename  	='".$filename."'";
		$update[]=$mod_tb_root."_description='".changeQuot($_POST['inputTagDescription'])."'";
		$update[]=$mod_tb_root."_keywords='".changeQuot($_POST['inputTagKeywords'])."'";
		$update[]=$mod_tb_root."_metatitle='".changeQuot($_POST['inputTagTitle'])."'";
		}else if($_REQUEST['inputLt']=="Eng"){
		$update[]=$mod_tb_root."_subjecten='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root."_titleen='".changeQuot($_POST['inputDescription'])."'";
		$update[]=$mod_tb_root."_htmlfilenameen  	='".$filename."'";
		$update[]=$mod_tb_root."_descriptionen='".changeQuot($_POST['inputTagDescription'])."'";
		$update[]=$mod_tb_root."_keywordsen='".changeQuot($_POST['inputTagKeywords'])."'";
		$update[]=$mod_tb_root."_metatitleen='".changeQuot($_POST['inputTagTitle'])."'";
		}else{
		$update[]=$mod_tb_root."_subjectcn='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root."_titlecn='".changeQuot($_POST['inputDescription'])."'";
		$update[]=$mod_tb_root."_htmlfilenamecn  	='".$filename."'";
		$update[]=$mod_tb_root."_descriptioncn='".changeQuot($_POST['inputTagDescription'])."'";
		$update[]=$mod_tb_root."_keywordscn='".changeQuot($_POST['inputTagKeywords'])."'";
		$update[]=$mod_tb_root."_metatitlecn='".changeQuot($_POST['inputTagTitle'])."'";
		}
 
		 $update[]=$mod_tb_root."_gid='".$_POST["inputGroup"]."'";
		$update[]=$mod_tb_root."_picshow='".$_POST["inputShowpic"]."'";

		$update[]=$mod_tb_root."_type='".$_POST["inputType"]."'";
		$update[]=$mod_tb_root."_url='".changeQuot($_REQUEST['inputurl'])."'";
		$update[]=$mod_tb_root."_lastbyid='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$mod_tb_root."_lastby='".$_SESSION[$valSiteManage.'core_session_name']."'";
		if($_REQUEST['cdateInput']!=""){
		$update[]=$mod_tb_root."_credate  	='".DateFormatInsertCre($_REQUEST['cdateInput'])."'";
		}else{
		$update[]=$mod_tb_root."_credate=NOW()";
		}

		$update[]=	$mod_tb_root."_lastdate=NOW()";
		$update[]=	$mod_tb_root."_sdate  	='".DateFormatInsert($sdateInput)."'";
		$update[]=	$mod_tb_root."_edate  	='".DateFormatInsert($edateInput)."'";
		$update[] = $mod_tb_root . "_typec = '" . $_REQUEST["inputTypeC"] . "'";
		$update[] = $mod_tb_root . "_urlc = '" . $_REQUEST["inputurlc"] . "'";
		$update[] = $mod_tb_root . "_target  	='".$_POST['inputTarget']."'";

		 $sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$_POST["valEditID"]."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);

$delsql = " DELETE FROM ".$mod_fd_project_news." WHERE ".$mod_fd_project_news."_nid = '".$_POST["valEditID"]."' ";
$delauery = wewebQueryDB($coreLanguageSQL,$delsql);

		if (!empty($_POST['projectSelect'])) {
        foreach ($_POST['projectSelect'] as $listaddProject) {

            $insert = array();
            $insert[$mod_fd_project_news . "_nid"] = "'" . $_POST["valEditID"] . "'";
            $insert[$mod_fd_project_news . "_pid"] = "'" . $listaddProject . "'";

            $sql = "INSERT INTO " . $mod_fd_project_news . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL,$sql);
        }
    }


//		$update=array();
//		$update[]=$mod_tb_root."_subjectcn='".changeQuot($_POST['inputSubject'])."'";
//		$update[]=$mod_tb_root."_titlecn='".changeQuot($_POST['inputDescription'])."'";
//		$sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE 1=1 ";
//		$Query=wewebQueryDB($coreLanguageSQL,$sql);

		logs_access('3','Update');

		?>
        <?php   } ?>
 <?php   include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php   echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo $_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php   echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php   echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php   echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php   echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php   echo $_REQUEST['inputGh']?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php   echo $_REQUEST['inputTh']?>" />
</form>
<script language="JavaScript" type="text/javascript">document.myFormAction.submit(); </script>
            		</body></html>
