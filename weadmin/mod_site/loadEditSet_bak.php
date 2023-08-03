<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

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
" . $mod_tb_set . "_fac



 FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_id='" . $_REQUEST["valEditID"] . "'  AND " . $mod_tb_set . "_masterkey='site'  ";

//echo $sql;
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);

// print_pre($Row);

$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valLastdate = DateFormat($Row[3]);
$valLastby = $Row[4];
$valDescription = $Row[5];
$valKeywords = $Row[6];
$valMetatitle = $Row[7];
$valSubject = $Row[8];
$valSubjectEN = $Row[9];
// $valTitle = $Row[$mod_tb_set . "_title"];
// $valTitleEn = $Row[$mod_tb_set . "_titleen"];

$valSubjectSm = $Row[11];
$valTitleSm = $Row[12];

//print_pre($Row);
$valPicName = $Row[15];
$valPic = $mod_path_pictures . "/" . $Row[15];
//print_pre($valTitleEn);



$ValSocial = unserialize($Row['' . $mod_tb_set . '_social']);
$ValConfig = unserialize($Row['' . $mod_tb_set . '_config']);

$valSubject = $Row[8];
$valTitle = $Row[$mod_tb_set . "_title"];
$valSubjectOffice = rechangeQuot($Row[16]);
$valSubjectOfficeEn = rechangeQuot($Row[17]);

$valDescriptionen = $Row[18];
$valKeywordsen = $Row[19];
$valMetatitleen = $Row[20];

$valOrName = $Row[21];
$valQr = $mod_path_pictures . "/" . $Row[21];

$valHotlineName = $Row[22];
$valHotline = $mod_path_pictures . "/" . $Row[22];
// $valHotlineTel = $Row[23];
$valHotlineNameH = $Row[23];
$valHotlineH = $mod_path_pictures . "/" . $Row[23];

$ValSlogan = unserialize($Row['' . $mod_tb_set . '_slogan']);
$ValSloganen = unserialize($Row['' . $mod_tb_set . '_sloganen']);

$ValFac = unserialize($Row['' . $mod_tb_set . '_fac']);
$listDataDetail= array();
foreach ($ValFac as $titleKey => $value){
  foreach ($value as $key => $valueDetail){
    $listDataDetail[$key][$titleKey] =  $valueDetail;
  }

}
$ValFac = $listDataDetail;
//print_pre($listDataDetail);

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

