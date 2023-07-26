<?php  
header('Content-Type: application/json; charset=utf-8');
$arrJson = array();

$check_login_status = 1;
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
if (!empty($_POST['g-recaptcha-response'])) {
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secert . '&response=' . $_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if ($responseData->success || true) {
		$inputUser = trim($_POST["inputUser"]);
		$inputPass = trim($_POST["inputPass"]);

		$inputUserMaster = changeQuot($inputUser);
		$inputPassMaster = encodeStr($inputPass);

		$sqlMaster = "SELECT " . $core_tb_staff . "_id FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_username='" . encodeStr($inputUserMaster) . "' AND " . $core_tb_staff . "_password='" . $inputPassMaster . "'  AND " . $core_tb_staff . "_status='Superadmin'    ";
		$queryMaster = wewebQueryDB($coreLanguageSQL, $sqlMaster);
		$recordMaster = wewebNumRowsDB($coreLanguageSQL, $queryMaster);

		if ($recordMaster >= 1) {
			$sql = "SELECT 
			" . $core_tb_setting . "_id as id,
			" . $core_tb_setting . "_subject as subject,
			" . $core_tb_setting . "_title as title,
			" . $core_tb_setting . "_titleB as titleB,
			" . $core_tb_setting . "_pic as pic
			FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_issite = 1  AND " . $core_tb_setting . "_status !='Disable' ";
			 //print_pre($sql);
			$Query = wewebQueryDB($coreLanguageSQL, $sql);
			$RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
			if ($RecordCount > 0) {
				$arrJson['status'] = true;
				// $arrJson['msg'] = 'success.';
				foreach ($Query as $keyMinisite => $valueMinisite) {
					$arrJson['item'][$keyMinisite]['id'] = $valueMinisite['id'];
					$arrJson['item'][$keyMinisite]['subject'] = $valueMinisite['subject'];
					$arrJson['item'][$keyMinisite]['title'] = $valueMinisite['title'];
					$arrJson['item'][$keyMinisite]['pic'] = '../upload/core/pictures/'.$valueMinisite['pic'];
				}
			}else{
				$arrJson['status'] = false;
				$arrJson['msg'] = 'ไม่พบระบบย่อย';
			}
		} else {
			$sql = "SELECT 
		 " . $core_tb_staff . "_id,
		 " . $core_tb_staff . "_password,
		 " . $core_tb_staff . "_fnamethai,
		 " . $core_tb_staff . "_lnamethai,
		 " . $core_tb_staff . "_groupid   ,
		 " . $core_tb_staff . "_typeuser  ,
		 " . $core_tb_staff . "_typeusermini ,
		 " . $core_tb_staff . "_username,
		 " . $core_tb_staff . "_usertype as usertype,
		 " . $core_tb_staff . "_agency
		 FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_username='" . $inputUser . "'  AND " . $core_tb_staff . "_status !='Disable' ";
			//  print_pre($sql);
			$Query = wewebQueryDB($coreLanguageSQL, $sql);
			$RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);

			if ($RecordCount >= 1) {
				$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
				$myPassword = decodeStr($Row[1]);
				$usertype = $Row['usertype'];

				if ($usertype == 1) {
					### Private User
					if ($myPassword == $inputPass) {
						$sql = "SELECT 
						" . $core_tb_setting . "_id as id,
						" . $core_tb_setting . "_subject as subject,
						" . $core_tb_setting . "_title as title,
						" . $core_tb_setting . "_titleB as titleB,
						" . $core_tb_setting . "_pic as pic
						FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_issite = 1  AND " . $core_tb_setting . "_status !='Disable' ";
						// print_pre($sql);
						$Query = wewebQueryDB($coreLanguageSQL, $sql);
						$RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
						if ($RecordCount > 0) {
							$arrJson['status'] = true;
							// $arrJson['msg'] = 'success.';
							foreach ($Query as $keyMinisite => $valueMinisite) {
								$arrJson['item'][$keyMinisite]['id'] = $valueMinisite['id'];
								$arrJson['item'][$keyMinisite]['subject'] = $valueMinisite['subject'];
								$arrJson['item'][$keyMinisite]['title'] = $valueMinisite['title'];
								$arrJson['item'][$keyMinisite]['pic'] = '../upload/core/pictures/'.$valueMinisite['pic'];
							}
						}else{
							$arrJson['status'] = false;
							$arrJson['msg'] = 'ไม่พบระบบย่อย';
						}
					} else {
						$arrJson['status'] = false;
						$arrJson['msg'] = $langTxt["login:alert"];
					}
				} else {
					### Domain User
					$arrJson['status'] = false;
					$arrJson['msg'] = 'error type user';
				}
			} else {
				$arrJson['status'] = false;
				$arrJson['msg'] = $langTxt["login:alert"];
			}
		}
	} else {
		$arrJson['status'] = false;
		$arrJson['msg'] = $langTxt["regis:alertRecap"];
	}
} else {
	$arrJson['status'] = false;
	$arrJson['msg'] = $langTxt["regis:alertRecap"];
}

echo json_encode($arrJson);
exit();

include("../lib/disconnect.php");
?>