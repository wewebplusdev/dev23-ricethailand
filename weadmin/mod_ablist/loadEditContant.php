<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");
$langMod = getTextFileUploadVideo($langMod);
$valClassNav    = 2;
$valNav1        = $langTxt["nav:home2"];
$valLinkNav1    = "../core/index.php";
$dataselect     = "";
if ($_REQUEST['inputLt'] == "Thai") {
    $dataselect = "
    " . $mod_tb_root . "." . $mod_tb_root . "_id,
    " . $mod_tb_root . "." . $mod_tb_root . "_subject,
    " . $mod_tb_root . "." . $mod_tb_root . "_htmlfilename,
    " . $mod_tb_root . "." . $mod_tb_root . "_htmlfilename1,
    " . $mod_tb_root . "." . $mod_tb_root . "_htmlfilename2,
    " . $mod_tb_root . "." . $mod_tb_root . "_lastdate,
    " . $mod_tb_root . "." . $mod_tb_root . "_crebyid,
    " . $mod_tb_root . "." . $mod_tb_root . "_status,
    " . $mod_tb_root . "." . $mod_tb_root . "_metatitle,
    " . $mod_tb_root . "." . $mod_tb_root . "_description,
    " . $mod_tb_root . "." . $mod_tb_root . "_keywords,
    " . $mod_tb_root . "." . $mod_tb_root . "_title
    ";
} else {
    $dataselect = "
    " . $mod_tb_root . "." . $mod_tb_root . "_id,
    " . $mod_tb_root . "." . $mod_tb_root . "_subjecten,
    " . $mod_tb_root . "." . $mod_tb_root . "_htmlfilenameen,
    " . $mod_tb_root . "." . $mod_tb_root . "_htmlfilenameen1,
    " . $mod_tb_root . "." . $mod_tb_root . "_htmlfilenameen2,
    " . $mod_tb_root . "." . $mod_tb_root . "_lastdate,
    " . $mod_tb_root . "." . $mod_tb_root . "_crebyid,
    " . $mod_tb_root . "." . $mod_tb_root . "_status,
    " . $mod_tb_root . "." . $mod_tb_root . "_metatitleen,
    " . $mod_tb_root . "." . $mod_tb_root . "_descriptionen,
    " . $mod_tb_root . "." . $mod_tb_root . "_keywordsen,
    " . $mod_tb_root . "." . $mod_tb_root . "_titleen
    ";
}
$dataselect .= "
    ,
    " . $mod_tb_root . "." . $mod_tb_root . "_pic, 
    " . $mod_tb_root . "." . $mod_tb_root . "_typec , 
    " . $mod_tb_root . "." . $mod_tb_root . "_urlc, 
    " . $mod_tb_root . "." . $mod_tb_root . "_target
    ";
$sql    = "SELECT " . $dataselect . " FROM " . $mod_tb_root . " WHERE 1=1 AND " . $mod_tb_root . "_masterkey = '" . $_REQUEST['masterkey'] . "' AND " . $mod_tb_root . "_id = '" . $_REQUEST['valEditID'] . "' ";
$Query  = wewebQueryDB($coreLanguageSQL, $sql);
$Row    = wewebFetchArrayDB($coreLanguageSQL, $Query);

