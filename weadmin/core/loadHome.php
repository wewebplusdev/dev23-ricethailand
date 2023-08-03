<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow"/>
            <meta name="googlebot" content="noindex, nofollow"/>

                <link href="../css/theme.css" rel="stylesheet"/>
                <title><?php echo  $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                <script language="JavaScript"  type="text/javascript">
                    var countArrSort = '';
                    jQuery(function () {

                        jQuery("#boxHomeSort").sortable({
                            update: function () {
                                var order = jQuery('#boxHomeSort').sortable('serialize');
                                countArrSort = order;
                                jQuery("#inputSort").val(countArrSort);
                                sortingContactHome('../core/sortingHome.php')
                            }
                        });

                        jQuery("#boxHomeSort").disableSelection();

                    });



                </script>
                </head>

                <body>
                    <!-- <div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                            <tr>
                                <td  class="divRightNavTb" align="left"   id="defTop"><span class="fontContantTbNav"><?php echo  $langTxt["nav:home1"] ?></span></td>
                                <td  class="divRightNavTb" align="right"><?php echo  DateFormat(date('Y-m-d H:i:s')) ?></td>
                            </tr>
                        </table>
                    </div> -->
                    <!-- <div class="divRightHead">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                            <tr>
                                <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langTxt["nav:home2"] ?></span></td>
                                <td align="left">
                                    <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td align="right">
                                                <div  class="btnAdd" title="Add" onclick="window.open('box.php', '_self');"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div> -->
                    <div class="divRightHome" >
                        <div class="divRightInnerHome">
                            <div class="divRightInnerHome-topic">
                                <div class="title">Dashboard</div>
                                <div class="date"><span class="feather icon-calendar"></span> <?php echo  DateFormat(date('Y-m-d H:i:s')) ?></div>
                            </div>
                            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") {
                                ?>
                                <div  class="divRightInnerTopBoxHome">
                                    <?php
                                    $sql_pic = "SELECT " . $core_tb_staff . "_picture, " . $core_tb_staff . "_logdate, " . $core_tb_staff . "_email, " . $core_tb_staff . "_groupid   FROM " . $core_tb_staff . " WHERE   " . $core_tb_staff . "_id 	='" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
                                    $query_pic = wewebQueryDB($coreLanguageSQL, $sql_pic);
                                    $row_pic = wewebFetchArrayDB($coreLanguageSQL, $query_pic);
                                    $txt_pic_funtion = "../../upload/core/50/" . $row_pic[0];

                                    $valPicProfileTop = $txt_pic_funtion;
                                    if (is_file($valPicProfileTop)) {
                                        $valPicProfileTop = $valPicProfileTop;
                                    } else {
                                        $valPicProfileTop = "../img/btn/nouserHome.jpg";
                                    }

                                    $valLoginProfileTop = DateFormat($row_pic[1]);
                                    $valEmail = $row_pic[2];
                                    $valGroupid = $row_pic[3];
                                    ?>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="1%" align="left"><div style="width:52px; height:52px;  background:url(<?php echo  $valPicProfileTop ?>) center no-repeat; border:#ffffff solid 1px;  background-size: cover;background-repeat: no-repeat;   "><img src="../img/home/cycle.png" /></div></td>
                                            <td width="" style="padding-left:15px;" align="left">
                                                <?php
                                                if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                                                    $valLinkViewUser = "#";
                                                } else {
                                                    $valLinkViewUser = "../core/userView.php";
                                                }
                                                ?>
                                                <a href="<?php echo  $valLinkViewUser ?>">
                                                    <span class="fontTitlTbHome"><?php echo  $_SESSION[$valSiteManage . "core_session_name"] ?></span>
                                                    <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
                                                        <div style="margin-top: 3px; font-size: 13px;"><?php echo  $langTxt["home:login"] ?>:&nbsp;-</span></div>
                                                    <?php } else { ?>
                                                        <div style="margin-top: 3px; font-size: 13px;"><?php echo  $langTxt["home:login"] ?>:&nbsp;<?php echo  $valLoginProfileTop ?></div>
                                                    <?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" height="15"></td>
                                        </tr>
                                        <tr>
                                            <td height="20" colspan="2" align="left" >

                                                <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
                                                    <span class="fontContantTbHome"><?php echo  $langTxt["us:permission"] ?>:&nbsp;-</span><br />
                                                    <span class="fontContantTbHome"><?php echo  $langTxt["us:email"] ?>:&nbsp;-</span>
                                                    <!-- <span class="fontContantTbHome"><?php echo  $langTxt["home:login"] ?>:&nbsp;-</span> -->
                                                <?php } else { ?>
                                                    <span class="fontContantTbHome"><?php echo  $langTxt["us:permission"] ?>:&nbsp;<?php
                                            $sql_group = "SELECT " . $core_tb_group . "_id," . $core_tb_group . "_name  FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_id='" . $valGroupid . "'   ORDER BY " . $core_tb_group . "_order DESC ";
                                            $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                                            $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                                            $row_groupid = $row_group[0];
                                            $row_groupname = $row_group[1];
                                            echo $row_groupname;
                                                    ?></span><br />
                                                    <span class="fontContantTbHome"><?php echo  $langTxt["us:email"] ?>:&nbsp;<?php echo  $valEmail ?></span>
                                                    <!-- <span class="fontContantTbHome"><?php echo  $langTxt["home:login"] ?>:&nbsp;<?php echo  $valLoginProfileTop ?></span> -->
                                                <?php } ?></td>
                                        </tr>

                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>


                                </div>
                                <div  class="divRightInnerTopBoxHome">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="1%" align="left"><div class="cycle1Login"><span class="feather icon-user"></span></div></td>
                                            <td width="" style="padding-left:15px;" align="left"><a href="../core/userManage.php" title="<?php echo  $langTxt["nav:userManage2"] ?>"><span class="fontTitlTbHome"><?php echo  $langTxt["nav:userManage2"] ?></span></a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" height="15"></td>
                                        </tr>

                                        <tr>
                                            <td height="20" colspan="2" align="left" ><span class="fontContantTbHome"><?php echo  $langTxt["home:userDe"] ?></span></td>
                                        </tr>

                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>


                                </div>
                                <div  class="divRightInnerTopBoxHome">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="1%" align="left"><div class="cycle4Login"><span class="feather icon-grid"></span></div></td>
                                            <td width="" style="padding-left:15px;" align="left"><a href="../core/permisManage.php" title="<?php echo  $langTxt["nav:perManage2"] ?>"><span class="fontTitlTbHome"><?php echo  $langTxt["nav:perManage2"] ?></span></a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" height="15"></td>
                                        </tr>

                                        <tr>
                                            <td height="20" colspan="2" align="left" ><span class="fontContantTbHome"><?php echo  $langTxt["home:premisDe"] ?></span></td>
                                        </tr>

                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>


                                </div>
                                <div class="clearAll"></div>
                            <?php } ?>

                            <?php
                            $sql = "SELECT
