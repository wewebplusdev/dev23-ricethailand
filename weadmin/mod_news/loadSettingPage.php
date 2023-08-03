<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langMod["meu:setPermis"];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">

                <link href="../css/theme.css" rel="stylesheet"/>
                <title><?php  echo  $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                <script language="JavaScript" type="text/javascript">
                    function executeSubmit() {


                        updateContactNew('updateSetting.php');

                    }


                    function loadCheckUser() {
                        with (document.myForm) {
                            var inputValuename = document.myForm.inputUserName.value;
                        }
                        if (inputValuename != '') {
                            checkUsermember(inputValuename);
                        }
                    }



                    jQuery(document).ready(function () {

                        jQuery('#myForm').keypress(function (e) {
                            /* Start  Enter Check CKeditor */

                            if (e.which == 13) {
                                executeSubmit();
                                return false;
                            }
                            /* End  Enter Check CKeditor */
                        });
                    });


                </script>
                </head>

                <body>
                    <?php 
// Check to set default value #########################
                    $module_default_pagesize = $core_default_pagesize;
                    $module_default_maxpage = $core_default_maxpage;
                    $module_default_reduce = $core_default_reduce;
                    $module_default_pageshow = 1;
                    $module_sort_number = $core_sort_number;

                    if ($_REQUEST['module_pagesize'] == "") {
                        $module_pagesize = $module_default_pagesize;
                    } else {
                        $module_pagesize = $_REQUEST['module_pagesize'];
                    }

                    if ($_REQUEST['module_pageshow'] == "") {
                        $module_pageshow = $module_default_pageshow;
                    } else {
                        $module_pageshow = $_REQUEST['module_pageshow'];
                    }

                    if ($_REQUEST['module_adesc'] == "") {
                        $module_adesc = $module_sort_number;
                    } else {
                        $module_adesc = $_REQUEST['module_adesc'];
                    }

                    if ($_REQUEST['module_orderby'] == "") {
                        $module_orderby = $mod_tb_root_group . "_order";
                    } else {
                        $module_orderby = $_REQUEST['module_orderby'];
                    }

                    if ($_REQUEST['inputSearch'] != "") {
                        $inputSearch = trim($_REQUEST['inputSearch']);
                    } else {
                        $inputSearch = $_REQUEST['inputSearch'];
                    }
                    ?>
                    <form action="?" method="post" name="myForm" id="myForm">
                        <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
                        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $module_pageshow ?>" />
                        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $module_pagesize ?>" />
                        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $module_orderby ?>" />

                        <div class="divRightNav">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                <tr>
                                    <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  $valNav2 ?></span></td>
                                    <td  class="divRightNavTb" align="right">

                                        <!-- ######### Start Menu Sub Mod ########## -->

                                        <?php  
                                        if ($_SESSION['mnre_core_session_level'] == "admin") {
                                            ?>

                                            <div class="menuSubMod ">
                                                <a  href="setting.php?masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&menukeyid=<?php  echo  $_REQUEST['menukeyid'] ?>">
                                                    <?php  echo  $langMod["meu:setPermis"] ?>
                                                </a>
                                            </div>



                                            <div class="menuSubMod ">
                                                <a  href="groupPage.php?masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&menukeyid=<?php  echo  $_REQUEST['menukeyid'] ?>">
                                                    <?php  echo  $langMod["meu:pageShow"] ?>
                                                </a>
                                            </div>

                                        <?php   } ?>

                                         <?php   if ($_SESSION[$valSiteManage.'core_session_level'] == "admin") { ?>
                                        <div class="menuSubMod active">
                                            <a  href="setting.php?masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&menukeyid=<?php  echo  $_REQUEST['menukeyid'] ?>">
                                                <?php  echo  $langMod["tit:setting"] ?>
                                            </a>
                                        </div>

                                        <div class="menuSubMod">
                                            <a  href="group.php?masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&menukeyid=<?php  echo  $_REQUEST['menukeyid'] ?>">
                                                <?php  echo  $langMod["meu:contant"] ?>
                                            </a>
                                        </div>
                                        <?php   } ?>


                                        <!-- ######### End Menu Sub Mod ########## -->
                                    </td>
                                </tr>
                            </table>
                        </div>


                        <div class="divRightHeadSearch" >

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">

                                <tr>

                                    <td   id="boxSelectTest" >
                                        <input name="inputSearch" type="text"  id="inputSearch" value="<?php  echo  trim($_REQUEST['inputSearch']) ?>" class="formInputSearchI"  placeholder="<?php  echo  $langTxt["sch:search"] ?>" /></td>
                                    <td style="padding-right:10px;" align="right" width="6%"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>
                                </tr>
                            </table>

                        </div>

                        <div class="divRightHead">

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langMod["tit:setting"] ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <?php  if ($valPermission == "RW") { ?>
                                                        <div  class="btnSave" title="<?php  echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                                    <?php  } ?>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center"   class="tbBoxListwBorder">
                                <tr ><td width="3%"  class="divRightTitleTbL"  valign="middle" align="center" >
                                        <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onClick="Paging_CheckAll(this, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)"   class="formCheckboxHead" />    </td>

                                    <td align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?php  echo  $langMod["tit:subjectg"] ?><?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php  echo  $langTxt["lg:thai"] ?>)<?php  } ?></span></td>

                                    <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                                        <td width="22%" align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?php  echo  $langMod["tit:subjectg"] ?><?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php  echo  $langTxt["lg:eng"] ?>)<?php  } ?></span></td>
                                    <?php  } ?>


                                    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php  echo  $langTxt["us:lastdate"] ?></span></td>

                                </tr>
                                <?php 
