<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
// print_pre($_REQUEST);
for($i=1;$i<=$_REQUEST['TotalCheckBoxID'];$i++) {
 $myVar=$_REQUEST['CheckBoxID'.$i];


	if(strlen($myVar)>=1) {
	$permissionID=$myVar;

    $sql = "SELECT  ".$mod_tb_root_group."_pic FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_id='".$permissionID."' ";
    // print_pre($sql);
    // die;
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$deletepic=$Row[0];
			$deletepichtml=$Row[0];
			$deletevideo=$Row[2];
			$deletepichtmlen=$Row[3];
			$deletepichtmlcn=$Row[4];
			
			######################## Delete  In Folder HTML ###############################
			if(file_exists($mod_path_html."/".$deletepichtml)) {
				@unlink($mod_path_html."/".$deletepichtml);
			}
			
			// if(file_exists($mod_path_html."/".$deletepichtmlen)) {
			// 	@unlink($mod_path_html."/".$deletepichtmlen);
			// }
			
			// if(file_exists($mod_path_html."/".$deletepichtmlcn)) {
			// 	@unlink($mod_path_html."/".$deletepichtmlcn);
			// }
			
			######################### Delete  In Folder Pic ###############################
			if(file_exists($mod_path_pictures."/".$deletepic)) {
				@unlink($mod_path_pictures."/".$deletepic);
			}
			
			if(file_exists($mod_path_office."/".$deletepic)) {
				@unlink($mod_path_office."/".$deletepic);
			}
			
			if(file_exists($mod_path_real."/".$deletepic)) {
				@unlink($mod_path_real."/".$deletepic);
			}

			######################### Delete  In Folder Video ###############################
			if(file_exists($mod_path_vdo."/".$deletevideo)) {
				@unlink($mod_path_vdo."/".$deletevideo);
			}
			
			// delete permission table
			$sql = "SELECT  ".$mod_tb_permisGroup."_id FROM ".$mod_tb_permisGroup." WHERE  ".$mod_tb_permisGroup."_cmgid='".$permissionID."' AND ".$mod_tb_permisGroup."_masterkey='".$_REQUEST['masterkey']."'";
			// print_pre($sql);
			// die;
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row_per=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$sql="DELETE FROM ".$mod_tb_permisGroup." WHERE ".$mod_tb_permisGroup."_id='".$Row_per[0]."' AND ".$mod_tb_permisGroup."_masterkey='".$_REQUEST['masterkey']."' ";
			// print_pre($sql);die;
			$Query=wewebQueryDB($coreLanguageSQL, $sql);

			$sql="DELETE FROM ".$mod_tb_root_group." WHERE ".$mod_tb_root_group."_id=".$permissionID." ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
		
		}}
		 logs_access('3','Delete Group');
	?>
<?php  include("../lib/disconnect.php");?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
    <input name="inputgroupID" type="hidden" id="inputgroupID" value="<?php  echo $_REQUEST['inputgroupID']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
