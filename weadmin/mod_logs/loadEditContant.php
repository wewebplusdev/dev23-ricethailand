<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";


			$sql = "SELECT  ";
		
			$sql .= "  
			".$mod_tb_root."_id , 
			".$mod_tb_root."_urlminisite, 
			".$mod_tb_root."_credate, 
			".$mod_tb_root."_creby, 
			".$mod_tb_root."_status ,    
			".$mod_tb_root."_subject,    
			".$mod_tb_root."_address,   
			".$mod_tb_root."_tel,   
			".$mod_tb_root."_fax,    
			".$mod_tb_root."_pic ,
			".$mod_tb_root."_picmap , 
			".$mod_tb_root."_latitude , 
			".$mod_tb_root."_longitude,   
			".$mod_tb_root."_metatitle , 
			".$mod_tb_root."_description,  
			".$mod_tb_root."_keywords, 
			".$mod_tb_root."_fb, 
			".$mod_tb_root."_tw, 
			".$mod_tb_root."_yt, 
			".$mod_tb_root."_memid, 
			".$mod_tb_root."_style ,    
			".$mod_tb_root."_color,
			".$mod_tb_root."_old ,
			".$mod_tb_root."_oldurl    ";
			
			$sql .= " 	FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root."_id 	='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valid=$Row[0];
			$valUrlminisite=$Row[1];
			$valcredate=DateFormatInsertRe($Row[2]);
			$valcreby=$Row[3];
			$valstatus=$Row[4];
			$valSubject=$Row[5];
			$valAddress=$Row[6];
			$valTel=$Row[7];
			$valFax=$Row[8];
			$valPicName=$Row[9];
			$valPic=$mod_path_pictures."/".$Row[9];
			
			$valPicNameMap=$Row[10];
			$valPicMap=$mod_path_pictures."/".$Row[10];

			$valLatitude=$Row[11];
			$valLongitude=$Row[12];
			$valMetatitle=$Row[13];
			$valDescription=$Row[14];
			$valKeywords=$Row[15];
			
			$valFb=$Row[16];
			$valTw=$Row[17];
			$valYt=$Row[18];
			
			$valMemberId=$Row[19];
			$valinTheme = $Row[20];
			if($valinTheme==""){
				$valinTheme = '1';
			}
			$valColor=$Row[21];
			$valOldWebsite=$Row[22];
			$valOldWebsiteUrl=rechangeQuot($Row[23]);
			
			
		 $sqlUser = "SELECT ".$core_tb_staff."_username ,".$core_tb_staff."_password   FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$valMemberId."'  ";
		$QueryUser=wewebQueryDB($coreLanguageSQL,$sqlUser);
		$numUser=wewebNumRowsDB($coreLanguageSQL,$QueryUser);
		if($numUser<=0){
			$valMemberId=0;
		}else{
		$RowUser=wewebFetchArrayDB($coreLanguageSQL,$QueryUser);
		 $valUsername=$RowUser[0];
		$valPassword=decodeStr($RowUser[1]);
		}

		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>
<link href="js/uploadfile.css" rel="stylesheet"/>

<title><?php  echo $core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {
	
		if(isBlank(inputUrlMinisite)) {
			inputUrlMinisite.focus();
			jQuery("#inputUrlMinisite").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputUrlMinisite").removeClass("formInputContantTbAlertY"); 
		}

		if(isBlank(inputUsername)) {
			inputUsername.focus();
			jQuery("#inputUsername").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputUsername").removeClass("formInputContantTbAlertY"); 
		}

		if(isBlank(inputPassword)) {
			inputPassword.focus();
			jQuery("#inputPassword").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputPassword").removeClass("formInputContantTbAlertY"); 
		}

		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY"); 
		}



		var valScoreOld =jQuery( "input:radio[name=inputOld]:checked" ).val();
		if(valScoreOld==2){
			if(isBlank(inputOldWebsite)) {
				inputOldWebsite.focus();
				jQuery("#inputOldWebsite").addClass("formInputContantTbAlertY");
				return false;
			}else{
				jQuery("#inputOldWebsite").removeClass("formInputContantTbAlertY");
			}

		}

	}
	
	updateContactNew('updateContant.php');
	
}



jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    /* Start  Enter Check CKeditor */
	
    if (e.which == 13) {
		//e.preventDefault();
			executeSubmit();
			return false; 
    }
 	/* End  Enter Check CKeditor */
  });
});



function loadCheckUser() {
	with(document.myForm) {
		var inputValuename =document.myForm.inputUsername.value;
		}
		if( inputValuename!=''){
			checkUsermemberMiniEdit('<?php  echo $valMemberId?>',inputValuename);
		}
}

function loadCheckUrl() {
	with(document.myForm) {
		var inputValuename =document.myForm.inputUrlMinisite.value;
		}
		if( inputValuename!=''){
			checkUrlMiniEdit('<?php  echo $valid?>',inputValuename);
		}
}




function executePass() {
   var valPass =randomString();
   jQuery('#inputPassword').val(valPass);
   
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

            jQuery(document).ready(function () {
                chooseTheme('<?php  echo  $valinTheme ?>');
                jQuery('#myForm').keypress(function (e) {
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
<form action="?" method="get" name="myForm" id="myForm"  enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php  echo $_REQUEST['valEditID']?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php  echo $valhtmlname?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo $_REQUEST['inputLt']?>" />
    <input name="inputMemberId" type="hidden" id="inputMemberId" value="<?php  echo $valMemberId?>" />
    <input name="inputUrlMiniO" type="hidden" id="inputUrlMiniO" value="<?php  echo $valUrlminisite?>" />
    <input type="hidden" value="<?php  echo  $valid ?>" name="inputInfoid" id="inputInfoid"/>
   <input type="hidden" name="inputTheme" id="inputTheme" value="<?php  echo $valinTheme?>"/>					
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php  echo $valLinkNav1?>" target="_self"><?php  echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?php  echo $langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo $langMod["txt:titleedit"]?><?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?php  echo getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<?php  } ?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $langMod["txt:titleedit"]?><?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?php  echo getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<?php  } ?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <?php  if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?php  echo $langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <?php  } ?>
                                                        <div  class="btnBack" title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('index.php')"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langMod["mit:minisite"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["mit:minisiteDe"]?></span>    </td>
    </tr>
  <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
<tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:subject"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"  value="<?php  echo $valSubject?>"/></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["mit:urlminisite"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputUrlMinisite" id="inputUrlMinisite" type="text"  class="formInputContantTbShot" onblur="loadCheckUrl()" value="<?php  echo $valUrlminisite?>" /><br />
<span class="formFontNoteTxt"><?php  echo $langMod["mit:noteurlminisite"]?></span></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["mit:username"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputUsername" id="inputUsername" type="text"  class="formInputContantTbShot" onblur="loadCheckUser()" value="<?php  echo $valUsername?>"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["mit:pass"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <table align="left" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input name="inputPassword" id="inputPassword" type="text"  class="formInputContantTbShot"  value="<?php  echo $valPassword?>"/></td>
    <td width="10"></td>
    <td><div onclick="executePass()"  style="color:#fff; text-align:center; cursor:pointer; background-color:#279e48; border:#1f833b solid 1px; width:150px; height:16px; padding:10px;" >
  <span>Generate Password</span>

</div></td>
  </tr>
</table>    </td>
  </tr>
  </table>
  <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langMod["txt:old"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:oldDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["mit:old"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputOld" id="inputOld" type="radio"  class="formRadioContantTb"  value="1" <?php  if($valOldWebsite<=1){?> checked="checked" <?php  } ?> onclick="$('#rowOldUrlWebsite').hide();" /></div>
    <div class="formDivRadioR"><?php  echo $modTxtOldWebsite[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputOld" id="inputOld"  type="radio"  class="formRadioContantTb"   value="2"  <?php  if($valOldWebsite==2){?> checked="checked" <?php  } ?> onclick="$('#rowOldUrlWebsite').show();"  /></div>
    <div class="formDivRadioR"><?php  echo $modTxtOldWebsite[2]?></div>
    </label>
</td>
  </tr>
  <tr id="rowOldUrlWebsite" <?php  if($valOldWebsite<2){?> style="display:none;" <?php  } ?> >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["mit:oldUrl"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputOldWebsite" id="inputOldWebsite" type="text"  class="formInputContantTb" value="<?php  echo $valOldWebsiteUrl?>"/><br />
<span class="formFontNoteTxt"><?php  echo $langMod["mit:noteurl"]?></span></td>
  </tr>
    </table>
        <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langMod["txt:titleColor"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:titleDeColor"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["txt:color"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputColor" id="inputColor" type="radio"  class="formRadioContantTb"  value="1" <?php  if($valColor<=1){?> checked="checked" <?php  } ?> /></div>
    <div class="formDivRadioR"><?php  echo $modTxtColor[1]?></div>
    </label>
  
    <label>
    <div class="formDivRadioL"><input name="inputColor" id="inputColor"  type="radio"  class="formRadioContantTb"   value="2"  <?php  if($valColor==2){?> checked="checked" <?php  } ?>  /></div>
    <div class="formDivRadioR"><?php  echo $modTxtColor[2]?></div>
    </label>
    </label>    </td>
      </tr>
    </table>
    
     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:titleTheme"] ?></span><br/>
                            <span class="formFontTileTxt"><?php  echo  $langMod["txt:titleDeTheme"] ?></span>   
                        </td>
                    </tr>
                        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb borderBottom" ><?php  echo  $langMod["txt:theme"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb borderBottom" >
                            <ul class="selectTheme">
                                <?php 
                                foreach ($core_main_theme AS $keyTheme => $valueTheme) {
                                    ?>
                                    <li class="parentTheme" style="background:url(<?php  echo  $valueTheme["color"] ?>) no-repeat top; background-size:cover;cursor: pointer;" onclick="chooseTheme('<?php  echo  $keyTheme ?>')">
                                        <div class="themeActive" id="<?php  echo  $keyTheme ?>" style="display: none; text-align:center;"><div style="padding-top:50px; color:#ff0000;">แบบที่ <?php  echo $keyTheme?></div></div>
                                       
                                    </li>
                                <?php  } ?>
                            </ul>
                         
                            <div>
                            </div>
                        </td>
                    </tr>
  </table>

     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langMod["txt:datec"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:datecDe"]?></span>    </td>
    </tr>
                        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["us:credate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="cdateInput" id="cdateInput" type="text"  class="formInputContantTbShot" value="<?php  echo $valcredate?>"/></td>
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
<script type="text/javascript" src="../js/ajaxfileupload.js"></script>
<script type="text/javascript" language="javascript">
	/*################################# Upload Pic #######################*/	
	function ajaxFileUpload(){
		var valuepicname = jQuery("input#picname").val();
		
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});
	

		jQuery.ajaxFileUpload({
				url:'loadUpdatePic.php?myID=<?php  echo $_POST["valEditID"]?>&masterkey=<?php  echo $_REQUEST['masterkey']?>&langt=<?php  echo $_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?php  echo $_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				success: function (data, status){ 
					if(typeof(data.error) != 'undefined')
					{
					
						if(data.error != '')
						{
							alert(data.error);
						
						}else
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
	
	
	/*################################# Upload Pic Map #######################*/	
	function ajaxFileUploadMap(){
		var valuepicname = jQuery("input#picnameMap").val();
		
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});
	

		jQuery.ajaxFileUpload({
				url:'loadUpdatePicMap.php?myID=<?php  echo $_POST["valEditID"]?>&masterkey=<?php  echo $_REQUEST['masterkey']?>&langt=<?php  echo $_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?php  echo $_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUploadMap',
				dataType: 'json',
				success: function (data, status){ 
					if(typeof(data.error) != 'undefined')
					{
					
						if(data.error != '')
						{
							alert(data.error);
						
						}else
						{
							jQuery("#boxPicNewMap").show();
							jQuery("#boxPicNewMap").html(data.msg);
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


 <?php  if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
 <?php  }else{?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
 <?php  } ?>
 <?php  include("../lib/disconnect.php");?>

</body>
</html>
