<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	if(file_exists($mod_path_pictures."/".$_REQUEST['picnameQrcode'])) {
		@unlink($mod_path_pictures."/".$_REQUEST['picnameQrcode']);
	}	
		
	if(file_exists($mod_path_office."/".$_REQUEST['picnameQrcode'])) {
		@unlink($mod_path_office."/".$_REQUEST['picnameQrcode']);
	}	

	if(file_exists($mod_path_real."/".$_REQUEST['picnameQrcode'])) {
		@unlink($mod_path_real."/".$_REQUEST['picnameQrcode']);
	}	

//echo $_REQUEST['picnameQrcode'];
		$update=array();
		$update[]=$mod_tb_root."_qr  	=''";
		$sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$_REQUEST["valEditID"]."'  ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);

			
include("../lib/disconnect.php");
?>