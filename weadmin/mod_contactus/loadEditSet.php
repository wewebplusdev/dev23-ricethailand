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
" . $mod_tb_root_set . "_id,
" . $mod_tb_root_set . "_masterkey,
" . $mod_tb_root_set . "_language,
" . $mod_tb_root_set . "_subject,
" . $mod_tb_root_set . "_subjecten,
" . $mod_tb_root_set . "_title,
" . $mod_tb_root_set . "_titleen,
" . $mod_tb_root_set . "_credate,
" . $mod_tb_root_set . "_crebyid,
" . $mod_tb_root_set . "_creby,
" . $mod_tb_root_set . "_lastdate,
" . $mod_tb_root_set . "_lastbyid,
" . $mod_tb_root_set . "_lastby,
" . $mod_tb_root_set . "_pic



 FROM " . $mod_tb_root_set . " WHERE " . $mod_tb_root_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";

//echo $sql;
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valSubject = rechangeQuot($Row[3]);
$valSubjecten = rechangeQuot($Row[4]);

$valTitle = rechangeQuot($Row[5]);
$valTitleEn = rechangeQuot($Row[6]);

$valCredate = DateFormat($Row[7]);
$valCrebyid = $Row[8];
$valCreby = $Row[9];

$valLastdate = DateFormat($Row[10]);
$valLastbyid = $Row[11];
$valLastby = $Row[12];


// $valTitle = $Row[$mod_tb_root_set . "_title"];
// $valTitleEn = $Row[$mod_tb_root_set . "_titleen"];

$valPicName = $Row[13];
$valPic = $mod_path_pictures . "/" . $Row[13];

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
                    if (isBlank(inputSubjecten)) {
                        inputSubjecten.focus();
                        jQuery("#inputSubjecten").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputSubjecten").removeClass("formInputContantTbAlertY");
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
								if(!checkFocusTitle){
										if(!checkFocusTitleEn){
                        executeSubmit();
                        return false;
											}
										}
                    }
                    /* End  Enter Check CKeditor */
                });
            });


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
                            <span class="formFontSubjectTxt"><?php  echo  $langTxt["set:infomeu"] ?>(<?php  echo  $langTxt["lg:thai"] ?>)</span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langTxt["set:infomeudes"] ?>(<?php  echo  $langTxt["lg:thai"] ?>)</span>                             </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>




                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:subject"] ?> (<?php  echo  $langTxt["lg:thai"] ?>) <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?php  echo  $valSubject ?>"/></td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["set:description"] ?> (<?php  echo  $langTxt["lg:thai"] ?>) <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTitle" id="inputTitle" type="text"  class="formInputContantTb" value="<?php  echo  $valTitle ?>"/></td>
                    </tr>

                </table>
                <br />
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langTxt["set:infomeu"] ?>(<?php  echo  $langTxt["lg:eng"] ?>)</span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langTxt["set:infomeudes"] ?>(<?php  echo  $langTxt["lg:thai"] ?>)</span>                             </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>




                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:subject"]  ?> (<?php  echo  $langTxt["lg:eng"] ?>) <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubjecten" id="inputSubjecten" type="text"  class="formInputContantTb" value="<?php  echo  $valSubjecten ?>"/></td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["set:description"] ?> (<?php  echo  $langTxt["lg:eng"] ?>) <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTitleen" id="inputTitleen" type="text"  class="formInputContantTb" value="<?php  echo  $valTitleEn ?>"/></td>
                    </tr>

                </table>
               
               <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langMod["txt:pic"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:picDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["inp:album"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?php  echo $langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
</div>

<span class="formFontNoteTxt"><?php  echo $langMod["inp:notepic"]?></span>
<div class="clearAll"></div>
<div id="boxPicNew" class="formFontTileTxt">
<?php  if(is_file($valPic)){?>
    <img src="<?php  echo $valPic?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
    <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picname" id="picname" value="<?php  echo $valPicName?>" />
  <?php  } ?>
</div></td>
  </tr>
  <tr style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $modTxtShowPic[0]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio"  class="formRadioContantTb" <?php  if($valPicShow!=2){?> checked="checked" <?php  } ?>  /></div>
    <div class="formDivRadioR"><?php  echo $modTxtShowPic[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic"  value="2"  type="radio"  class="formRadioContantTb" <?php  if($valPicShow==2){?> checked="checked" <?php  } ?> /></div>
    <div class="formDivRadioR"><?php  echo $modTxtShowPic[2]?></div>
    </label>
    </label>    </td>
      </tr>
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
