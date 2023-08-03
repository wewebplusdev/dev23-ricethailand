<?php  
@include("../lib/session.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report_KM_'.date('Y-m-d').'.xls"');#ชื่อไฟล์
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php"); 

logs_access('3','Export');

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">


<HEAD>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
.bold {font-weight:bold;
}
-->
</style>
</HEAD>
<BODY>
<table border="1" cellspacing="1" cellpadding="2"  align="center">
  <tbody>
    <tr >
      <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langMod["export:no"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:selectag"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langMod["tit:year"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langMod["tit:selectgn"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["dev0821:kmaction"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["dev0821:per"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:subject"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:title"] ?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:credate"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["mg:status"]?></td>
    </tr>
    
    <?php 
$sql=str_replace('\\','',$_POST['sql_export']);
// print_pre($_POST['sql_export']);
$query=wewebQueryDB($coreLanguageSQL,$sql) ;
$count_record=wewebNumRowsDB($coreLanguageSQL,$query);
$date_print=date("Y-m-d H:i:s");

        if($count_record>=1){
        $index=1;
      while($Row=wewebFetchArrayDB($coreLanguageSQL,$query)) {
	  
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
			
			
	$sql_agen = "SELECT ";
    $sql_agen .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";
    $sql_agen .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_status ='Enable' AND " . $mod_tb_root_group . "_masterkey ='" . $masterkeyAgen . "'  AND " . $mod_tb_root_group . "_id ='" . $valAgenid . "'   ORDER BY " . $mod_tb_root_group . "_order DESC ";
    $query_agen = wewebQueryDB($coreLanguageSQL, $sql_agen);
    $row_agen = wewebFetchArrayDB($coreLanguageSQL, $query_agen);
    $row_agenid = $row_agen[0];
    $row_agenname = $row_agen[1];
	
		$sql_year = "SELECT ";
		$sql_year .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
		
		$sql_year .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey='".$masterkeyYear."' AND ".$mod_tb_root_group."_id = '".$valyeaid."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
		//  print_pre($sql_year);
		$query_year=wewebQueryDB($coreLanguageSQL, $sql_year);
		$row_year = wewebFetchArrayDB($coreLanguageSQL,$query_year);
		$val_yearsubject = $row_year[1];
		
		$sql_mem = "SELECT ";
		$sql_mem .= "  ".$mod_tb_root_group."_id,
		".$mod_tb_root_group."_subject,
		".$mod_tb_root_group."_typeplan as _typeplan
		";
		$sql_mem .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey='".$_REQUEST['masterkey']."' AND ".$mod_tb_root_group."_id = '".$valGid."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
		//  print_pre($sql_mem);
		$query_mem=wewebQueryDB($coreLanguageSQL, $sql_mem);
		$row_mem = wewebFetchArrayDB($coreLanguageSQL,$query_mem);
		$val_mem = $row_mem[1];
		$value_typeplan = $row_mem['_typeplan'];
		
    $sql_dwn = "SELECT ";
    $sql_dwn .= "  ".$mod_tb_dowload."_id,".$mod_tb_dowload."_subject";
    $sql_dwn .= "  FROM ".$mod_tb_dowload." WHERE  ".$mod_tb_dowload."_id='".$valdwn."'  ORDER BY ".$mod_tb_dowload."_order DESC ";
    $query_dwn=wewebQueryDB($coreLanguageSQL, $sql_dwn);
    $row_dwn=wewebFetchArrayDB($coreLanguageSQL,$query_dwn);
    $row_dwnid=$row_dwn[0];
    $row_dwnname=$row_dwn[1];
    
      ?>
    
    <tr bgcolor="#ffffff">
      <td height="30" align="center"  valign="middle"><?php  echo $index?></td>
      <td align="left"  valign="middle"><?php  echo $row_agenname?></td>
      <td align="left"  valign="middle"><?php  echo $val_yearsubject?></td>
      <td align="left"  valign="middle"><?php  echo $val_mem?></td>
      
      <td align="left" valign="middle"><?php  echo $row_dwnname?></td>
      <td align="left" valign="middle"><?php  echo $val_per?></td>
      <td align="left" valign="middle"><?php  echo $valSubject?></td>
      <td align="left" valign="middle"><?php  echo $valTitle?></td>
      <td align="left" valign="middle">'<?php  echo $valCredate?></td>
      <td align="left" valign="middle"><?php  echo $valStatus?></td>
    </tr>
    <?php  
                $index++;
                  }
                  ?>
    

    <?php  } ?>
    </tbody>
    </table>
<table border="0" cellspacing="1" cellpadding="2"  align="left">
  <tbody>
        <tr >
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="center" bgcolor="#ffffff" class="bold" valign="middle"></td>
      <td width="175" align="right" valign="middle" class="bold">Print date : </td>
      <td  width="175" align="left" valign="middle"><?php  echo $date_print?></td>
    </tr>
  </tbody>
</table>
</BODY>

</HTML>
