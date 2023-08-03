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
    if ($_REQUEST['execute'] == "update") {

        $memberID = $_POST['valEditID'];

        $update = array();
        $update[] = $core_tb_staff . "_groupid  	='" . changeQuot($_REQUEST['inputgroupid']) . "'";
        $update[] = $core_tb_staff . "_storeid  	='" . changeQuot($_REQUEST['inputStoreID']) . "'";
        $update[] = $core_tb_staff . "_username  	='" . changeQuot($_REQUEST['inputUserName']) . "'";
        $update[] = $core_tb_staff . "_password  ='" . encodeStr(changeQuot($_REQUEST['inputPassword'])) . "'";
        $update[] = $core_tb_staff . "_prefix  	='" . changeQuot($_REQUEST['inputPrefix']) . "'";
        $update[] = $core_tb_staff . "_gender  	='" . changeQuot($_REQUEST['inputGender']) . "'";
        $update[] = $core_tb_staff . "_fnamethai  	='" . changeQuot($_REQUEST['inputfnamethai']) . "'";
        $update[] = $core_tb_staff . "_lnamethai  	='" . changeQuot($_REQUEST['inputlnamethai']) . "'";
        $update[] = $core_tb_staff . "_fnameeng  	='" . changeQuot($_REQUEST['inputfnameeng']) . "'";
        $update[] = $core_tb_staff . "_lnameeng  	='" . changeQuot($_REQUEST['inputlnameeng']) . "'";

        $update[] = $core_tb_staff . "_position  	='" . changeQuot($_REQUEST['inputPosirionUser']) . "'";
        $update[] = $core_tb_staff . "_usertype  	='" . changeQuot($_REQUEST['inputTypeUser']) . "'";

        $update[] = $core_tb_staff . "_email  	='" . changeQuot($_REQUEST['inputemail']) . "'";
        $update[] = $core_tb_staff . "_address  	='" . changeQuot($_REQUEST['inputlocation']) . "'";
        $update[] = $core_tb_staff . "_mobile  	='" . changeQuot($_REQUEST['inputmobile']) . "'";
        $update[] = $core_tb_staff . "_telephone  	='" . changeQuot($_REQUEST['inputtelephone']) . "'";
        $update[] = $core_tb_staff . "_other  	='" . changeQuot($_REQUEST['inputother']) . "'";

        $update[] = $core_tb_staff . "_unitid  	='" . changeQuot($_REQUEST['inputFixid']) . "'";
        $update[] = $core_tb_staff . "_unitid_sub  	='" . changeQuot($_REQUEST['inputFixSubid']) . "'";
        $update[] = $core_tb_staff . "_agency  	='" . changeQuot($_REQUEST['inputgroupAgency']) . "'";

        $update[] = $core_tb_staff . "_crebyid  	='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
        $update[] = $core_tb_staff . "_creby  	='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
        $update[] = $core_tb_staff . "_lastdate  	=" . wewebNow($coreLanguageSQL) . "";

        $sql = "UPDATE " . $core_tb_staff . " SET " . implode(",", $update) . " WHERE " . $core_tb_staff . "_id='" . $_REQUEST["valEditID"] . "' ";
        $Query = wewebQueryDB($coreLanguageSQL, $sql);

        // $sql = "DELETE FROM " . $core_tb_user . " WHERE " . $core_tb_user . "_uid=" . $_POST["valEditID"] . " ";
        // $Query = wewebQueryDB($coreLanguageSQL, $sql);


        logs_access('2', 'Update user');
    }

    ?>
    <?php include("../lib/disconnect.php"); ?>
    <form action="index.php" method="post" name="myFormAction" id="myFormAction">
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputgroupid'] ?>" />
        <input name="inputUT" type="hidden" id="inputUT" value="<?php echo $_REQUEST['inputTypeUser'] ?>" />
    </form>
    <script language="JavaScript" type="text/javascript">
        document.myFormAction.submit();
    </script>