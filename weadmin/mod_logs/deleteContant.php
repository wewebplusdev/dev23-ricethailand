<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

for($i=1;$i<=$_REQUEST['TotalCheckBoxID'];$i++) {
 $myVar=$_REQUEST['CheckBoxID'.$i];


	if(strlen($myVar)>=1) {
	$permissionID=$myVar;
		
			$sql = "SELECT  ".$mod_tb_root."_picmap,".$mod_tb_root."_pic,".$mod_tb_root."_urlminisite,".$mod_tb_root."_memid,".$mod_tb_root."_qr  FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_id='".$permissionID."' ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$deletepicmap=$Row[0];
			$deletepic=$Row[1];
			$valFolderSite=$Row[2];
			$valFolderSiteO=$mod_path_minisite_folderCopy."/".$valFolderSite;
			$valMemberId=$Row[3];
			$deletepicqr=$Row[4];
		######################### Delete  In Folder Pic Map ###############################
			if(file_exists($mod_path_pictures."/".$deletepicmap)) {
				@unlink($mod_path_pictures."/".$deletepicmap);
			}
			
			if(file_exists($mod_path_office."/".$deletepicmap)) {
				@unlink($mod_path_office."/".$deletepicmap);
			}
			
			if(file_exists($mod_path_real."/".$deletepicmap)) {
				@unlink($mod_path_real."/".$deletepicmap);
			}
			
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
			######################### Delete  In Folder Pic QR ###############################
			if(file_exists($mod_path_pictures."/".$deletepicqr)) {
				@unlink($mod_path_pictures."/".$deletepicqr);
			}
			
			if(file_exists($mod_path_office."/".$deletepicqr)) {
				@unlink($mod_path_office."/".$deletepicqr);
			}
			
			if(file_exists($mod_path_real."/".$deletepicqr)) {
				@unlink($mod_path_real."/".$deletepicqr);
			}
			
			######################### Delete  In Folder Site ###############################
			
			fulldelete($valFolderSiteO);
			
			
			######################### Delete  Contant ###############################
			$sql="DELETE FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id=".$permissionID." ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
 		######################### END Delete  Contant ###############################
		

		######################### Start Delete User ###############################
		$sql="DELETE FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$valMemberId."'  AND  ".$core_tb_staff."_typemini='1' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		######################### END Delete User ###############################
		
		
			

		}}
		 logs_access('3','Delete');
	?>
<?php  include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