$valid          = $Row[0];
$valSubject     = $Row[1];
$valhtml        = $mod_path_html . "/" . $Row[2];
$valhtmlname    = $Row[2];
// $valPathOurHis  = $mod_path_html . "/" . $Row[2];
// $valhtmlOurHis  = $Row[2];
// $valPathReward  = $mod_path_html . "/" . $Row[3];
// $valhtmlReward  = $Row[3];
// $valPathBod     = $mod_path_html . "/" . $Row[4];
// $valhtmlBod     = $Row[4];
$valcredate     = DateFormat($Row[5]);
$valcreby       = $Row[6];
$valstatus      = $Row[7];
$valmetatitle   = $Row[8];
$valdescription = $Row[9];
$valkeywords    = $Row[10];
$valTitle    = $Row[11];
$valPicName = $Row[12];
$valPic = $mod_path_pictures . "/" . $Row[12];
$valTypeC = $Row[13];
$valUrlC = $Row[14];
$valTarget = $Row[15];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />
    <title><?php   echo $core_name_title; ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script src="../js/Organization-Chart/jquery.orgchart.js" type="text/javascript"></script>
    <link href="../js/Organization-Chart/jquery.orgchart.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" type="text/javascript">
        function executeSubmit() {
            with(document.myForm) {

                // Validate Subject
                if (isBlank(inputSubject)) {
                    inputSubject.focus();
                    jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                }

                var type = $('#inputTypeC:checked').val();
                if (type == 2) {
                    if (isBlank(inputurlc)) {
                        inputurlc.focus();
                        jQuery("#inputurlc").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputurlc").removeClass("formInputContantTbAlertY");
                    }
                    if (inputurlc.value == "http://") {
                        inputurlc.focus();
                        jQuery("#inputurlc").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputurlc").removeClass("formInputContantTbAlertY");
                    }
                } else {
                    var alleditDetail = CKEDITOR.instances.editDetail.getData();
                    if (alleditDetail == "") {
                        jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
                        window.location.hash = '#inputEditHTML';
                        return false;
                    } else {
                        jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
                    }
                    jQuery('#inputHtml').val(alleditDetail);
                }


                // #### Validate CK Our History
                // var valeditDetailOurHis = CKEDITOR.instances.editDetailOurHis.getData();
                // if(valeditDetailOurHis == ""){
                //     jQuery("#inputEditHTMLOurHis").addClass("formInputContantTbAlertY");
                //     window.location.hash = '#inputEditHTMLOurHis';
                //     return false;
                // }else{
                //     jQuery("#inputEditHTMLOurHis").removeClass("formInputContantTbAlertY");
                //     jQuery('#inputHtmlOurHis').val(valeditDetailOurHis);
                // }

                // #### Validate CK Reward
                // var valeditDetailReward = CKEDITOR.instances.editDetailReward.getData();
                // if(valeditDetailReward == ""){
                //     jQuery("#inputEditHTMLReward").addClass("formInputContantTbAlertY");
                //     window.location.hash = '#inputEditHTMLReward';
                //     return false;
                // }else{
                //     jQuery("#inputEditHTMLReward").removeClass("formInputContantTbAlertY");
                //     jQuery('#inputHtmlReward').val(valeditDetailReward);
                // }

                // #### Validate CK Board Of Directors
                // var valeditDetailBod    = CKEDITOR.instances.editDetailBod.getData();
                // if(valeditDetailBod == ""){
                //     jQuery("#inputEditHTMLBod").addClass("formInputContantTbAlertY");
                //     window.location.hash = '#inputEditHTMLBod';
                //     return false;
                // }else{
                //     jQuery("#inputEditHTMLBod").removeClass("formInputContantTbAlertY");
                //     jQuery('#inputHtmlBod').val(valeditDetailBod);
                // }
            }
            updateContactNew('updateContant.php');
        }
    </script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php   echo $_REQUEST['masterkey']; ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo $_REQUEST['menukeyid']; ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php   echo $_REQUEST['inputSearch']; ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php   echo $_REQUEST['module_pageshow']; ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php   echo $_REQUEST['module_pagesize']; ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php   echo $_REQUEST['module_orderby']; ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php   echo $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php   echo $_REQUEST['valEditID']; ?>" />
        <input name="valDelFile" type="hidden" id="valDelFile" value="" />
        <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
        <input name="inputHtml" type="hidden" id="inputHtml" value="" />
        <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php   echo $valhtmlname ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php   echo $_REQUEST['inputLt']; ?>" />
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop">
                        <span class="fontContantTbNav">
                            <a href="<?php   echo $valLinkNav1 ?>" target="_self"><?php   echo $valNav1 ?></a>
                            <img src="../img/btn/nav.png" align="absmiddle" vspace="5" />
                            <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php   echo getNameMenu($_REQUEST["menukeyid"]) ?></a>
                            <img src="../img/btn/nav.png" align="absmiddle" vspace="5" />
                            <?php   echo $langMod["txt:titleedit"] ?>
                            <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                                <!-- (<?php   echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>) -->
                            <?php  } ?>
                        </span>
                    </td>
                    <td class="divRightNavTb" align="right"></td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left">
                        <span class="fontHeadRight">
                            <?php   echo $langMod["txt:titleedit"] ?> <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                                <!-- (<?php   echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>) -->
                            <?php  } ?>
                        </span>
                    </td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php  if ($valPermission == "RW") { ?>
                                        <div class="btnSave" title="<?php   echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                    <?php  } ?>
                                    <div class="btnBack" title="<?php   echo $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php   echo $langMod["txt:subject"] ?></span><br />
                        <span class="formFontTileTxt"><?php   echo $langMod["txt:subjectDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["tit:inpName"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php   echo @$valSubject; ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:noteg"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="inputComment" id="inputComment" cols="20" rows="5" class="formTextareaContantTb"><?php   echo $valTitle; ?></textarea>
                    </td>
                </tr>
            </table>
            </br>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:album"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" accept="<?php   echo $langMod['dev0821:picfile']; ?>" />
                        </div>

                        <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <?php  if (is_file($valPic)) { ?>
                                <img src="<?php  echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picname" id="picname" value="<?php  echo  $valPicName ?>" />
                            <?php  } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php   echo  $langMod["txt:groupType"] ?></span><br />
                        <span class="formFontTileTxt"><?php   echo  $langMod["txt:groupTypeDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo  $langMod["tit:groupType"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <label>
                            <div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" value="1" class="formRadioContantTb" <?php   if ($valTypeC == 1) { ?> checked="checked" <?php  } ?> type="radio" onclick="jQuery('#boxInputlink').hide(); jQuery('#boxInputlinkdesc').hide();  jQuery('.ckabout').show(); jQuery('#boxInputTarget').hide();" /></div>
                            <div class="formDivRadioR"><?php   echo  $modGroupType[1]; ?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" value="2" class="formRadioContantTb" <?php   if ($valTypeC == 2) { ?> checked="checked" <?php  } ?> type="radio" onclick="jQuery('#boxInputlink').show(); jQuery('#boxInputlinkdesc').show(); jQuery('.ckabout').hide(); jQuery('#boxInputTarget').show();" /></div>
                            <div class="formDivRadioR"><?php   echo  $modGroupType[2]; ?></div>
                        </label>
                    </td>
                </tr>

                <tr id="boxInputlink" <?php   if ($valTypeC == 1) { ?> style="display:none;" <?php  } ?>>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["tit:linkvdo"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea name="inputurlc" id="inputurlc" cols="45" rows="5" class="formTextareaContantTb"><?php   echo $valUrlC ?></textarea><br />
                        <span class="formFontNoteTxt"><?php   echo $langMod["edit:linknote"] ?></span>
                    </td>
                </tr>

                <!-- <tr id="boxInputlinkdesc" <?php   if ($valTypeC == 1) { ?> style="display:none;" <?php  } ?> >
						<td width="18%" align="right"  valign="top"  class="formLeftContantTb" >หมายเหตุ <span class="fontContantAlert"></span></span></td>
						<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurlcdesc" id="inputurlcdesc" cols="45" rows="5" class="formTextareaContantTb"><?php   echo $valOutdesc ?></textarea><br />
					<span class="formFontNoteTxt"><?php   echo $langMod["edit:linknote"] ?></span></td>
				</tr> -->

                <tr id="boxInputTarget" <?php   if ($valTypeC == 1) { ?> style="display:none;" <?php  } ?>>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">การแสดงผล</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">


                        <label>
                            <div class="formDivRadioL"><input name="inputTarget" id="inputTarget" value="1" class="formRadioContantTb" <?php   if ($valTarget == 1) { ?> checked="checked" <?php  } ?> type="radio" /></div>
                            <div class="formDivRadioR"><?php   echo  $modTxtTarget[1]; ?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputTarget" id="inputTarget" value="2" class="formRadioContantTb" <?php   if ($valTarget == 2) { ?> checked="checked" <?php  } ?> type="radio" /></div>
                            <div class="formDivRadioR"><?php   echo  $modTxtTarget[2]; ?></div>
                        </label>
                    </td>
                </tr>
            </table>
            <br class="ckabout" <?php   if ($valTypeC == 2) { ?> style="display:none;" <?php  } ?> />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php   if ($valTypeC == 2) { ?> style="display:none;" <?php  } ?>>
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php   echo $langMod["txt:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php   echo $langMod["txt:titleDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="center" valign="top" class="formRightContantTbEditor">
                        <div id="inputEditHTML">
                            <textarea name="editDetail" id="editDetail">
                                <?php 
                                if (is_file($valhtml)) {
                                    $fd = @fopen($valhtml, "r");
                                    $contents = @fread($fd, @filesize($valhtml));
                                    @fclose($fd);
                                    echo txtReplaceHTML($contents);
                                }
                                ?>
                            </textarea>
                        </div>
                    </td>
                </tr>
            </table>
            <br class="ckabout" <?php   if ($valTypeC == 2) { ?> style="display:none;" <?php  } ?>>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php   if ($valTypeC == 2) { ?> style="display:none;" <?php  } ?>>
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:attfile"] ?></span><br />
                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:attfileDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" accept="<?php   echo $langMod['dev0821:attfile']; ?>" />
                        </div>
                        <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notefile"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxFileNew" class="formFontTileTxt">
                            <?php 
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid 	='" . $valid . "' ORDER BY " . $mod_tb_file . "_id ASC";
                            $query_file  = wewebQueryDB($coreLanguageSQL, $sql);
                            $number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
                            if ($number_row >= 1) {
                                $txtFile = "";
                                while ($row_file    = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
                                    $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                                    $downloadFile = $row_file[1];
                                    $downloadID = $row_file[0];
                                    $downloadName = $row_file[2];
                                    $countDownload = $row_file[3];
                                    $imageType = strstr($downloadFile, '.');
                                    $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                }
                            }

                            echo $txtFile;
                            ?>
                        </div>
                    </td>
                </tr>
            </table>

            <br class="ckabout" <?php   if ($valTypeC == 2) { ?> style="display:none;" <?php  } ?> />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php   if ($valTypeC == 2) { ?> style="display:none;" <?php  } ?>>
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php   echo $langMod["txt:seo"]; ?></span>
                        <br />
                        <span class="formFontTileTxt"><?php   echo $langMod["txt:seoDe"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["inp:seotitle"]; ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?php   echo $valmetatitle; ?>" /><br />
                        <span class="formFontNoteTxt"><?php   echo $langMod["inp:seotitlenote"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["inp:seodes"]; ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?php   echo $valdescription; ?>" /><br />
                        <span class="formFontNoteTxt"><?php   echo $langMod["inp:seodesnote"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php   echo $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?php   echo $valkeywords ?>" /><br />
                        <span class="formFontNoteTxt"><?php   echo $langMod["inp:seokeynote"] ?></span>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb">
                        <a href="#defTop" title="<?php   echo $langTxt["btn:gototop"]; ?>"><?php   echo $langTxt["btn:gototop"]; ?> <img src="../img/btn/top.png" align="absmiddle" /></a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" language="javascript">
        /*################################# Upload Pic #######################*/
        function ajaxFileUpload() {
            var valuepicname = jQuery("input#picname").val();

            jQuery.blockUI({
                message: jQuery('#tallContent'),
                css: {
                    border: 'none',
                    padding: '35px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .9,
                    color: '#fff'
                }
            });


            jQuery.ajaxFileUpload({
                url: 'loadUpdatePic.php?myID=<?php  echo  $_POST["valEditID"] ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
                secureuri: false,
                fileElementId: 'fileToUpload',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicNew").show();
                            jQuery("#boxPicNew").html(data.msg);
                            setTimeout(jQuery.unblockUI, 200);
                        }
                    }
                },
                error: function(data, status, e) {
                    alert(e);
                }
            })
            return false;

        }

        /*############################# Upload File ####################################*/
        function ajaxFileUploadDoc() {
            var valuefilename = jQuery("input#inputFileName").val();
            jQuery.blockUI({
                message: jQuery('#tallContent'),
                css: {
                    border: 'none',
                    padding: '35px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .9,
                    color: '#fff'
                }
            });


            jQuery.ajaxFileUpload({
                url: 'loadUpdateFile.php?myID=<?php  echo  $_POST["valEditID"] ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
                secureuri: true,
                fileElementId: 'inputFileUpload',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            jQuery("#boxFileNew").show();
                            jQuery("#boxFileNew").html(data.msg);
                            document.myForm.inputFileName.value = "";
                            setTimeout(jQuery.unblockUI, 200);
                        }

                    }
                },
                error: function(data, status, e) {
                    alert(e);
                }
            })

            return false;

        }
        /*################### Load FCK Editor ######################*/
        jQuery(document).ready(function() {
            onLoadFCK();
        });
    </script>
    <?php  include("../lib/disconnect.php"); ?>
</body>

</html>