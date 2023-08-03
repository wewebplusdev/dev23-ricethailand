<?php  
$check_login_status = 1;
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

$sql = "SELECT 
" .$core_tb_staff_tmp. "_id,
" .$core_tb_staff_tmp. "_prefix,
" .$core_tb_staff_tmp. "_gender,
" .$core_tb_staff_tmp. "_fnameeng,
" .$core_tb_staff_tmp. "_lnameeng,
" .$core_tb_staff_tmp. "_fnamethai,
" .$core_tb_staff_tmp. "_lnamethai,
" .$core_tb_staff_tmp. "_username,
" .$core_tb_staff_tmp. "_password,
" .$core_tb_staff_tmp. "_groupid,
" .$core_tb_staff_tmp. "_address,
" .$core_tb_staff_tmp. "_telephone,
" .$core_tb_staff_tmp. "_mobile,
" .$core_tb_staff_tmp. "_email,
" .$core_tb_staff_tmp. "_other,
" .$core_tb_staff_tmp. "_picture,
" .$core_tb_staff_tmp. "_crebyid,
" .$core_tb_staff_tmp. "_credate,
" .$core_tb_staff_tmp. "_lastdate,
" .$core_tb_staff_tmp. "_status,
" .$core_tb_staff_tmp. "_logdate,
" .$core_tb_staff_tmp. "_position,
" .$core_tb_staff_tmp. "_agency,
" .$core_tb_staff_tmp. "_active_status,
" .$core_tb_staff_tmp. "_groupid,
" .$core_tb_staff_tmp. "_usertype
FROM
" .$core_tb_staff_tmp. "
WHERE 
" .$core_tb_staff_tmp. "_active_status = '" . $_REQUEST['token'] . "'
";
$query = wewebQueryDB($coreLanguageSQL,$sql);
$NumRow = wewebNumRowsDB($coreLanguageSQL,$query);
// print_pre($NumRow);
// die;
if($NumRow > 0){
    $row = wewebFetchArrayDB($coreLanguageSQL,$query);
    $date = date('Y-m-d H:i:s');

    // +7 day
    $date_register = explode(' ',$row['sy_stf_tmp_credate']);
    $date_register_totime = strtotime($date_register[0]);
    $date_register_7day = strtotime("+7 day", $date_register_totime);

    $date_now = date('Y-m-d');
    $date_now_totime = strtotime($date_now);

    if($date_now_totime < $date_register_7day){
        //get max order
        $sql = "SELECT MAX(".$core_tb_staff."_order) FROM ".$core_tb_staff;
        $Query_order=wewebQueryDB($coreLanguageSQL,$sql);
        $RowOrder=wewebFetchArrayDB($coreLanguageSQL,$Query_order);
        $maxOrder = $RowOrder[0]+1;

        $insert=array();
        $insert[$core_tb_staff."_groupid"] = "'".changeQuot($row['sy_stf_tmp_groupid'])."'";
        // $insert[$core_tb_staff."_storeid"] = "'".changeQuot($row['inputStoreID'])."'";
        $insert[$core_tb_staff."_username"] = "'".changeQuot($row['sy_stf_tmp_username'])."'";
        $insert[$core_tb_staff."_password"] = "'".changeQuot($row['sy_stf_tmp_password'])."'";
        $insert[$core_tb_staff."_prefix"] = "'".changeQuot($row['sy_stf_tmp_prefix'])."'";
        $insert[$core_tb_staff."_gender"] = "'".changeQuot($row['sy_stf_tmp_gender'])."'";
        $insert[$core_tb_staff."_fnamethai"] = "'".changeQuot($row['sy_stf_tmp_fnamethai'])."'";
        $insert[$core_tb_staff."_lnamethai"] = "'".changeQuot($row['sy_stf_tmp_lnamethai'])."'";
        $insert[$core_tb_staff."_fnameeng"] = "'".changeQuot($row['sy_stf_tmp_fnameeng'])."'";
        $insert[$core_tb_staff."_lnameeng"] = "'".changeQuot($row['sy_stf_tmp_lnameeng'])."'";
        
        $insert[$core_tb_staff."_position"] = "'".changeQuot($row['sy_stf_tmp_position'])."'";	
        $insert[$core_tb_staff."_usertype"] = "'".changeQuot($row['sy_stf_tmp_usertype'])."'";	

        $insert[$core_tb_staff."_email"] = "'".changeQuot($row['sy_stf_tmp_email'])."'";		
        $insert[$core_tb_staff."_address"] = "'".changeQuot($row['sy_stf_tmp_address'])."'";
        $insert[$core_tb_staff."_telephone"] = "'".changeQuot($row['sy_stf_tmp_telephone'])."'";
        $insert[$core_tb_staff."_mobile"] = "'".changeQuot($row['sy_stf_tmp_mobile'])."'";
        $insert[$core_tb_staff."_other"] = "'".changeQuot($row['sy_stf_tmp_other'])."'";
        // $insert[$core_tb_staff."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
        // $insert[$core_tb_staff."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
        $insert[$core_tb_staff."_credate"] = "'".$row['sy_stf_tmp_credate']."'";
        $insert[$core_tb_staff."_lastdate"] = "'".$row['sy_stf_tmp_lastdate']."'";
        // $insert[$core_tb_staff."_unitid"] = "'".changeQuot($row['inputFixid'])."'";
        // $insert[$core_tb_staff."_unitid_sub"] = "'".changeQuot($row['inputFixSubid'])."'";
        $insert[$core_tb_staff."_agency"] = "'".changeQuot($row['sy_stf_tmp_agency'])."'";
        $insert[$core_tb_staff."_active_status"] = "'true'";
        $insert[$core_tb_staff."_status"] = "'".$row['sy_stf_tmp_status']."'";
        $insert[$core_tb_staff."_order"] = "'".$maxOrder."'";
        $sql="INSERT INTO ".$core_tb_staff."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
        // print_pre($_REQUEST);
        // print_pre($sql);
        wewebQueryDB($coreLanguageSQL,$sql);
        
        /* DELETE sy_stf_tmp */
        $sql = "DELETE FROM " . $core_tb_staff_tmp . " WHERE " . $core_tb_staff_tmp . "_id = '" . $row['sy_stf_tmp_id'] . "'";
        wewebQueryDB($coreLanguageSQL,$sql);
        // print_pre($sql);
        ?>
        <script language="JavaScript"  type="text/javascript">
            document.location.href = "./resultEmail.php?action=success";
        </script>
        <?php  
    }else{
        ?>
        <script language="JavaScript"  type="text/javascript">
            document.location.href = "./resultEmail.php?action=expire";
        </script>
        <?php  
    }

}else{
    ?>
    <script language="JavaScript"  type="text/javascript">
        document.location.href = "./resultEmail.php";
    </script>
    <?php  
}







wewebDisconnect($coreLanguageSQL);
?>