$myRand = time() . rand(111, 999);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <meta name="googlebot" content="noindex, nofollow"/>
        <link href="../css/theme.css" rel="stylesheet"/>

        <title><?php  echo  $core_name_title ?></title>
        <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
        <script language="JavaScript" type="text/javascript">
            function executeSubmit() {
                with (document.myForm) {

                    if (isBlank(inputSubject)) {
                        inputSubject.focus();
                        jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                    }
                    // if (isBlank(inputSubjectEn)) {
                    //     inputSubjectEn.focus();
                    //     jQuery("#inputSubjectEn").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#inputSubjectEn").removeClass("formInputContantTbAlertY");
                    // }

                    if (isBlank(inputOffice)) {
                        inputOffice.focus();
                        jQuery("#inputOffice").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputOffice").removeClass("formInputContantTbAlertY");
                    }
                    // if (isBlank(inputOfficeEN)) {
                    //     inputOfficeEN.focus();
                    //     jQuery("#inputOfficeEN").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#inputOfficeEN").removeClass("formInputContantTbAlertY");
                    // }



                    if (isBlank(inputTagTitle)) {
                        inputTagTitle.focus();
                        jQuery("#inputTagTitle").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagTitle").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagDescription)) {
                        inputTagDescription.focus();
                        jQuery("#inputTagDescription").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagDescription").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagKeywords)) {
                        inputTagKeywords.focus();
                        jQuery("#inputTagKeywords").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagKeywords").removeClass("formInputContantTbAlertY");
                    }

                    // if (isBlank(inputTagTitleEN)) {
                    //     inputTagTitleEN.focus();
                    //     jQuery("#inputTagTitleEN").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#inputTagTitleEN").removeClass("formInputContantTbAlertY");
                    // }
                    // if (isBlank(inputTagDescriptionEN)) {
                    //     inputTagDescriptionEN.focus();
                    //     jQuery("#inputTagDescriptionEN").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#inputTagDescriptionEN").removeClass("formInputContantTbAlertY");
                    // }
                    // if (isBlank(inputTagKeywordsEN)) {
                    //     inputTagKeywordsEN.focus();
                    //     jQuery("#inputTagKeywordsEN").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#inputTagKeywordsEN").removeClass("formInputContantTbAlertY");
                    // }

                    if (isBlank(socialFb)) {
                        socialFb.focus();
                        jQuery("#socialFb").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialFb").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialTw)) {
                        socialTw.focus();
                        jQuery("#socialTw").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialTw").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialYt)) {
                        socialYt.focus();
                        jQuery("#socialYt").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialYt").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialLi)) {
                        socialLi.focus();
                        jQuery("#socialLi").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialLi").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialIg)) {
                        socialIg.focus();
                        jQuery("#socialIg").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialIg").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(infoOpen)) {
                        infoOpen.focus();
                        jQuery("#infoOpen").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoOpen").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(infoAddress)) {
                        infoAddress.focus();
                        jQuery("#infoAddress").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoAddress").removeClass("formInputContantTbAlertY");
                    }
                    // if (isBlank(infoAddressen)) {
                    //     infoAddressen.focus();
                    //     jQuery("#infoAddressen").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#infoAddressen").removeClass("formInputContantTbAlertY");
                    // }

                    if (isBlank(infoTel)) {
                        infoTel.focus();
                        jQuery("#infoTel").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoTel").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(infoFax)) {
                        infoFax.focus();
                        jQuery("#infoFax").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoFax").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(infoEmail)) {
                        infoEmail.focus();
                        jQuery("#infoEmail").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoEmail").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(hotline)) {
                        hotline.focus();
                        jQuery("#hotline").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#hotline").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(glati)) {
                        glati.focus();
                        jQuery("#glati").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#glati").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(glongti)) {
                        glongti.focus();
                        jQuery("#glongti").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#glongti").removeClass("formInputContantTbAlertY");
                    }







                }

                updateContactNew('updateSet.php');

            }





            jQuery(document).ready(function () {

                jQuery('#myForm').keypress(function (e) {
                    /* Start  Enter Check CKeditor */
//	var checkFocusTitle =jQuery("#inputTitle").is(":focus");
//	var checkFocusTitleEn =jQuery("#inputTitleEn").is(":focus");

                    if (e.which == 13) {
                        //e.preventDefault();
//								if(!checkFocusTitle){
//										if(!checkFocusTitleEn){
                        executeSubmit();
                        return false;
//											}
//										}
                    }
                    /* End  Enter Check CKeditor */
                });
            });

