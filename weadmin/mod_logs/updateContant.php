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
		$update[]=$mod_tb_root."_urlminisite='".changeQuot($_POST['inputUrlMinisite'])."'";
		$update[]=$mod_tb_root."_subject='".changeQuot($_POST['inputSubject'])."'";
		$update[]=$mod_tb_root."_color='".changeQuot($_POST['inputColor'])."'";
		$update[]=$mod_tb_root."_style='".changeQuot($_POST['inputTheme'])."'";
		
		$update[]=$mod_tb_root."_old='".changeQuot($_POST['inputOld'])."'";
		$update[]=$mod_tb_root."_oldurl='".changeQuot($_POST['inputOldWebsite'])."'";

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
		
		/* ################### Start Rename Folder ####################*/

		if(trim($_REQUEST['inputUrlMinisite'])!=trim($_REQUEST['inputUrlMiniO'])){
			$valFolderSite=trim($_REQUEST['inputUrlMinisite']);
			 $valFolderSiteO=$mod_path_minisite_folderCopy."/".$_REQUEST['inputUrlMiniO'];
			
			fulldelete($valFolderSiteO);
			
			if(!is_dir($mod_path_minisite_folderCopy."/".$valFolderSite)) { mkdir($mod_path_minisite_folderCopy."/".$valFolderSite,0777); }
			$fileWebConF =$mod_path_minisite_folder.'/webConf/index.php';
			$newFileWebConF =$mod_path_minisite_folderCopy."/".$valFolderSite.'/index.php';
			@copy($fileWebConF, $newFileWebConF);

		}
		
		$valMainUrlMinisite=$core_full_pathMinisite.$_REQUEST['inputUrlMinisite']."/";
		$valMainUrlMinisiteOld=$core_full_pathMinisite.$_REQUEST['inputUrlMiniO']."/";
		$sqlMenu = "SELECT  md_mue_id,md_mue_link,md_mue_linken FROM md_mue WHERE  md_mue_masterkey='".$_POST["valEditID"]."me' ";
		$QueryMenu = wewebQueryDB($coreLanguageSQL,$sqlMenu);
		while($RowMenu = wewebFetchArrayDB($coreLanguageSQL,$QueryMenu)) {
		$valMenuID = $RowMenu[0];
		$valMenuLink = str_replace($valMainUrlMinisiteOld,$valMainUrlMinisite,$RowMenu[1]);
		$valMenuLinkEn = str_replace($valMainUrlMinisiteOld,$valMainUrlMinisite,$RowMenu[2]);
		
		$update=array();
		$update[]="md_mue_link  	='".$valMenuLink."'";
		$update[]="md_mue_linken  	='".$valMenuLinkEn."'";

		 $sqlUpdate="UPDATE md_mue SET ".implode(",",$update)." WHERE md_mue_id='".$valMenuID."' ";
		$queryUpdate=wewebQueryDB($coreLanguageSQL,$sqlUpdate);	
		
		}

		/* ################### End Rename Folder ####################*/
		if($_REQUEST['inputMemberId']>=1){
		
		/* ################### Start Update Username Unit ####################*/
		$update=array();
		$update[]=$core_tb_staff."_username  	='".changeQuot($_REQUEST['inputUsername'])."'";
		$update[]=$core_tb_staff."_password  ='".encodeStr(changeQuot($_REQUEST['inputPassword']))."'";
		
		$update[]=$core_tb_staff."_crebyid  	='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$core_tb_staff."_creby  	='".$_SESSION[$valSiteManage.'core_session_name']."'";
		$update[]=$core_tb_staff."_lastdate  	=".wewebNow($coreLanguageSQL)."";

		 $sql="UPDATE ".$core_tb_staff." SET ".implode(",",$update)." WHERE ".$core_tb_staff."_id='".$_REQUEST['inputMemberId']."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		
		/* ################### End Update Username Unit ####################*/
		
		}else{
		
		/* ################### Start Insert Username&Password ####################*/
		$insert = array();
		$valUserGID =$valModPermissionGroupID;
		$valUserName =$_REQUEST['inputUsername'];
		$valUserPass =$_REQUEST['inputPassword'];
		$valUserPrefix ="Mr.";
		$valUserGender ="Male";
		$valUserFnameThai =$_REQUEST['inputUrlMinisite'];
		$valUserLnameThai ="Admin";
		$valUserFnameEng =$_REQUEST['inputUrlMinisite'];
		$valUserLnameEng ="Admin";
		$valUserEmail ="";
		$valUserLocation ="";
		$valUserTelephone =$_REQUEST['inputTel'];
		$valUserMobile ="";
		$valUserOther ="";

		$sql = "SELECT MAX(".$core_tb_staff."_order) FROM ".$core_tb_staff;
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$maxOrder = $Row[0]+1;
		
		$insert=array();
		$insert[$core_tb_staff."_groupid"] = "'".changeQuot($valUserGID)."'";
		$insert[$core_tb_staff."_username"] = "'".changeQuot($valUserName)."'";
		$insert[$core_tb_staff."_password"] = "'".encodeStr(changeQuot($valUserPass))."'";
		$insert[$core_tb_staff."_prefix"] = "'".changeQuot($valUserPrefix)."'";
		$insert[$core_tb_staff."_gender"] = "'".changeQuot($valUserGender)."'";
		$insert[$core_tb_staff."_fnamethai"] = "'".changeQuot($valUserFnameThai)."'";
		$insert[$core_tb_staff."_lnamethai"] = "'".changeQuot($valUserLnameThai)."'";
		$insert[$core_tb_staff."_fnameeng"] = "'".changeQuot($valUserFnameEng)."'";
		$insert[$core_tb_staff."_lnameeng"] = "'".changeQuot($valUserLnameEng)."'";		
		$insert[$core_tb_staff."_email"] = "'".changeQuot($valUserEmail)."'";		
		$insert[$core_tb_staff."_address"] = "'".changeQuot($valUserLocation)."'";
		$insert[$core_tb_staff."_telephone"] = "'".changeQuot($valUserTelephone)."'";
		$insert[$core_tb_staff."_mobile"] = "'".changeQuot($valUserMobile)."'";
		$insert[$core_tb_staff."_other"] = "'".changeQuot($valUserOther)."'";
		$insert[$core_tb_staff."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$core_tb_staff."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$core_tb_staff."_credate"] = "".wewebNow($coreLanguageSQL)."";
		$insert[$core_tb_staff."_lastdate"] = "".wewebNow($coreLanguageSQL)."";
		$insert[$core_tb_staff."_status"] = "'Enable'";
		$insert[$core_tb_staff."_order"] = "'".$maxOrder."'";
		$insert[$core_tb_staff."_typemini"] = "'1'";
		$sql="INSERT INTO ".$core_tb_staff."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		$valStaffID=wewebInsertID($coreLanguageSQL);
		
		/* ################### End Insert Username&Password ####################*/
		
		/* ################### Start Update Unit ####################*/
		$update=array();
		$update[]=$mod_tb_root."_memid  	='".changeQuot($valStaffID)."'";
		$sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$_POST["valEditID"]."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		/* ################### Start Update Unit ####################*/

		}

		logs_access('3','Update');
				
	## URL Search ###################################
		?>
        <?php  } ?>
 <?php  include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
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
