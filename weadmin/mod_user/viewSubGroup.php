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



				$sql = "SELECT   ";
				$sql .= "   ".$mod_tb_root_subgroup."_id,
            ".$mod_tb_root_subgroup."_credate ,
            ".$mod_tb_root_subgroup."_crebyid,
            ".$mod_tb_root_subgroup."_status	,
            ".$mod_tb_root_subgroup."_lastdate ,
            ".$mod_tb_root_subgroup."_lastbyid   ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= "   , ".$mod_tb_root_subgroup."_subject  ,    ".$mod_tb_root_subgroup."_title   ";
			}else if($_REQUEST['inputLt']=="Eng"){
				$sql .= "  ,".$mod_tb_root_subgroup."_subjecten  ,    ".$mod_tb_root_subgroup."_titleen 	  ";
			}else{
				$sql .= "  ,".$mod_tb_root_subgroup."_subjectcn  ,    ".$mod_tb_root_subgroup."_titlecn 	  ";
			}

			 $sql .= " ,".$mod_tb_root_subgroup."_gid ";
			 $sql .= "  ";
		 	 $sql .= " FROM ".$mod_tb_root_subgroup." WHERE ".$mod_tb_root_subgroup."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root_subgroup."_id='".$_REQUEST['valEditID']."' ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valID=$Row[0];
			$valCredate=DateFormat($Row[1]);
			$valCreby=$Row[2];
			$valStatus=$Row[3];
			if($valStatus=="Enable"){
				$valStatusClass=	"fontContantTbEnable";
			}else{
				$valStatusClass=	"fontContantTbDisable";
			}

			$valLastdate=DateFormat($Row[4]);
			$valLastby=$Row[5];
			$valSubject=rechangeQuot($Row[6]);
			$valTitle=rechangeQuot($Row[7]);
      $valGID=$Row[8];
			// $valPic=$mod_path_pictures."/".$Row[8];
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);

			logs_access('3','View Group');
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
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php  echo $_REQUEST['valEditID']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo $_REQUEST['inputLt']?>" />
    <?php  if($_REQUEST['viewID']<=0){?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php  echo $valLinkNav1?>" target="_self"><?php  echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?php  echo $langMod["meu:subgroup"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo $langMod["txt:titleviewsg"]?><?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<?php  } ?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                    <?php  } ?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $langMod["txt:titleviewsg"]?><?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2|| $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<?php  } ?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
													<?php  if($_REQUEST['viewID']<=0){?>
                                                    <?php  if($valPermission=="RW"){?>
                                                        <div  class="btnEditView" title="<?php  echo $langTxt["btn:edit"]?>" onclick="
                                                        document.myFormHome.valEditID.value=<?php  echo $valID?>;
                                                        editContactNew('../<?php  echo $mod_fd_root?>/editSubGroup.php')"></div>
                                                     <?php  } ?>
                                                      <div  class="btnBack" title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('subgroup.php')"></div>
                                                        <?php  } ?>
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
		<tr>
		<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:selectgn"]?>:<span class="fontContantAlert"></span></td>
		<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
		<?php 
		$sql_group = "SELECT ";
		 if($_REQUEST['inputLt']=="Thai"){
			 $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
		 }else if($_REQUEST['inputLt']=="Eng"){
			 $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten";
		 }else{
			 $sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjectcn ";
		 }

		 $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_id='".$valGID."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
		$query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
		$row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
		$row_groupid=$row_group[0];
		echo 	$row_groupname=$row_group[1];
		?>
		</div></td>
		</tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:subjectsg"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo $valSubject?></div></td>
  </tr>
        <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:noteg"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo $valTitle?></div></td>
  </tr>


</table>
         <br />


<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php  echo $valCredate?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["us:creby"]?>:</td>
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
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php  echo $valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?php 
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}


	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">

               <?php  if($valStatus=="Enable"){?>
                   <span class="<?php  echo $valStatusClass?>"><?php  echo $valStatus?></span>
                <?php  }else{?>
                    <span class="<?php  echo $valStatusClass?>"><?php  echo $valStatus?></span>
                <?php  } ?>
     </div>         </td>
  </tr>
  </table>
         <br />
      <?php  if($_REQUEST['viewID']<=0){?>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo $langTxt["btn:gototop"]?>"><?php  echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
    <?php  } ?>
  </table>
  </div>
</form>
<?php  include("../lib/disconnect.php");?>

</body>
</html>
