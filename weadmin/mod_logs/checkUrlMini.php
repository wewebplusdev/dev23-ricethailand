<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");		
include("config.php");
		$username=trim($_POST['Valueusername']);
		
		$sql = "SELECT ".$mod_tb_root."_id   FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_urlminisite='".$username."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$number_member=wewebNumRowsDB($coreLanguageSQL,$Query);
		if($number_member>=1){
		
		?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").addClass("formInputContantTbAlertY"); 
			document.myForm.inputUrlMinisite.value=''
			document.myForm.inputUrlMinisite.focus();
        </script>
       
        <?php  }else{
		
		
		if( $username=='assets' || $username=='ckeditor' || $username=='css' || $username=='fileman' || $username=='html' || $username=='images' || $username=='inc'|| $username=='js'|| $username=='logs'|| $username=='upload'|| $username=='weadmin'){
		?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").addClass("formInputContantTbAlertY"); 
			document.myForm.inputUrlMinisite.value=''
			document.myForm.inputUrlMinisite.focus();
        </script>
       
        <?php  }else{ ?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").removeClass("formInputContantTbAlertY"); 
        </script>
		<?php  } } ?>

    
    
	