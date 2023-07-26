<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:menuManage2"];

		$sql = "SELECT ".$core_tb_menu."_id , ".$core_tb_menu."_icon, ".$core_tb_menu."_namethai, ".$core_tb_menu."_moduletype, ".$core_tb_menu."_linkpath, ".$core_tb_menu."_masterkey, ".$core_tb_menu."_target, ".$core_tb_menu."_nameeng  , ".$core_tb_menu."_credate  FROM ".$core_tb_menu." WHERE ".$core_tb_menu."_id='".$_REQUEST["valEditID"]."'";
			$query=wewebQueryDB($coreLanguageSQL,$sql);
			$row=wewebFetchArrayDB($coreLanguageSQL,$query);
			$valId=$row[0];
		 	$valIcon=$row[1];
			$valNamethai=$row[2];
			$valModuletype=$row[3];
			$valLinkpath=$row[4];
			$valMasterkey=$row[5];
			$valTarget=$row[6];
			$valNameeng=$row[7];
			$valCredate=DateFormat($row[8]);
			
		$sqlP = "SELECT ".$core_tb_menu."_id , ".$core_tb_menu."_namethai, ".$core_tb_menu."_nameeng    FROM ".$core_tb_menu." WHERE ".$core_tb_menu."_id='".$_REQUEST["myParentID"]."'";
			$queryP=wewebQueryDB($coreLanguageSQL,$sqlP);
			$rowP=wewebFetchArrayDB($coreLanguageSQL,$queryP);
			if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
				$valName=rechangeQuot($rowP[$core_tb_menu."_namethai"]);
			}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
				$valName=rechangeQuot($rowP[$core_tb_menu."_nameeng"]);
			}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<link href="../css/theme.css" rel="stylesheet"/>

<title><?php   echo $core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {
		if(isBlank(inputmenuname)) { 
			inputmenuname.focus();
			jQuery("#inputmenuname").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputmenuname").addClass("formInputContantTbAlertN"); 
		}
		
		if(isBlank(inputmenunameen)) {
			inputmenunameen.focus();
			jQuery("#inputmenunameen").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputmenunameen").addClass("formInputContantTbAlertN"); 
		}
		
		if(inputMenu_LinkType[0].checked) {
			if(isBlank(inputlinkpath)) { 
				inputlinkpath.focus();
				jQuery("#inputlinkpath").addClass("formInputContantTbAlertY"); 
				return false; 
			}else{ 
				jQuery("#inputlinkpath").addClass("formInputContantTbAlertN"); 
			}
			
			if(isBlank(inputmasterkey)) { 
				inputmasterkey.focus();
				jQuery("#inputmasterkey").addClass("formInputContantTbAlertY"); 
				return false; 
			}else{ 
				jQuery("#inputmasterkey").addClass("formInputContantTbAlertN"); 
			}

		}
		
		if(inputMenu_LinkType[1].checked) {
			
			if(isBlank(inputmenuurl)) { 
				inputmenuurl.focus();
				jQuery("#inputmenuurl").addClass("formInputContantTbAlertY"); 
				return false; 
			}else{ 
				jQuery("#inputmenuurl").addClass("formInputContantTbAlertN"); 
			}

			if(inputmenuurl.value=='http://') { 
				inputmenuurl.focus();
				jQuery("#inputmenuurl").addClass("formInputContantTbAlertY"); 
				return false; 
			}else{ 
				jQuery("#inputmenuurl").addClass("formInputContantTbAlertN"); 
			}

		}
		
	}
	
	updateContactNew('../core/updateMg.php');
}

</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php   echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo $_REQUEST['menukeyid']?>" />
    <input name="myParentID" type="hidden" id="myParentID" value="<?php   echo $_REQUEST['myParentID']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php   echo $_REQUEST['valEditID']?>" />

					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php   echo $valLinkNav1?>" target="_self"><?php   echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('../core/menuManage.php')" target="_self"><?php   echo $valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php   echo $langTxt["mg:viewpermis"]?><?php   if($_REQUEST["myParentID"]>=1){?> (<?php   echo $valName?>)<?php   } ?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php   echo $langTxt["mg:viewpermis"]?><?php   if($_REQUEST["myParentID"]>=1){?> (<?php   echo $valName?>)<?php   } ?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnEditView" title="<?php   echo $langTxt["btn:edit"]?>" onclick="editContactNew('../core/editMg.php');"></div>
                                                        <div  class="btnBack" title="<?php   echo $langTxt["btn:back"]?>" onclick="btnBackPage('../core/menuManage.php')"></div>
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
   <span class="formFontSubjectTxt"><?php   echo $langTxt["mg:title"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["mg:titleDe"]?></span>    </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpnthai"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo $valNamethai?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpneng"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb"  ><div class="formDivView"><?php   echo $valNameeng?></div></td>
  </tr>
    </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php   echo $langTxt["mg:titleset"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["mg:titlesetDe"]?></span>   </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inptype"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <?php   
	 if($valModuletype=="Module"){
	 	$valLinkType="Application";
	 }else  if($valModuletype=="Link"){
	 	$valLinkType="Link";
	 }else{
	 	$valLinkType="Group";
	 }
	 ?>
    <div class="formDivView"><?php   echo $valLinkType?></div>
      </td>
  </tr>
    <tr id="rowModule" <?php   if($valModuletype=="Group" || $valModuletype=="Link") { ?> style="display:none"<?php   } ?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpfile"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valLinkpath?></div>
    
    </td>
  </tr>
   <tr id="rowURL" <?php   if($valModuletype=="Module" || $valModuletype=="Group") { ?> style="display:none"<?php   } ?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpurl"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <?php  
if($valLinkpath=="") {
	$valLinkShow= "http://";
} else {
	$valLinkShow=$valLinkpath;
}
?>
        <div class="formDivView"><?php   echo $valLinkShow?></div></td>
  </tr>
   <tr id="rowModuleKey"  <?php   if($valModuletype=="Group" || $valModuletype=="Link") { ?> style="display:none"<?php   } ?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpkey"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo $valMasterkey?></div></td>
  </tr>
     <tr id="rowTarget"  <?php   if($valModuletype=="Group"){?> style="display:none"<?php   } ?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpshow"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <?php  
	if($valTarget=="_parent") {
	$valTargetShow= $langTxt["mg:inpwindows"];
} else {
	$valTargetShow=$langTxt["mg:inpwindowsnew"];
}

	?>
    <div class="formDivView"><?php   echo $valTargetShow?></div>
         </td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php   echo $valCredate?></div></td>
  </tr>
      </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

   <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php   echo $langTxt["mg:titleicon"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["mg:titleiconDe"]?></span>    </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:inpicon"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><img src="<?php   echo $valIcon?>" name="LibraryIconSample" id="LibraryIconSample" onerror="this.src='<?php   echo "../img/btn/blank.gif"?>'"   /></div> </td>
  </tr>
      </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php   echo $langTxt["btn:gototop"]?>"><?php   echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
    </div>
</form>     
<?php   include("../lib/disconnect.php");?>

</body>
</html>
