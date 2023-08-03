<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";

			 $myRand = time().rand(111,99);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>

<title><?php  echo $core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {
		
		if(inputGroupID.value==0) {
			inputGroupID.focus();
			jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
		}

		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
		}



	}

	insertContactNew('insertSubGroup.php');

}



jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
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
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo $_REQUEST['inputLt']?>" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php  echo $valLinkNav1?>" target="_self"><?php  echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?php  echo $langMod["meu:group"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo $langMod["txt:titleaddsg"]?><?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo $langTxt["lg:thai"]?>)<?php  } ?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $langMod["txt:titleaddsg"]?><?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo $langTxt["lg:thai"]?>)<?php  } ?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <?php  if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?php  echo $langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <?php  } ?>
                                                        <div  class="btnBack" title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('subgroup.php')"></div>
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
    <span class="formFontSubjectTxt"><?php  echo $langMod["txt:subjectsg"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:subjectsgDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
		<tr>
	<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:selectgn"]?><span class="fontContantAlert">*</span></td>
	<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
	<select name="inputGroupID"  id="inputGroupID"class="formSelectContantTb">
			<option value="0"><?php  echo $langMod["tit:selectg"]?></option>
			<?php 
$sql_group = "SELECT ";
		if($_REQUEST['inputLt']=="Thai"){
			$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
		}else{
			$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
		}

		$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey']."'   ORDER BY ".$mod_tb_root_group."_order DESC ";
	$query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
	while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
	$row_groupid=$row_group[0];
	$row_groupname=$row_group[1];
	?>
			<option value="<?php  echo $row_groupid?>" <?php   if($_REQUEST['inputGh']==$row_groupid){ ?> selected="selected" <?php   } ?>><?php  echo $row_groupname?></option>
			<?php  } ?>
	</select></td>
</tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:subjectsg"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"/></td>
  </tr>
          <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:noteg"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <textarea name="inputComment"  id="inputComment" cols="20" rows="5" class="formTextareaContantTb"></textarea>
    </td>
  </tr>


  </table>
         <br />

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo $langTxt["btn:gototop"]?>"><?php  echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form>

 <?php  include("../lib/disconnect.php");?>

</body>
</html>
