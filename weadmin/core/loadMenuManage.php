<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");

$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:menuManage2"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <link href="../css/theme.css" rel="stylesheet" />
    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/jquery-1.9.0.js"></script>
    <script language="JavaScript" type="text/javascript" src="../js/jquery.blockUI.js"></script>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script type="text/javascript" language="javascript">


    </script>
</head>

<body>
    <form action="?" method="post" name="myForm" id="myForm">
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />

        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo  $valNav2 ?></span></td>
                    <td class="divRightNavTb" align="right">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right"><input name="inputSearch" type="text" id="inputSearch" value="<?php echo  trim($_REQUEST['inputSearch']) ?>" class="inputContantTb" /></td>
                                <td align="right"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();" type="button" class="btnSearch" value=" " /></td>
                            </tr>
                        </table>


                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $valNav2 ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <div class="btnAdd" title="<?php echo  $langTxt["btn:add"] ?>" onclick="addContactNew('../core/addMg.php');"></div>
                                    <div class="btnDel" title="<?php echo  $langTxt["btn:del"] ?>" onclick="
                                                            if (Paging_CountChecked('CheckBoxID', document.myForm.TotalCheckBoxID.value) > 0) {
                                                                if (confirm('<?php echo  $langTxt["mg:delpermis"] ?>')) {
                                                                    delContactNew('../core/deleteMg.php');
                                                                }
                                                            } else {
                                                                alert('<?php echo  $langTxt["mg:selpermis"] ?>');
                                                            }
                                                          "></div>
                                    <div class="btnSort" title="<?php echo  $langTxt["btn:sortting"] ?>" onclick="sortContactNew('../core/sortMg.php');"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
                <tr>
                    <td width="3%" class="divRightTitleTbL" valign="middle" align="center">
                        <input name="CheckBoxAll" type="checkbox" id="CheckBoxAll" value="Yes" onClick="Paging_CheckAll(this, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" class="formCheckboxHead" />
                    </td>

                    <td class="divRightTitleTb" valign="middle" align="left"><span class="fontTitlTbRight"><?php echo  $langTxt["mg:subject"] ?></span></td>
                    <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo  $langTxt["mg:type"] ?></span></td>
                    <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo  $langTxt["mg:show"] ?></span></td>
                    <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo  $langTxt["mg:status"] ?></span></td>
                    <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo  $langTxt["us:credate"] ?></span></td>
                    <td width="12%" class="divRightTitleTbR" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo  $langTxt["mg:manage"] ?></span></td>
                </tr>
                <?php
                $myParentID = 0;
                $sql = "SELECT * FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='" . $myParentID . "' ";
                $inputSearch = trim($_REQUEST['inputSearch']);
                if ($inputSearch <> "") {
                    $sql = $sql . "  AND   ( " . $core_tb_menu . "_namethai LIKE '%$inputSearch%' OR  " . $core_tb_menu . "_nameeng LIKE '%$inputSearch%'   ) ";
                }

                $sql = $sql . " ORDER BY " . $core_tb_menu . "_order ASC ";
                $query = wewebQueryDB($coreLanguageSQL, $sql);
                $recordCount = wewebNumRowsDB($coreLanguageSQL, $query);
                $maxOrder = $recordCount;
                if ($recordCount >= 1) {
                    $index = 1;
                    while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                        //print_pre($row);
                        $valID = $row[$core_tb_menu . "_id"];
                        if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                            $valName = rechangeQuot($row[$core_tb_menu . "_namethai"]);
                        } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                            $valName = rechangeQuot($row[$core_tb_menu . "_nameeng"]);
                        }

                        $valType = $row[$core_tb_menu . "_moduletype"];
                        $valDateCredate = dateFormatReal($row[$core_tb_menu . "_credate"]);
                        $valTimeCredate = timeFormatReal($row[$core_tb_menu . "_credate"]);
                        $valStatus = $row[$core_tb_menu . "_status"];
                        if ($valStatus == "Enable") {
                            $valStatusClass = "fontContantTbEnable";
                        } else {
                            $valStatusClass = "fontContantTbDisable";
                        }

                        $valParentType = $row[$core_tb_menu . "_moduletype"];
                        $valShowmenu = $row[$core_tb_menu . "_hidden"];

                        if ($valShowmenu == "Disable") {
                            $valShowClass = "fontContantTbDisable";
                        } else {
                            $valShowClass = "fontContantTbEnable";
                            $valShowmenu = "Show";
                        }
                ?>
                        <tr class="divOverTb">
                            <td class="divRightContantOverTbL" valign="top" align="center"><input id="CheckBoxID<?php echo  $index ?>" name="CheckBoxID<?php echo  $index ?>" type="checkbox" class="formCheckboxList" onClick="Paging_CheckAllHandle(document.myForm.CheckBoxAll, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" value="<?php echo  $valID ?>" /> </td>
                            <td class="divRightContantOverTb" valign="top" align="left"><a href="javascript:void(0)" onclick="
                                                    document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                                    viewContactNew('../core/viewMg.php');"><?php echo  $valName ?></a></td>
                            <td class="divRightContantOverTb" valign="top" align="center">
                                <span class="fontContantTbupdate"><?php echo  $valType ?></span>

                            </td>

                            <!-- การแสดงผล -->

                            <td class="divRightContantOverTb" valign="top" align="center">
                                <div id="load_show<?php echo  $valID ?>">
                                    <?php if ($valShowmenu == "Disable") { ?>

                                        <a href="javascript:void(0)" onclick="changeStatusShow('load_waitingShow<?php echo  $valID ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valShowmenu ?>', '<?php echo  $valID ?>', 'load_show<?php echo  $valID ?>', '../core/showMg.php')"><span class="<?php echo  $valShowClass ?>"><?php echo  $valShowmenu ?></span></a>

                                    <?php } else { ?>

                                        <a href="javascript:void(0)" onclick="changeStatusShow('load_waitingShow<?php echo  $valID ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valShowmenu ?>', '<?php echo  $valID ?>', 'load_show<?php echo  $valID ?>', '../core/showMg.php')"> <span class="<?php echo  $valShowClass ?>"><?php echo  $valShowmenu ?></span> </a>

                                    <?php } ?>

                                    <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waitingShow<?php echo  $valID ?>" />
                                </div>
                            </td>

                            <!-- การแสดงผล -->


                            <td class="divRightContantOverTb" valign="top" align="center">
                                <div id="load_status<?php echo  $valID ?>">
                                    <?php if ($valStatus == "Enable") { ?>

                                        <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?php echo  $valID ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valStatus ?>', '<?php echo  $valID ?>', 'load_status<?php echo  $valID ?>', '../core/statusMg.php')"><span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span></a>

                                    <?php } else { ?>

                                        <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?php echo  $valID ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valStatus ?>', '<?php echo  $valID ?>', 'load_status<?php echo  $valID ?>', '../core/statusMg.php')"> <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span> </a>

                                    <?php } ?>

                                    <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waiting<?php echo  $valID ?>" />
                                </div>
                            </td>
                            <td class="divRightContantOverTb" valign="top" align="center">
                                <span class="fontContantTbupdate"><?php echo  $valDateCredate ?></span><br />
                                <span class="fontContantTbTime"><?php echo  $valTimeCredate ?></span>
                            </td>
                            <td class="divRightContantOverTbR" valign="top" align="center">
                                <table border="0" cellspacing="0" cellpadding="0" align="right">
                                    <tr>
                                        <?php if ($valType == "Group") { ?>
                                            <td valign="top" align="center" width="30">
                                                <div class="divRightManage" title="<?php echo  $langTxt["btn:add"] ?>" onclick="
                                                                        document.myFormHome.myParentID.value =<?php echo  $valID ?>;
                                                                        addContactNew('../core/addMg.php');
                                                                     ">
                                                    <img src="../img/btn/add1.png" /><br />
                                                    <span class="fontContantTbManage"><?php echo  $langTxt["btn:add"] ?></span>
                                                </div>
                                            </td>
                                        <?php } ?>
                                        <td valign="top" align="center" width="30">
                                            <div class="divRightManage" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                                                    document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                                                    editContactNew('../core/editMg.php');">
                                                <img src="../img/btn/edit.png" /><br />
                                                <span class="fontContantTbManage"><?php echo  $langTxt["btn:edit"] ?></span>
                                            </div>
                                        </td>
                                        <td valign="top" align="center" width="30">
                                            <div class="divRightManage" title="<?php echo  $langTxt["btn:del"] ?>" onClick="
                                                                    if (confirm('<?php echo  $langTxt["mg:delpermis"] ?>')) {
                                                                        Paging_CheckedThisItem(document.myForm.CheckBoxAll, <?php echo  $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value);
                                                                        delContactNew('../core/deleteMg.php');
                                                                    }
                                                                 ">
                                                <img src="../img/btn/delete.png" /><br />
                                                <span class="fontContantTbManage"><?php echo  $langTxt["btn:del"] ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <?php
                        if ($valParentType == "Group") {
                            $sqlSub = "SELECT * FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='" . $valID . "' ORDER BY " . $core_tb_menu . "_order ASC ";
                            $querySub = wewebQueryDB($coreLanguageSQL, $sqlSub);
                            $recordCountSub = wewebNumRowsDB($coreLanguageSQL, $querySub);
                            $maxOrderSub = $recordCountSub;
                            if ($recordCountSub >= 1) {
                                while ($rowSub = wewebFetchArrayDB($coreLanguageSQL, $querySub)) {
                                    $index++;
                                    $valIDSub = $rowSub[$core_tb_menu . "_id"];
                                    if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                        $valNameSub = rechangeQuot($rowSub[$core_tb_menu . "_namethai"]);
                                    } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                        $valNameSub = rechangeQuot($rowSub[$core_tb_menu . "_nameeng"]);
                                    }

                                    $valTypeSub = $rowSub[$core_tb_menu . "_moduletype"];
                                    $valDateCredateSub = dateFormatReal($rowSub[$core_tb_menu . "_credate"]);
                                    $valTimeCredateSub = timeFormatReal($rowSub[$core_tb_menu . "_credate"]);
                                    $valStatusSub = $rowSub[$core_tb_menu . "_status"];
                                    if ($valStatusSub == "Enable") {
                                        $valStatusClass = "fontContantTbEnable";
                                    } else {
                                        $valStatusClass = "fontContantTbDisable";
                                    }

                                    $valShowmenu = $rowSub[$core_tb_menu . "_hidden"];

                                    if ($valShowmenu == "Disable") {
                                        $valShowClass = "fontContantTbDisable";
                                    } else {
                                        $valShowClass = "fontContantTbEnable";
                                        $valShowmenu = "Show";
                                    }
                        ?>
                                    <tr class="divSubOverTb">
                                        <td class="divRightContantTbL" valign="top" align="center" style="padding-left:20px;"><input id="CheckBoxID<?php echo  $index ?>" name="CheckBoxID<?php echo  $index ?>" type="checkbox" class="formCheckboxList" onClick="Paging_CheckAllHandle(document.myForm.CheckBoxAll, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" value="<?php echo  $valIDSub ?>" /> </td>
                                        <td class="divRightContantTb" valign="top" align="left" style="padding-left:20px;"><a href="javascript:void(0)" onclick="
                                                                document.myFormHome.myParentID.value =<?php echo  $valID ?>;
                                                                document.myFormHome.valEditID.value =<?php echo  $valIDSub ?>;
                                                                viewContactNew('../core/viewMg.php');"><?php echo  $valNameSub ?></a></td>
                                        <td class="divRightContantTb" valign="top" align="center"><span class="fontContantTbupdate"><?php echo  $valTypeSub ?></span></td>
                                        <!-- การแสดงผล -->

                                        <td class="divRightContantTb" valign="top" align="center">
                                            <div id="load_show<?php echo  $valIDSub ?>">
                                                <?php if ($valShowmenu == "Disable") { ?>

                                                    <a href="javascript:void(0)" onclick="changeStatusShow('load_waitingShow<?php echo  $valIDSub ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valShowmenu ?>', '<?php echo  $valIDSub ?>', 'load_show<?php echo  $valIDSub ?>', '../core/showMg.php')"><span class="<?php echo  $valShowClass ?>"><?php echo  $valShowmenu ?></span></a>

                                                <?php } else { ?>

                                                    <a href="javascript:void(0)" onclick="changeStatusShow('load_waitingShow<?php echo  $valIDSub ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valShowmenu ?>', '<?php echo  $valIDSub ?>', 'load_show<?php echo  $valIDSub ?>', '../core/showMg.php')"> <span class="<?php echo  $valShowClass ?>"><?php echo  $valShowmenu ?></span> </a>

                                                <?php } ?>

                                                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waitingShow<?php echo  $valID ?>" />
                                            </div>
                                        </td>

                                        <!-- การแสดงผล -->
                                        <td class="divRightContantTb" valign="top" align="center">
                                            <div id="load_status<?php echo  $valIDSub ?>">
                                                <?php if ($valStatusSub == "Enable") { ?>

                                                    <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?php echo  $valIDSub ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valStatusSub ?>', '<?php echo  $valIDSub ?>', 'load_status<?php echo  $valIDSub ?>', '../core/statusMg.php')"><span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatusSub ?></span></a>

                                                <?php } else { ?>

                                                    <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?php echo  $valIDSub ?>', '<?php echo  $core_tb_menu ?>', '<?php echo  $valStatusSub ?>', '<?php echo  $valIDSub ?>', 'load_status<?php echo  $valIDSub ?>', '../core/statusMg.php')"> <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatusSub ?></span> </a>

                                                <?php } ?>

                                                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waiting<?php echo  $valIDSub ?>" />
                                            </div>
                                        </td>
                                        <td class="divRightContantTb" valign="top" align="center">
                                            <span class="fontContantTbupdate"><?php echo  $valDateCredateSub ?></span><br />
                                            <span class="fontContantTbTime"><?php echo  $valTimeCredateSub ?></span>
                                        </td>
                                        <td class="divRightContantTbR" valign="top" align="center">
                                            <table border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td valign="top" align="center" width="30">
                                                        <div class="divRightManage" title="<?php echo  $langTxt["btn:sort"] ?>" onclick="
                                                                                document.myFormHome.myParentID.value =<?php echo  $valID ?>;
                                                                                document.myFormHome.valEditID.value =<?php echo  $valIDSub ?>;
                                                                                sortContactNew('../core/sortMg.php')">
                                                            <img src="../img/btn/sort2.png" /><br />
                                                            <span class="fontContantTbManage"><?php echo  $langTxt["btn:sort"] ?></span>
                                                        </div>
                                                    </td>
                                                    <td valign="top" align="center" width="30">
                                                        <div class="divRightManage" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                                                                document.myFormHome.myParentID.value =<?php echo  $valID ?>;
                                                                                document.myFormHome.valEditID.value =<?php echo  $valIDSub ?>;
                                                                                editContactNew('../core/editMg.php');">
                                                            <img src="../img/btn/edit.png" /><br />
                                                            <span class="fontContantTbManage"><?php echo  $langTxt["btn:edit"] ?></span>
                                                        </div>
                                                    </td>
                                                    <td valign="top" align="center" width="30">
                                                        <div class="divRightManage" title="<?php echo  $langTxt["btn:del"] ?>" onClick="
                                                                                if (confirm('<?php echo  $langTxt["mg:delpermis"] ?>')) {
                                                                                    Paging_CheckedThisItem(document.myForm.CheckBoxAll, <?php echo  $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value);
                                                                                    delContactNew('../core/deleteMg.php');
                                                                                }
                                                                             ">
                                                            <img src="../img/btn/delete.png" /><br />
                                                            <span class="fontContantTbManage"><?php echo  $langTxt["btn:del"] ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    <?php
                        $index++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" align="center" valign="middle" class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;"><?php echo  $langTxt["mg:nodate"] ?></td>
                    </tr>
                <?php } ?>

                <tr>
                    <td colspan="7" align="center" valign="middle" class="divRightContantTbRL">
                        <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                                <td class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?php echo  $langTxt["pr:All"] ?> <b><?php echo  number_format($recordCount) ?></b> <?php echo  $langTxt["pr:record"] ?></span></td>
                                <td class="divRightNavTb" align="right"> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php echo  $index - 1 ?>" />
            <div class="divRightContantEnd"></div>
        </div>

    </form>
    <?php include("../lib/disconnect.php"); ?>

</body>

</html>