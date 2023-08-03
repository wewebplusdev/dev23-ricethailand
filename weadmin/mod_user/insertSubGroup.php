<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

	if($_REQUEST['execute']=="insert"){

		$sql = "SELECT MAX(".$mod_tb_root_subgroup."_order) FROM ".$mod_tb_root_subgroup;
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$maxOrder = $Row[0]+1;

		$insert=array();
		$insert[$mod_tb_root_subgroup."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
		$insert[$mod_tb_root_subgroup."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
		$insert[$mod_tb_root_subgroup."_subject"] = "'".changeQuot($_REQUEST['inputSubject'])."'";
		$insert[$mod_tb_root_subgroup."_title"] = "'".changeQuot($_REQUEST['inputComment'])."'";
		$insert[$mod_tb_root_subgroup."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_subgroup."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_subgroup."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_subgroup."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_subgroup."_credate"] = "NOW()";
		$insert[$mod_tb_root_subgroup."_lastdate"] = "NOW()";
		$insert[$mod_tb_root_subgroup."_status"] = "'Disable'";
		$insert[$mod_tb_root_subgroup."_order"] = "'".$maxOrder."'";
		$insert[$mod_tb_root_subgroup."_gid"] = "'".changeQuot($_REQUEST['inputGroupID'])."'";


		// $insert[$mod_tb_root_subgroup."_pic"] = "'".$_POST["picname"]."'";

		$sql="INSERT INTO ".$mod_tb_root_subgroup."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);
		$contantID=wewebInsertID($coreLanguageSQL);




		 logs_access('3','Insert Group');
		 } ?>
<?php  include("../lib/disconnect.php");?>
<form action="subgroup.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputgroupid']?>" />
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
