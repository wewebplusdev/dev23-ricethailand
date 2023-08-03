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
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["txt:Subject"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["view:contanttitle"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["view:contantname"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["view:contantaddress"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $langMod["tit:email1"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["view:contanttel"]?> </td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["txt:credate"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo $txt_mod["txt:status"]?></td>
      
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
      $txtValueSubject=rechangeQuot($row_member[1]);
      $txtValueMessage=rechangeQuot($row_member[2]);
      $txtValueCredate=rechangeQuot($row_member[3]);
      $txtValueName=rechangeQuot($row_member[4]);
      $txtValueStatus=rechangeQuot($row_member[5]);
      $txtValueGid=rechangeQuot($row_member[6]);

      
      $ValAddress=rechangeQuot($row_member[7]);
      $ValEmail=rechangeQuot($row_member[8]);
      $ValTel=rechangeQuot($row_member[9]);
      $ValCode=rechangeQuot($row_member[10]);

      ?>
    
    <tr bgcolor="#ffffff">
      <td height="30" align="center"  valign="middle"><?php  echo $index?></td>
      <td align="left"  valign="middle"><?php  echo $txtValueSubject?></td>
      <td align="left"  valign="middle"><?php  echo $txtValueMessage?></td>
      <td align="left"  valign="middle"><?php  echo $txtValueName?></td>
      
      <td align="left" valign="middle"><?php  echo $ValAddress?></td>
      <td align="left" valign="middle"><?php  echo $ValEmail?></td>
      <td align="left" valign="middle">'<?php  echo $ValTel?></td>
      <td align="left" valign="middle">'<?php  echo $txtValueCredate?></td>
      <td align="left" valign="middle"><?php  echo $txtValueStatus?></td>
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
