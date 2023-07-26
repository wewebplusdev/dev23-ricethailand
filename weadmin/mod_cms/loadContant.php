<?php  
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2= getNameMenu($_REQUEST["menukeyid"]);
$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<link href="../css/theme.css" rel="stylesheet"/>
<title><?php   echo $core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script type="text/javascript" language="javascript">

// function changeRibbon(tablename, statusname, statusid, fileAc) {

//    jQuery.blockUI({
//         message: jQuery('#tallContent'),
//         css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
//         }
//     });

//     var pin = document.getElementById("inputRibbon"+statusid).value;
//     var TYPE = "POST";
//     var URL = fileAc;
//     var dataSet = {
//         Valuetablename: tablename,
//         Valuestatusname: pin,
//         Valuestatusid: statusid,
//         Valuefilestatus: fileAc
//     };


//     jQuery.ajax({type: TYPE, url: URL, data: dataSet,
//         success: function (html) {

//             // jQuery("#" + loadderstatus + "").show();
//             // jQuery("#" + loadderstatus + "").html(html)
//             setTimeout(jQuery.unblockUI, 200);
//         }
//     });
// }

</script>
</head>

<body>
<?php  
// Check to set default value #########################
$module_default_pagesize = $core_default_pagesize;
$module_default_maxpage = $core_default_maxpage;
$module_default_reduce = $core_default_reduce;
$module_default_pageshow = 1;
$module_sort_number = $core_sort_number;

if($_REQUEST['module_pagesize']=="") {
	$module_pagesize = $module_default_pagesize;
}else{
	$module_pagesize =$_REQUEST['module_pagesize'];
}

if($_REQUEST['module_pageshow']=="") {
	$module_pageshow = $module_default_pageshow;
}else{
	$module_pageshow =$_REQUEST['module_pageshow'];
}

if($_REQUEST['module_adesc']=="") {
	$module_adesc = $module_sort_number;
}else{
	$module_adesc =$_REQUEST['module_adesc'];
}

if($_REQUEST['module_orderby']=="")  {
	$module_orderby = $mod_tb_root."_order";
}else{
	$module_orderby =$_REQUEST['module_orderby'];
}

if($_REQUEST['inputSearch']!="") {
	$inputSearch=trim($_REQUEST['inputSearch']);
}else{
	$inputSearch =$_REQUEST['inputSearch'];
}

