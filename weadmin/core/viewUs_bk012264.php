<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../lib/checkMemberSA.php");
include("../core/incLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:userManage2"];


	 	$sql = "SELECT 
		".$core_tb_staff."_id , 
		".$core_tb_staff."_picture , 
		".$core_tb_staff."_groupid , 
		".$core_tb_staff."_username , 
		".$core_tb_staff."_prefix , 
		".$core_tb_staff."_gender , 
		".$core_tb_staff."_fnamethai , 
		".$core_tb_staff."_lnamethai , 
		".$core_tb_staff."_fnameeng , 
		".$core_tb_staff."_lnameeng , 
		".$core_tb_staff."_email , 
		".$core_tb_staff."_address , 
		".$core_tb_staff."_telephone , 
		".$core_tb_staff."_mobile , 
		".$core_tb_staff."_other , 
		".$core_tb_staff."_password , 
		".$core_tb_staff."_credate, 
		".$core_tb_staff."_lastdate , 
		".$core_tb_staff."_crebyid, 
		".$core_tb_staff."_status , 
		".$core_tb_staff."_usertype
		FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valId=$Row[0];
			$valPic=$Row[1];
			$valGroupid=$Row[2];
			$valUsername=$Row[3];
			$valPrefix=$Row[4];
			$valGender=$Row[5];
			$valFnamethai=$Row[6];
			$valLnamethai=$Row[7];
			$valFnameeng=$Row[8];
			$valLnameeng=$Row[9];
			$valEmail=$Row[10];
			$valAddress=$Row[11];
			$valTelephone=$Row[12];
			$valMobile=$Row[13];
			$valOther=$Row[14];
			$valPassword=decodeStr($Row[15]);
			
			$valCredate=DateFormat($Row[16]);
			$valLastdate=DateFormat($Row[17]);
			$valCreby=$Row[18];
			$valStatus=$Row[19];
		    $valUsertype=$Row[20];
			/*$valUserCar=$Row[20];
			$valUnitID=$Row[21];
			$valTypeUser=$Row[22];
			$valTypeUserShow=$coreTxtTypeProplemUser[$Row[22]];
			$valTypeApprove=$Row[23];
			$valTypeApproveShow=$coreTxtTypeApprove[$Row[23]];
			$valPart=$Row[24];
			$valPositionUser=$Row[25];*/
			 logs_access('2','View');
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
		if(inputgroupid.value==0) { 
			inputgroupid.focus();
			jQuery("#inputgroupid").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputgroupid").removeClass("formInputContantTbAlertY"); 
		}
		
		if(isBlank(inputUserName)) {
			inputUserName.focus();
			jQuery("#inputUserName").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputUserName").removeClass("formInputContantTbAlertY"); 
		}
		
		if(isBlank(inputPassword)) {
			inputPassword.focus();
			jQuery("#inputPassword").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputPassword").removeClass("formInputContantTbAlertY"); 
		}
		
		if(isBlank(inputPassword1)) {
			inputPassword1.focus();
			jQuery("#inputPassword1").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputPassword1").removeClass("formInputContantTbAlertY"); 
		}

		if (inputPassword.value!=inputPassword1.value) {	
			inputPassword1.focus(); 
			jQuery("#inputPassword").addClass("formInputContantTbAlertY"); 
			jQuery("#inputPassword1").addClass("formInputContantTbAlertY"); 
			return false;
		}else{
			jQuery("#inputPassword").removeClass("formInputContantTbAlertY"); 
			jQuery("#inputPassword1").removeClass("formInputContantTbAlertY"); 
		}

		if(isBlank(inputfnamethai)) {
			inputfnamethai.focus();
			jQuery("#inputfnamethai").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputfnamethai").removeClass("formInputContantTbAlertY"); 
		}

		
		if(isBlank(inputlnamethai)) {
			inputlnamethai.focus();
			jQuery("#inputlnamethai").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputlnamethai").removeClass("formInputContantTbAlertY"); 
		}

		
		if(isBlank(inputfnameeng)) {
			inputfnameeng.focus();
			jQuery("#inputfnameeng").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputfnameeng").removeClass("formInputContantTbAlertY"); 
		}

		
		if(isBlank(inputlnameeng)) {
			inputlnameeng.focus();
			jQuery("#inputlnameeng").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputlnameeng").removeClass("formInputContantTbAlertY"); 
		}

		
		if(isBlank(inputemail)) {
			inputemail.focus();
			jQuery("#inputemail").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputemail").removeClass("formInputContantTbAlertY"); 
		}

		
		if (!isEmail(inputemail.value)) {
			inputemail.focus();
			jQuery("#inputemail").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputemail").removeClass("formInputContantTbAlertY"); 
		}

	}
	
	updateContactNew('../core/updateUs.php');
	
}


function loadCheckUser() {
	with(document.myForm) {
	var inputValuenameid =document.myForm.valEditID.value;
		var inputValuename =document.myForm.inputUserName.value;
		}
		if( inputValuename!=''){
			checkUsermemberEdit(inputValuenameid,inputValuename);
		}
}

