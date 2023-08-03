<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Manage Contant</title>
    </head>
    <body>
        <?php 
        if ($execute == "update") {
            $update=array();

            $update[] = $mod_tb_root_set . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
            $update[] = $mod_tb_root_set . "_subjecten='" . changeQuot($_POST['inputSubjecten']) . "'";

            $update[] = $mod_tb_root_set . "_title  	='" . changeQuot($_POST['inputTitle']) . "'";
            $update[] = $mod_tb_root_set . "_titleen  	='" . changeQuot($_POST['inputTitleen']) . "'";

            $update[] = $mod_tb_root_set . "_pic    ='" . $_POST['picname'] . "'";


            $update[] = $mod_tb_root_set . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            $update[] = $mod_tb_root_set . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            $update[] = $mod_tb_root_set . "_lastdate=NOW()";

            $sql = "UPDATE " . $mod_tb_root_set . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_set . "_id='" . $_POST["valEditID"] . "' ";
            $Query = wewebQueryDB($coreLanguageSQL,$sql);

            logs_access('3', 'Update Group');
            ?>
        <?php  } ?>
        <?php  include("../lib/disconnect.php"); ?>
        <form action="set.php" method="post" name="myFormAction" id="myFormAction">
            <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
            <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
            <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $_REQUEST['module_pageshow'] ?>" />
            <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $_REQUEST['module_pagesize'] ?>" />
            <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $_REQUEST['module_orderby'] ?>" />
            <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
        </form>
        <script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
    </body></html>
