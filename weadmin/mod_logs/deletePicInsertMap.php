<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	if(file_exists($mod_path_pictures."/".$_REQUEST['picnameMap'])) {
		@unlink($mod_path_pictures."/".$_REQUEST['picnameMap']);
	}	
		
	if(file_exists($mod_path_office."/".$_REQUEST['picnameMap'])) {
		@unlink($mod_path_office."/".$_REQUEST['picnameMap']);
	}	

	if(file_exists($mod_path_real."/".$_REQUEST['picnameMap'])) {
		@unlink($mod_path_real."/".$_REQUEST['picnameMap']);
	}	
			
include("../lib/disconnect.php");
?>