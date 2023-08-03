<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$langMod = getTextFileUploadVideo($langMod);

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";

			// $myRand = time().rand(111,999);
			$myRand = randomNameUpdate(2);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);
			$valinTheme = '1';
/* check permission */
if($_SESSION[$valSiteManage.'core_session_level'] == "admin" && ( $_SESSION[$valSiteManage.'core_session_agency'] == 0 || $_SESSION[$valSiteManage.'core_session_agency'] == '')){ 
  $style = "";
  $status = true;
}else{
  $style="style='display:none;'";
  $status = false;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <link href="../css/theme.css" rel="stylesheet" />
  <link href="js/uploadfile.css" rel="stylesheet" />

  <title><?php  echo  $core_name_title ?></title>

  <link href="../js/select2/css/select2.css?v=<?php   echo date('YmdHis');?>" rel="stylesheet"/>
  <script language="JavaScript"  type="text/javascript" src="../js/select2/js/select2.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script language="JavaScript" type="text/javascript">
    function executeSubmit() {
      with(document.myForm) {
	  
		
        if (inputAgency.value == 0) {
			inputAgency.focus();
			jQuery("#inputAgency").addClass("formInputContantTbAlertY");
			return false;
        } else {
			jQuery("#inputAgency").removeClass("formInputContantTbAlertY");
        }
		
        if (inputGroupyear.value == 0) {
			inputGroupyear.focus();
			jQuery("#inputGroupyear").addClass("formInputContantTbAlertY");
			return false;
        } else {
			  jQuery("#inputGroupyear").removeClass("formInputContantTbAlertY");
        }
		
<?php   if($status){?>
        if (inputGroupID.value == 0) {
			inputGroupID.focus();
			jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
			return false;
        } else {
			jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
        }
		<?php   } ?>
		
		var valueKmaction = $('#inputKmAction').val();
		if(valueKmaction==2){
			if (inputDwnID.value == 0) {
				inputDwnID.focus();
				jQuery("#inputDwnID").addClass("formInputContantTbAlertY");
				return false;
			} else {
				jQuery("#inputDwnID").removeClass("formInputContantTbAlertY");
			}
		}
		
        if (isBlank(inputPer)) {
			inputPer.focus();
			jQuery("#inputPer").addClass("formInputContantTbAlertY");
			return false;
        } else {
			jQuery("#inputPer").removeClass("formInputContantTbAlertY");
        }

        if (isBlank(inputSubject)) {
          inputSubject.focus();
          jQuery("#inputSubject").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
        }

        if (isBlank(inputDescription)) {
			inputDescription.focus();
			jQuery("#inputDescription").addClass("formInputContantTbAlertY");
			return false;
        } else {
			jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
        }
		
        if (inputGroupTag.value == 0) {
			inputGroupTag.focus();
			jQuery("#inputGroupTag").addClass("formInputContantTbAlertY");
			return false;
        } else {
			jQuery("#inputGroupTag").removeClass("formInputContantTbAlertY");
        }


        var alleditDetail = CKEDITOR.instances.editDetail.getData();
        if (alleditDetail == "") {
          jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
          window.location.hash = '#inputEditHTML';
          return false;
        } else {
          jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
        }
        jQuery('#inputHtml').val(alleditDetail);


        if ($('#inputTypeTheme:checked').val() == 2) {

          if (isBlank(inputThemeUrl)) {
            inputThemeUrl.focus();
            jQuery("#inputThemeUrl").addClass("formInputContantTbAlertY");
            return false;
          } else {
            jQuery("#inputThemeUrl").removeClass("formInputContantTbAlertY");
          }
        }


        /*if (inputThemeUrl.value == "http://") {
            inputThemeUrl.focus();
            jQuery("#inputThemeUrl").addClass("formInputContantTbAlertY");
            return false;
        } else {
            jQuery("#inputThemeUrl").removeClass("formInputContantTbAlertY");
        } */

      }


      insertContactNew('insertContant.php');

    }

    /*###################### Select theme ######################*/
    function chooseTheme(ID) {

      var themeID;
      if (ID != '') {
        themeID = ID;
      } else {
        themeID = "blue";
      }

      $("#inputTheme").val(themeID);
      $(".themeActive").hide();
      $("#" + themeID).show();

    }

    jQuery(document).ready(function() {

      jQuery('#myForm').keypress(function(e) {
        /* Start  Enter Check CKeditor */
        var focusManager = new CKEDITOR.focusManager(editDetail);
        var checkFocus = CKEDITOR.instances.editDetail.focusManager.hasFocus;
        var checkFocusTitle = jQuery("#inputDescription").is(":focus");

        if (e.which == 13) {
          //e.preventDefault();
          if (!checkFocusTitle) {
            if (!checkFocus) {
              executeSubmit();
              return false;
            }
          }
        }
        /* End  Enter Check CKeditor */
      });
	  
      $('.select2').select2();
	  
	var valueAgency =jQuery("#inputAgency").val();
	var valueYearID =jQuery("#inputGroupyear").val();
	if (valueYearID >=1 || valueAgency >=1) {
		searchGroup();
	}
	var valueGroupID =jQuery("#inputGroupID").val();
	if (valueGroupID >=1) {
		selectTypeKmAction();
	}

    });
    function searchGroup(){
      openSelectSub('openSelectSubInner.php');
      // document.myForm.submit();
    }
  </script>
</head>

<body>
  <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $_REQUEST['module_orderby'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php  echo  $myRand ?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php  echo  $valhtmlname ?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo  $_REQUEST['inputLt'] ?>" />
    <input type="hidden" name="inputTheme" id="inputTheme" value="" />
    <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
    <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
    <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
    <input name="inputKmAction" type="hidden" id="inputKmAction" value="" />
    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php  echo  $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  $langMod["txt:titleadd"] ?>
              <?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo  $langTxt["lg:thai"] ?>)
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
          <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langMod["txt:titleadd"] ?>
              <?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo  $langTxt["lg:thai"] ?>)
              <?php  } ?>
            </span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <?php  if($valPermission=="RW" ){?>
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
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:subject"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:subjectDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <tr <?php  echo $style?>>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:selectag"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb" >
          <select name="inputAgency" id="inputAgency" class="formSelectContantTb select2" onchange="searchGroup()" >
              <option value="0"><?php  echo  "เลือก".$langMod["tit:selectag"] ?></option>
              <?php 
                $sql_group = "SELECT ";
                $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
                $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_status ='Enable' AND ".$mod_tb_root_group."_masterkey='".$masterkeyAgen."' ";
                if($status){
                  $sql_group .= "";
                }else{
                  $sql_group .= "  AND ".$mod_tb_root_group."_id='".$_SESSION[$valSiteManage.'core_session_agency']."' ";
                }
                
                $sql_group .= " ORDER BY ".$mod_tb_root_group."_order DESC ";
                // print_pre($sql_group);
                $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                $row_groupid=$row_group[0];
                $row_groupname=$row_group[1];
                ?>
              <option value="<?php  echo  $row_groupid ?>" <?php  if($_REQUEST['inputGh2']==$row_groupid){ ?> selected="selected"
                <?php   } ?>><?php  echo  $row_groupname ?>
              </option>
              <?php  } ?>
            </select>
            
            
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:year"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <select name="inputGroupyear" id="inputGroupyear" class="formSelectContantTb select2"  onchange="searchGroup()"  >
              <option value="0"><?php  echo  $langMod["tit:selectyear"] ?></option>
              <?php 
                $sql_group = "SELECT ";
                  if($_REQUEST['inputLt']=="Thai"){
                    $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
                  }else{
                    $sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
                  }
                $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$masterkeyYear."' AND ".$mod_tb_root_group."_status != 'Disable'  ORDER BY ".$mod_tb_root_group."_order DESC ";
                $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                $row_groupid=$row_group[0];
                $row_groupname=$row_group[1];
              ?>
              <option value="<?php  echo  $row_groupid ?>" <?php  if($_REQUEST['inputGh31']==$row_groupid){ ?> selected="selected"
                <?php   } ?>><?php  echo  $row_groupname ?>
              </option>
              <?php  } ?>
            </select>
          </td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:selectgn"] ?><?php   if($status){?><span class="fontContantAlert">*</span><?php   } ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
          <?php  
              $callGauthen = "Select
              " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_cmgid as idG
              From
              " . $mod_tb_permisGroup . "
              Where
              " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_masterkey = '".$_REQUEST['masterkey']."' AND
              " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_misid = " . $_SESSION[$valSiteManage."core_session_groupid"];
              $listAuthen = $dbConnect->execute($callGauthen);
              $listGAllow = array();
              foreach ($listAuthen as $key => $value) {
                  $listGAllow[] = $value['idG'];
              }
			  
			  
			  
					$sql_group = "SELECT ";
					$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
					$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey']."'
					AND ".$mod_tb_root_group."_status != 'Disable' AND ".$mod_tb_root_group."_typeInfo != 1  ";
					if($status){
						$sql_group .= "";
					}else{
						$countlistGAllow = count($listGAllow);
						if($countlistGAllow>=1){
							$sql_group .= "   AND ".$mod_tb_root_group."_id  IN  (".implode(",", array_values($listGAllow)).")";
						}else{
							$sql_group .= "   AND ".$mod_tb_root_group."_id  IN  (0)";
						}
			
					}
					
					//print_pre($sql_group);
					
		  ?>
            <select name="inputGroupID" id="inputGroupID" class="formSelectContantTb select2" onchange="selectTypeKmAction()" >
              <option value="0"><?php  echo  $langMod["tit:selectg"] ?></option>
              <?php 
                $sql_group .= "ORDER BY " . $mod_tb_root_group . "_order DESC ";
               
                $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                $row_groupid=$row_group[0];
                $row_groupname=$row_group[1];
              ?>
              <option value="<?php  echo  $row_groupid ?>" <?php  if($_REQUEST['inputGh']==$row_groupid){ ?> selected="selected"
                <?php   } ?>><?php  echo  $row_groupname ?>
              </option>
              <?php  } ?>
            </select>
          </td>
        </tr>
        
        <tr  id="rowKmActionPlan" style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["dev0821:kmaction"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb" id="boxSubSelect">
            <select name="inputDwnID" id="inputDwnID" class="formSelectContantTb select2">
              <option value="0"><?php  echo  $langMod["dev0821:kmactionSel"]?></option>
            
            </select>
          </td>
        </tr>
        
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["dev0821:per"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPer" id="inputPer" type="text" class="formInputContantTbShot" /></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" /></td>
        </tr>

        <tr>
          <td align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:title"] ?><span class="fontContantAlert">*</span></td>
          <td colspan="6" align="left" valign="top" class="formRightContantTb">
            <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"></textarea>
          </td>
        </tr>
      </table>
       <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["dev0821:tag"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["dev0821:tagDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:selecttag"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <select name="inputGroupTag[]" id="inputGroupTag" class="formSelectContantTb select2" multiple>
              <option value="0"><?php  echo  $langMod["tit:selectgtag"] ?></option>
              <?php 
                $sql_group = "SELECT ";
                  if($_REQUEST['inputLt']=="Thai"){
                    $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
                  }else{
                    $sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
                  }
                $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$masterkeyTag."' AND ".$mod_tb_root_group."_status != 'Disable'  ORDER BY ".$mod_tb_root_group."_order DESC ";
                $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                $row_groupid=$row_group[0];
                $row_groupname=$row_group[1];
              ?>
              <option value="<?php  echo  $row_groupid ?>" <?php  if($_REQUEST['inputGh']==$row_groupid){ ?> selected="selected"
                <?php   } ?>><?php  echo  $row_groupname ?>
              </option>
              <?php  } ?>
            </select>
          </td>
        </tr>
        </table>
      <br />
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
              <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" accept="<?php   echo $langMod['dev0821:picfile']; ?>"/>
            </div>

            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notepic"] ?></span>
            <div class="clearAll"></div>
            <div id="boxPicNew" class="formFontTileTxt">
              <input type="hidden" name="picname" id="picname" />
            </div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $modTxtShowPic[0] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio" class="formRadioContantTb" /></div>
              <div class="formDivRadioR"><?php  echo  $modTxtShowPic[1] ?></div>
            </label>

            <label>
              <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="2" type="radio" class="formRadioContantTb" checked="checked" /></div>
              <div class="formDivRadioR"><?php  echo  $modTxtShowPic[2] ?></div>
            </label>
            </label>
          </td>
        </tr>
      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:title"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:titleDe"] ?></span>
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

        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <!-- <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb">ใช้รูปภาพอ้างอิง</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputTypeTheme" id="inputTypeTheme" value="1" type="radio" class="formRadioContantTb" checked="checked" onclick="jQuery('#imgClickLink1').hide();jQuery('#imgClickLink2').hide();" /></div>
              <div class="formDivRadioR">ไม่ใช้รูปภาพอ้างอิง</div>
            </label>

            <label>
              <div class="formDivRadioL"><input name="inputTypeTheme" id="inputTypeTheme" value="2" type="radio" class="formRadioContantTb" onclick="jQuery('#imgClickLink1').show();jQuery('#imgClickLink2').show();" /></div>
              <div class="formDivRadioR">ใช้รูปภาพอ้างอิง</div>
            </label>
          </td>
        </tr> -->


        <!-- <tr id="imgClickLink1" style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb">รูปภาพอ้างอิง:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <ul class="selectTheme">
              <?php 
					$sqlTheme = "SELECT   ";
					$sqlTheme .= "  
					".$mod_tb_theme."_id , 
					".$mod_tb_theme."_subject ,
					".$mod_tb_theme."_file

					";
				
					$sqlTheme .= " FROM ".$mod_tb_theme." WHERE ".$mod_tb_theme."_masterkey='".$masterkeyTheme."'  AND  ".$mod_tb_theme."_status !='Disable' ";
					$QueryTheme=wewebQueryDB($coreLanguageSQL, $sqlTheme);
					$count_record_theme=wewebNumRowsDB($coreLanguageSQL,$QueryTheme);
					$index=1;
					if($count_record_theme>0) {
						while($index<$count_record_theme+1) {
							$RowTheme=wewebFetchArrayDB($coreLanguageSQL,$QueryTheme);
							//print_pre($RowTheme);
							$keyTheme = $RowTheme[0];
							
							$valThemeSubject = $RowTheme[1];
							$valueThemePicName=$RowTheme[2];
							$valueThemePic=$mod_pathTheme_pictures."/".$RowTheme[2];
                    ?>
              <li class="parentTheme" style="background:url(<?php  echo  $valueThemePic ?>) no-repeat top; background-size:contain;background-position:center;cursor: pointer;" onclick="chooseTheme('<?php  echo  $keyTheme ?>')">
                <div class="themeActive" id="<?php  echo  $keyTheme ?>" style="display: none; text-align:center;">
                  <div style="padding-top:10px; color:#ff0000;"> <?php  echo  $valThemeSubject ?></div>
                </div>

              </li>
              <?php 
						if($index == 1){
							?>
              <script>
                chooseTheme('<?php  echo  $keyTheme ?>');
              </script>
              <?php 
						}
					$index++;
					} 
					}
					?>
            </ul>
          </td>
        </tr> -->

        <!-- <tr id="imgClickLink2" style="display:none;">
          <td align="right" valign="top" class="formLeftContantTb">ลิงค์รูปภาพอ้างอิง<span class="fontContantAlert">*</span></td>
          <td colspan="6" align="left" valign="top" class="formRightContantTb">
            <textarea name="inputThemeUrl" id="inputThemeUrl" cols="45" rows="5" class="formTextareaContantTb"></textarea>
            <span class="formFontNoteTxt"><?php  echo  $langMod["edit:linknote"] ?></span>
          </td>
        </tr> -->

      </table>
      <br />


      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:album"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:albumDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:album"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div id="mulitplefileuploader"><?php  echo  $langTxt["us:inputpicselect"] ?></div>

            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notealbum"] ?></span>
            <div class="clearAll"></div>
            <div id="status" class="formFontTileTxt"></div>
            <div id="boxAlbumNew" class="formFontTileTxt"></div>
          </td>
        </tr>
      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:video"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:videoDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <tr style="">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:typevdo"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio" class="formRadioContantTb" checked="checked" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" /></div>
              <div class="formDivRadioR"><?php  echo  $langMod["tit:linkvdo"] ?></div>
            </label>

            <label>
              <div class="formDivRadioL"><input name="inputType" id="inputType" value="file" type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();" /></div>
              <div class="formDivRadioR"><?php  echo  $langMod["tit:uploadvdo"] ?></div>
            </label>
            </label>
          </td>
        </tr>
        <tr id="boxInputlink">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:linkvdo"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"></textarea><br />
            <span class="formFontNoteTxt"><?php  echo  $langMod["tit:linkvdonote"] ?></span>
          </td>
        </tr>
        <tr id="boxInputfile" style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:uploadvdo"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="file-input-wrapper">
              <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
              <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" accept="<?php   echo $langMod['dev0821:videofile'];?>" />
            </div>

            <span class="formFontNoteTxt"><?php  echo  $langMod["tit:uploadvdonote"] ?></span>
            <div class="clearAll"></div>
            <div id="boxVideoNew" class="formFontTileTxt"></div>
          </td>
        </tr>

      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:attfile"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:attfileDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <tr style="display:show;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="file-input-wrapper">
              <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
              <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();"  accept="<?php   echo $langMod['dev0821:attfile'];?>"/>
            </div>

            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notefile"] ?></span>
            <div class="clearAll"></div>
            <div id="boxFileNew" class="formFontTileTxt"></div>
          </td>
        </tr>
      </table>

      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:seo"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:seoDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seotitle"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?php  echo  $valmetatitle ?>" /><br />
            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seotitlenote"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seodes"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?php  echo  $valdescription ?>" /><br />
            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seodesnote"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?php  echo  $valkeywords ?>" /><br />
            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:seokeynote"] ?></span>
          </td>
        </tr>
      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:datec"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:datecDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:credate"] ?><span class="fontContantAlert"></span></td>
          <td width="24%" align="left" valign="top" class="formRightContantTb"><input name="cdateInput" id="cdateInput" type="text" autocomplete="off" class="formInputContantTbShot" value="<?php  echo  $valcredate ?>" /></td>
          <td width="1%"></td>
          <td width="4%" align="right" valign="top" class="formLeftContantTb"><?php  echo  "เวลา" ?><span class="fontContantAlert"></span></td>
          <td width="10%" align="left" valign="top" class="formRightContantTb">
            <select class="formSelectContantTb" name="cHourInput" id="cHourInput" style="width:100%;">
              <option value="xx" disabled selected>ชั่วโมง</option>
              <?php  
              for ($x = 0; $x <= 23; $x++) {
                echo '<option value="' . sprintf('%02d', $x) . '">' . sprintf('%02d', $x) . '</option>';
              }
              ?>
            </select>
          </td>
          <td width="1%"></td>
          <td width="10%" align="left" valign="top" class="formRightContantTb">
            <select class="formSelectContantTb" name="cMinInput" id="cMinInput" style="width:100%;">
              <option value="xx" disabled selected>นาที</option>
              <?php  
              for ($x = 0; $x <= 59; $x++) {
                echo '<option value="' . sprintf('%02d', $x) . '">' . sprintf('%02d', $x) . '</option>';
              }
              ?>
            </select>
          </td>
          <td></td>

        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:viewconf"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="Inputviewconf" id="Inputviewconf" type="text" class="formInputContantTbShot" value="0" /></td>
        </tr>

      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:date"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:dateDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>

        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:sdate"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="sdateInput" id="sdateInput" type="text" autocomplete="off" class="formInputContantTbShot" value="<?php  echo  $sdateInput ?>" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:edate"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="edateInput" id="edateInput" type="text" autocomplete="off" class="formInputContantTbShot" value="<?php  echo  $edateInput ?>" /><br />
            <span class="formFontNoteTxt"><?php  echo  $langMod["inp:notedate"] ?></span>
          </td>
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
        url: 'loadInsertPic.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
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
    /*############################# Upload Album ################################## */

    // function ajaxFileUploadAlbum(){
    // 	 jQuery.blockUI({
    // 			message: jQuery('#tallContent'),
    // 			css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
    // 			}
    // 		});
    //
    //
    // 	jQuery.ajaxFileUpload({
    // 			url:'loadInsertAlbum.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
    // 			secureuri:true,
    // 			fileElementId:'inputAlbumUpload',
    // 			dataType: 'json',
    // 			success: function (data, status){
    // 				if(typeof(data.error) != 'undefined'){
    //
    // 					if(data.error != ''){
    // 						alert(data.error);
    // 					}else{
    // 						jQuery("#boxAlbumNew").show();
    // 						jQuery("#boxAlbumNew").html(data.msg);
    // 						setTimeout(jQuery.unblockUI, 200);
    // 					}
    //
    // 				}
    // 			},
    // 			error: function (data, status, e){
    // 				alert(e);
    // 			}
    // 		}
    // 	)
    //
    // 	return false;
    //
    // }

    /*################################# Upload Video #######################*/
    function ajaxVideoUpload() {
      var valuevdoname = jQuery("input#vdoname").val();

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
        url: 'loadInsertVideo.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&delvdoname=' + valuevdoname + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
        secureuri: false,
        fileElementId: 'inputVideoUpload',
        dataType: 'json',
        success: function(data, status) {
          if (typeof(data.error) != 'undefined') {

            if (data.error != '') {
              alert(data.error);

            } else {
              jQuery("#boxVideoNew").show();
              jQuery("#boxVideoNew").html(data.msg);
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
        url: 'loadInsertFile.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>',
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
    jQuery(function() {
      onLoadFCK();
    });
  </script>

  <script type="text/javascript" src="js/jquery.uploadfile.js"></script>
  <script type="text/javascript" language="javascript">
    jQuery(document).ready(function() {
      var vajSelectFile = 0;
      var valUploadFile = 0;
      var settings = {
        url: "loadInsertAlbum.php?myID=<?php  echo  $myRand ?>&masterkey=<?php  echo  $_REQUEST['masterkey'] ?>&langt=<?php  echo  $_REQUEST['inputLt'] ?>&menuid=<?php  echo  $_REQUEST['menukeyid'] ?>",
        dragDrop: false,
        fileName: "myfile",
        allowedTypes: "jpg,png,gif",
        returnType: "json",
        onSelect: function(files) {
          vajSelectFile = files.length;
        },

        onSuccess: function(files, data, xhr) {
          valUploadFile = valUploadFile + 1;
          if (vajSelectFile == valUploadFile) {
            loadShowPhotoUpdate('loadShowAlbumNew.php', 'boxAlbumNew');
            // alert('goooo');
            valUploadFile = 0;
          }
        },
        showStatusAfterSuccess: false,
        showAbort: false,
        showDone: false,
        showDelete: false,
        deleteCallback: function(data, pd) {
          for (var i = 0; i < data.length; i++) {

            $.post("delete.php", {
                op: "delete",
                name: data[i]
              },
              function(resp, textStatus, jqXHR) {

                //Show Message
                jQuery("#status").append("<div>File Deleted</div>");
              });

          }
          pd.statusbar.hide(); //You choice to hide/not.

        }
      }
      var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);


    });
  </script>


  <?php  if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){?>
  <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
  <?php  }else{?>
  <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
  <?php  } ?>

  <?php  include("../lib/disconnect.php");?>

</body>

</html>