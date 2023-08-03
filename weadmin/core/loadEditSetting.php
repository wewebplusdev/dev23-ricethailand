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

$sql = "SELECT 
		" . $core_tb_setting . "_id , 
		" . $core_tb_setting . "_lang, 
		" . $core_tb_setting . "_type, 
		" . $core_tb_setting . "_subject, 
		" . $core_tb_setting . "_title  , 
		" . $core_tb_setting . "_titleB , 
        " . $core_tb_setting . "_pic ,
        " . $core_tb_setting . "_header, 
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

    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script language="JavaScript" type="text/javascript">
        function executeSubmit() {
            with(document.myForm) {
                if (isBlank(inputSubject)) {
                    inputSubject.focus();
                    jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(inputTitle)) {
                    inputTitle.focus();
                    jQuery("#inputTitle").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTitle").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(inputTitleB)) {
                    inputTitleB.focus();
                    jQuery("#inputTitleB").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTitleB").removeClass("formInputContantTbAlertY");
                }

            }

            updateContactNew('../core/updateSetting.php');
        }

        jQuery(document).ready(function() {

            jQuery('#myForm').keypress(function(e) {
                if (e.which == 13) {
                    //e.preventDefault();
                    executeSubmit();
                    return false;
                }
            });
        });
    </script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
        <input name="myParentID" type="hidden" id="myParentID" value="<?php echo  $_REQUEST['myParentID'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />

        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('../core/setting.php')" target="_self"><?php echo  $valNav2 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo  $langTxt["st:edit"] ?></span></td>
                    <td class="divRightNavTb" align="right">



                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langTxt["st:edit"] ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <div class="btnSave" title="<?php echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                    <div class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('../core/setting.php')"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["st:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["st:titleDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["st:lang"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <label>
                            <div class="formDivRadioL"><input name="inputLang" id="inputLang" type="radio" class="formRadioContantTb" <?php if ($valLang == "Thai") { ?>checked="checked" <?php } ?> value="Thai" /></div>
                            <div class="formDivRadioR"><?php echo  $langTxt["st:thai"] ?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputLang" id="inputLang" type="radio" class="formRadioContantTb" <?php if ($valLang == "Eng") { ?>checked="checked" <?php } ?> value="Eng" /></div>
                            <div class="formDivRadioR"><?php echo  $langTxt["st:eng"] ?></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["st:type"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" type="radio" class="formRadioContantTb" <?php if ($valType == "1") { ?>checked="checked" <?php } ?> value="1" /></div>
                            <div class="formDivRadioR"><?php echo  $langTxt["st:1"] ?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" type="radio" class="formRadioContantTb" <?php if ($valType == "2") { ?>checked="checked" <?php } ?> value="2" /></div>
                            <div class="formDivRadioR"><?php echo  $langTxt["st:2"] ?></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table><br />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["txt:about"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["txt:aboutDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["ab:subject"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo  $valSubject ?>" /></td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["ab:title"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputTitle" id="inputTitle" type="text" class="formInputContantTb" value="<?php echo  $valTitle ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["ab:titleback"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="inputTitleB" id="inputTitleB" type="text" class="formInputContantTb" value="<?php echo  $valTitleB ?>" />
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["inp:album"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langTxt["inp:notepic"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <?php if (is_file($valPic)) { ?>
                                <img src="<?php echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picname" id="picname" value="<?php echo  $valPicName ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>

            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display: none;">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["txt:pic2"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["txt:pic2De"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["inp:album"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="ajaxFileUpload2();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langTxt["inp:notepic2"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew2" class="formFontTileTxt">
                            <?php if (is_file($valHeader)) { ?>
                                <img src="<?php echo  $valHeader ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePic2.php','boxPicNew2')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picheader" id="picheader" value="<?php echo  $valHeaderName ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br style="display: none;"/>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["txt:pic3"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["txt:pic3De"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["inp:album"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload3" id="fileToUpload3" onchange="ajaxFileUpload3();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo  $langTxt["inp:notepic3"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew3" class="formFontTileTxt">
                            <?php if (is_file($valBg)) { ?>
                                <img src="<?php echo  $valBg ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePic3.php','boxPicNew3')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picbg" id="picbg" value="<?php echo  $valBgName ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>


            <br />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                </tr>
            </table>
        </div>
    </form>
    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
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
                url: 'loadUpdatePic.php?myID=<?php echo  $valId ?>&delpicname=' + valuepicname + '',
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



        /*################################# Upload Pic Header#######################*/
        function ajaxFileUpload2() {
            var valuepicname = jQuery("input#picheader").val();

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
                url: 'loadUpdatePic2.php?myID=<?php echo  $valId ?>&delpicname=' + valuepicname + '',
                secureuri: false,
                fileElementId: 'fileToUpload2',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicNew2").show();
                            jQuery("#boxPicNew2").html(data.msg);
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
        /*################################# Upload Pic BG#######################*/
        function ajaxFileUpload3() {
            var valuepicname = jQuery("input#picbg").val();

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
                url: 'loadUpdatePic3.php?myID=<?php echo  $valId ?>&delpicname=' + valuepicname + '',
                secureuri: false,
                fileElementId: 'fileToUpload3',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicNew3").show();
                            jQuery("#boxPicNew3").html(data.msg);
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
    </script>


    <?php include("../lib/disconnect.php"); ?>

</body>

</html>