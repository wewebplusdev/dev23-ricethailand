<?php  
$check_login_status = 1;
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

//$username=trim($_POST['Valueusername']);
$email = trim($_POST['inputemail']);
$emailOld = trim($_POST['valEmailOld']);
if ($email != $emailOld) {
    $sql = "SELECT " . $core_tb_staff . "_id   FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_email='" . $email . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $number_member = wewebNumRowsDB($coreLanguageSQL, $Query);
    // print_pre($sql);

    if ($number_member >= 1) {
        ?>
        <script language="JavaScript" type="text/javascript">
            jQuery("#inputemail").addClass("formInputContantTbAlertY");
            document.myForm.inputemail.value = ''
            document.myForm.inputemail.focus();
            $('#email_tmp').show();
        </script>
    <?php   } else { ?>
        <script language="JavaScript" type="text/javascript">
            jQuery("#inputemail").removeClass("formInputContantTbAlertY");
            $('#email_tmp').hide();
        </script>
    <?php   } ?>
<?php   } else { ?>
    <script language="JavaScript" type="text/javascript">
        jQuery("#inputemail").removeClass("formInputContantTbAlertY");
        $('#email_tmp').hide();
    </script>
<?php   } ?>