" . $core_tb_sort . "_id,
" . $core_tb_menu . "_masterkey,
" . $core_tb_menu . "_moduletype,
" . $core_tb_menu . "_linkpath,
" . $core_tb_menu . "_namethai,
" . $core_tb_menu . "_nameeng,
" . $core_tb_menu . "_icon ,
" . $core_tb_menu . "_id,
" . $core_tb_menu . "_target

FROM " . $core_tb_menu . "
INNER JOIN " . $core_tb_sort . "
ON  " . $core_tb_menu . "." . $core_tb_menu . "_id = " . $core_tb_sort . "." . $core_tb_sort . "_menuID
WHERE  " . $core_tb_menu . "_status='Enable' AND  " . $core_tb_sort . "_memberID='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'   ";
                            $sql .= "GROUP BY " . $core_tb_sort . "_order,
  " . $core_tb_sort . "_id,
" . $core_tb_menu . "_masterkey,
" . $core_tb_menu . "_moduletype,
" . $core_tb_menu . "_linkpath,
" . $core_tb_menu . "_namethai,
" . $core_tb_menu . "_nameeng,
" . $core_tb_menu . "_icon ,
" . $core_tb_menu . "_id,
" . $core_tb_menu . "_target ";
                            $sql .= "ORDER BY " . $core_tb_sort . "_order DESC  ";
                            $query = wewebQueryDB($coreLanguageSQL, $sql);
                            $RecordCount = wewebNumRowsDB($coreLanguageSQL, $query);
                            if ($RecordCount >= 1) {
                                ?> <form action="?" method="get" name="myFormSort" id="myFormSort">
                                    <input name="execute" type="hidden" id="execute" value="insert" />
                                    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
                                    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
                                    <input name="inputSort" type="hidden" id="inputSort" value="" />

                                    <ul id="boxHomeSort"  >
    <?php
    while ($RowMenu = wewebFetchArrayDB($coreLanguageSQL, $query)) {
        $txtMenuID = $RowMenu[0];
        $txtModuleCode = $RowMenu[1];
        $txtModuleType = $RowMenu[2];
        $valMenuID = $RowMenu[7];
        $valIDAll = $RowMenu[7];
        if ($txtModuleType == "Group") {
            $sqlPath = "SELECT " . $core_tb_menu . "_linkpath," . $core_tb_menu . "_masterkey," . $core_tb_menu . "_id FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='" . $valMenuID . "' ";
            $sqlPath = $sqlPath . " ORDER BY " . $core_tb_menu . "_order DESC ";
            $queryPath = wewebQueryDB($coreLanguageSQL, $sqlPath);
            $rowPath = wewebFetchArrayDB($coreLanguageSQL, $queryPath);
            $txtNameLinkpath = $rowPath[0];
            $txt_menu_modType = explode("/", $txtNameLinkpath);
            $txtPathMod = $txt_menu_modType[1];
            $txtPathModFile = $txt_menu_modType[2];
            $txtModuleCode = $rowPath[1];
            $valMenuID = $rowPath[2];
        } else {
            $txtNameLinkpath = $RowMenu[3];
            $txt_menu_modType = explode("/", $txtNameLinkpath);
            $txtPathMod = $txt_menu_modType[1];
            $txtPathModFile = $txt_menu_modType[2];
        }

        $txtNameMenuTh = $RowMenu[4];
        $txtNameMenuEn = $RowMenu[5];
        if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
            $txtNameMenu = $txtNameMenuTh;
        } else {
            $txtNameMenu = $txtNameMenuEn;
        }

        $txtNameIcon = $RowMenu[6];
        $txtTagetName = $RowMenu[8];

        $permissionID = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $valIDAll);
        if ($permissionID != "NA" || $_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {

            if ($txtPathMod == "mod_name") {
                if ($txtPathModFile == "name.php") {
                    $valCellFile = "loadBoxName";
                } else if ($txtPathModFile == "boss.php") {
                    $valCellFile = "loadBoxBoss";
                } else if ($txtPathModFile == "part.php") {
                    $valCellFile = "loadBoxPart";
                } else if ($txtPathModFile == "group.php") {
                    $valCellFile = "loadBoxGroup";
                } else {
                    $valCellFile = "loadBoxHome";
                }
            } else {
                $valCellFile = "loadBoxHome";
            }
            ?>
                                                <li class="boxHomeSortli"  id="listItem_<?php echo  $txtMenuID ?>" >
                                                    <div  class="divRightInnerBoxHome">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"  class="divRightTitleHomeBoxAll"  >
                                                            <tr >
                                                                <td width="3%"  class="divRightTitleHome"  valign="middle" align="left">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                                        <tr>
                                                                            <td align="center" width="31" style="cursor:move;"><?php if ($txtNameIcon) { ?><img src="<?php echo  $txtNameIcon ?>" border="0" align="absmiddle" /><?php } else {
                                        echo " - ";
                                    } ?></td>
                                                                            <td align="left" style="cursor:move;"><?php echo  $txtNameMenu ?></td>
                                                                            <td align="center" width="31"><a href="javascript:void(0)" onclick="delContactHome('../core/deleteHome.php', '<?php echo  $txtMenuID ?>', 'listItem_<?php echo  $txtMenuID ?>');"   title="<?php echo  $langTxt["btn:close"] ?>"><img src="../img/btn/close.png" /></a></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td class="divRightTrHome" align="center" bgcolor="#FFFFFF"  id="loadContantHome<?php echo  $txtMenuID ?>" valign="top">
                                                                    <img src="../img/loader/ajax-loaderHome.gif" style="padding-top:40px;"  />
                                                                    <script language="JavaScript"  type="text/javascript">
                                                                        jQuery(function () {
                                                                            loadContantHome('../<?php echo  $txtPathMod ?>/<?php echo  $valCellFile ?>.php', 'loadContantHome<?php echo  $txtMenuID ?>', '<?php echo  $txtModuleCode ?>',<?php echo  $valMenuID ?>);
                                                                        });
                                                                    </script>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </li>
        <?php }
    } ?>
                                    </ul>
                                </form>
                            <?php } else { ?>  <div class="clearAll"></div>

                                <!-- <div>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                        <tr>
                                            <td height="250" align="center"  ><?php echo  $langTxt["home:app"] ?> <img src="../img/btn/add.png" align="absmiddle" hspace="10"  onclick="window.open('box.php', '_self');" style="cursor:pointer;"/> <?php echo  $langTxt["home:appLast"] ?></td>
                                        </tr>
                                    </table>
                                </div> -->
                            <?php } ?>
                            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") {
                                ?>
                                <!-- ########## Start Box Big ##########-->
                                <div  class="divRightInnerBigBoxHome">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"   class="divRightTitleHomeBoxAll"  >
                                        <tr ><td width="3%"  class="divRightTitleHome"  valign="middle" align="left" >
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                    <tr>
                                                        <td align="left"><span class="fontTitlTbHome">&nbsp;&nbsp;<?php echo  $langTxt["home:used"] ?></span></td>
                                                        <td align="right"><a href="../core/exportLog.php" title="<?php echo  $langTxt["btn:export"] ?>"><img src="../img/iconfile/3.png" style="padding-right:3px;" width="25" border="0" /></a></td>
                                                    </tr>
                                                </table>


                                            </td>
                                        </tr>
                                        <tr ><td class="divRightTrHome" id="loadContantLogHome" align="center" valign="top">
                                                <img src="../img/loader/ajax-loaderHome.gif" style="padding-top:40px;"  />
                                                <script language="JavaScript"  type="text/javascript">
                                                    jQuery(function () {
                                                        loadContantLogHome('../core/loadLog.php');
                                                    });
                                                </script>
                                            </td>

                                            <script language="JavaScript"  type="text/javascript">
                                                   // alert('1212251');
                                            </script>
                                        </tr>
                                    </table>
                                </div>
                                <!-- ########## End Box Big ##########-->
                                <div class="clearAll"></div>
                            <?php } ?>








                            <div class="clearAll"></div>


                        </div>
                        <?php
                        if ($RecordCount >= 1) {
                            ?>
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr >
                                    <td align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                </tr>
                            </table>
                        <?php } ?>

                    </div>
                    <?php include("../lib/disconnect.php"); ?>
                </body>
                </html>
