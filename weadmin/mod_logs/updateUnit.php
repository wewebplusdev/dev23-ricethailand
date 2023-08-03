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
		$randomNumber = rand(111111111111,999999999999);

		if(!is_dir($core_pathname_upload."/".$masterkey)) { mkdir($core_pathname_upload."/".$masterkey,0777); }
		if(!is_dir($mod_path_html)) { mkdir($mod_path_html,0777); }
		
		$update=array();
		$update[]=$mod_tb_root."_subject='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root."_subjecten='".changeQuot($_POST['inputSubjectEn'])."'";
		$update[]=$mod_tb_root."_address='".changeQuot($_POST['inputAddress'])."'";
		$update[]=$mod_tb_root."_addressen='".changeQuot($_POST['inputAddressEn'])."'";
		$update[]=$mod_tb_root."_tel='".changeQuot($_POST['inputTel'])."'";
		$update[]=$mod_tb_root."_email='".changeQuot($_POST['inputEmail'])."'";
		$update[]=$mod_tb_root."_fax='".changeQuot($_POST['inputFax'])."'";
		
		$update[]=$mod_tb_root."_fb='".changeQuot($_POST['inputFacebook'])."'";
		$update[]=$mod_tb_root."_tw='".changeQuot($_POST['inputTwitter'])."'";
		$update[]=$mod_tb_root."_yt='".changeQuot($_POST['inputYoutube'])."'";
		
		$update[]=$mod_tb_root."_old='".changeQuot($_POST['inputOld'])."'";
		$update[]=$mod_tb_root."_oldurl='".changeQuot($_POST['inputOldWebsite'])."'";

		$update[]=$mod_tb_root."_latitude='".changeQuot($_POST['inputLatitude'])."'";
		$update[]=$mod_tb_root."_longitude='".changeQuot($_POST['inputLongitude'])."'";
		
		$update[]=$mod_tb_root."_color='".changeQuot($_POST['inputColor'])."'";
		$update[]=$mod_tb_root."_style='".changeQuot($_POST['inputTheme'])."'";

		$update[]=$mod_tb_root."_description='".changeQuot($_POST['inputTagDescription'])."'";
		$update[]=$mod_tb_root."_keywords='".changeQuot($_POST['inputTagKeywords'])."'";
		$update[]=$mod_tb_root."_metatitle='".changeQuot($_POST['inputTagTitle'])."'";
		
		$update[]=$mod_tb_root."_lastbyid='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$mod_tb_root."_lastby='".$_SESSION[$valSiteManage.'core_session_name']."'";
		if($_REQUEST['cdateInput']!=""){
		$update[]=$mod_tb_root."_credate  	='".DateFormatInsertCre($_REQUEST['cdateInput'])."'";
		}else{
		$update[]=$mod_tb_root."_credate=NOW()";
		}

		$update[]=$mod_tb_root."_lastdate=NOW()";

		 $sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$_POST["valEditID"]."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		

		logs_access('3','Update');
				
	## URL Search ###################################
		?>
        <?php  } ?>
 <?php  include("../lib/disconnect.php");?>
<form action="unti.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php  echo $_REQUEST['inputTh']?>" />
</form>            
<script language="JavaScript" type="text/javascript">document.myFormAction.submit(); </script>
            		</body></html>	
