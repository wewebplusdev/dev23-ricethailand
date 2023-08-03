<?php  
$check_login_status = 1;
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

$sql = "SELECT 
" .$core_tb_staff_tmp. "_id,
" .$core_tb_staff_tmp. "_credate,
" .$core_tb_staff_tmp. "_lastdate,
" .$core_tb_staff_tmp. "_active_status
FROM
" .$core_tb_staff_tmp. "
WHERE 
" .$core_tb_staff_tmp. "_active_status = '" . $_REQUEST['token'] . "'
";
$query = wewebQueryDB($coreLanguageSQL,$sql);
$NumRow = wewebNumRowsDB($coreLanguageSQL,$query);
if($NumRow >= 0){
    $row = wewebFetchArrayDB($coreLanguageSQL,$query);
    $date = date('Y-m-d H:i:s');

    if(DateDiff($row['sy_stf_tmp_credate'],$date) < 1){
        ?>
        <script language="JavaScript"  type="text/javascript">
            document.location.href = "./resultForget.php?action=success&token=<?php   echo $_REQUEST['token'];?>";
        </script>
        <?php  
    }else{
        ?>
        <script language="JavaScript"  type="text/javascript">
            document.location.href = "./resultForget.php";
        </script>
        <?php  
    }

}else{
    ?>
    <script language="JavaScript"  type="text/javascript">
        document.location.href = "./resultForget.php";
    </script>
    <?php  
}







wewebDisconnect($coreLanguageSQL);
?>