<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");

$inputUser = trim($_POST["inputUser"]);
$inputPass = trim($_POST["inputPass"]);


$inputUserMaster = changeQuot($inputUser);
$inputPassMaster = encodeStr($inputPass);

$sqlMaster = "SELECT " . $core_tb_staff . "_id FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_username='" . encodeStr($inputUserMaster) . "' AND " . $core_tb_staff . "_password='" . $inputPassMaster . "'  AND " . $core_tb_staff . "_status='Superadmin'    ";

$queryMaster = wewebQueryDB($coreLanguageSQL, $sqlMaster);
$recordMaster = wewebNumRowsDB($coreLanguageSQL, $queryMaster);

if ($recordMaster >= 1) {

	$_SESSION[$valSiteManage . "core_session_logout"] = 1;
	$_SESSION[$valSiteManage . "core_session_id"] = 0;
	$_SESSION[$valSiteManage . "core_session_name"] = "Private Member";
	$_SESSION[$valSiteManage . "core_session_level"] = "SuperAdmin";
	$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
	$_SESSION[$valSiteManage . "core_session_languageT"] = "1";
	$_SESSION[$valSiteManage . "core_session_usrcar"] = 0;
?>
	<script language="JavaScript" type="text/javascript">
		document.location.href = "core/index.php";
	</script>
	<?php
} else {


	$_SESSION[$valSiteManage . "core_session_logout"] = 1;
	$sql = "SELECT
 " . $core_tb_staff . "_id,
 " . $core_tb_staff . "_password,
 " . $core_tb_staff . "_fnamethai,
 " . $core_tb_staff . "_lnamethai,
 " . $core_tb_staff . "_groupid ,
 " . $core_tb_staff . "_typeuser ,
 " . $core_tb_staff . "_username
  FROM " . $core_tb_staff . "
	INNER JOIN " . $core_tb_group . "
	ON " . $core_tb_staff . "." . $core_tb_staff . "_groupid = " . $core_tb_group . "." . $core_tb_group . "_id
  WHERE " . $core_tb_staff . "_username='" . $inputUser . "'  AND " . $core_tb_staff . "_status !='Disable'   AND " . $core_tb_group . "_status !='Disable' ";
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);

	if ($RecordCount >= 1) {
		$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
		if ($Row[5] != 2) {
			$myPassword = decodeStr($Row[1]);


			### Private User
			if ($myPassword == $inputPass) {

				$_SESSION[$valSiteManage . "core_session_id"]		= $Row[0];
				$_SESSION[$valSiteManage . "core_session_name"]		= rechangeQuot($Row[2]) . " " . rechangeQuot($Row[3]);
				$_SESSION[$valSiteManage . "core_session_groupid"]	= $Row[4];
				$_SESSION[$valSiteManage . "core_session_language"]  = getSystemLang();
				$_SESSION[$valSiteManage . "core_session_languageT"]	= getSystemLangType();

				$sql_lv = "SELECT " . $core_tb_group . "_lv FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_id='" . $Row[4] . "'";
				$Query_lv = wewebQueryDB($coreLanguageSQL, $sql_lv);
				$Row_lv = wewebFetchArrayDB($coreLanguageSQL, $Query_lv);
				$_SESSION[$valSiteManage . "core_session_level"]		= $Row_lv[0];

				$sql = "UPDATE " . $core_tb_staff . " SET " . $core_tb_staff . "_logdate=" . wewebNow($coreLanguageSQL) . " WHERE " . $core_tb_staff . "_id='" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
				$Query = wewebQueryDB($coreLanguageSQL, $sql);
				###################### Start insert logs ##################
				logs_access('1', 'Login');
				###################### End insert logs ##################

				if ($inputUrl != "") {
					$txtLinkUrlTo = "../" . $inputUrl;
				} else {
					$txtLinkUrlTo = "core/index.php";
				}
	?>
				<script language="JavaScript" type="text/javascript">
					document.location.href = "<?php echo $txtLinkUrlTo ?>";
				</script>
			<?php

			} else {
			?>
				<script language="JavaScript" type="text/javascript">
					jQuery("#loadAlertLogin").show();
					jQuery("#loadAlertLoginOA").hide();
					jQuery("#loadAlertLoginAD").hide();
					document.myFormLogin.inputUser.value = '';
					document.myFormLogin.inputPass.value = '';
				</script>
			<?php
			}
		} else {
			$server = "up.local"; //dc1-nu
			$user = $inputUser . "@up.local";
			$pass = $inputPass;
			// connect to active directory
			$ad = ldap_connect($server);

			if (!$ad) {
			?>
				<script language="JavaScript" type="text/javascript">
					jQuery("#loadAlertLogin").hide();
					jQuery("#loadAlertLoginAD").show();
					document.myFormLogin.inputUser.value = '';
					document.myFormLogin.inputPass.value = '';
				</script>
				<?php
			} else {
				$b = @ldap_bind($ad, $user, $pass);
				if (!$b) {
				?>
					<script language="JavaScript" type="text/javascript">
						jQuery("#loadAlertLogin").show();
						jQuery("#loadAlertLoginOA").hide();
						jQuery("#loadAlertLoginAD").hide();
						document.myFormLogin.inputUser.value = '';
						document.myFormLogin.inputPass.value = '';
					</script>
				<?php
				} else {

					$_SESSION[$valSiteManage . "core_session_id"]		= $Row[0];
					$_SESSION[$valSiteManage . "core_session_name"]		= rechangeQuot($Row[6]) . "";
					$_SESSION[$valSiteManage . "core_session_groupid"]	= $Row[4];
					$_SESSION[$valSiteManage . "core_session_language"]  = getSystemLang();
					$_SESSION[$valSiteManage . "core_session_languageT"]	= getSystemLangType();

					###################### Start insert logs ##################
					logs_access('1', 'Login');
					###################### End insert logs ##################

					if ($inputUrl != "") {
						$txtLinkUrlTo = "../" . $inputUrl;
					} else {
						$txtLinkUrlTo = "core/index.php";
					}
				?>
					<script language="JavaScript" type="text/javascript">
						document.location.href = "<?php echo $txtLinkUrlTo ?>";
					</script>
<?
				}
			}
		}
	} else {
		?>
		<script language="JavaScript" type="text/javascript">
						jQuery("#loadAlertLogin").show();
						jQuery("#loadAlertLoginOA").hide();
						jQuery("#loadAlertLoginAD").hide();
						document.myFormLogin.inputUser.value = '';
						document.myFormLogin.inputPass.value = '';
		</script>
		<?php
	}
}

include("../lib/disconnect.php");
?>