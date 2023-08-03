<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";


$sql = "SELECT 
		" . $core_tb_staff . "_id , 
		" . $core_tb_staff . "_picture , 
		" . $core_tb_staff . "_groupid , 
		" . $core_tb_staff . "_username , 
		" . $core_tb_staff . "_prefix , 
		" . $core_tb_staff . "_gender , 
		" . $core_tb_staff . "_fnamethai , 
		" . $core_tb_staff . "_lnamethai , 
		" . $core_tb_staff . "_fnameeng , 
		" . $core_tb_staff . "_lnameeng , 
		" . $core_tb_staff . "_email , 
		" . $core_tb_staff . "_address , 
		" . $core_tb_staff . "_telephone , 
		" . $core_tb_staff . "_mobile , 
		" . $core_tb_staff . "_other , 
		" . $core_tb_staff . "_password   , 
		" . $core_tb_staff . "_storeid ,
		" . $core_tb_staff . "_unitid , 
		" . $core_tb_staff . "_position  , 
		" . $core_tb_staff . "_usertype,
		" . $core_tb_staff . "_unitid_sub,
		" . $core_tb_staff . "_agency
		FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_id='" . $_POST["valEditID"] . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valId = $Row[0];
$valPic = $Row[1];
$valGroupid = $Row[2];
$valUsername = $Row[3];
$valPrefix = $Row[4];
$valGender = $Row[5];
$valFnamethai = $Row[6];
$valLnamethai = $Row[7];
$valFnameeng = $Row[8];
$valLnameeng = $Row[9];
$valEmail = $Row[10];
$valAddress = $Row[11];
$valTelephone = $Row[12];
$valMobile = $Row[13];
$valOther = $Row[14];

$valPassword = decodeStr($Row[15]);
$valStoreID = $Row[16];
$valUnitID = $Row[17];
$valPositionUser = $Row[18];

