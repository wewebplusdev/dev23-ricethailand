<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$langMod = getRreplaceForView($langMod);

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";



			$sql = "SELECT   ";
			$sql .= "   ".$mod_tb_root."_id ,
      ".$mod_tb_root."_credate ,
      ".$mod_tb_root."_crebyid,
      ".$mod_tb_root."_status,
      ".$mod_tb_root."_sdate  	 	 ,
      ".$mod_tb_root."_edate  	,
      ".$mod_tb_root."_lastdate,
      ".$mod_tb_root."_lastbyid,
      ".$mod_tb_root."_pic ,
      ".$mod_tb_root."_type ,
      ".$mod_tb_root."_filevdo ,
      ".$mod_tb_root."_url  ,
      ".$mod_tb_root."_view,
      ".$mod_tb_root."_groupProoject,
      ".$mod_tb_root."_subject  ,    
      ".$mod_tb_root."_title , 
      ".$mod_tb_root."_htmlfilename   ,    
      ".$mod_tb_root."_metatitle  	 	 ,    
      ".$mod_tb_root."_description  	 	 ,    
      ".$mod_tb_root."_keywords,
      ".$mod_tb_root."_picshow,
      ".$mod_tb_root."_theme,
      ".$mod_tb_root."_theme_link,
      ".$mod_tb_root."_theme_type,
      ".$mod_tb_root."_tag,
      ".$mod_tb_root."_dwnid,
      ".$mod_tb_root."_agenid,
      ".$mod_tb_root."_yearid,
      ".$mod_tb_root."_per as  _per
    ";
			
			$sql .= "  FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root."_id='".$_REQUEST['valEditID']."' ";
			$Query=wewebQueryDB($coreLanguageSQL, $sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valID=$Row[0];
			$valCredate=DateFormat($Row[1]);
			$valCreby=$Row[2];
			$valStatus=$Row[3];
			if($valStatus=="Enable"){
				$valStatusClass=	"fontContantTbEnable";
			}elseif($valStatus=="Home"){
				$valStatusClass=	"fontContantTbHomeSt";
			}else{
				$valStatusClass=	"fontContantTbDisable";
			}

			if($Row[4]=="0000-00-00 00:00:00"){
			$valSdate="-";
			}else{
			$valSdate=DateFormatReal($Row[4]);
			}
			if($Row[5]=="0000-00-00 00:00:00"){
			$valEdate="-";
			}else{
			$valEdate=DateFormatReal($Row[5]);
			}

			$valLastdate=DateFormat($Row[6]);
			$valLastby=$Row[7];

			$valPicName=$Row[8];
			$valPic=$mod_path_pictures."/".$Row[8];
			$valType=$Row[9];
			$valFilevdo=$Row[10];
			$valPathvdo=$mod_path_vdo."/".$Row[10];
			$valUrl=rechangeQuot($Row[11]);
			$valView=number_format($Row[12]);

			$valGid=$Row[13];

			$valSubject=rechangeQuot($Row[14]);
			$valTitle=rechangeQuot($Row[15]);
			$valHtml=$mod_path_html."/".$Row[16];
			$valMetatitle=rechangeQuot($Row[17]);
			$valDescription=rechangeQuot($Row[18]);
			$valKeywords=rechangeQuot($Row[19]);
		  	$valPicShow= $Row[20];
			$valTheme= $Row[21];
			$valThemeLink= $Row[22];
			$valThemeType= $Row[23];
			$valTag= unserialize($Row[24]);
			$valdwn= $Row[25];
			$valAgenid= $Row[26];
			$valyeaid= $Row[27];
			$val_per= $Row['_per'];
			
			$value_permissionData =getCheckPermissionData($valCreby);
			
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);

			logs_access('3','View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <link href="../css/theme.css" rel="stylesheet" />

  <title><?php  echo  $core_name_title ?></title>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
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
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo  $_REQUEST['inputLt'] ?>" />
    <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
    <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
    <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
    <?php  if($_REQUEST['viewID']<=0){?>
    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php  echo  $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  $langMod["txt:titleview"] ?>
              <?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)
              <?php  } ?>
            </span></td>
          <td class="divRightNavTb" align="right">



          </td>
        </tr>
      </table>
    </div>
    <?php  } ?>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langMod["txt:titleview"] ?>
              <?php  if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php  echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)
              <?php  } ?>
            </span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <?php  if($_REQUEST['viewID']<=0){?>
                  <?php  if($valPermission=="RW" && $value_permissionData =="RW" ){?>
                  <div class="btnEditView" title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                                        document.myFormHome.valEditID.value=<?php  echo  $valID ?>;
                                                        editContactNew('../<?php  echo  $mod_fd_root ?>/editContant.php')"></div>
                  <?php  } ?>
                  <div class="btnBack" title="<?php  echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                  <?php  } ?>
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:selectag"] ?>:<span class="fontContantAlert"></span></td>

          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  
			
			 $sql_group = "SELECT ";
                                      $sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";

                                      $sql_group .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_status ='Enable' AND " . $mod_tb_root_group . "_masterkey ='" . $masterkeyAgen . "'   ORDER BY " . $mod_tb_root_group . "_order DESC ";

                                      $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                                      while($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)){
                                        $row_groupid = $row_group[0];
                                        $row_groupname = $row_group[1];
                                        if($valAgenid == $row_groupid){ echo $row_groupname;}
                                      }

                                      ?></div>
          </td>

        </tr>
        <tr >
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:year"]?><span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                <div class="formDivView">
                    <?php  
                     $sql_group = "SELECT ";
                     if($_REQUEST['inputLt']=="Thai"){
                       $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
                     }else if($_REQUEST['inputLt']=="Eng"){
                       $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten";
                     }else{
                       $sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjectcn ";
                     }
   
                   $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey='".$masterkeyYear."' AND ".$mod_tb_root_group."_id = '".$valyeaid."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
                  //  print_pre($sql_group);
                   $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                   $row_mem = wewebFetchArrayDB($coreLanguageSQL,$query_group);
                   echo $row_mem[1];
                   ?>
            </div>
            </td>
        </tr>
        
        <tr >
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:selectgn"]?><span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                <div class="formDivView">
                    <?php  
                     $sql_group = "SELECT ";
                       $sql_group .= "  ".$mod_tb_root_group."_id,
					   ".$mod_tb_root_group."_subject,
					   ".$mod_tb_root_group."_typeplan as _typeplan
					   ";
                   $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey='".$_REQUEST['masterkey']."' AND ".$mod_tb_root_group."_id = '".$valGid."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
                  //  print_pre($sql_group);
                   $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                   $row_mem = wewebFetchArrayDB($coreLanguageSQL,$query_group);
                   echo $row_mem[1];
                    $value_typeplan = $row_mem['_typeplan'];
                   ?>
            </div>
            </td>
        </tr>
        
         <tr <?php   if($value_typeplan!=2){?>style="display:none;" <?php   } ?>>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["dev0821:kmaction"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <?php 
			$sql_group = "SELECT ";
			$sql_group .= "  ".$mod_tb_dowload."_id,".$mod_tb_dowload."_subject";
			$sql_group .= "  FROM ".$mod_tb_dowload." WHERE  ".$mod_tb_dowload."_id='".$valdwn."'  ORDER BY ".$mod_tb_dowload."_order DESC ";
			$query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                $row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
                $row_groupid=$row_group[0];
                echo 	$row_groupname=$row_group[1];
				//print_pre($valdwn);
              ?>
            </div>
          </td>
        </tr>
        
        
<tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["dev0821:per"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $val_per ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valSubject ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valTitle ?></div>
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
        <tr >
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["tit:selecttag"]?>:<span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                <div class="formDivView">
                    <?php  
                     $sql_group = "SELECT ";
                     if($_REQUEST['inputLt']=="Thai"){
                       $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
                     }else if($_REQUEST['inputLt']=="Eng"){
                       $sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten";
                     }else{
                       $sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjectcn ";
                     }
   
                   $sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey='".$masterkeyTag."' AND ".$mod_tb_root_group."_status != 'Disable'  ORDER BY ".$mod_tb_root_group."_order DESC ";
                   $query_group=wewebQueryDB($coreLanguageSQL, $sql_group);
                    while ($row_mem = wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
                        $row_memid = $row_mem[0];
                        $row_memname = $row_mem[1]; 
                        foreach($valTag as $keyvalTag=> $valvalTag){
                            if($valvalTag==$row_memid){
                                  echo $row_memname."<br>"; 
                                }
                            } 
                            
                    } ?>
            </div>
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <img src="<?php  echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?php  echo  "../img/btn/nopic.jpg" ?>'" />
            </div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $modTxtShowPic[0] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $modTxtShowPic[$valPicShow] ?></div>
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
          <td colspan="7" align="left" valign="top" class="formTileTxt">
            <div class="viewEditorTileTxt">
              <?php 
                $fd = @fopen ($valHtml, "r");
                $contents = @fread ($fd, filesize ($valHtml));
                @ fclose ($fd);
                echo txtReplaceHTML($contents);
              ?>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <!-- <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb">ใช้รูปภาพอ้างอิง:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
            <?php   if ($valThemeType == 1) {
                echo 'ไม่ใช้รูปภาพอ้างอิง';
              } else {
                echo 'ใช้รูปภาพอ้างอิง';
              } 
            ?>
            </div>
          </td>
        </tr> -->
        <?php 
		if($valThemeType == 2){
	?>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb ">รูปภาพอ้างอิง:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <ul class="selectTheme">
                <?php 
					$sqlTheme = "SELECT   ";
					$sqlTheme .= "  
					".$mod_tb_theme."_id , 
					".$mod_tb_theme."_subject ,
					".$mod_tb_theme."_file

					";
				
					$sqlTheme .= " FROM ".$mod_tb_theme." WHERE ".$mod_tb_theme."_masterkey='".$masterkeyTheme."'  AND  ".$mod_tb_theme."_id ='".$valTheme."' ";
					$QueryTheme=wewebQueryDB($coreLanguageSQL, $sqlTheme);
					$count_record_theme=wewebNumRowsDB($coreLanguageSQL,$QueryTheme);
					$RowTheme=wewebFetchArrayDB($coreLanguageSQL,$QueryTheme);
							//print_pre($RowTheme);
							$keyTheme = $RowTheme[0];
							
							$valThemeSubject = $RowTheme[1];
							$valueThemePicName=$RowTheme[2];
							$valueThemePic=$mod_pathTheme_pictures."/".$RowTheme[2];
						
                    ?>

                <li class="parentTheme" style="background:url(<?php  echo  $valueThemePic ?>) no-repeat top;  background-size:contain;background-position:center; "></li>
              </ul>
            </div>
          </td>
        </tr>
        <?php 
			if($valThemeLink != '#' && $valThemeLink != ''){
		
		
	?>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb">ลิงค์รูปภาพอ้างอิง:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valThemeLink ?></div>
          </td>
        </tr>
        <?php 
			}
		}
	?>

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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["txt:album"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <?php  
                $sql_filetemp="SELECT  ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename,".$mod_tb_root_album."_name,".$mod_tb_root_album."_download  FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid 	='".$_REQUEST['valEditID']."'   ORDER BY ".$mod_tb_root_album."_id ASC";
                // print_pre($sql_filetemp);
                $query_filetemp=wewebQueryDB($coreLanguageSQL, $sql_filetemp);
                $number_filetemp=wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
                if($number_filetemp>=1){
                $valAlbum="";
                while($row_filetemp=wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)){
                $linkRelativePath = $mod_path_album."/".$row_filetemp[1];
                $downloadFile = $row_filetemp[1];
                $downloadID = $row_filetemp[0];
                $downloadName = $row_filetemp[2];
                $countDownload= $row_filetemp[3];
                $imageType = strstr($downloadFile,'.');
              ?>
              <?php  if($_REQUEST['viewID']<=0) { ?>
              <!-- <a rel="viewAlbum"  title=""  href="<?php  echo  $mod_path_album . "/reB_" . $downloadFile ?>"> -->
              <img src="<?php  echo  $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" /><!-- </a> -->
              <?php  } else { ?>
              <img src="<?php  echo  $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" />
              <?php  } ?>
              <?php  } } else { ?>
              -
              <?php  } ?>
            </div>
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["txt:video"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <?php 
    if($valType=="file"){
		if($valFilevdo!=""){
				$filename = $valFilevdo;
				$arrstrfile = explode(".",$valFilevdo);
				$filetype = strtolower($arrstrfile[sizeof($arrstrfile)-1]);
    ?>
              <!-- <div id="areaPlayer" style="z-index:-1999; "></div> -->
              <video width="400" controls>
                <source src="<?php   echo $valPathvdo ?>" type="video/mp4">
              </video>
              <?php  }else{ ?>
              -
              <?php  }}else{
			if($valUrl!=""){
				$valUrl = str_replace("https://youtu.be/", "https://www.youtube.com/watch?v=", $valUrl);
				$myUrlArray = explode("v=",$valUrl);
				$myUrlCut=$myUrlArray[1];
				$myUrlCutArray = explode("&",$myUrlCut);
				 $myUrlCutAnd=$myUrlCutArray[0];
			?>
              <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/<?php  echo  $myUrlCutAnd ?>" frameborder="0" allowfullscreen style="z-index:-1999; "></iframe>
              <?php  }else{ ?>
              -
              <?php  }} ?>

            </div>
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <?php 
			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$valID."'  ORDER BY ".$mod_tb_file."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL, $sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');
			?>

              <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php  echo  get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php  echo  $mod_fd_root ?>/download.php?linkPath=<?php  echo  $linkRelativePath ?>&amp;downloadFile=<?php  echo  $downloadFile ?>"><?php  echo  $downloadName . "" . $imageType ?></a>
                <font class="fontfile">| <?php  echo  $langMod["file:type"] ?>: <?php  echo  $imageType ?> | <?php  echo  $langMod["file:size"] ?>: <?php  echo  get_IconSize($linkRelativePath) ?> | <?php  echo  $langMod["file:download"] ?>: <?php  echo  number_format($countDownload) ?></font>
              </div>
              <div></div>

              <?php 
		 }}else{
		 echo "-";
		 }
?>
            </div>
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seotitle"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valMetatitle ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seodes"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valDescription ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["inp:seokey"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valKeywords ?></div>
          </td>
        </tr>
      </table>
      <br />
      <table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr >
            <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                <span class="formFontSubjectTxt"><?php  echo $langTxt["txt:subjectlog"]?></span><br/>
                <span class="formFontTileTxt"><?php  echo $langTxt["txt:subjectlogDe"]?></span></td>
                <!-- <span class="formFontTileTxt"><?php   echo $langMod["txt:dateDe"] ?></span> -->   </td> 
        </tr>
        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

        <tr  >
            <td class="formLeftContantTb">
                <table width="100%" border="0" style="padding-left:1%;" cellspacing="0" cellpadding="0" align="center"   class="tbBoxListwBorder">
                    <tr >
                            <td align="center"  width="5%" valign="middle"  class="divRightTitleTb" >
                              <span class="fontTitlTbRight">
                                  ครั้งที่
                              </span>
                            </td>
                            <td width=""  class="divRightTitleTb"  valign="middle"  align="center">
                              <span class="fontTitlTbRight">
                                <?php  echo $langMod["tit:appby"]?>
                              </span>
                            </td>
                            <td width="10%"  class="divRightTitleTb"  valign="middle"  align="center">
                              <span class="fontTitlTbRight">
                                <?php  echo $langMod["tit:appdate"]?>
                              </span>
                            </td>
                            <td width="10%"  class="divRightTitleTb"  valign="middle"  align="center">
                              <span class="fontTitlTbRight">
                                <?php  echo $langTxt["txt:status"]?>
                              </span>
                            </td> 
                    </tr>

                    <?php 
                    $sql_date = "SELECT " . $mod_tb_root_log . "_id,
                    " . $mod_tb_root_log . "_credate,
                    " . $mod_tb_root_log . "_creby,
                    " . $mod_tb_root_log . "_status_approve,
                    " . $mod_tb_root_log . "_status ";
                    
                    
                    $sql_date .= "  FROM " . $mod_tb_root_log . " WHERE  " . $mod_tb_root_log . "_groupProoject ='" . $_REQUEST['valEditID'] . "' ORDER BY ".$mod_tb_root_log."_credate DESC ";
                    // print_pre($sql_date);
                    $query_date = wewebQueryDB($coreLanguageSQL,$sql_date);
                    $count_row = wewebNumRowsDB($coreLanguageSQL,$query_date);
                    $i_i=1;
                    if($count_row>0){
                        while ($row_date = wewebFetchArrayDB($coreLanguageSQL,$query_date)) {
                            $row_dateid = $row_date[0];
                            $row_datedate = DateFormat($row_date[1]); 
                            $row_datename = $row_date[2]; 
                            $row_status_prove = $row_date[3]; 
                            $row_status = $row_date[4]; 
                            // print_pre($row_status);
                        if($row_status=="Enable"){
                            $name_status = "รอการอนุมัติ";
                            $valStatusClass=	"fontContantTbEnable";
                        }
                        else{
                            $name_status = "ยกเลิก";
                            $valStatusClass=	"fontContantTbDisable";
                        }
                        ?>
                        
                    

                    <tr>
                        <td  class="divRightContantOverTb"  valign="top"  align="center">
                            <span class="fontContantTbupdate">
                            <?php   echo $i_i; ?>
                            </span>
                        </td>
                        <td  class="divRightContantOverTb"  valign="top"  align="center">
                            <span class="fontContantTbupdate">
                            <?php   echo $row_datename; ?>
                            </span>
                        </td>
                        <td  class="divRightContantOverTb"  valign="top"  align="center">
                            <span class="fontContantTbupdate">
                            <?php   echo $row_datedate; ?>
                            </span>
                        </td>
                        <td  class="divRightContantOverTb"  valign="top"  align="center">
                            <?php   
                            echo "<span class='".$valStatusClass."'>";
                            echo $row_status;
                            ?>
                            </span>
                        </td>
                    </tr>
                    <?php   $i_i++; }} 
                    else{?>
                    <tr >
                        <td colspan="7" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php   echo $langTxt["mg:nodate"]?></td>
                        </tr>
                    <?php  
                    } ?>
                </table>                                        
            </td>
        </tr>
    </table> 
    <br>
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:date"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langMod["txt:dateDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:sdate"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valSdate ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:edate"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valEdate ?></div>
          </td>
        </tr>


      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titleinfo"] ?></span><br />
            <span class="formFontTileTxt"><?php  echo  $langTxt["us:titleinfoDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langMod["tit:view"] ?>:</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valView ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:credate"] ?>:</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valCredate ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:creby"] ?>:</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <?php 
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}


	?>
            </div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:lastdate"] ?>:</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?php  echo  $valLastdate ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["us:creby"] ?>:</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <?php 
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}


	?>
            </div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php  echo  $langTxt["mg:status"] ?>:</td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">

              <?php  if($valStatus=="Enable"){?>
              <span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span>
              <?php  }else if($valStatus=="Home"){?>
              <span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span>
              <?php  }else{?>
              <span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span>
              <?php  } ?>
            </div>
          </td>
        </tr>
      </table>
      <br />
      <?php  if($_REQUEST['viewID']<=0){?>

      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

        <tr>
          <td colspan="7" align="right" valign="top" height="20"></td>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
        </tr>
        <?php  } ?>
      </table>
    </div>
  </form>
  <?php  include("../lib/disconnect.php");?>
  <?php  if($_REQUEST['viewID']<=0){?>
  <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
  <script language="JavaScript" type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
  <script type="text/javascript">
    jQuery(function() {
      jQuery('a[rel=viewAlbum]').fancybox({
        'padding': 0,
        'transitionIn': 'fade',
        'transitionOut': 'fade',
        'autoSize': false,
      });
    });
  </script>
  <?php  } ?>

  <script type='text/javascript' src='../<?php  echo  $mod_fd_root ?>/swfobject.js'></script>
  <script type='text/javascript' src='../<?php  echo  $mod_fd_root ?>/silverlight.js'></script>
  <script type='text/javascript' src='../<?php  echo  $mod_fd_root ?>/wmvplayer.js'></script>
  <script type='text/javascript'>
    var filename = "<?php  echo  $filename ?>";
    var filetype = "<?php  echo  $filetype ?>";
    var cnt = document.getElementById("areaPlayer");
    if (filetype == "flv") {
      var s1 = new SWFObject('../<?php  echo  $mod_fd_root ?>/player.swf', 'player', '560', '315', '9');
      s1.addParam('allowfullscreen', 'true');
      s1.addParam('wmode', 'transparent');
      s1.addParam('allowscriptaccess', 'always');
      s1.addParam('flashvars', 'file=<?php  echo  $mod_path_vdo ?>/' + filename);
      s1.write('areaPlayer');
    } else /* if(filetype=="wmv")*/ {

      var src = '../<?php  echo  $mod_fd_root ?>/wmvplayer.xaml';
      var cfg = "";
      var ply;
      cfg = {
        file: '<?php  echo  $mod_path_vdo ?>/' + filename,
        image: '',
        height: '315',
        width: '560',
        autostart: "false",
        windowless: 'true',
        showstop: 'true'
      };
      ply = new jeroenwijering.Player(cnt, src, cfg);
    }
  </script>


</body>

</html>