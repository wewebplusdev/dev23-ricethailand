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
		
			$sql = "SELECT ".$mod_tb_root."_file FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_id='".$permissionID."' ";
			//print_pre($sql);
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$deletefile=$Row[0];
			
			if(file_exists($mod_path_file."/".$deletefile)) {
				@unlink($mod_path_file."/".$deletefile);
			}
			
			
			######################### Delete  Contant ###############################
			$sql="DELETE FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id=".$permissionID." ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			
			## URL Search ###################################
			$sqlSch="DELETE FROM ".$core_tb_search." WHERE   ".$core_tb_search."_contantid='".$permissionID."'  AND ".$core_tb_search."_masterkey='".$_POST["masterkey"]."'  ";
			$querySch=wewebQueryDB($coreLanguageSQL,$sqlSch);
		
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
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script> 
