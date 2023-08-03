<?php  
@include("../lib/session.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report_Complaints_'.date('Y-m-d').'.xls"');#ชื่อไฟล์
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
      <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["export:no"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:permission"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:nameuser"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:agency"]?></td>

      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:antecedent"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:firstnamet"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:lastnamet"]?> </td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:firstnamete"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:lastnamee"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["set:position"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:email"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:address"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:tel"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:mobile"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langTxt["us:other"]?></td>
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
      while($row_member=wewebFetchArrayDB($coreLanguageSQL,$query)) {
      $txtValueContactID=rechangeQuot($row_member[0]);
      $txtValueGroupid=rechangeQuot($row_member[1]);
      $txtValueUsername=rechangeQuot($row_member[2]);
      $txtValueAgency=rechangeQuot($row_member[3]);
      $txtValuePrefix=rechangeQuot($row_member[4]);
      $txtValueGender=rechangeQuot($row_member[5]);
      $txtValueFanamethai=rechangeQuot($row_member[6]);
      $txtValueLanamethai=rechangeQuot($row_member[7]);
      $txtValueFanameeng=rechangeQuot($row_member[8]);
      $txtValueLanameeng=rechangeQuot($row_member[9]);
      $txtValuePosition=rechangeQuot($row_member[10]);
      $txtValueEmail=rechangeQuot($row_member[11]);
      $txtValAddress=rechangeQuot($row_member[12]);
      $txtValTele=rechangeQuot($row_member[13]);
      $txtValMobile=rechangeQuot($row_member[14]);
      $txtValOther=rechangeQuot($row_member[15]);
      $txtValCredate=rechangeQuot($row_member[16]);
      $txtValStatus=rechangeQuot($row_member[17]);

      if ($txtValuePrefix == "Mr.") {
        $txtValPrefix = $langTxt["us:mr"];
      } else if ($txtValuePrefix == "Miss") {
        $txtValPrefix = $langTxt["us:miss"];
      } else if ($txtValuePrefix == "Mrs.") {
        $txtValPrefix = $langTxt["us:mrs"];
      }

      $sql_group = "SELECT " . $core_tb_group . "_id," . $core_tb_group . "_name  FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_id='" . $txtValueGroupid . "'   ORDER BY " . $core_tb_group . "_order DESC ";
      $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
      $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
      $row_groupid = $row_group[0];
      $row_groupname = $row_group[1];
      $valGroupName = $row_groupname;

      $sql_groupAg = "SELECT " . $md_group_tb . "_id," . $md_group_tb . "_subject  FROM " . $md_group_tb . " WHERE " . $md_group_tb . "_id='" . $txtValueAgency . "'   ORDER BY " . $md_group_tb . "_order DESC ";
      $query_groupAg = wewebQueryDB($coreLanguageSQL, $sql_groupAg);
      $row_groupAg = wewebFetchArrayDB($coreLanguageSQL, $query_groupAg);
      $row_groupid = $row_groupAg[0];
      $row_groupname = $row_groupAg[1];
      if($row_groupname != ''){
        $valAgencyName = $row_groupname;
      }else{
        $valAgencyName = "-";
      }


      ?>
    
    <tr bgcolor="#ffffff">
      <td height="30" align="center"  valign="middle"><?php  echo $index?></td>
      <td align="left"  valign="middle"><?php  echo $valGroupName?></td>
      <td align="left"  valign="middle"><?php  echo $txtValueUsername?></td>
      <td align="left"  valign="middle"><?php  echo $valAgencyName?></td>
      <td align="left"  valign="middle"><?php  echo $txtValPrefix?></td>
      <td align="left" valign="middle"><?php  echo $txtValueFanamethai?></td>
      <td align="left" valign="middle"><?php  echo $txtValueLanamethai?></td>
      <td align="left" valign="middle"><?php  echo $txtValueFanameeng?></td>
      <td align="left" valign="middle"><?php  echo $txtValueLanameeng?></td>
      <td align="left" valign="middle"><?php  echo $txtValuePosition?></td>
      <td align="left" valign="middle"><?php  echo $txtValueEmail?></td>
      <td align="left" valign="middle"><?php  echo $txtValAddress?></td>
      <td align="left" valign="middle">'<?php  echo $txtValTele?></td>
      <td align="left" valign="middle">'<?php  echo $txtValMobile?></td>
      <td align="left" valign="middle"><?php  echo $txtValOther?></td>
      <td align="left" valign="middle"><?php  echo $txtValCredate?></td>
      <td align="left" valign="middle"><?php  echo $txtValStatus?></td>
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
