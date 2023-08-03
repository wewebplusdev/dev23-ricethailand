<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

	$sql_group = "SELECT ";
	$sql_group .= " ".$mod_tb_root_group."_typeplan as _typeplan ";
	$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey']."' AND ".$mod_tb_root_group."_status != 'Disable'   ";
	$sql_group .= " AND ".$mod_tb_root_group."_id  ='".$_REQUEST['inputGroupID']."'  ";
	$sql_group .= " ORDER BY ".$mod_tb_root_group."_order DESC ";
	$query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
	$row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
	$value_typeplan = $row_group['_typeplan'];
	//print_pre($value_typeplan);
include("../lib/disconnect.php");
?>
<?php  
if($value_typeplan==2){
?>
<script language="JavaScript" type="text/javascript">
	$('#rowKmActionPlan').show();
	$('#inputKmAction').val('<?php   echo $value_typeplan;?>');
</script>
<?php   }else{?>
<script language="JavaScript" type="text/javascript">
	$('#rowKmActionPlan').hide();
	$('#inputDwnID').val('0');
	$('#inputKmAction').val('');
</script>
<?php   } ?>

