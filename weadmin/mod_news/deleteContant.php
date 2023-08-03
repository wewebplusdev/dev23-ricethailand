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
		
			$sql = "SELECT  
			".$mod_tb_root."_htmlfilename,
			".$mod_tb_root."_pic,
			".$mod_tb_root."_filevdo ,
			".$mod_tb_root."_crebyid as crebyid  
			FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_id='".$permissionID."' ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$value_crebyid=$Row['crebyid'];
			$value_permissionData =getCheckPermissionData($value_crebyid);
			if($value_permissionData =="RW"){
				$deletepichtml=$Row[0];
				$deletepic=$Row[1];
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
				
				
				######################### Delete  In Folder File ###############################
				$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid ='".$permissionID."'";
				$query_file=wewebQueryDB($coreLanguageSQL, $sql);
				$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
				if($number_row>=1){
					while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
					$downloadID = $row_file[0];
					$deletefilename=$row_file[1];
	
						if(file_exists($mod_path_file."/".$deletefilename)) {
							@unlink($mod_path_file."/".$deletefilename);
						}	
					
					}
				}
				
				$sql="DELETE FROM ".$mod_tb_file." WHERE   ".$mod_tb_file."_contantid='".$permissionID."' ";
				$Query=wewebQueryDB($coreLanguageSQL, $sql);
				
				######################### Delete  In Folder File ###############################
				$sql="SELECT ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid ='".$permissionID."'";
				$query_file=wewebQueryDB($coreLanguageSQL, $sql);
				$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
				if($number_row>=1){
					while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
					$downloadID = $row_file[0];
					$deletefilename=$row_file[1];
	
						if(file_exists($mod_path_album."/".$deletefilename)) {
							@unlink($mod_path_album."/".$deletefilename);
						}	
	
						if(file_exists($mod_path_album."/reB_".$deletefilename)) {
							@unlink($mod_path_album."/reB_".$deletefilename);
						}	
	
						if(file_exists($mod_path_album."/reO_".$deletefilename)) {
							@unlink($mod_path_album."/reO_".$deletefilename);
						}	
					}
				}
				
				$sql="DELETE FROM ".$mod_tb_root_album." WHERE   ".$mod_tb_root_album."_contantid='".$permissionID."' ";
				$Query=wewebQueryDB($coreLanguageSQL, $sql);
				
				######################### Delete  Contant ###############################
				$sql="DELETE FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id=".$permissionID." ";
				$Query=wewebQueryDB($coreLanguageSQL, $sql);
				
				## URL Search ###################################
				$sqlSch="DELETE FROM ".$core_tb_search." WHERE   ".$core_tb_search."_contantid='".$permissionID."'  AND ".$core_tb_search."_masterkey='".$_POST["masterkey"]."'  ";
				$querySch=wewebQueryDB($coreLanguageSQL, $sqlSch);
			}
		
		}}
		 logs_access('3','Delete');
	include("../lib/incRss.php");
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
    <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
    <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
    <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script> 