$valUsertype = $Row[19];
$valUnitIDSub = $Row[20];
$valIdAgency = $Row[21];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <link href="../css/theme.css" rel="stylesheet" />
  <link href="js/uploadfile.css" rel="stylesheet" />

  <title><?php  echo  $core_name_title ?></title>
  <link href="../js/select2/css/select2.css?v=<?php   echo date('YmdHis'); ?>" rel="stylesheet" />
  <script language="JavaScript" type="text/javascript" src="../js/select2/js/select2.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script language="JavaScript" type="text/javascript">
    function executeSubmit() {
      with(document.myForm) {
        if (inputgroupid.value == 0) {
          inputgroupid.focus();
          jQuery("#inputgroupid").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputgroupid").removeClass("formInputContantTbAlertY");
        }

        // if(inputTypeUser.value==0) { 
        // 	inputTypeUser.focus();
        // 	jQuery("#inputTypeUser").addClass("formInputContantTbAlertY"); 
        // 	return false; 
        // }else{ 
        // 	jQuery("#inputTypeUser").removeClass("formInputContantTbAlertY"); 
        // }
        /*
        if(inputUnitID.value==0) { 
        	inputUnitID.focus();
        	jQuery("#inputUnitID").addClass("formInputContantTbAlertY"); 
        	return false; 
        }else{ 
        	jQuery("#inputUnitID").removeClass("formInputContantTbAlertY"); 
        }
        */

        if (isBlank(inputUserName)) {
          inputUserName.focus();
          jQuery("#inputUserName").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputUserName").removeClass("formInputContantTbAlertY");
        }

        if (inputTypeUser.value == 1) {
          if (isBlank(inputPassword)) {
            inputPassword.focus();
            jQuery("#inputPassword").addClass("formInputContantTbAlertY");
            return false;
          } else {
            jQuery("#inputPassword").removeClass("formInputContantTbAlertY");
          }

          if (isBlank(inputPassword1)) {
            inputPassword1.focus();
            jQuery("#inputPassword1").addClass("formInputContantTbAlertY");
            return false;
          } else {
            jQuery("#inputPassword1").removeClass("formInputContantTbAlertY");
          }

          if (inputPassword.value != inputPassword1.value) {
            inputPassword1.focus();
            jQuery("#inputPassword").addClass("formInputContantTbAlertY");
            jQuery("#inputPassword1").addClass("formInputContantTbAlertY");
            return false;
          } else {
            jQuery("#inputPassword").removeClass("formInputContantTbAlertY");
            jQuery("#inputPassword1").removeClass("formInputContantTbAlertY");
          }

          if (isBlank(inputfnamethai)) {
            inputfnamethai.focus();
            jQuery("#inputfnamethai").addClass("formInputContantTbAlertY");
            return false;
          } else {
            jQuery("#inputfnamethai").removeClass("formInputContantTbAlertY");
          }


          if (isBlank(inputlnamethai)) {
            inputlnamethai.focus();
            jQuery("#inputlnamethai").addClass("formInputContantTbAlertY");
            return false;
          } else {
            jQuery("#inputlnamethai").removeClass("formInputContantTbAlertY");
          }

          /*
          			if (isBlank(inputfnameeng)) {
          				inputfnameeng.focus();
          				jQuery("#inputfnameeng").addClass("formInputContantTbAlertY");
          				return false;
          			} else {
          				jQuery("#inputfnameeng").removeClass("formInputContantTbAlertY");
          			}


          			if (isBlank(inputlnameeng)) {
          				inputlnameeng.focus();
          				jQuery("#inputlnameeng").addClass("formInputContantTbAlertY");
          				return false;
          			} else {
          				jQuery("#inputlnameeng").removeClass("formInputContantTbAlertY");
          			}*/

          /*if (inputThemeUrl.value == "http://") {
               inputThemeUrl.focus();
               jQuery("#inputThemeUrl").addClass("formInputContantTbAlertY");
               return false;
           } else {
               jQuery("#inputThemeUrl").removeClass("formInputContantTbAlertY");
           }*/

        }
      }

      updateContactNew('updateContant.php');

    }


    function loadCheckUser() {
      with(document.myForm) {
        var inputValuename = document.myForm.inputUserName.value;
        var inputValueTypeUser = document.myForm.inputTypeUser.value;
      }
      if (inputValuename != '') {
        checkUsermember(inputValuename);
      }

      if (inputValueTypeUser == 2) {
        checkUsermemberOA(inputValuename);
      }
    }


    jQuery(document).ready(function() {
      $('.select2').select2();
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
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $_REQUEST['module_orderby'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php  echo  $_REQUEST['valEditID'] ?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php  echo  $valhtmlname ?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo  $_REQUEST['inputLt'] ?>" />
    <input type="hidden" name="inputTheme" id="inputTheme" value="<?php  echo  $valTheme ?>" />
    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php  echo  $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  $langMod["txt:titleedit"] ?>
              <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php  echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)
            <?php  } ?>
            </span></td>
          <td class="divRightNavTb" align="right">



          </td>
        </tr>
      </table>
    </div>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langMod["txt:titleedit"] ?>
              <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php  echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)
            <?php  } ?>
            </span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <?php  if ($valPermission == "RW") { ?>
                    <div class="btnSave" title="<?php  echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                  <?php  } ?>
                  <div class="btnBack" title="<?php  echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
            <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titleuser"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langTxt["us:titleuserDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:permission"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <select name="inputgroupid" id="inputgroupid" class="formSelectContantTb select2">
              <option value="0"><?php  echo  $langTxt["us:selectpermission"] ?> </option>
              <?php 
              $sql_group = "SELECT " . $core_tb_group . "_id," . $core_tb_group . "_name  FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_status='Enable' AND " . $core_tb_group . "_id !='1' ORDER BY " . $core_tb_group . "_order DESC ";
              $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
              while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
                $row_groupid = $row_group[0];
                $row_groupname = $row_group[1];

              ?>
                <option value="<?php  echo  $row_groupid ?>" <?php  if ($valGroupid == $row_groupid) { ?> selected="selected" <?php   } ?>><?php  echo  $row_groupname ?></option>
              <?php  } ?>
            </select>
          </td>
        </tr>


        <tr style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["txt:typeuser"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <?php  
            foreach ($arrTypeUser as $key => $value) {
            ?>
              <label>
                <div class="formDivRadioL"><input name="inputTypeUser" id="inputTypeUser" type="radio" class="formRadioContantTb" <?php  if ($valUsertype == $key || $key == 1) { ?> checked="checked" <?php   } ?> value="<?php  echo  $key ?>" /></div>
                <div class="formDivRadioR"><?php  echo  $value ?></div>
              </label>
            <?php  } ?>
          </td>
        </tr>

        <tr style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:part"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPart" id="inputPart" type="text" class="formInputContantTb" value="<?php  echo  $valPart ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:nameuser"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputUserName" id="inputUserName" type="text" class="formInputContantTb" onblur="loadCheckUser()" value="<?php  echo  $valUsername ?>" /></td>
        </tr>
        <tr class="typePrivate" <?php  if ($valUsertype == 2) { ?> style="display:none;" <?php   } ?>>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:pass"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPassword" id="inputPassword" type="password" class="formInputContantTbShot" value="<?php  echo  $valPassword ?>" /><br />
            <span class="formFontNoteTxt"><?php  echo  $langTxt["note:password"] ?></span>
          </td>
        </tr>
        <tr class="typePrivate" <?php  if ($valUsertype == 2) { ?> style="display:none;" <?php   } ?>>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:repass"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPassword1" id="inputPassword1" type="password" class="formInputContantTbShot" value="<?php  echo  $valPassword ?>" /><br />
            <span class="formFontNoteTxt"><?php  echo  $langTxt["note:password"] ?></span>
          </td>
        </tr>
      </table>
      <br>
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titleagency"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langTxt["us:titleagencyDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:agency"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <select name="inputgroupAgency" id="inputgroupAgency" class="formSelectContantTb select2">
              <option value="0"><?php  echo  $langTxt["us:selectagency"] ?> </option>
              <?php 
              $sql_groupAg = "SELECT " . $md_group_tb . "_id," . $md_group_tb . "_subject  FROM " . $md_group_tb . " WHERE " . $md_group_tb . "_status='Enable' 
              and " . $md_group_tb . "_masterkey = 'agen' ORDER BY " . $md_group_tb . "_order DESC ";
              // print_pre($sql_groupAg);
              $query_groupAg = wewebQueryDB($coreLanguageSQL, $sql_groupAg);
              while ($row_groupAg = wewebFetchArrayDB($coreLanguageSQL, $query_groupAg)) {
                $row_groupid = $row_groupAg[0];
                $row_groupname = $row_groupAg[1];

              ?>
                <option value="<?php  echo  $row_groupid ?>" <?php   if ($valIdAgency == $row_groupid) {
                                                      echo "selected";
                                                    } ?>><?php  echo  $row_groupname ?></option>
              <?php  } ?>
            </select>
          </td>
        </tr>
      </table>
      <br class="typePrivate" <?php  if ($valUsertype == 2) { ?> style="display:none;" <?php   } ?> />
      <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none;">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titleType"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langTxt["us:titleTypeDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:typeuser"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputTypeUser" id="inputTypeUser" value="1" type="radio" checked="checked" class="formCheckBoxContantTb" /></div>
              <div class="formDivRadioR"><?php  echo  $coreTxtTypeProplemUser[$i] ?></div>
            </label>
          </td>
        </tr>
      </table> -->
      
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder typePrivate" <?php  if ($valUsertype == 2) { ?> style="display:none;" <?php   } ?>>

        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titlepic"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langTxt["us:titlepicDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <tr>
          <td align="right" valign="top" height="5"></td>
          <td colspan="6" align="left" valign="top">
            <div style="margin-bottom:10px;" name="imgShow" id="imgShow">
              <img src="../../upload/core/50/<?php  echo  $valPic ?>" onerror="this.src='<?php  echo  "../img/btn/blank_s.gif" ?>'" />
              <input name="picnameProfile" type="hidden" id="picnameProfile" value="<?php  echo  $valPic ?>" />
            </div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:inputpic"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">

            <div class="file-input-wrapper">
              <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
              <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxUploadProfile();" />
            </div>
          </td>
        </tr>
      </table>
      <br class="typePrivate" <?php  if ($valUsertype == 2) { ?> style="display:none;" <?php   } ?> />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder typePrivate" <?php  if ($valUsertype == 2) { ?> style="display:none;" <?php   } ?>>

        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titlesystem"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langTxt["us:titlesystemDe"] ?></span>
          </td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:antecedent"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" <?php  if ($valPrefix == "Mr.") echo "checked"; ?> value="Mr." onclick="
document.myForm.inputGender[0].checked=true
    " /></div>
              <div class="formDivRadioR"><?php  echo  $langTxt["us:mr"] ?></div>
            </label>

            <label>
              <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" <?php  if ($valPrefix == "Miss") echo "checked"; ?> value="Miss" onclick="
document.myForm.inputGender[1].checked=true " /></div>
              <div class="formDivRadioR"><?php  echo  $langTxt["us:miss"] ?></div>
            </label>
            <label>
              <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" <?php  if ($valPrefix == "Mrs.") echo "checked"; ?> value="Mrs." onclick="
document.myForm.inputGender[1].checked=true    " /></div>
              <div class="formDivRadioR"><?php  echo  $langTxt["us:mrs"] ?></div>
            </label>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:sex"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputGender" id="inputGender" type="radio" class="formRadioContantTb" checked="checked" onclick="document.myForm.inputPrefix[0].checked=true" <?php  if ($valGender == "Male") echo "checked"; ?> value="Male" /></div>
              <div class="formDivRadioR"><?php  echo  $langTxt["us:male"] ?></div>
            </label>


            <label>
              <div class="formDivRadioL"><input name="inputGender" id="inputGender" type="radio" class="formRadioContantTb" onclick="document.myForm.inputPrefix[1].checked=true" <?php  if ($valGender == "Female") echo "checked"; ?> value="Female" /></div>
              <div class="formDivRadioR"><?php  echo  $langTxt["us:female"] ?></div>
            </label>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:firstnamet"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputfnamethai" id="inputfnamethai" type="text" class="formInputContantTb" value="<?php  echo  $valFnamethai ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:lastnamet"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputlnamethai" id="inputlnamethai" type="text" class="formInputContantTb" value="<?php  echo  $valLnamethai ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:firstnamete"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputfnameeng" id="inputfnameeng" type="text" class="formInputContantTb" value="<?php  echo  $valFnameeng ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:lastnamee"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputlnameeng" id="inputlnameeng" type="text" class="formInputContantTb" value="<?php  echo  $valLnameeng ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["set:position"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPosirionUser" id="inputPosirionUser" type="text" class="formInputContantTb" value="<?php  echo  $valPositionUser ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:email"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputemail" id="inputemail" type="text" class="formInputContantTb" value="<?php  echo  $valEmail ?>" /></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:address"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <textarea name="inputlocation" id="inputlocation" cols="20" rows="5" class="formTextareaContantTb"><?php  echo  $valAddress ?></textarea>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:tel"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputtelephone" id="inputtelephone" type="text" class="formInputContantTb" value="<?php  echo  $valTelephone ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:mobile"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputmobile" id="inputmobile" type="text" class="formInputContantTb" value="<?php  echo  $valMobile ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:other"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputother" id="inputother" type="text" class="formInputContantTb" value="<?php  echo  $valOther ?>" /></td>
        </tr>
      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

        <tr>
          <td colspan="7" align="right" valign="top" height="20"></td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
        </tr>
      </table>
    </div>
  </form>
  <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
  <script type="text/javascript">
    function ajaxUploadProfile() {
      var valuepicname = jQuery("input#picnameProfile").val();
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
        url: 'upload.php?valID=<?php  echo  $_POST["valEditID"] ?>&deletepicname=' + valuepicname,
        secureuri: true,
        fileElementId: 'fileToUpload',
        dataType: 'json',
        success: function(data, status) {
          if (typeof(data.error) != 'undefined') {

            if (data.error != '') {
              alert(data.error);
            } else {
              jQuery("#imgShow").show();
              jQuery("#imgShow").html(data.msg);
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
    /*
    	jQuery(function() {
    		jQuery('#fileToUpload').change(function() {
    				ajaxUploadProfile();
    				document.myForm.fileToUpload.value ="";
    		});
    			
    	});
    */

    $(document).on('click', '#inputTypeUser', function() {
      if ($('#inputTypeUser:checked').val() == 2) {
        $('.typePrivate').hide();
        loadCheckUser();
      } else {
        $('.typePrivate').show();
      }
    });
  </script>
  <?php  include("../lib/disconnect.php"); ?>

</body>

</html>