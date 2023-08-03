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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<link href="../css/theme.css" rel="stylesheet"/>
<title><?php echo $core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript"  type="text/javascript">
		var countArrSort ='';
	jQuery(function() {
	
			jQuery("#boxPermissionSort").sortable({
		update : function () {
			var order = jQuery('#boxPermissionSort').sortable('serialize');
			countArrSort = order;
			jQuery("#inputSort").val(countArrSort);
			//alert(countArrSort);
		}
	});	
	
	jQuery("#boxPermissionSort").disableSelection();
	
	});
	
	
		
</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid']?>" />
    <input name="myParentID" type="hidden" id="myParentID" value="<?php echo $_REQUEST['myParentID']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh']?>" />
    <input name="inputSort" type="hidden" id="inputSort" value="" />

					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('../core/userManage.php')" target="_self"><?php echo $valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langTxt["us:sortpermis"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langTxt["us:sortpermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnSave" title="<?php echo $langTxt["btn:save"]?>" onclick="sortingContactNew('../core/sortingUs.php');"></div>
                                                        <div  class="btnBack" title="<?php echo $langTxt["btn:back"]?>" onclick="btnBackPage('../core/userManage.php')"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain"  >
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" style="	border-top:#c8c7cc solid 1px;"> 
  <tr >
    <td  colspan="7" align="left"  valign="middle" class="formTileTxt">
    <?php
		$sql = "SELECT ".$core_tb_staff."_id,".$core_tb_staff."_fnamethai,".$core_tb_staff."_lnamethai,".$core_tb_staff."_credate,".$core_tb_staff."_status,".$core_tb_staff."_picture  FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_status !='Superadmin'    ";
		$sql .= " ORDER BY ".$core_tb_staff."_order DESC";
	$query=wewebQueryDB($coreLanguageSQL,$sql) ;
	$recordCount=wewebNumRowsDB($coreLanguageSQL,$query);
	if($recordCount>=1){
?>
<ul id="boxPermissionSort"  >
<?php
while($row=wewebFetchArrayDB($coreLanguageSQL,$query)) {
		$valID=$row[0];
		$valName=$row[1]." ".$row[2];
	 	$valDateCredate = dateFormatReal($row[3]);
		 $valTimeCredate = timeFormatReal($row[3]);
		$valStatus=$row[4];
		$valPicProfile="../../upload/core/50/".$row[5];

		if($valStatus=="Enable"){
			$valStatusClass=	"fontContantTbEnable";
		}else{
			$valStatusClass=	"fontContantTbDisable";
		}
		
			$valImgCycle="boxprofile_l.png";
  ?>
  <li  id="listItem_<?php echo $valID?>" class="divSortDrop">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr >
     <td width="58%" align="left"  valign="top" >
	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><?php echo $valName?></td>
  </tr>
</table></td>
    <td width="14%"  align="center"    valign="top">
    <span class="fontContantTbupdate"><?php echo $valType?></span>    </td>
    <td width="14%"  align="center"   valign="top">
    <div   id="load_status<?php echo $valID?>">
    <?php if($valStatus=="Enable"){?>
                
<span class="<?php echo $valStatusClass?>"><?php echo $valStatus?></span>

                <?php }else{?>
                
				<span class="<?php echo $valStatusClass?>"><?php echo $valStatus?></span>
                
                <?php }?>
                
                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="load_waiting<?php echo $valID?>" />     </div>    </td>
    <td width="14%"  align="center"   valign="top">
    <span class="fontContantTbupdate"><?php echo $valDateCredate?></span><br/>
    <span class="fontContantTbTime"><?php echo $valTimeCredate?></span>    </td>
    </tr>
</table>

  </li>
  <?php }?>
</ul>
<?php }?>
       </td>
    </tr>
  

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"]?>"><?php echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form>     
<?php include("../lib/disconnect.php");?>

</body>
</html>
