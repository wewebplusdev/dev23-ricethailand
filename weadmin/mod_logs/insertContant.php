<?php 	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

	if($_REQUEST['execute']=="insert"){
		$randomNumber = rand(111,999);

		if(!is_dir($core_pathname_upload."/".$masterkey)) { mkdir($core_pathname_upload."/".$masterkey,0777); }
		if(!is_dir($mod_path_html)) { mkdir($mod_path_html,0777); }
		$valMainUrlMinisite=$core_full_pathMinisite.$_REQUEST['inputUrlMinisite']."/";
			
		$sql = "SELECT MAX(".$mod_tb_root."_order) FROM ".$mod_tb_root;
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$maxOrder = $Row[0]+1;
		
		$insert=array();
		$insert[$mod_tb_root."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
		$insert[$mod_tb_root."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
		
		$insert[$mod_tb_root."_urlminisite"] = "'".changeQuot(trim($_REQUEST['inputUrlMinisite']))."'";
		$insert[$mod_tb_root."_subject"] = "'".changeQuot($_REQUEST['inputSubject'])."'";
		$insert[$mod_tb_root."_color"] = "'".changeQuot($_REQUEST['inputColor'])."'";
		
		$insert[$mod_tb_root."_old"] = "'".changeQuot($_REQUEST['inputOld'])."'";
		$insert[$mod_tb_root."_oldurl"] = "'".changeQuot($_REQUEST['inputOldWebsite'])."'";
		
		$insert[$mod_tb_root."_style"] = "'".changeQuot($_REQUEST['inputTheme'])."'";
		$insert[$mod_tb_root."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		
		if($_REQUEST['cdateInput']!=""){
		$insert[$mod_tb_root."_credate"]="'".DateFormatInsert($_REQUEST['cdateInput'])."'";
		}else{
		$insert[$mod_tb_root."_credate"] = "NOW()";
		}

		$insert[$mod_tb_root."_lastdate"] = "NOW()";
		$insert[$mod_tb_root."_status"] = "'Disable'";
		$insert[$mod_tb_root."_order"] = "'".$maxOrder."'";
		 $sql="INSERT INTO ".$mod_tb_root."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);			
		$contantID=wewebInsertID($coreLanguageSQL);
		
		/* ################### Start Create Folder ####################*/
			$valFolderSite=trim($_REQUEST['inputUrlMinisite']);
			if(!is_dir($mod_path_minisite_folderCopy."/".$valFolderSite)) { mkdir($mod_path_minisite_folderCopy."/".$valFolderSite,0777); }
		
			$fileWebConF =$mod_path_minisite_folder.'/webConf/index.php';
			$newFileWebConF =$mod_path_minisite_folderCopy."/".$valFolderSite.'/index.php';
			@copy($fileWebConF, $newFileWebConF);
		
		/* ################### End Create Folder ####################*/
		
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
		$sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$contantID."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		/* ################### Start Update Unit ####################*/

		 logs_access('3','Insert');
		 
		 } ?>
<?php  include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php  echo $_REQUEST['inputTh']?>" />
</form>            
<script language="JavaScript" type="text/javascript">document.myFormAction.submit(); </script>
