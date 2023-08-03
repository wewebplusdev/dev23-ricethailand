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
  function executeAddEmail() {
  with(document.myForm) {
      jQuery("#boxAlertEmail").hide();
    if(isBlank(inputEmail)) {
      inputEmail.focus();
      jQuery("#inputEmail").addClass("formInputContantTbAlertY");
      return false;
    }else{
      jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
    }

      if(!isBlank(inputEmail)){
        if (!isEmail(inputEmail.value)) {
          inputEmail.focus();
          jQuery("#inputEmail").addClass("formInputContantTbAlertY");
          return false;
         }else{
          jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
         }
      }

      }
          modInsertEmail('insertEmail.php');

  }

jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    if (e.which == 13) {
    //e.preventDefault();
    executeAddEmail();
    return false;
    }
  });
});

</script>
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
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php  echo $valhtmlname?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php  echo $_REQUEST['inputLt']?>" />
          <div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav">
                        <a href="<?php  echo $valLinkNav1?>" target="_self"><?php  echo $valNav1?></a>
                         <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> 
                         <a  href="javascript:void(0)"  onclick="btnBackPage('set.php')" target="_self"><?php  echo $langMod["meu:Complaints"]?>
                         </a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo $langMod["txt:titleedits"]?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
          </div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $langMod["txt:titleedits"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">

                                                        <div  class="btnBack" title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('set.php')"></div>
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
    <span class="formFontSubjectTxt"><?php  echo  $langMod["txt:maildata"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langMod["txt:setDe"]?></span>   </td>
    </tr>
        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" >
    <div id="boxMailContact">
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
          <?php 
 $sql = "SELECT ".$mod_tb_root_email."_email,".$mod_tb_root_email."_id FROM ".$mod_tb_root_email."  WHERE  ".$mod_tb_root_email."_key='".$_REQUEST["masterkey"]."'  ORDER BY ".$mod_tb_root_email."_id ASC ";
$query=wewebQueryDB($coreLanguageSQL,$sql);
$numRowCount=wewebNumRowsDB($coreLanguageSQL, $query);
if($numRowCount>=1){
$num_email=0;
while($row=wewebFetchArrayDB($coreLanguageSQL, $query)) {
$num_email++;
$valEmailNew=rechangeQuot($row[0]);
$valEmailID=$row[1];
?>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo number_format($num_email)?>.<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
  <a href="javascript:void(0)"  onclick="document.myForm.valDelFile.value=<?php  echo $valEmailID?>; modDelEmail('deleteEmail.php')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete email"  hspace="5"     border="0" /></a> <?php  echo $valEmailNew?></div></td>
  </tr>

<?php  }} ?>
</table>
</div>
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" style="padding-top:10px;" ><?php  echo $langMod["tit:email1"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <table border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td><input name="inputEmail" id="inputEmail"  type="text"  class="formInputContantTbShot" value="<?php  echo $inputEmail?>"/></td>

    <td>       <?php  if($valPermission=="RW" ){?><div  class="btnAdd2" title="<?php  echo $langTxt["btn:add"]?>" onclick="executeAddEmail();"></div><?php  } ?></td>
  </tr>

</table>


    <span class="formFontNoteTxt" style="color:#FF0000;display:none;" id="boxAlertEmail"><?php  echo $langMod["ats:email"]?></span>
   </td>
  </tr>

</table>
</td></tr>

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
