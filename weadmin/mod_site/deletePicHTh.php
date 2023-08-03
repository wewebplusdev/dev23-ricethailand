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

		$update=array();
		$update[]=$mod_tb_root."_hotline  	=''";
		$sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$_REQUEST["valEditID"]."'  ";
		$Query=wewebQueryDB($coreLanguageSQL, $sql);


include("../lib/disconnect.php");
?>
