<?php 

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sqlCheck = "SELECT " . $mod_tb_set . "_id   FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);

 //$queryCheck = $dbConnect->execute($sqlCheck);
 //print_pre($queryCheck);
 //$countNumCheck = $queryCheck->nu

if ($countNumCheck <= 0) {
    $insert=array();
    $insert[$mod_tb_set . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_set . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_set . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastdate"] = "NOW()";
    $insert[$mod_tb_set . "_credate"] = "NOW()";
    $sqlInsert = "INSERT INTO " . $mod_tb_set . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
   //$queryInsert = $dbConnect->execute($queryInsert);
}

$sql = "SELECT
" . $mod_tb_set . "_id,
" . $mod_tb_set . "_credate ,
" . $mod_tb_set . "_crebyid,
" . $mod_tb_set . "_lastdate,
" . $mod_tb_set . "_lastbyid,
" . $mod_tb_set . "_description,
" . $mod_tb_set . "_keywords,
" . $mod_tb_set . "_metatitle,
" . $mod_tb_set . "_subject,
" . $mod_tb_set . "_subjecten,
" . $mod_tb_set . "_titleen,
" . $mod_tb_set . "_subjectsm,
" . $mod_tb_set . "_titlesm,
" . $mod_tb_set . "_social,
" . $mod_tb_set . "_config,
" . $mod_tb_set . "_addresspic,
" . $mod_tb_set . "_subjectoffice,
" . $mod_tb_set . "_subjectofficeen,
" . $mod_tb_set . "_descriptionen,
" . $mod_tb_set . "_keywordsen,
" . $mod_tb_set . "_metatitleen,
" . $mod_tb_set . "_qr,
" . $mod_tb_set . "_hotlinepic,
" . $mod_tb_set . "_hotline,
" . $mod_tb_set . "_slogan,
" . $mod_tb_set . "_sloganen,
" . $mod_tb_set . "_fac,
" . $mod_tb_set . "_urloa as urloa,
" . $mod_tb_set . "_urlpdpa as urlpdpa,
" . $mod_tb_set . "_expirepdpa as expirepdpa

 FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valLastdate = DateFormat($Row[3]);
$valLastby = $Row[4];
$valDescription = rechangeQuot($Row[5]);
$valKeywords = rechangeQuot($Row[6]);
$valMetatitle = rechangeQuot($Row[7]);
$valSubject = $Row[8];
$valSubjecten = $Row[9];

//$valTitle = rechangeQuot($Row[9]);
//$valTitleEn = rechangeQuot($Row[10]);

$valTitle = $Row[$mod_tb_set . "_title"];
$valTitleEn = $Row[$mod_tb_set . "_titleen"];

$valSubjectSm = rechangeQuot($Row[11]);
$valTitleSm = rechangeQuot($Row[12]);

$valPicName = $Row[15];
$valPic = $mod_path_pictures . "/" . $Row[15];

$ValSocial = unserialize($Row['' . $mod_tb_set . '_social']);
$ValConfig = unserialize($Row['' . $mod_tb_set . '_config']);
$valSubjectOffice = rechangeQuot($Row[16]);
$valSubjectOfficeen = rechangeQuot($Row[17]);
$valDescriptionen = $Row[18];
$valKeywordsen = $Row[19];
$valMetatitleen = $Row[20];

$valOrName = $Row[21];
$valQr = $mod_path_pictures . "/" . $Row[21];

$valHotlineName = $Row[22];
$valHotline = $mod_path_pictures . "/" . $Row[22];

$valHotlineNameH = $Row[23];
$valHotlineH = $mod_path_pictures . "/" . $Row[23];
$ValSlogan = unserialize($Row['' . $mod_tb_set . '_slogan']);
$ValSloganen = unserialize($Row['' . $mod_tb_set . '_sloganen']);

$ValFac = unserialize($Row['' . $mod_tb_set . '_fac']);
$listDataDetail= array();
foreach ($ValFac as $titleKey => $value){
  foreach ($value as $key => $valueDetail){
    $listDataDetail[$titleKey][$key] =  $valueDetail;
  }

}
$ValFac = $listDataDetail;
$valUrlOA = rechangeQuot($Row['urloa']);
$valURLpdpa = rechangeQuot($Row['urlpdpa']);
$valExpirePDPA = rechangeQuot($Row['expirepdpa']);
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php  echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php  echo  $_REQUEST['valEditID'] ?>" />
        <?php  if ($_REQUEST['viewID'] <= 0) { ?>
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                    <td class="divRightNavTb" align="right">

                    </td>
                </tr>
            </table>
        </div>
        <?php  } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo  getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php  if ($valPermission == "RW" && $_REQUEST['viewID'] <= 0) { ?>

                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center">
                                                <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="center">
                                                            <div class="btnEditView" title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                                                                document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                                                editContactNew('../<?php  echo  $mod_fd_root ?>/editSet.php')"></div>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                    </table>

                                    <?php  } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:about"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:aboutDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["ab:subject"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valSubject ?></div>
                    </td>
                </tr>
                  <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["ab:subject"] ?> (En) :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valSubjecten ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["ab:office"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valSubjectOffice ?></div>
                    </td>
                </tr>
            </table>
            <!-- (<?php   //echo $langTxt["lg:thai"] ?>) -->
            <!-- <br /> -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:about"] ?>(<?php  echo  $langTxt["lg:eng"] ?>)</span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:aboutDe"] ?>(<?php  echo  $langTxt["lg:eng"] ?>)</span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["ab:subject"] ?>(<?php  echo  $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valSubjecten ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["ab:office"] ?>(<?php  echo  $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valSubjectOfficeen ?></div>
                    </td>
                </tr>
            </table> -->
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:set"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:setDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seotitle"] ?> : <span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valMetatitle ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seodes"] ?> : <span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valDescription ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seokey"] ?> : <span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valKeywords ?></div>
                    </td>
                </tr>


                <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seotitle"] ?> (<?php  echo  $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valMetatitleen ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seodes"] ?> (<?php  echo  $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valDescriptionen ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seokey"] ?> (<?php  echo  $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valKeywordsen ?></div></td>
                    </tr> -->
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:setSocial"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:setSocialDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:lk"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $ValSocial[$langMod["social:lk"]]['link'] ?>" target="_blank"><?php  echo  $ValSocial[$langMod["social:lk"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:fb"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $ValSocial[$langMod["social:fb"]]['link'] ?>" target="_blank"><?php  echo  $ValSocial[$langMod["social:fb"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:tw"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $ValSocial[$langMod["social:tw"]]['link'] ?>" target="_blank"><?php  echo  $ValSocial[$langMod["social:tw"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:mail"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $ValSocial[$langMod["social:mail"]]['link'] ?>" target="_blank"><?php  echo  $ValSocial[$langMod["social:mail"]]['link'] ?></a></div>
                    </td>
                </tr>
                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:li"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $ValSocial[$langMod["social:li"]]['link'] ?>" target="_blank"><?php  echo  $ValSocial[$langMod["social:li"]]['link'] ?></a></div>
                    </td>
                </tr> -->

            </table>
            <br>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php   echo $langMod["info:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php   echo $langMod["info:titlede"] ?></span>
                    </td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["info:address"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php   echo $ValConfig['address'] ?></div>
                    </td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php   echo $ValConfig['tel'] ?></div>
                    </td>
                </tr>
                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php   echo $ValConfig['tel1'] ?></div>
                    </td>
                </tr> -->

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php   echo $ValConfig['fax'] ?></div>
                    </td>
                </tr>

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php   echo $ValConfig['email'] ?></div>
                    </td>
                </tr> -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            [ <?php  echo  $ValConfig['glati'] ?> , <?php  echo  $ValConfig['glongti'] ?> ] <br />
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php  echo  $ValConfig['glati'] ?>,<?php  echo  $ValConfig['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php  if (is_file($valPic)) { ?>
                            <img src="<?php  echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:650px" />
                            <?php  } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <!-- <br /> -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:app"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:appDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:ap"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $ValSocial[$langMod["social:ap"]]['link'] ?>" target="_blank"><?php  echo  $ValSocial[$langMod["social:ap"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:qr"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php  if (is_file($valQr)) { ?>
                            <img src="<?php  echo  $valQr ?>" style="float:left;border:#c8c7cc solid 1px;" />
                            <?php  } ?>
                        </div>
                    </td>
                </tr>
            </table> -->
            <!-- <br /> -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:oneaccount"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:oneaccountDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:oneaccount"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $valUrlOA ?>" target="_blank"><?php  echo  $valUrlOA ?></a></div>
                    </td>
                </tr>
            </table> -->
            <!-- <br /> -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:pdpa"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:pdpaDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:pdpa"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php  echo  $valURLpdpa ?>" target="_blank"><?php  echo  $valURLpdpa ?></a></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["social:expdpa"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valExpirePDPA ?></div>
                    </td>
                </tr>
            </table> -->
            <!-- <br /> -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["info:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["info:titlede"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:address"] ?> (<?php  echo  $langTxt["lg:thai"] ?>):<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  nl2br($ValConfig['address']) ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:address"] ?> (<?php  echo  $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  nl2br($ValConfig['addressen']) ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $ValConfig['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $ValConfig['fax'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $ValConfig['email'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' valign='top' align='right' height='1'>
                        <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            [ <?php  echo  $ValConfig['glati'] ?> , <?php  echo  $ValConfig['glongti'] ?> ] <br />
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php  echo  $ValConfig['glati'] ?>,<?php  echo  $ValConfig['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php  if (is_file($valPic)) { ?>
                            <img src="<?php  echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px;" />
                            <?php  } ?>
                        </div>
                    </td>
                </tr>
            </table> -->
            <!-- <br /> -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt">ข้อมูลหน่วยงาน</span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["info:titlede"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <?php   for ($i = 1; $i < 5; $i++) {  ?>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb">ชื่อหน่วยงาน : <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php  echo  $ValFac[$i]['name'] ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:tel"] ?> : <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php  echo  $ValFac[$i]['tel'] ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["info:fax"] ?> : <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php  echo  $ValFac[$i]['fax'] ?></div>
                        </td>
                    </tr>
                    <?php   if ($i < 4) { ?>
                        <tr>
                            <td colspan='8' valign='top' align='right' height='1'>
                                <div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div>
                            </td>
                        </tr>
                    <?php   } ?>
                <?php   } ?>
            </table> -->
            <br />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:credate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valCredate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php 
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    echo getUserThai($valCreby);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    echo getUserEng($valCreby);
                                }
                                ?>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:lastdate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php  echo  $valLastdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php 
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    echo getUserThai($valLastby);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    echo getUserEng($valLastby);
                                }
                                ?>
                        </div>
                    </td>
                </tr>



                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
            </table>
            <br />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <?php  if ($_REQUEST['viewID'] <= 0) { ?>


                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                </tr>
                <?php  } ?>
            </table>
        </div>
    </form>
    <?php  include("../lib/disconnect.php"); ?>

</body>

</html>