// ############################## Add other faction ##################################
                var fac = 0;
                var i = 1;
                var factel = 0;
                var i2 = 1;
                var facemail = 0;
                var i3 = 1;

                function addfaction() {
                    fac++;
                    i++;
                    factel++;
                    i2++;
                    facemail++;
                    i3++;

                  var inputfac = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:faction"] ?><span class="fontContantAlert"></span></td>';
                  var inputfactxt = '<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfaction[name][]" id="inputfaction" type="text"  class="formInputContantTb"/></td>';
                  var inputfactel = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:factiontel"] ?><span class="fontContantAlert"></span></td>';
                  var inputfactxttel = '<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfaction[tel][]" id="inputfaction" type="text"  class="formInputContantTb"/><br /></td>';
                  var inputfacemail = '<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>';
                  var inputfacemailtxt = '<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >    <input class="formInputContantTb"  name="inputfaction[email][]" id="inputfactionemail"  value="<?php  echo  $ValFac['email'] ?>"/><br /></td>';
                  $("#factionTable").append("<tr id='facemail" + facemail + "'> <td colspan='8' valign='top' align='right' height='1'><div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div> </td></tr>");
                  $("#factionTable").append("<tr id='fac"+ fac + "' class=\"sInput\">" + inputfac + inputfactxt +"<td  width=\"10%\"><div class=\"btnDel2\" onclick=\"removefac(" + fac + ")\" title=\"ź\" style=\"padding-right: 50px; padding-top: 20px;\"  ></div></td></tr>");
                  $("#factionTable").append("<tr id='factel"+ factel + "' class=\"sInput\">" + inputfactel + inputfactxttel +"<td  width=\"10%\"></td></tr>");
                  $("#factionTable").append("<tr id='facemail"+ facemail + "' class=\"sInput\">" + inputfacemail + inputfacemailtxt +"<td  width=\"10%\"></td></tr>");

                }

                function removefac(factb) {
                    jQuery('tr[id="fac'+ factb + '"]').remove();
                    jQuery('tr[id="factel'+ factb + '"]').remove();
                    jQuery('tr[id="facemail'+ factb + '"]').remove();
                }


        </script>


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
            <input name="valDelFile" type="hidden" id="valDelFile" value="" />
            <input name="inputHtml" type="hidden" id="inputHtml" value="" />
            <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php  echo  $valhtmlname ?>" />
            <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo  $_REQUEST['inputLt'] ?>" />
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                    <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('set.php')" target="_self"><?php  echo  getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  $langMod["txt:titleedit"] ?></span></td>
                        <td  class="divRightNavTb" align="right"></td>
                    </tr>
                </table>
            </div>
            <div class="divRightHead">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                    <tr>
                        <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langMod["txt:titleedit"] ?></span></td>
                        <td align="left">
                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                <tr>
                                    <td align="right">
                                        <?php  if ($valPermission == "RW") { ?>
                                            <div  class="btnSave" title="<?php  echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                        <?php  } ?>
                                        <div  class="btnBack" title="<?php  echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('set.php')"></div>
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
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:about"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["txt:aboutDe"] ?></span>                             </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>




                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["ab:subject"] ?> (TH) <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?php  echo  $valSubject ?>"/></td>
                    </tr>

                    <!-- <tr >
                        <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["ab:subject"] ?> (EN) <span class="fontContantAlert">*</span></td>
                        <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input name="inputSubjectEn" id="inputSubjectEn" type="text"  class="formInputContantTb" value="<?php  echo  $valSubjectEN ?>"/>   </td>
                    </tr> -->

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["ab:office"] ?> (TH) <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputOffice" id="inputOffice" type="text"  class="formInputContantTb" value="<?php  echo  $valSubjectOffice ?>"/></td>
                    </tr>

                    <!-- <tr >
                        <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["ab:office"] ?> (EN) <span class="fontContantAlert">*</span></td>
                        <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input name="inputOfficeEN" id="inputOfficeEN" type="text"  class="formInputContantTb" value="<?php  echo  $valSubjectOfficeEn ?>"/>   </td>
                    </tr> -->

                    <!--
                      <tr style="display:none;" >
                          <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["ab:titleEn"] ?><span class="fontContantAlert"></span></td>
                          <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                              <textarea name="inputTitleEn" id="inputTitleEn" cols="45" rows="5" class="formTextareaContantTb"><?php  echo  $valTitleEn ?></textarea>     </td>
                      </tr>
                    -->


                </table>
                <br />

                <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:slogan"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["txt:sloganDe"] ?></span>                             </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>




                </table>
                <br /> -->

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:set"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["txt:setDe"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seotitle"] ?> (TH)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?php  echo  $valMetatitle ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seotitlenote"] ?></span></td>
                    </tr>
                        <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seodes"] ?> (TH)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?php  echo  $valDescription ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seodesnote"] ?></span></td>
                    </tr>
                     <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seokey"] ?> (TH)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?php  echo  $valKeywords ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seokeynote"] ?></span></td>
                    </tr>
                    <!-- <tr > <td colspan="2"><hr style="color:#d1d1d1;border:1px solid #eaeaea;"/><br/></td></tr> -->
                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seotitle"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitleEN" id="inputTagTitleEN" type="text"  class="formInputContantTb" value="<?php  echo  $valMetatitleen ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seotitlenote"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seodes"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescriptionEN" id="inputTagDescriptionEN"  type="text"  class="formInputContantTb" value="<?php  echo  $valDescriptionen ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seodesnote"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seokey"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywordsEN" id="inputTagKeywordsEN"  type="text"  class="formInputContantTb" value="<?php  echo  $valKeywordsen ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seokeynote"] ?></span></td>
                    </tr> -->
                </table>



                <br />

                <!-- add social media by nut -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:setSocial"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["txt:setSocialDe"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["social:fb"] ?> <?php  echo  $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?php  echo  $langMod["social:fb"] ?>][link]" id="socialFb" type="text"  class="formInputContantTb" value="<?php  echo  $ValSocial[$langMod["social:fb"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["social:tw"] ?> <?php  echo  $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?php  echo  $langMod["social:tw"] ?>][link]" id="socialTw" type="text"  class="formInputContantTb" value="<?php  echo  $ValSocial[$langMod["social:tw"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["social:yt"] ?> <?php  echo  $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?php  echo  $langMod["social:yt"] ?>][link]" id="socialYt" type="text"  class="formInputContantTb" value="<?php  echo  $ValSocial[$langMod["social:yt"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["social:li"] ?> <?php  echo  $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?php  echo  $langMod["social:li"] ?>][link]" id="socialLi" type="text"  class="formInputContantTb" value="<?php  echo  $ValSocial[$langMod["social:li"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["social:ig"] ?> <?php  echo  $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?php  echo  $langMod["social:ig"] ?>][link]" id="socialIg" type="text"  class="formInputContantTb" value="<?php  echo  $ValSocial[$langMod["social:ig"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                       <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:qr"] ?></td>
                       <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                           <div class="file-input-wrapper">
                               <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                               <input type="file" name="fileToUploadQR" id="fileToUploadQR" onchange="ajaxFileUploadQR();" />
                           </div>

                           <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notepic"] ?></span>
                           <div class="clearAll"></div>

                           <div id="boxPicQR" class="formFontTileTxt">
                               <?php  if (is_file($valQr)) { ?>
                                   <img src="<?php  echo  $valQr ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                   <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicQR.php','boxPicQR')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                   <input type="hidden" name="picQR" id="picQR" value="<?php  echo  $valOrName ?>" />
                               <?php  } ?>
                           </div>



                           <!--
                           <div id="boxPicNew" class="formFontTileTxt">
                               <input type="hidden" name="picname" id="picname" />
                           </div>
                           -->
                       </td>
                   </tr>

                </table>


                <br />


                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["info:title"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["info:titlede"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["set:open"]?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="info[open]"  id="infoOpen"  value="<?php  echo  $ValConfig['open'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["info:telde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?php  echo  $langMod['info:address']; ?> (TH)
                            <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <textarea  name="info[address]" id="infoAddress" cols="45" rows="5" class="formTextareaContantTb"><?php  echo  trim($ValConfig['address']) ?></textarea>

                            <br />
                        </td>
                    </tr>
                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?php  echo  $langMod['info:address']; ?>(EN)
                            <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <textarea  name="info[addressen]" id="infoAddressen" cols="45" rows="5" class="formTextareaContantTb"><?php  echo  trim($ValConfig['addressen']) ?></textarea>

                            <br />
                        </td>
                    </tr> -->


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:tel"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="info[tel]"  id="infoTel"  value="<?php  echo  $ValConfig['tel'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["info:telde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:fax"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="info[fax]" id="infoFax" value="<?php  echo  $ValConfig['fax'] ?>"/>  <br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["info:faxde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="info[email]" id="infoEmail" value="<?php  echo  $ValConfig['email'] ?>"/>  <br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["info:emailde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:hotline"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="info[hotline]" id="hotline"  value="<?php  echo  $ValConfig['hotline'] ?>"/><br />
                            <span class="formFontNoteTxt"><?php  echo  $langMod["info:hotlinede"] ?></span></td>
                    </tr>
<!-- start faction -->
                    <td align="right"  valign="top" width="100%"  colspan="6" >
                      <?php   if (!empty($ValFac)) {
                        foreach ($ValFac as $key => $value) { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="factionTable" >
                        <tr id="fac<?php  echo $key?>">
                            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:faction"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                <input class="formInputContantTb"  name="inputfaction[name][]" id="inputfaction"  value="<?php  echo  $value['name'] ?>"/><br /></td>
                            <td width="10%" align="left">
                              <?php   if ($key<1){ ?>
                                <div class="btnAdd3" style="padding-right: 86px; padding-top: 20px;" title="??" onclick="addfaction();"></div>
                              <?php   }else { ?>
                                <div class="btnDel2" onclick="removefac(<?php  echo $key?>)" title="" style="padding-right: 50px; padding-top: 20px;"  ></div>
                              <?php   } ?>
                            </td>
                        </tr>
                        <tr id="factel<?php  echo $key?>">

                            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:factiontel"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                <input class="formInputContantTb"  name="inputfaction[tel][]" id="inputfactionTel"  value="<?php  echo  $value['tel'] ?>"/><br />
                            <!-- <span class="formFontNoteTxt"><?php  echo  $langMod["info:telde"] ?></span> -->
                          </td>
                        </tr>
                        <tr id="facemail<?php  echo $key?>">

                            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                <input class="formInputContantTb"  name="inputfaction[email][]" id="inputfactionemail"  value="<?php  echo  $value['email'] ?>"/><br />
                            </td>
                        </tr>

                        </table>
                    <?php    }
                  }else { ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="factionTable" >
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:faction"] ?><span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="inputfaction[name][]" id="inputfaction"  value=""/><br /></td>
                        <td width="10%" align="left">
                            <div class="btnAdd3" style="padding-right: 86px; padding-top: 20px;" title="??" onclick="addfaction();"></div>
                        </td>
                    </tr>
                    <tr >

                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:factiontel"] ?><span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="inputfaction[tel][]" id="inputfactionTel"  value=""/><br />
                        <span class="formFontNoteTxt"><?php  echo  $langMod["info:telde"] ?></span></td>
                    </tr>
                    <tr >

                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:email"] ?><span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input class="formInputContantTb"  name="inputfaction[email][]" id="inputfactionemail"  value=""/><br />
                        </td>
                    </tr>

                    </table>
                  <?php   } ?>
                </td>

<!-- end faction -->

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?php  echo  $langMod['info:googlemap']; ?>
                            <span class="fontContantAlert">*</span>
                        </td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <?php  echo  $langMod['info:latiture'] ?> : <input name="info[glati]" id="glati" value="<?php  echo  $ValConfig['glati'] ?>"/>
                            <?php  echo  $langMod['info:longtiture'] ?>  : <input name="info[glongti]" id="glongti" value="<?php  echo  $ValConfig['glongti'] ?>"/>
                            <br/>
                            <!--<textarea  name="info[googlemap]" id="inputdescription" cols="45" rows="5" class="formTextareaContantTb"><?php  echo  $ValConfig['googlemap'] ?></textarea> -->


                            <span class="formFontNoteTxt"><?php  echo  $langMod["info:googlemapde"] ?></span>
                        </td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:picaddress"] ?></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="file-input-wrapper">
                                <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                                <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                            </div>

                            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notepic"] ?></span>
                            <div class="clearAll"></div>

                            <div id="boxPicNew" class="formFontTileTxt">
                                <?php  if (is_file($valPic)) { ?>
                                    <img src="<?php  echo  $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                    <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                    <input type="hidden" name="picname" id="picname" value="<?php  echo  $valPicName ?>" />
                                <?php  } ?>
                            </div>

                            <!--
                            <div id="boxPicNew" class="formFontTileTxt">
                                <input type="hidden" name="picname" id="picname" />
                            </div>
                            -->
                        </td>
                    </tr>




                    <tr style="display:none;">
                       <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:pichotline"] ?></td>
                       <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                           <div class="file-input-wrapper">
                               <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                               <input type="file" name="fileToUploadHT" id="fileToUploadHT" onchange="ajaxFileUploadHT();" />
                           </div>

                           <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notepic"] ?></span>
                           <div class="clearAll"></div>

                           <div id="boxPicHT" class="formFontTileTxt">
                               <?php  if (is_file($valHotline)) { ?>
                                   <img src="<?php  echo  $valHotline ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                   <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicHT.php','boxPicHT')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                   <input type="hidden" name="picHT" id="picHT" value="<?php  echo  $valHotlineName ?>" />
                               <?php  } ?>
                           </div>

                           <!--
                           <div id="boxPicNew" class="formFontTileTxt">
                               <input type="hidden" name="picname" id="picname" />
                           </div>
                           -->
                       </td>
                   </tr>

                   <tr style="display:none;">
                      <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["info:pichotlineH"] ?></td>
                      <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                          <div class="file-input-wrapper">
                              <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                              <input type="file" name="fileToUploadHTh" id="fileToUploadHTh" onchange="ajaxFileUploadHTh();" />
                          </div>

                          <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notepic"] ?></span>
                          <div class="clearAll"></div>

                          <div id="boxPicHTh" class="formFontTileTxt">
                              <?php  if (is_file($valHotlineH)) { ?>
                                  <img src="<?php  echo  $valHotlineH ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                  <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicHTh.php','boxPicHTh')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                  <input type="hidden" name="picHTh" id="picHTh" value="<?php  echo  $valHotlineNameH ?>" />
                              <?php  } ?>
                          </div>

                          <!--
                          <div id="boxPicNew" class="formFontTileTxt">
                              <input type="hidden" name="picname" id="picname" />
                          </div>
                          -->
                      </td>
                  </tr>

                </table>

                <!-- <br /> -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none;">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:setOffice"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["txt:setOfficeDe"] ?></span>                             </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>




                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["txt:subjectOffice"] ?> <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubjectOffice" id="inputSubjectOffice" type="text"  class="formInputContantTb" value="<?php  echo  $valSubjectOffice ?>"/></td>
                    </tr>

                    <tr >
                        <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["txt:titleOffice"] ?>  <span class="fontContantAlert"></span></td>
                        <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input name="inputTitleOffice" id="inputTitleOffice" type="text"  class="formInputContantTb" value="<?php  echo  $valTitleOffice ?>"/>   </td>
                    </tr>


                    <!--
                      <tr style="display:none;" >
                          <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["ab:titleEn"] ?><span class="fontContantAlert"></span></td>
                          <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                              <textarea name="inputTitleEn" id="inputTitleEn" cols="45" rows="5" class="formTextareaContantTb"><?php  echo  $valTitleEn ?></textarea>     </td>
                      </tr>
                    -->


                </table>

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                </table>

                <br />
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
                    <tr >
                        <td colspan="7" align="right"  valign="top" height="20"></td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                    </tr>
                </table>
            </div>
        </form>
        <?php  include("../lib/disconnect.php"); ?>
        <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
        <script type="text/javascript" language="javascript">
                                    /*################################# Upload Pic #######################*/
                                    function ajaxFileUpload() {
                                        var valuepicname = jQuery("input#picname").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPic.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUpload',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicNew").show();
                                                        jQuery("#boxPicNew").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }

                                    /*################################# Upload QR #######################*/
                                    function ajaxFileUploadQR() {
                                        var valuepicname = jQuery("input#picQR").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPicQR.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUploadQR',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicQR").show();
                                                        jQuery("#boxPicQR").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }
                                    /*################################# Upload hotline #######################*/
                                    function ajaxFileUploadHT() {
                                        var valuepicname = jQuery("input#picHT").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPicHT.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUploadHT',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicHT").show();
                                                        jQuery("#boxPicHT").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }

                                    /*################################# Upload hotline Head #######################*/
                                    function ajaxFileUploadHTh() {
                                        var valuepicname = jQuery("input#picHTh").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPicHTh.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUploadHTh',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicHTh").show();
                                                        jQuery("#boxPicHTh").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }


        </script>
    </body>
</html>
