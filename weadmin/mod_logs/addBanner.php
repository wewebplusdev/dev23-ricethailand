<?php 	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

		/* ################### Start Minisite ####################*/
		$sqlMiniID = "SELECT ".$mod_tb_root."_id  FROM ".$mod_tb_root;
		$sqlMiniID = $sqlMiniID."  WHERE ".$mod_tb_root."_masterkey ='mit' ORDER BY ".$mod_tb_root."_id DESC  ";
		$queryMiniID=wewebQueryDB($coreLanguageSQL,$sqlMiniID);
		while($rowMiniID=wewebFetchArrayDB($coreLanguageSQL,$queryMiniID)) {
			$permissionArray = array();
			$contantID =$rowMiniID[0];
			/* ################### Start Insert Menu Group Unit ####################*/
			
			
			
			$sqlParentID = "SELECT ".$core_tb_menu."_parentid, ".$core_tb_menu."_id FROM ".$core_tb_menu;
			$sqlParentID = $sqlParentID."  WHERE   ".$core_tb_menu."_siteid ='".$contantID."' ORDER BY ".$core_tb_menu."_id ASC LIMIT 0,1  ";
			$queryParentID=wewebQueryDB($coreLanguageSQL,$sqlParentID);
			while($rowParentID=wewebFetchArrayDB($coreLanguageSQL,$queryParentID)) {
				$valMenuParentID =$rowParentID[0];
				$valMenuID =$rowParentID[1];
				array_push($permissionArray, $valMenuParentID);
				
				/* ################### Start Insert Menu Banner ####################*/
					$insert = array();
					$valMenuMasterkey=$contantID."bn";
					$valMenuNameThai ="ลิงค์ที่เกี่ยวข้อง";
					$valMenuNameEng ="Web Link";
					$valMenuModuleName ="Module";
					$valMenuMyParentID=$valMenuParentID;
					$valMenuLinkType ="1";
					$valMenuLinkpath ="../mod_banner/index.php";
					$valMenuTarget ="_parent";
					$valMenuIconName ="../img/iconmenu/1283582712_094.png";
			
					
					$sql = "SELECT MAX(".$core_tb_menu."_order) FROM ".$core_tb_menu;
					$Query=wewebQueryDB($coreLanguageSQL,$sql);
					$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
					$maxOrder = $Row[0]+1;
					
					$insert[$core_tb_menu."_namethai"] = "'".changeQuot($valMenuNameThai)."'";
					$insert[$core_tb_menu."_nameeng"] = "'".changeQuot($valMenuNameEng)."'";
					$insert[$core_tb_menu."_linkpath"] = "'".$valMenuLinkpath."'";
					$insert[$core_tb_menu."_icon"] = "'".changeQuot($valMenuIconName)."'";
					$insert[$core_tb_menu."_order"] = "'".$maxOrder."'";
					$insert[$core_tb_menu."_status"] = "'Enable'";
					$insert[$core_tb_menu."_masterkey"] = "'".changeQuot($valMenuMasterkey)."'";
					$insert[$core_tb_menu."_moduletype"] = "'".$valMenuModuleName."'";
					$insert[$core_tb_menu."_ismodule"] = "'".changeQuot($valMenuLinkType)."'";
					$insert[$core_tb_menu."_target"] = "'".changeQuot($valMenuTarget)."'";
					$insert[$core_tb_menu."_parentid"] = "'".$valMenuMyParentID."'";
					$insert[$core_tb_menu."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
					$insert[$core_tb_menu."_credate"] = "".wewebNow($coreLanguageSQL)."";
			
					$sql="INSERT INTO ".$core_tb_menu."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
					$Query=wewebQueryDB($coreLanguageSQL,$sql);		
					$valMenuSubID=wewebInsertID($coreLanguageSQL);
					array_push($permissionArray, $valMenuSubID);
					/* ################### Eng Insert Menu Banner ####################*/
				
					$sqlPermissionID = "SELECT ".$core_tb_permission."_perid  FROM ".$core_tb_permission;
				 	$sqlPermissionID = $sqlPermissionID."  WHERE ".$core_tb_permission."_menuid ='".$valMenuID."' AND ".$core_tb_permission."_perid !='1' ORDER BY ".$core_tb_permission."_menuid ASC LIMIT 0,1   ";
					$queryPermissionID=wewebQueryDB($coreLanguageSQL,$sqlPermissionID);
					$rowPermissionID=wewebFetchArrayDB($coreLanguageSQL,$queryPermissionID);
					$permissionID =$rowPermissionID[0];
					
					
					/* ################### Start Insert Permission Admin ####################*/
							for($i=0;$i<count($permissionArray);$i++){
									$valPermissionMenu=$permissionArray[$i];
									
									$insert = array();
									$insert[$core_tb_permission."_perid"] = "'1'";
									$insert[$core_tb_permission."_menuid"] = "'".$valPermissionMenu."'";
									$insert[$core_tb_permission."_permission"] = "'RW'";
									$sql="INSERT INTO ".$core_tb_permission."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
									$Query=wewebQueryDB($coreLanguageSQL,$sql);		
									
							}
						/* ################### End Insert Permission Admin ####################*/
							
						/* ################### Start Insert Permission Unit ####################*/
						
							for($i=0;$i<count($permissionArray);$i++){
									$valPermissionMenu=$permissionArray[$i];
									
									$insert = array();
									$insert[$core_tb_permission."_perid"] = "'".$permissionID."'";
									$insert[$core_tb_permission."_menuid"] = "'".$valPermissionMenu."'";
									$insert[$core_tb_permission."_permission"] = "'RW'";
									$sql="INSERT INTO ".$core_tb_permission."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
									$Query=wewebQueryDB($coreLanguageSQL,$sql);		
									
							}
						/* ################### End Insert Permission Unit ####################*/
				
								
			}
			
			
			
			/* ################### Eng Insert Menu Group Unit ####################*/
		
		}
		print_r($permissionArray);

		/* ################### End Minisite ####################*/
		
 ?>
<?php  include("../lib/disconnect.php");?>
