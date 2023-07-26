<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
echo 'test';
###################### Start insert logs ##################
if ($_SESSION[$valSiteManage . "core_session_level"] != "SuperAdmin") {
    logs_access('1', 'Logout');
}
###################### End logs ##################

$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Eng";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";
$_SESSION[$valSiteManage . 'core_session_usrcar'] = 0;
$_SESSION[$valSiteManage . "core_session_typeproblem"] = 0;
$_SESSION[$valSiteManage . "core_session_jwt"] = 0;
?>
<script language="JavaScript"  type="text/javascript">
    document.location.href = "../index.php";
</script>