</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php   echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php   echo $_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php   echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php   echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php   echo $_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php   echo $_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php   echo $_REQUEST['valEditID']?>" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php   echo $valLinkNav1?>" target="_self"><?php   echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('../core/userManage.php')" target="_self"><?php   echo $valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php   echo $langTxt["us:viewpermis"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php   echo $langTxt["us:viewpermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnEditView" title="<?php   echo $langTxt["btn:edit"]?>"  onclick="editContactNew('../core/editUs.php');"></div>
                                                        <div  class="btnBack" title="<?php   echo $langTxt["btn:back"]?>" onclick="btnBackPage('../core/userManage.php')"></div>
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
    <span class="formFontSubjectTxt"><?php   echo $langTxt["us:titleuser"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["us:titleuserDe"]?></span>        </td>
    </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:permission"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   
	$sql_group = "SELECT ".$core_tb_group."_id,".$core_tb_group."_name  FROM ".$core_tb_group." WHERE ".$core_tb_group."_id='".$valGroupid."'   ORDER BY ".$core_tb_group."_order DESC ";
		$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
		$row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
		$row_groupid=$row_group[0];
		$row_groupname=$row_group[1];
		echo $row_groupname;
		?></div>    </td>
     </tr>
     
     
     <?php  
	 		if($valUserCar>=1){
	 ?>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:usercar"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   
	$sql_group = "SELECT ".$core_tb_usercar."_id,".$core_tb_usercar."_subject  FROM ".$core_tb_usercar." WHERE ".$core_tb_usercar."_id='".$valUserCar."'   ORDER BY ".$core_tb_usercar."_order DESC ";
		$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
		$row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
		$row_groupid=$row_group[0];
		$row_groupname=$row_group[1];
		echo $row_groupname;
		
		?></div>    </td>
     </tr>
     <?php   } ?>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["txt:typeuser"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView">
        <?php  
        echo $arrTypeUser[$valUsertype];
        ?>
    </div></td>
  </tr>
       <tr style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:part"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valPart?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:nameuser"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valUsername?></div></td>
  </tr>
    <tr <?php   if($valUsertype== 2){ ?> style="display:none;" <?php   } ?> >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:pass"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valPassword?></div></td>
  </tr>
    </table>
      
    <br <?php   if($valUsertype== 2){ ?> style="display:none;" <?php   } ?>  />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php   if($valUsertype== 2){ ?> style="display:none;" <?php   } ?> > 

    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php   echo $langTxt["us:titlepic"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["us:titlepicDe"]?></span>        </td>
    </tr>
        <tr >
          <td   colspan="7"  align="right" height="15"  valign="top"  ></td>
        </tr>
        <tr >
    <td  align="right"  valign="top"  height="5"  width="18%"  >&nbsp;</td>
    <td colspan="6" align="left"  valign="top" >
        <div style="margin-bottom:10px;"  name="imgShow"  id="imgShow">
        <img src="../../upload/core/50/<?php   echo $valPic?>"   onerror="this.src='<?php   echo "../img/btn/nouser.jpg"?>'" />
            <input name="picnameProfile" type="hidden" id="picnameProfile" value="<?php   echo $valPic?>" />
        </div>    </td>
  </tr>
      </table>
    <br <?php   if($valUsertype== 2){ ?> style="display:none;" <?php   } ?>  />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php   if($valUsertype== 2){ ?> style="display:none;" <?php   } ?> > 

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php   echo $langTxt["us:titlesystem"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["us:titlesystemDe"]?></span>        </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:antecedent"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   if ($valPrefix=="Mr."){ echo $langTxt["us:mr"]; }else if ($valPrefix=="Miss"){ echo $langTxt["us:miss"]; }else if ($valPrefix=="Mrs."){ echo $langTxt["us:mrs"]; } ?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:sex"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
         <div class="formDivView"><?php   if ($valGender=="Male"){ echo $langTxt["us:male"]; }else if ($valGender=="Female"){ echo $langTxt["us:female"]; } ?></div>         </td>
  </tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:firstnamet"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valFnamethai?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:lastnamet"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valLnamethai?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:firstnamete"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valFnameeng?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:lastnamee"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valLnameeng?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:email"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valEmail?></div></td>
  </tr>
   <!-- <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:position"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valPositionUser?></div></td>
  </tr> -->
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:address"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   echo $valAddress?></div> </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:tel"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valTelephone?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:mobile"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valMobile?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:other"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php   echo $valOther?></div></td>
  </tr>
       </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

<tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php   echo $langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?php   echo $langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   echo $valCredate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   echo $valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?php  
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}
    
	
	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php   echo $langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php   echo $valStatus?></div>         </td>
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
  <script language="JavaScript"  type="text/javascript" src="../lib/ActiveDirectory/js/scriptNameView.js"></script>

</body>
</html>