// SQL SELECT #########################
                                $sql = "SELECT " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject," . $mod_tb_root_group . "_lastdate," . $mod_tb_root_group . "_status FROM " . $mod_tb_root_group;
                                $sql = $sql . "  WHERE " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ";

                                if ($inputSearch <> "") {
                                    $sql = $sql . "  AND  (
		" . $mod_tb_root_group . "_subject LIKE '%$inputSearch%'  OR
		" . $mod_tb_root_group . "_subjecten LIKE '%$inputSearch%'   ) ";
                                }

                                // print_pre($sql);
                                $query = wewebQueryDB($coreLanguageSQL, $sql);
                                $count_totalrecord = wewebNumRowsDB($coreLanguageSQL,$query);

// Find max page size #########################
                                if ($count_totalrecord > $module_pagesize) {
                                    $numberofpage = ceil($count_totalrecord / $module_pagesize);
                                } else {
                                    $numberofpage = 1;
                                }

// Recover page show into range #########################
                                if ($module_pageshow > $numberofpage) {
                                    $module_pageshow = $numberofpage;
                                }

// Select only paging range #########################
                                $recordstart = ($module_pageshow - 1) * $module_pagesize;

                                $sql .= " ORDER BY $module_orderby $module_adesc ";
                                //  $sql .= " LIMIT $recordstart , $module_pagesize  ";
                                $query = wewebQueryDB($coreLanguageSQL, $sql);
                                $count_record = wewebNumRowsDB($coreLanguageSQL,$query);

                                $index = 1;
                                $valDivTr = "divSubOverTb";


// Select permission #########################
                                 $sqlPermis = "Select
   " . $mod_tb_permis . "." . $mod_tb_permis . "_id as _id,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_name as  _name,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_credate,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_status,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_lv
 From
   " . $mod_tb_permis . "
 Where
    " . $mod_tb_permis . "." . $mod_tb_permis . "_typemini != '1' AND " . $mod_tb_permis . "." . $mod_tb_permis . "_lv = 'staff'  ORDER BY " . $mod_tb_permis . "." . $mod_tb_permis . "_order DESC  ";
/*
$sqlPermis = "SELECT
".$mod_tb_root_group."_id,
".$mod_tb_root_group."_subject
FROM 
".$mod_tb_root_group."
WHERE
".$mod_tb_root_group."_status != 'Disable' AND ".$mod_tb_root_group."_masterkey = '".$masterkeyAgen."'
";
*/
                                //   print_pre($sqlPermis);
                                $listadmin = $dbConnect->execute($sqlPermis);

// Select data permission #########################
                                $listCheckerPer = "Select
  " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_misid,
  " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_cmgid
From
  " . $mod_tb_permisGroup . "
WHERE " . $mod_tb_permisGroup . "_masterkey = '".$_REQUEST['masterkey']."'
  ";
