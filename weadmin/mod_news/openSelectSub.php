<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");
?>
<script>
function reload(){
	openSelectSub('openSelectSub.php');
	document.myForm.submit();
}
</script>
<?php 
// print_pre($_REQUEST);
$sql_group = "SELECT ";
		if($_REQUEST['inputLt']=="Thai"){
			$sql_group .= "  ".$mod_tb_dowload_group."_id,".$mod_tb_dowload_group."_subject";
		}else{
			$sql_group .= " ".$mod_tb_dowload_group."_id,".$mod_tb_dowload_group."_subjecten ";
		}

		 $sql_group .= "  FROM ".$mod_tb_dowload_group." WHERE  ".$mod_tb_dowload_group."_status !='Disable' AND ".$mod_tb_dowload_group."_agenid ='".$_REQUEST['inputGh2']."'  ORDER BY ".$mod_tb_dowload_group."_order DESC ";
    //  $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
    //  $row_group_agenid=wewebFetchArrayDB($coreLanguageSQL,$query_group)

?>
<select name="inputGh3" id="inputGh3" onchange="document.myForm.submit(); " class="formSelectSearchStyle">
              <option value="0"><?php  echo  "เลือก".$langMod["tit:selectma"] ?></option>
              <?php 
                $sql_group = "SELECT ";
                  if($_REQUEST['inputLt']=="Thai"){
                    $sql_group .= "  ".$mod_tb_dowload_group."_id,".$mod_tb_dowload_group."_subject";
                  }else{
                    $sql_group .= " ".$mod_tb_dowload_group."_id,".$mod_tb_dowload_group."_subject ";
                  }
                $sql_group .= "  FROM ".$mod_tb_dowload_group." WHERE  ".$mod_tb_dowload_group."_masterkey ='".$masterkeyDwn."' AND ".$mod_tb_dowload_group."_status != 'Disable'";
                if($_REQUEST['inputGh2'] == 0 ){
                      // if($_REQUEST['permis'] == 'admin' && ( $_REQUEST['agenopenselect'] == '' || $_REQUEST['agenopenselect'] == 0 )){
                      //   $sql_group .= "";
                      // }else{
                      //   $sql_group .= "  AND ".$mod_tb_dowload_group."_id in (SELECT ".$mod_tb_dowload_group."_id FROM ".$mod_tb_dowload_group." WHERE ".$mod_tb_dowload_group."_agenid = '".$_REQUEST['agenopenselect']."') ";
                      // }
                      $sql_group .= " 1=2";
                  }else{
                  	$sql_group .= "  AND ".$mod_tb_dowload_group."_id in (SELECT ".$mod_tb_dowload_group."_id FROM ".$mod_tb_dowload_group." WHERE ".$mod_tb_dowload_group."_agenid = '".$_REQUEST['inputGh2']."') ";
                  }
                $sql_group .= "ORDER BY ".$mod_tb_dowload_group."_order DESC";
                // print_pre($sql_group);
                $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                $row_groupid=$row_group[0];
                $row_groupname=$row_group[1];
              ?>
              <option value="<?php  echo  $row_groupid ?>" <?php  if($_REQUEST['inputGh3']==$row_groupid){ ?> selected="selected"
                <?php   } ?>><?php  echo  $row_groupname ?>
              </option>
              <?php  } ?>
            </select>

<?php 
include("../lib/disconnect.php");
?>
