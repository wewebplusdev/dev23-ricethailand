<?php 	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$valMaxOrder = $_POST['inputMaxOrder'];
$valSortArray=explode("&listItem[]=","&".$_POST['inputSort']);
$valSortCount= count($valSortArray);
 
	for($i=0;$i<$valSortCount;$i++){
		$valSort =$valSortArray[$i];
		$valOrder = $valMaxOrder-$i;
		if($valSort>=1){
			 $sql = "UPDATE ".$mod_tb_root." SET ".$mod_tb_root."_order = $valOrder WHERE ".$mod_tb_root."_id = $valSort";
			$query=wewebQueryDB($coreLanguageSQL, $sql);
		}
			
	}

logs_access('3','Sort');
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
    <input name="inputTh" type="hidden" id="inputTh" value="<?php  echo $_REQUEST['inputTh']?>" />
    <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
    <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
    <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
