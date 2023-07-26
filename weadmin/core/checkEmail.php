<?php  
$check_login_status = 1;
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

//$username=trim($_POST['Valueusername']);
$email = trim($_POST['inputEmail']);
$usernameOld = trim($_POST['valUserOld']);
if ($email != $usernameOld) {
    $sql = "SELECT " . $core_tb_staff . "_id   FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_email='" . $email . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $number_member = wewebNumRowsDB($coreLanguageSQL, $Query);
    // print_pre($sql);

    if ($number_member >= 1) {
        ?>
        <script language="JavaScript" type="text/javascript">
            jQuery("#inputEmail").addClass("formInputContantTbAlertY");
            document.myForm.inputEmail.value = ''
            document.myForm.inputEmail.focus();
            $('#noteEmail').show();
        </script>
    <?php   } else { ?>
        <script language="JavaScript" type="text/javascript">
            jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
            $('#noteEmail').hide();
        </script>
    <?php   } ?>
<?php   } else { ?>
    <script language="JavaScript" type="text/javascript">
        jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
        $('#noteEmail').hide();
    </script>
<?php   } ?>