//   print_pre($listCheckerPer);
                                // $listPermis = $dbConnect->execute($listCheckerPer);
                                $listPermis = wewebQueryDB($coreLanguageSQL,$listCheckerPer);
                                $listAllowPer = array();
                                foreach ($listPermis as $genlistCheck) {
                                    $listAllowPer[$genlistCheck['md_cmsp_cmgid']][$genlistCheck['md_cmsp_misid']] = true;
                                }


                                // print_pre($listAllowPer);

                                if ($count_record > 0) {
                                    while ($index < $count_record + 1) {
                                        $row = wewebFetchArrayDB($coreLanguageSQL,$query);
                                        // print_pre($row);
                                        $valID = $row[0];
                                        $valName = rechangeQuot($row[1]);
                                        $valDateCredate = dateFormatReal($row[2]);
                                        $valTimeCredate = timeFormatReal($row[2]);
                                        $valStatus = $row[3];
                                        $valNameEn = rechangeQuot($row[4]);
                                        $valColor = $row[5];
                                        $valNameEn = chechNullVal($valNameEn);
                                        if ($valStatus == "Enable") {
                                            $valStatusClass = "fontContantTbEnable";
                                        } else {
                                            $valStatusClass = "fontContantTbDisable";
                                        }

                                        if ($valDivTr == "divSubOverTb") {
                                            $valDivTr = "divOverTb";
                                        } else {
                                            $valDivTr = "divSubOverTb";
                                        }
                                        ?>
                                        <tr class="<?php  echo  $valDivTr ?>" >
                                            <td   rowspan="2" class="divRightContantOverTbL"  valign="top" align="center"bgcolor="<?php  echo  $valColor ?>" >

                                            </td>
                                            <td  class="divRightContantOverTb"   valign="top" align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>

                                                        <td align="left">
                                                           <div class="widthDiv">
                                                            <a  href="javascript:void(0)"  onclick="
                                                                    document.myFormHome.inputLt.value = 'Thai';
                                                                    document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                                    viewContactNew('viewGroup.php');" ><?php  echo  $valName ?></a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </table></td>

                                            <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                                                <td  class="divRightContantOverTb"   valign="top" align="left"  >
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="left"> <div class="widthDiv"><a  href="javascript:void(0)"  onclick="
                                                                    document.myFormHome.inputLt.value = 'Eng';
                                                                    document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                                    viewContactNew('viewGroup.php');" ><?php  echo  $valNameEn ?></a></div></td>
                                                        </tr>
                                                    </table>    </td>
                                            <?php  } ?>



                                            <td  class="divRightContantOverTb"  valign="top"  align="center">
                                                <span class="fontContantTbupdate"><?php  echo  $valDateCredate ?></span><br/>
                                                <span class="fontContantTbTime"><?php  echo  $valTimeCredate ?></span>    </td>

                                        </tr>
                                        <tr  class="<?php  echo  $valDivTr ?>"  >
                                            <td colspan="3" rowspan="1">
                                                <ul class="listper">

                                                    <li style="width:100%; "><span>สิทธิการเข้าถึงกลุ่มนี้ : </span></li>

                                                    <?php  
                                                    foreach ($listadmin as $showGpermis) {

                                                        // print_pre($valID);

                                                        echo "<li style='width:32.2%;'>";//$listAllowPer[$valID][$showGpermis['sy_grp_id']]
                                                        echo '<label style="background-color:#fff;color:#333;"><input type="checkbox" name="permis[' . $valID . '][' . $showGpermis['_id'] . ']"' ;
                                                        if($listAllowPer[$valID][$showGpermis['_id']] == 1){
                                                            echo "checked";
                                                        }
                                                        echo  '> '.$showGpermis['_name'] . '</label>';
                                                        echo "</li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </td>
                                        </tr>

                                        <?php 
                                        $index++;
                                    }
                                } else {
                                    ?>
                                    <tr >
                                        <td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php  echo  $langTxt["mg:nodate"] ?></td>
                                    </tr>
                                <?php  } ?>


                            </table>
                            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php  echo  $index - 1 ?>" />
                            <div class="divRightContantEnd"></div>
                        </div>





                    </form>
                    <?php  include("../lib/disconnect.php"); ?>

                </body>
                </html>