?>
<form action="?" method="post" name="myForm" id="myForm">
<input name="masterkey" type="hidden" id="masterkey" value="<?php   echo $_REQUEST['masterkey']?>" />
<input name="menukeyid" type="hidden" id="menukeyid" value="<?php   echo $_REQUEST['menukeyid']?>" />
<input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php   echo $module_pageshow?>" />
<input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php   echo $module_pagesize?>" />
<input name="module_orderby" type="hidden" id="module_orderby" value="<?php   echo $module_orderby?>" />

					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?php   echo $valLinkNav1?>" target="_self"><?php   echo $valNav1?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php   echo $valNav2?></span></td>
												<td  class="divRightNavTb" align="right">

                      <!-- ######### Start Menu Sub Mod ########## -->
                         <div class="menuSubMod">
                            <a  href="group.php?masterkey=<?php   echo $_REQUEST['masterkey']?>&menukeyid=<?php   echo $_REQUEST['menukeyid']?>">
                            <?php   echo $langMod["meu:group"]?>
                            </a>
                        </div>
                        <div class="menuSubMod active">
                            <a  href="index.php?masterkey=<?php   echo $_REQUEST['masterkey']?>&menukeyid=<?php   echo $_REQUEST['menukeyid']?>">
								<?php   echo $langMod["meu:contant"]?>
                            </a>
                        </div> 
                        <!-- ######### End Menu Sub Mod ########## -->

                        </td>
                        </tr>

		</table>
					</div>
					<div class="divRightHeadSearch" >

					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">

          <tr>
            <td style="padding-right:10px;" class="textSearch2">
              <select name="inputGh" id="inputGh" onchange="document.myForm.submit(); " class="formSelectSearchStyle">
                <option value="0">เลือก<?php   echo $langMod["meu:group"]?> </option>
                <?php  
                  $sql = "SELECT
                  *
                  FROM
                  " . $mod_tb_root_group ."
                  WHERE
                  " . $mod_tb_root_group . "." . $mod_tb_root_group . "_masterkey = '".$_REQUEST['masterkey']."' ";
                  $sql .= " and " . $mod_tb_root_group . "." . $mod_tb_root_group . "_status = 'Enable'";
                  $sql .= " order by " . $mod_tb_root_group . "." . $mod_tb_root_group . "_order desc";
                  $result = $dbConnect->execute($sql);
                  foreach ($result as $key => $value) {
                      ?>
                  <option value="<?php   echo $value[0] ?>" <?php   if ($_REQUEST['inputGh'] == $value[0]) { ?> selected="selected" <?php    } ?>><?php   echo $value[3] ?></option>
                <?php   } ?>
              </select></td>
            
              <td   id="boxSelectTest"  class="textSearch2">
  <input name="inputSearch" type="text"  id="inputSearch" value="<?php   echo trim($_REQUEST['inputSearch'])?>" class="formInputSearchStyle"  placeholder="<?php   echo $langTxt["sch:search"]?>" /></td>
          <td class="bottonSearch" align="right"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>
    </tr>
          </tr>
					</table>

					</div>
                                        <div class="divRightHead" >
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php   echo $valNav2?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                    <?php   if($valPermission=="RW"){?>
                                                        <div  class="btnAdd" title="<?php   echo $langTxt["btn:add"]?>" onclick="document.myFormHome.inputLt.value='Thai';  addContactNew('addContant.php');"></div>
                                                        <div  class="btnDel" title="<?php   echo $langTxt["btn:del"]?>"   onclick="
if(Paging_CountChecked('CheckBoxID',document.myForm.TotalCheckBoxID.value)>0) {
	if(confirm('<?php   echo $langTxt['mg:delpermis']?>')) {
          delContactNew('deleteContant.php');
	}
} else {
		alert('<?php   echo $langTxt['mg:selpermis'] ?>');
}
				  "></div>
           <?php   if($_REQUEST['inputGh']>0){?>
                                                    <div  class="btnSort" title="<?php   echo $langTxt["btn:sortting"]?>" onclick="sortContactNew('sortContant.php');"></div>
                                                        <?php   }  } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >


<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center"   class="tbBoxListwBorder">
   <tr ><td width="3%"  class="divRightTitleTbL"  valign="middle" align="center" >
        <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onClick="Paging_CheckAll(this,'CheckBoxID',document.myForm.TotalCheckBoxID.value)"   class="formCheckboxHead" />    </td>

     <td align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?php   echo $langMod["tit:subject"]?><?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?php   echo $langTxt["lg:thai"]?>)<?php   } ?></span></td>


            <?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>
     <td width="22%" align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?php   echo $langMod["tit:subject"]?><?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>(<?php   echo $langTxt["lg:eng"]?>)<?php   } ?></span></td>
     <?php   } ?>
          <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php   echo $langMod["tit:view"]?></span></td>

    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php   echo $langTxt["mg:status"]?></span></td>
    <!-- <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php   echo $langTxt["mg:ribbon"]?></span></td> -->
    <!-- <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php   echo $langMod["txt:upcoming"]?></span></td> -->
    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php   echo $langTxt["us:lastdate"]?></span></td>
    <td width="12%"  class="divRightTitleTbR"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php   echo $langTxt["mg:manage"]?></span></td>
  </tr>
  <?php  
// SQL SELECT #########################
$sql = "SELECT ".$mod_tb_root."_id,".$mod_tb_root."_subject,".$mod_tb_root."_lastdate,".$mod_tb_root."_status,".$mod_tb_root."_subject,".$mod_tb_root."_pic,".$mod_tb_root."_view,".$mod_tb_root."_view ,".$mod_tb_root."_view   ,".$mod_tb_root."_gid   FROM ".$mod_tb_root;
$sql = $sql."  WHERE ".$mod_tb_root."_masterkey ='".$_REQUEST['masterkey']."'   ";

 if($_REQUEST['inputGh']>=1) {
 $sql = $sql."  AND ".$mod_tb_root."_gid ='".$_REQUEST['inputGh']."'   ";
 }

