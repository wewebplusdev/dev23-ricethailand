<?php  
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

logs_access('3', 'Export');
require_once('../lib/mpdf/mpdf.php');

ob_start();
?>
<html>
    <HEAD>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </HEAD>
    <BODY>
        <table border="1" cellspacing="1" cellpadding="2"  align="center">
            <tbody>
                <tr >
                    <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:no"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:fname"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:lname"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:address"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:tel"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:email"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langTxt["us:credate"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:lastdate"] ?></td> 
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langMod["tit:login"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?php  echo  $langTxt["mg:status"] ?></td>
                </tr>

                <?php 
$sql=str_replace('\\','',$_POST['sql_export']);
$query=wewebQueryDB($coreLanguageSQL,$sql) ;
$count_record=wewebNumRowsDB($coreLanguageSQL, $query);
$date_print=DateFormat(date("Y-m-d"));

              if($count_record>=1){
              $index=1;
            while($row_member=wewebFetchArrayDB($coreLanguageSQL, $query)) {
            $txtValueContactID=rechangeQuot($row_member[0]);
            $txtValueSubject=rechangeQuot($row_member[1]);
            $txtValueMessage=rechangeQuot($row_member[2]);
            $txtValueCredate=rechangeQuot($row_member[3]);
            $txtValueName=rechangeQuot($row_member[4]);
            $txtValueStatus=rechangeQuot($row_member[5]);
            $txtValueGid=rechangeQuot($row_member[6]);
                $sql_group = "SELECT ".$mod_tb_root_group."_subject  FROM ".$mod_tb_root_group." WHERE    ".$mod_tb_root_group."_id='".$txtValueGid."' ";
                $query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
                $row_group=wewebFetchArrayDB($coreLanguageSQL, $query_group);
                $txtValueGroupName=rechangeQuot($row_group[0]);

            
            $txtValueAddress=rechangeQuot($row_member[7]);
            $txtValueEmail=rechangeQuot($row_member[8]);
            $txtValueTel=rechangeQuot($row_member[9]);
            $txtValueCode=rechangeQuot($row_member[10]);
            ?>

                        <tr bgcolor="#ffffff">
                            <td height="30" align="center"  valign="middle"><?php  echo  $index ?></td>
                            <td align="left"  valign="middle"><?php  echo  $valfname ?></td>
                            <td align="left"  valign="middle"><?php  echo  $vallname ?></td>
                            <td align="left"  valign="middle"><?php  echo  $valAddress ?></td>
                            <td align="left"  valign="middle"><?php  echo  $valTel ?></td>
                            <td align="left" valign="middle"><?php  echo  $valemail ?></td>
                            <td align="left"  valign="middle"><?php  echo  $valCredate ?></td>
                            <td align="left"  valign="middle"><?php  echo  $valLastdate ?></td>
                            <td align="left" valign="middle"><?php  echo  $valLogindate ?></td> 
                            <td align="left" valign="middle"><?php  echo  $valStatus ?></td>
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
                    <td width="175" align="right" valign="middle">Print date : </td>
                    <td  width="175" align="left" valign="middle"><?php  echo  $date_print ?></td>
                </tr>
            </tbody>
        </table>
    </BODY>
</HTML>

<?php  
$html = ob_get_contents();
ob_end_clean();
//
//print_pre($html);
//
//header("Content-disposition: attachment; filename=filename.pdf");
//header("Content-type: application/pdf");
//
$pdf = new mPDF('th', 'A4-L', '0', 'THSaraban'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("report_member_". date('Y-m-d')." .pdf", "D");
?>