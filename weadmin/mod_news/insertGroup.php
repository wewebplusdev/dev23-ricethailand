<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

	
	if($_REQUEST['execute']=="insert"){

		$sql = "SELECT MAX(".$mod_tb_root_group."_order) FROM ".$mod_tb_root_group;
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$maxOrder = $Row[0] + 1;

		$insert=array();
		$insert[$mod_tb_root_group."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
		$insert[$mod_tb_root_group."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
		// $insert[$mod_tb_root_group."_coreid"] = "'".changeQuot($_REQUEST['inputGroupID'])."'";
		$insert[$mod_tb_root_group . "_col"] = "'" . changeQuot($_REQUEST['inputColor']) . "'";
		$insert[$mod_tb_root_group."_subject"] = "'".changeQuot($_REQUEST['inputSubject'])."'";
		$insert[$mod_tb_root_group."_agenid"] = "'".changeQuot($_REQUEST['inputGroupID'])."'";
		$insert[$mod_tb_root_group."_title"] = "'".changeQuot($_REQUEST['inputComment'])."'";
		$insert[$mod_tb_root_group."_typeplan"] = "'".changeQuot($_REQUEST['inputTypePlan'])."'";
		$insert[$mod_tb_root_group."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_group."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_group."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_group."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_group."_credate"] = "NOW()";
		$insert[$mod_tb_root_group."_lastdate"] = "NOW()";
		$insert[$mod_tb_root_group."_status"] = "'Disable'";
		$insert[$mod_tb_root_group."_typeInfo"] = "0";
		$insert[$mod_tb_root_group."_order"] = "'".$maxOrder."'";
		$insert[$mod_tb_root_group."_col"] = "'" . $_POST["inputColor"] . "'";

		$insert[$mod_tb_root_group."_pic"] = "'".$_POST["picname"]."'";

		$sql="INSERT INTO ".$mod_tb_root_group."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		// print_pre($sql);die;
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$contantID=wewebInsertID($coreLanguageSQL);
		// print_pre($contantID);
		// die;
		/* insert permission */ 
		if($_SESSION[$valSiteManage.'core_session_level'] != "admin" && ( $_SESSION[$valSiteManage.'core_session_agency'] > 0 || $_SESSION[$valSiteManage.'core_session_agency'] != '')){
			$insert_per[$mod_tb_permisGroup . "_misid"] = "" . $_SESSION[$valSiteManage.'core_session_agency'] . "";
			$insert_per[$mod_tb_permisGroup . "_cmgid"] = "" . $contantID . "";
			$insert_per[$mod_tb_permisGroup . "_status"] = "'Enable'";
			$insert_per[$mod_tb_permisGroup . "_masterkey"] = "'" . $_POST['masterkey'] . "'";

			$sql = "INSERT INTO " . $mod_tb_permisGroup . "(" . implode(",", array_keys($insert_per)) . ") VALUES (" . implode(",", array_values($insert_per)) . ")";
			// print_pre($sql);
			$Query = wewebQueryDB($coreLanguageSQL, $sql);
		}



		 logs_access('3','Insert Group');
		 } ?>
<?php  include("../lib/disconnect.php");?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
	<input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
	<input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputgroupid'] ?>" />
	<input name="inputgroupID" type="hidden" id="inputgroupID" value="<?php  echo  $_REQUEST['inputgroupID'] ?>" />
</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>