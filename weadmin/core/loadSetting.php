<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:setting"];


$sqlCheck = "SELECT " . $core_tb_setting . "_id   FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1 ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);
if ($countNumCheck <= 0) {

    $insert=array();
    $insert[$core_tb_setting . "_lang"] = "'Thai'";
    $insert[$core_tb_setting . "_type"] = "'2'";
    $insert[$core_tb_setting . "_credate"] = "" . wewebNow($coreLanguageSQL) . "";
    $insert[$core_tb_setting . "_lastdate"] = "" . wewebNow($coreLanguageSQL) . "";
    $sqlInsert = "INSERT INTO " . $core_tb_setting . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
}



$sql = "SELECT 
		" . $core_tb_setting . "_id , 
		" . $core_tb_setting . "_lang, 
		" . $core_tb_setting . "_type, 
		" . $core_tb_setting . "_subject, 
		" . $core_tb_setting . "_title , 
		" . $core_tb_setting . "_titleB   , 
        " . $core_tb_setting . "_pic  ,
        " . $core_tb_setting . "_header  ,
        " . $core_tb_setting . "_bg  
		FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1 ";
$query = wewebQueryDB($coreLanguageSQL, $sql);
$row = wewebFetchArrayDB($coreLanguageSQL, $query);
$valId = $row[0];
$valLang = $row[1];
$valType = $row[2];
$valSubject = rechangeQuot($row[3]);
$valTitle = rechangeQuot($row[4]);
$valTitleB = rechangeQuot($row[5]);
$valPicName = $row[6];
$valPic = $core_pathname_crupload . "/" . $row[6];
$valHeaderName = $row[7];
$valHeader = $core_pathname_crupload . "/" . $row[7];
$valBgName = $row[8];
$valBg = $core_pathname_crupload . "/" . $row[8];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">

                <link href="../css/theme.css" rel="stylesheet"/>

                <title><?php   echo  $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>

                </head>

                <body>
                    <form action="?" method="get" name="myForm" id="myForm">
                        <input name="execute" type="hidden" id="execute" value="update" />
                        <input name="masterkey" type="hidden" id="masterkey" value="<?php   echo  $_REQUEST['masterkey'] ?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo  $_REQUEST['menukeyid'] ?>" />
                        <input name="myParentID" type="hidden" id="myParentID" value="<?php   echo  $_REQUEST['myParentID'] ?>" />
                        <input name="valEditID" type="hidden" id="valEditID" value="<?php   echo  $_REQUEST['valEditID'] ?>" />

                        <div class="divRightNav">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                <tr>
                                    <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php   echo  $valLinkNav1 ?>" target="_self"><?php   echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php   echo  $valNav2 ?></span></td>
                                    <td  class="divRightNavTb" align="right">



                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php   echo  $valNav2 ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <div  class="btnEditView" title="<?php   echo  $langTxt["btn:edit"] ?>" onclick="editContactNew('../core/editSetting.php');"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php   echo  $langTxt["st:title"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php   echo  $langTxt["st:titleDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo  $langTxt["st:lang"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo  $valLang ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo  $langTxt["st:type"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb"  ><div class="formDivView"><?php   echo  $valType ?></div></td>
                                </tr>

                            </table><br />

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;" >
                                        <span class="formFontSubjectTxt"><?php   echo  $langTxt["txt:about"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php   echo  $langTxt["txt:aboutDe"] ?></span>                            </td>
                                </tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo  $langTxt["ab:subject"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo  $valSubject ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo  $langTxt["ab:title"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo  $valTitle ?></div></td>
                                </tr>
                                <tr>
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo  $langTxt["ab:titleback"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo  $valTitleB ?></div></td>
                                </tr>

                            </table><br />

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php   echo  $langTxt["txt:pic"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php   echo  $langTxt["txt:picDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <img src="<?php   echo  $valPic ?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?php   echo  "../img/btn/nopic.jpg" ?>'"  />
                                        </div></td>
                                </tr>

                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php   echo  $langTxt["txt:pic2"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php   echo  $langTxt["txt:pic2De"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <img src="<?php   echo  $valHeader ?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?php   echo  "../img/btn/nopic.jpg" ?>'"  />
                                        </div></td>
                                </tr>

                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php   echo  $langTxt["txt:pic3"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php   echo  $langTxt["txt:pic3De"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <img src="<?php   echo  $valBg ?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?php   echo  "../img/btn/nopic.jpg" ?>'"  />
                                        </div></td>
                                </tr>

                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
                                <tr >
                                    <td colspan="7" align="right"  valign="top" height="20"></td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php   echo  $langTxt["btn:gototop"] ?>"><?php   echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                </tr>
                            </table>
                        </div>
                    </form>     
                    <?php   include("../lib/disconnect.php"); ?>

                </body>
                </html>