if($_REQUEST['inputTh']>=1) {
$sql = $sql."  AND ".$mod_tb_root."_tid ='".$_REQUEST['inputTh']."'   ";
}


if($inputSearch<>"") {
		$sql = $sql."  AND  (
		".$mod_tb_root."_subject LIKE '%$inputSearch%'  OR
		".$mod_tb_root."_title LIKE '%$inputSearch%'   ) ";
}


$query=wewebQueryDB($coreLanguageSQL,$sql);
$count_totalrecord=wewebNumRowsDB($coreLanguageSQL,$query);

// Find max page size #########################
if($count_totalrecord>$module_pagesize) {
	$numberofpage= ceil($count_totalrecord/$module_pagesize);
} else {
	$numberofpage=1;
}

// Recover page show into range #########################
if($module_pageshow>$numberofpage) { $module_pageshow=$numberofpage; }

// Select only paging range #########################
$recordstart = ($module_pageshow-1)*$module_pagesize;

  $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
//print_pre($sql);
$query=wewebQueryDB($coreLanguageSQL,$sql);
$count_record=wewebNumRowsDB($coreLanguageSQL,$query);
$index=1;
$valDivTr="divSubOverTb";
if($count_record>0) {
	while($index<$count_record+1) {
		$row=wewebFetchArrayDB($coreLanguageSQL,$query);
		$valID=$row[0];
		$valName=rechangeQuot($row[1]);
	 	$valDateCredate = dateFormatReal($row[2]);
	 	$valTimeCredate = timeFormatReal($row[2]);
		$valStatus=$row[3];
		$valNameEn=rechangeQuot($row[4]);
		$valNameEn=chechNullVal($valNameEn);
	 	$valPic=$mod_path_office."/".$row[5];
		if(is_file($valPic)){
			$valPic=$valPic;
		}else{
			$valPic="../img/btn/nopic.jpg";
		}

		$valView=number_format($row[6]);

		if($valStatus=="Enable"){
			$valStatusClass=	"fontContantTbEnable";
		}else if($valStatus=="Home"){
			$valStatusClass=	"fontContantTbHomeSt";
		}else{
			$valStatusClass=	"fontContantTbDisable";
		}

		if($valDivTr=="divSubOverTb"){
			$valDivTr=	"divOverTb";
			$valImgCycle="boxprofile_l.png";
		}else{
			$valDivTr="divSubOverTb";
			$valImgCycle="boxprofile_w.png";
		}


    $valRibbon=$row[7];
    $valPin=$row[8];
	$valGidDb = rechangeQuot($row[9]);

    if($valPin=="Pin"){
      $valPinClass=  "fontContantTbEnable";
    }else{
      $valPinClass=  "fontContantTbDisable";
    }
  ?>
  <tr class="<?php   echo $valDivTr?>" >
     <td  class="divRightContantOverTbL"  valign="top" align="center" ><input  id="CheckBoxID<?php   echo $index?>" name="CheckBoxID<?php   echo $index?>" type="checkbox" class="formCheckboxList" onClick="Paging_CheckAllHandle(document.myForm.CheckBoxAll,'CheckBoxID',document.myForm.TotalCheckBoxID.value)" value="<?php   echo $valID?>" />    </td>
     <td  class="divRightContantOverTb"   valign="top" align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
         <td width="39" align="left" valign="top" style="display:show;">

    <div style="width:29px; height:29px;  background:url(<?php   echo $valPic?>) center no-repeat; background-size: cover;background-repeat: no-repeat; border-radius: 50%;  "></div>    </td> 
    <td align="left" ><!--style="padding-left:10px; "-->
    <div class="widthDiv">    
    <a  href="javascript:void(0)"  onclick="
    document.myFormHome.inputLt.value='Thai';
    document.myFormHome.valEditID.value=<?php   echo $valID?>;
    viewContactNew('viewContant.php');" ><?php   echo $valName?></a>
    
    </div>
    
  </td>
  </tr>
</table></td>

          <?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2){?>
     <td  class="divRightContantOverTb"   valign="top" align="left" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" ><a  href="javascript:void(0)"  onclick="
    document.myFormHome.inputLt.value='Eng';
   document.myFormHome.valEditID.value=<?php   echo $valID?>;
    viewContactNew('viewContant.php');" ><?php   echo $valNameEn?></a></td>
  </tr>
</table>    </td>
<?php   } ?>
          <td  class="divRightContantOverTb"  valign="top"  align="center"><span class="fontContantTbupdate"><?php   echo $valView?></span></td>

    <td  class="divRightContantOverTb"  valign="top"  align="center">
       <?php   if($valPermission=="RW" ){?>
     <div   id="load_status<?php   echo $valID?>">
    <?php   if($valStatus=="Enable"){?>

<a href="javascript:void(0)"  onclick="changeStatus('load_waiting<?php   echo $valID?>','<?php   echo $mod_tb_root?>','<?php   echo $valStatus?>','<?php   echo $valID?>','load_status<?php   echo $valID?>','../<?php   echo $mod_fd_root?>/statusMgH.php')" ><span class="<?php   echo $valStatusClass?>"><?php   echo $valStatus?></span></a>
<?php   }else if($valStatus=="Home"){?>

<a href="javascript:void(0)"  onclick="changeStatus('load_waiting<?php   echo $valID?>','<?php   echo $mod_tb_root?>','<?php   echo $valStatus?>','<?php   echo $valID?>','load_status<?php   echo $valID?>','../<?php   echo $mod_fd_root?>/statusMgH.php')" ><span class="<?php   echo $valStatusClass?>"><?php   echo $valStatus?></span></a>
                <?php   }else{?>

				<a href="javascript:void(0)"  onclick="changeStatus('load_waiting<?php   echo $valID?>','<?php   echo $mod_tb_root?>','<?php   echo $valStatus?>','<?php   echo $valID?>','load_status<?php   echo $valID?>','../<?php   echo $mod_fd_root?>/statusMgH.php')"> <span class="<?php   echo $valStatusClass?>"><?php   echo $valStatus?></span> </a>

                <?php   } ?>

                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="load_waiting<?php   echo $valID?>" />     </div>
           <?php   }else{?>
              <?php   if($valStatus=="Enable"){?>
                  <span class="<?php   echo $valStatusClass?>"><?php   echo $valStatus?></span>
              <?php   }else if($valStatus=="Home"){?>
                  <span class="<?php   echo $valStatusClass?>"><?php   echo $valStatus?></span>
              <?php   }else{?>
                  <span class="<?php   echo $valStatusClass?>"><?php   echo $valStatus?></span>
                <?php   } ?>

           <?php   } ?></td>

  <!--   <td  class="divRightContantOverTb"  valign="top"  align="center">
    <select name="inputRibbon<?php   echo $valID?>" id="inputRibbon<?php   echo $valID?>" onchange="changeRibbon('<?php   echo $mod_tb_root?>','<?php   echo $valRibbon?>','<?php   echo $valID?>','../<?php   echo $mod_fd_root?>/statusMgR.php')">
        <option value="" <?php   if (empty($valRibbon)) { echo "selected"; } ?>>-</option>
        <option value="New" <?php   if ($valRibbon == "New") { echo "selected"; } ?>>New</option>
        <option value="Hot" <?php   if ($valRibbon == "Hot") { echo "selected"; } ?>>Hot</option>

    </select>
    </td> -->


     <!-- <td  class="divRightContantOverTb"  valign="top"  align="center">
       <?php   if($valPermission=="RW" ){?>
     <div   id="load_pin<?php   echo $valID?>" class="btnstatus" data-id="<?php   echo  $valID ?>">
    <?php   if($valPin=="Pin"){?>

<a href="javascript:void(0)"  onclick="changeStatus('load_waitingPin<?php   echo $valID?>','<?php   echo $mod_tb_root?>','<?php   echo $valPin?>','<?php   echo $valID?>','load_pin<?php   echo $valID?>','../<?php   echo $mod_fd_root?>/statusMgP.php')" ><span class="<?php   echo $valPinClass?>"><?php   echo $valPin?></span></a>
    <?php   }else{?>

        <a href="javascript:void(0)"  onclick="changeStatus('load_waitingPin<?php   echo $valID?>','<?php   echo $mod_tb_root?>','<?php   echo $valPin?>','<?php   echo $valID?>','load_pin<?php   echo $valID?>','../<?php   echo $mod_fd_root?>/statusMgP.php')"> <span class="<?php   echo $valPinClass?>"><?php   echo $valPin?></span> </a>

                <?php   } ?>

                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="load_waitingPin<?php   echo $valID?>" />     </div>
           <?php   }else{?>
               <?php   if($valPin=="Pin"){?>
                   <span class="<?php   echo $valPinClass?>"><?php   echo $valPin?></span>
               <?php   }else{?>
                    <span class="<?php   echo $valPinClass?>"><?php   echo $valPin?></span>
                <?php   } ?>

           <?php   } ?>    </td> -->
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <span class="fontContantTbupdate"><?php   echo $valDateCredate?></span><br/>
    <span class="fontContantTbTime"><?php   echo $valTimeCredate?></span>    </td>
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
    <?php   if($valPermission=="RW"){?>
    <table  border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td valign="top" align="center" width="30">

    <div class="divRightManage"  title="<?php   echo $langTxt["btn:top"]?>" onclick="
   document.myFormHome.inputLt.value='Thai';
   document.myFormHome.valEditID.value=<?php   echo $valID?>;
    editContactNew('topUpdateContant.php');" >
    <img src="../img/btn/topbtn.png"  /><br/>
    <span class="fontContantTbManage"><?php   echo $langTxt["btn:top"]?><?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?><br />
(All)<?php   } ?></span></div>  </td> 
<td valign="top" align="center" width="30">
    <div class="divRightManage" title="<?php   echo $langTxt["btn:edit"]?>" onclick="
   document.myFormHome.inputLt.value='Thai';
   document.myFormHome.valEditID.value=<?php   echo $valID?>;
    editContactNew('editContant.php');">
    <img src="../img/btn/edit.png"  /><br/>
    <span class="fontContantTbManage"><?php   echo $langTxt["btn:edit"]?><?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?><br />
(<?php   echo $langTxt["lg:thai"]?>)<?php   } ?></span>    </div>    </td>
<?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>
    <td valign="top" align="center" width="30">
    <div class="divRightManage" title="<?php   echo $langTxt["btn:edit"]?>" onclick="
   document.myFormHome.inputLt.value='Eng';
   document.myFormHome.valEditID.value=<?php   echo $valID?>;
    editContactNew('editContant.php');">
    <img src="../img/btn/edit.png"  /><br/>
    <span class="fontContantTbManage"><?php   echo $langTxt["btn:edit"]?><br />
