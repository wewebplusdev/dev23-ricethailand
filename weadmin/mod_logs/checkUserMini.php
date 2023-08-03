<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");		

		$username=trim($_POST['Valueusername']);
		
		$sql = "SELECT ".$core_tb_staff."_id   FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_username='".$username."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$number_member=wewebNumRowsDB($coreLanguageSQL,$Query);
		if($number_member>=1){
		?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUsername").addClass("formInputContantTbAlertY"); 
			document.myForm.inputUsername.value=''
			document.myForm.inputUsername.focus();
        </script>
        <?php  }else{?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUsername").removeClass("formInputContantTbAlertY"); 
        </script>
		<?php  } ?>

    
    
	