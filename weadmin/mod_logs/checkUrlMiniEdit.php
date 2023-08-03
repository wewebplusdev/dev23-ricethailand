<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

		$userid=trim($_POST['Valueuserid']);
		$username=trim($_POST['Valueusername']);
		
		$sql = "SELECT ".$mod_tb_root."_id   FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id='".$userid."'  AND ".$mod_tb_root."_urlminisite='".$username."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$number_member=wewebNumRowsDB($coreLanguageSQL,$Query);
		if($number_member<=0){

		$sql_member = "SELECT ".$mod_tb_root."_id   FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_urlminisite='".$username."'";
		$Query_member=wewebQueryDB($coreLanguageSQL,$sql_member);
		$number_memberNew=wewebNumRowsDB($coreLanguageSQL,$Query_member);
			if($number_memberNew>=1){
			
		$sql_name = "SELECT  ".$mod_tb_root."_urlminisite  FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id='".$userid."' ";
		$Query_name=wewebQueryDB($coreLanguageSQL,$sql_name);
		$Row_name=wewebFetchArrayDB($coreLanguageSQL,$Query_name);
           ?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").addClass("formInputContantTbAlertY"); 
			document.myForm.inputUrlMinisite.value='<?php  echo $Row_name[0]?>'
			document.myForm.inputUrlMinisite.focus();
        </script>
			<?php  }else{
			$sql_name = "SELECT  ".$mod_tb_root."_urlminisite  FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id='".$userid."' ";
		$Query_name=wewebQueryDB($coreLanguageSQL,$sql_name);
		$Row_name=wewebFetchArrayDB($coreLanguageSQL,$Query_name);
		
		if( $username=='assets' || $username=='ckeditor' || $username=='css' || $username=='fileman' || $username=='html' || $username=='images' || $username=='inc'|| $username=='js'|| $username=='logs'|| $username=='upload'|| $username=='weadmin'){
		?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").addClass("formInputContantTbAlertY"); 
			document.myForm.inputUrlMinisite.value='<?php  echo $Row_name[0]?>'
			document.myForm.inputUrlMinisite.focus();
        </script>
       
        <?php  }else{ ?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").removeClass("formInputContantTbAlertY"); 
        </script>
		<?php  } }
		
}else{
?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUrlMinisite").removeClass("formInputContantTbAlertY"); 
        </script>
<?php  } ?>
  
    

    
    
	