(<?php   echo $langTxt["lg:eng"]?>)</span>    </div>    </td>
<?php   } ?>
<?php   if($_SESSION[$valSiteManage.'core_session_languageT']==3){?>
    <td valign="top" align="center" width="30">
    <div class="divRightManage" title="<?php   echo $langTxt["btn:edit"]?>" onclick="
   document.myFormHome.inputLt.value='Chi';
   document.myFormHome.valEditID.value=<?php   echo $valID?>;
    editContactNew('editContant.php');">
    <img src="../img/btn/edit.png"  /><br/>
    <span class="fontContantTbManage"><?php   echo $langTxt["btn:edit"]?><br />
(<?php   echo $langTxt["lg:chi"]?>)</span>    </div>    </td>
<?php   } ?>
    <td valign="top" align="center" width="30">
    <div class="divRightManage" title="<?php   echo $langTxt["btn:del"]?>"  onClick="
            if(confirm('<?php   echo $langTxt['mg:delpermis']?>')) {
            Paging_CheckedThisItem( document.myForm.CheckBoxAll, <?php   echo $index?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value );
          delContactNew('deleteContant.php');
            }
            ">
     <img src="../img/btn/delete.png"  /><br/>
    <span class="fontContantTbManage"><?php   echo $langTxt["btn:del"]?><?php   if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?><br />
