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

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$update=array();
$update[] = $mod_tb_root . "_status     ='Read'";

$sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL,$sql);

$sql = "SELECT  
" . $mod_tb_root . "_id , 
" . $mod_tb_root . "_subject , 
" . $mod_tb_root . "_message, 
" . $mod_tb_root . "_credate,    
" . $mod_tb_root . "_name,    
" . $mod_tb_root . "_status , 
" . $mod_tb_root . "_gid, 
" . $mod_tb_root . "_address,    
" . $mod_tb_root . "_email , 
" . $mod_tb_root . "_tel , 
" . $mod_tb_root . "_file , 
" . $mod_tb_root . "_idcode, 
" . $mod_tb_root . "_gid, 
" . $mod_tb_root . "_ip , 
" . $mod_tb_root . "_file  ";

$sql .= " FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";
// $sql .= " FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "' AND  ".$mod_tb_root."_language     ='".$_SESSION['dmcr_core_session_language']."'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";
// print_pre($sql);
$Query = wewebQueryDB($coreLanguageSQL,$sql);
$Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[3]);
$valSubject = $Row[1];
$valCreby = $Row[2];
$valStatus = $Row[5];

if ($valStatus == "Read") {
    $valStatusClass = "fontContantTbEnable";
} else {
    $valStatusClass = "fontContantTbDisable";
}

$valTel = $Row[9];
$valMessage = $Row[2];
$valAddress = $Row[7];
$valEmail =$Row[8];
$valName = $Row[4];
$valFilevdo = $Row[10];
$valIdcode = $Row[11];
$valGid = $Row[12];
$valIP = $Row[13];
$valFileCheck = $Row[14];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
                <link href="../css/theme.css" rel="stylesheet"/>

                <title><?php  echo  $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
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
                        <?php  if ($_REQUEST['viewID'] <= 0) { ?>
                            <div class="divRightNav">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                    <tr>
                                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php  echo  $valLinkNav1 ?>" target="_self"><?php  echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?php  echo  $langMod["meu:contant"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo  $langMod["txt:titleview"] ?> <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php  echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php  } ?></span></td>
                                        <td  class="divRightNavTb" align="right">



                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php  } ?>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langMod["txt:titleview"] ?> <?php  if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php  echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php  } ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <?php  if ($_REQUEST['viewID'] <= 0) { ?>
                                                        <?php  if ($valPermission == "RW") { ?>
                                                         <!--   <div  class="btnEditView" title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                                                    document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                                    editContactNew('../<?php  echo  $mod_fd_root ?>/editContant.php')"></div>-->
                                                              <?php  } ?>
                                                        <div  class="btnBack" title="<?php  echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
                                        <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:subject"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:subjectDe"] ?></span>    </td>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valSubject ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valMessage ?></div></td>
                                </tr>
                            </table>
                            <br />
                         

                          
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langMod["tit:contact"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langMod["txt:ContactDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seotitle"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valName ?></div></td>
                                </tr>
                                <!-- <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seokey"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valAddress ?></div></td>
                                </tr> -->
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seokey1"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valEmail ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langMod["inp:seokey2"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valTel ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >IP:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php  echo  $valIP ?></div></td>
                                </tr>
                            </table>
                            <br />

                            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langMod["txt:attfile"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:attfileDe"]?></span>   </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langMod["txt:attfile"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <?php 
	if($valFileCheck==""){
	?>
    <?php 
	
			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$valID."'  ORDER BY ".$mod_tb_file."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL, $query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL, $query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');
			?>

            <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php  echo get_Icon($downloadFile)?>" align="absmiddle" width="30"  /><a href="../<?php  echo $mod_fd_root?>/download.php?linkPath=<?php  echo $linkRelativePath?>&amp;downloadFile=<?php  echo $downloadFile?>"><?php  echo $downloadName."".$imageType?></a> <font class="fontfile">| <?php  echo $langMod["file:type"]?>: <?php  echo $imageType?> | <?php  echo $langMod["file:size"]?>: <?php  echo get_IconSize($linkRelativePath)?></font></div>
            <div></div>

            <?php 
		 }}else{
		 echo "-";
		 }
?>
    </div>  
    <?php  }else{
		
		$linkRelativePath = $mod_path_file."/".$valFileCheck;
		$downloadFile = $valFileCheck;
		$downloadName = "กดเพื่อดาวน์โหลดเอกสาร";
		$imageType = strstr($downloadFile,'.');
	?>
    <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php  echo get_Icon($downloadFile)?>" align="absmiddle" width="30"  /><a href="../<?php  echo $mod_fd_root?>/download.php?linkPath=<?php  echo $linkRelativePath?>&amp;downloadFile=<?php  echo $downloadFile?>"><?php  echo $downloadName."".$imageType?></a> <font class="fontfile">| <?php  echo $langMod["file:type"]?>: <?php  echo $imageType?> | <?php  echo $langMod["file:size"]?>: <?php  echo get_IconSize($linkRelativePath)?></font></div>
            <div></div>
    <?php  } ?>  </td>
  </tr>
  </table>
                            <br /> -->

                          
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["us:titleinfo"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["us:titleinfoDe"] ?></span>     </td>
                                </tr>
               
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["us:credate"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?php  echo  $valCredate ?></div>         </td>
                                </tr>
                               
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:status"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">

                                            <?php  if ($valStatus == "Read") { ?>
                                                <span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span>
                                            <?php  } else { ?>
                                                <span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span>
                                            <?php  } ?>
                                        </div>         </td>
                                </tr>
                            </table>
                            <br />     <?php  if ($_REQUEST['viewID'] <= 0) { ?>

                                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

                                    <tr >
                                        <td colspan="7" align="right"  valign="top" height="20"></td>
                                    </tr>
                                    <tr >
                                        <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                    </tr>
<?php  } ?>
                            </table>
                        </div>
                    </form>
                    <?php  include("../lib/disconnect.php"); ?>
<?php  if ($_REQUEST['viewID'] <= 0) { ?>
                        <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
                        <script language="JavaScript"  type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
                        <script type="text/javascript">
                                                            jQuery(function () {
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
                                                        } else/* if(filetype=="wmv")*/ {

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
