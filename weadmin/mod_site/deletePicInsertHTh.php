<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");


	if(file_exists($mod_path_pictures."/".$_REQUEST['picHTh'])) {
		@unlink($mod_path_pictures."/".$_REQUEST['picHTh']);
	}

	if(file_exists($mod_path_office."/".$_REQUEST['picHTh'])) {
		@unlink($mod_path_office."/".$_REQUEST['picHTh']);
	}

	if(file_exists($mod_path_real."/".$_REQUEST['picHTh'])) {
		@unlink($mod_path_real."/".$_REQUEST['picHTh']);
	}

include("../lib/disconnect.php");
?>