(All)<?php   } ?></span>    </div>    </td>
  </tr>
</table>
<?php   } ?>   </td>
  </tr>

<?php  
$index++;
}
	}else{?>
 <tr >
    <td colspan="7" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php   echo $langTxt["mg:nodate"]?></td>
    </tr>
<?php   } ?>

<tr >
    <td colspan="8" align="center"  valign="middle"  class="divRightContantTbRL" ><table width="98%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?php   echo $langTxt["pr:All"]?> <b><?php   echo number_format($count_totalrecord)?></b> <?php   echo $langTxt["pr:record"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
<td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?php   echo $langTxt["pr:page"]?>
<?php   if($numberofpage>1) { ?>
<select name="toolbarPageShow"  class="formSelectContantPage" onChange="document.myForm.module_pageshow.value=this.value; document.myForm.submit(); ">
<?php  
if($numberofpage<$module_default_maxpage) {
	// Show page list #########################
	for($i=1;$i<=$numberofpage;$i++) {
		echo "<option value=\"$i\"";
		if($i==$module_pageshow) { echo " selected"; }
		echo ">$i</option>";
	}

}else {
	// # If total page count greater than default max page  value then reduce page select size #########################
	$starti = $module_pageshow-$module_default_reduce;
	if($starti<1) { $starti=1; }
	$endi = $module_pageshow+$module_default_reduce;
	if($endi>$numberofpage) { $endi=$numberofpage; }
	//#####################
	for($i=$starti ;$i<=$endi;$i++) {
		echo "<option value=\"$i\"";
		if($i==$module_pageshow) { echo " selected"; }
		echo ">$i</option>";
	}
}
?>
</select>
<?php   } else { ?>
 <b><?php   echo $module_pageshow?></b>
 <?php   } ?>
  <?php   echo $langTxt["pr:of"]?> <b><?php   echo $numberofpage?></b></span></td>
		<?php   if($module_pageshow>1) { ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21"
		onmouseover="this.src='../img/controlpage/playset_start_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_start.gif';"
		onclick="document.myForm.module_pageshow.value=1; document.myForm.submit();"  style="cursor:pointer;" /></td>
		<?php   } else { ?>
		<td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
		<?php   } ?>
		<?php   if($module_pageshow>1) {
		$valPrePage=$module_pageshow-1;
		 ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21"  style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_backward_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_backward.gif';"
		onclick="document.myForm.module_pageshow.value='<?php   echo $valPrePage?>'; document.myForm.submit();" /></td>
		<?php   } else { ?>
		<td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
		<?php   } ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21"   style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_stop_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_stop.gif';"
		onclick="
		with(document.myForm) {
		module_pageshow.value='';
		module_pagesize.value='';
		module_orderby.value='';
        document.myForm.submit();
		}
		" /></td>
		<?php   if($module_pageshow<$numberofpage) {
		$valNextPage=$module_pageshow+1;
		 ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21"   style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_forward_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_forward.gif';"
		onclick="document.myForm.module_pageshow.value='<?php   echo $valNextPage?>'; document.myForm.submit();" /></td>
		<?php   } else { ?>
		<td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
		<?php   } ?>
		<?php   if($module_pageshow<$numberofpage) { ?>
		<td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21"   style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_end_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_end.gif';"
		onclick="document.myForm.module_pageshow.value='<?php   echo $numberofpage?>'; document.myForm.submit();" /></td>
		<?php   } else { ?>
		<td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
		<?php   } ?>
		</tr>
		</table>                        </td>
                        </tr>
                        </table></td>
    </tr>
</table>
<input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php   echo $index-1?>" />
<div class="divRightContantEnd"></div>
                             </div>

</form>
<?php   include("../lib/disconnect.php");?>

 </body>
</html>
