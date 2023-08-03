<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");


	$sql_group = "SELECT ";
	$sql_group .= "  
	".$mod_tb_dowload."_id,
	".$mod_tb_dowload."_subject ";
	$sql_group .= "  FROM ".$mod_tb_dowload." WHERE  ".$mod_tb_dowload."_masterkey ='".$masterkeyDwn."' AND ".$mod_tb_dowload."_status != 'Disable'";
	$sql_group .= "  AND ".$mod_tb_dowload."_yearid = '".$_REQUEST['inputGroupyear']."' ";
	$sql_group .= "  AND ".$mod_tb_dowload."_agencyid = '".$_REQUEST['inputAgency']."' ";
	$sql_group .= "ORDER BY ".$mod_tb_dowload."_order DESC";
	//print_pre($sql_group);
?>
  <link href="../js/select2/css/select2.css?v=<?php   echo date('YmdHis');?>" rel="stylesheet"/>
  <script language="JavaScript"  type="text/javascript" src="../js/select2/js/select2.js"></script>

  <script language="JavaScript" type="text/javascript">

    jQuery(document).ready(function() {

      $('.select2').select2();
    });
	</script>
<select name="inputDwnID" id="inputDwnID"  class="formSelectContantTb select2">
              <option value="0"><?php  echo  $langMod["dev0821:kmactionSel"] ?></option>
              <?php 
                $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                $row_groupid=$row_group[0];
                $row_groupname=$row_group[1];
              ?>
              <option value="<?php  echo  $row_groupid ?>" <?php  if($_REQUEST['valdwnid']==$row_groupid){ ?> selected="selected"
                <?php   } ?>><?php  echo  $row_groupname ?>
              </option>
              <?php  } ?>
            </select>

<?php 
include("../lib/disconnect.php");
?>
