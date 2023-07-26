<?php  

ob_start();
session_cache_expire(1280);
$cache_expire = session_cache_expire();
@session_start();

$valSiteManage = "kis" . "_";

// Convert Variable Array To Variable
foreach( $_GET as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}
 
foreach( $_POST as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}

foreach( $_SESSION as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}

foreach( $_COOKIE as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}

foreach( $_FILES as $xVarName => $xVarvalue ) {
     ${$xVarName."_name"} = $xVarvalue['name'];
     ${$xVarName."_type"} = $xVarvalue['type'];
     ${$xVarName."_size"} = $xVarvalue['size'];
     ${$xVarName."_error"} = $xVarvalue['error'];
     ${$xVarName} = $xVarvalue['tmp_name'];
}

// Session Handle Current User Information ------------------
if (!isset($_SESSION[$valSiteManage . 'core_session_id'])) {
    $_SESSION[$valSiteManage . 'core_session_id'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_name'])) {
    $_SESSION[$valSiteManage . 'core_session_name'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_level'])) {
    $_SESSION[$valSiteManage . 'core_session_level'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_groupid'])) {
    $_SESSION[$valSiteManage . 'core_session_groupid'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_permission'])) {
    $_SESSION[$valSiteManage . 'core_session_permission'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_language'])) {
    $_SESSION[$valSiteManage . 'core_session_language'] = "Thai";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_logout'])) {
    $_SESSION[$valSiteManage . 'core_session_logout'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_languageT'])) {
    $_SESSION[$valSiteManage . 'core_session_languageT'] = 1;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_usrcar'])) {
    $_SESSION[$valSiteManage . 'core_session_usrcar'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_typeproblem'])) {
    $_SESSION[$valSiteManage . 'core_session_typeproblem'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_storeid'])) {
    $_SESSION[$valSiteManage . 'core_session_storeid'] = 0;
}

## Core Cketitor #############################################
//$_SESSION["myRoxySession"] = "/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];
//
//if (!empty($_SESSION[$valSiteManage . "core_session_id"])) {
//    if ($_SESSION[$valSiteManage . "core_session_id"] >= 1) {
//        if (!is_dir("../../" . $_SESSION["myRoxySession"])) {
//            mkdir("../../" . $_SESSION["myRoxySession"], 0777);
//        }
//    }
//}


## Core Cketitor #############################################
$_SESSION["myBackOfficeSession"] = "/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];
$valFolderCkEditor = "/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];
if (!empty($_SESSION[$valSiteManage . "core_session_id"])) {
    if ($_SESSION[$valSiteManage . "core_session_id"] >= 1) {
        if (!is_dir("../../" . $valFolderCkEditor)) {
           @mkdir("../../" .$valFolderCkEditor, 0777);
			//echo $valFolderCkEditor;
        }
    }
}



//################## Wewebplus Connect DB ##########################
//
//function wewebConnect($valCoreDB, $valHost, $valUser, $valPass) {
//################## Set Up Function ###############################
//    if ($valCoreDB == "mssql") {
//        $valResultConnect = mssql_connect($valHost, $valUser, $valPass);
//    } else {
//        $valResultConnect = mysqli_connect($valHost, $valUser, $valPass);
//        $charset = "SET NAMES 'utf8'";
//        $valResultConnect = mysqli_query($charset);
//    }
//    return $valResultConnect;
//}
################## Wewebplus Connect DB ##########################



function wewebConnect($valCoreDB, $valHost = null, $valUser = null, $valPass = null) {
################## Set Up Function ###############################
    global $dbConnect;
    global $core_db_name;

    $dbConnect->Connect($valHost, $valUser, $valPass, $core_db_name);
    $dbConnect->charSet = 'SET NAMES utf8';

    $dbConnect->Execute("SET character_set_results=utf8");
    $dbConnect->Execute("SET collation_connection=utf8_general_ci");
    $dbConnect->Execute("SET NAMES 'utf8'");

    //$dbConnect->SetFetchMode(ADODB_FETCH_ASSOC);
    $dbConnect->cacheSecs = 3600 * 12;

    return $dbConnect;
}

//################## Wewebplus Select DB ##########################
//
//function wewebSelectDB($valCoreDB, $valDatabaseName) {
//################## Set Up Function ###############################
//    if ($valCoreDB == "mssql") {
//        $valSelectDB = mssql_select_db($valDatabaseName);
//    } else {
//        $valSelectDB = mysqli_select_db($valDatabaseName);
//    }
//
//    return $valSelectDB;
//}
################## Wewebplus Query DB ##########################

function wewebQueryDB($valCoreDB = null, $valSqlQuery = null) {
################## Set Up Function ###############################
    global $dbConnect;
    $valQueryDB = $dbConnect->execute($valSqlQuery);
    return $valQueryDB;
}

################## Wewebplus Num Rows DB ##########################

function wewebNumRowsDB($valCoreDB, $valQueryDB = null) {
################## Set Up Function ###############################
    return $valQueryDB->_numOfRows;
}

################## Wewebplus Fetch Array DB ##########################

function wewebFetchArrayDB($valCoreDB, $valQueryDB = null) {
//################## Set Up Function ###############################
    return $valQueryDB->FetchRow();
}

################## Wewebplus Now DB ##########################

function wewebNow($valCoreDB) {
################## Set Up Function ###############################
    if ($valCoreDB == "mssql") {
        $valNowDB = "GETDATE()";
    } else {
        $valNowDB = "NOW()";
    }
    return $valNowDB;
}

################## Wewebplus Insert Last ID DB ##########################

function wewebInsertID($valCoreDB = null, $valTable = null, $valTableF = null) {
    global $dbConnect;
################## Set Up Function ###############################
    if ($valCoreDB == "mssql") {
        $valNowDB = wewebMssqlInsertID($valTable, $valTableF);
    } else {
        
            $valNowDB = $dbConnect->insert_Id();

    }
    return $valNowDB;
}

################## Wewebplus Disconnect DB ##########################

function wewebDisconnect($valCoreDB) {
################## Set Up Function ##################################
    if ($valCoreDB == "mssql") {
        $valResultDisconnect = mssql_close();
    } else {
        // $valResultDisconnect = mysqli_close();
		if ($con) {  $valResultDisconnect = mysqli_close ($con); } 
    }

    return $valResultDisconnect;
}

################## Wewebplus escape DB ##########################

function wewebEscape($valCoreDB, $valDate = null) {
################## Set Up Function ##################################
    if ($valCoreDB == "mssql") {
        $valResultEscape = ms_escape_string($valDate);
    } else {
        // $valResultEscape = mysqli_real_escape_string($valDate);
	   $valResultEscape =ms_escape_string($valDate);
    }
// print_pre($valResultEscape);
    return $valResultEscape;
}

###################### Escape SQL  ######################

function ms_escape_string($data) {
###################### Set Up Function ######################
    if (!isset($data) or empty($data))
        return '';
    if (is_numeric($data))
        return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/', // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/', // url encoded 16-31
        '/[\x00-\x08]/', // 00-08
        '/\x0b/', // 11
        '/\x0c/', // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ($non_displayables as $regex)
        $data = preg_replace($regex, '', $data);
    $data = str_replace("'", "''", $data);
    return $data;
}

###################### Max ID SQL  ######################

function wewebMssqlInsertID($valTable, $valTableF = null) {
###################### Set Up Function ######################
    // $sql = "SELECT MAX(" . $valTableF . ") FROM " . $valTable;
    // $Query = mysqli_query($sql);
    // list($fileId) = mysqli_fetch_row($Query);
    // return $fileId;
    global $coreLanguageSQL;

    $sql = "SELECT MAX(" . $valTableF . ") FROM " . $valTable;
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    list($fileId) = wewebFetchArrayDB($coreLanguageSQL,$Query);
    return $fileId;
}


$redirect_pathname = explode("/", $_SERVER['PHP_SELF']);
$result_lastpath = $redirect_pathname[count($redirect_pathname) - 2];

if ($result_lastpath != 'weadmin' && $result_lastpath != 'user_action') {
    ## Core Config JWT #############################################
    if($_SESSION[$valSiteManage."core_session_logout"]<=0){
        if ($check_login_status != 1) {
            header( "Location:https://" . $_SERVER["HTTP_HOST"] . "/weadmin/index.php"); 
        }
    }

    include("../lib/jwt_function.php");
    ## Core Config JWT #############################################
    $keyApiJWT = "dmsc-kis-website";
    $keyProject = "dmsc";
    $keyCode = "kis";
    $keyType = "api";
    $key = $keyProject."_".$keyType."_".$keyCode;
    $keyencrypt = $keyProject."_ect_".$keyType."_".$keyCode;
    $ivencrypt = $keyProject."_iv_".$keyType."_".$keyCode;
    
    ## Core Config Status Code #############################################
    $coreStatusCode = array();
    $coreStatusCode['1000']['code'] = "1000";
    $coreStatusCode['1000']['msg'] = "User Not found.";
    
    $coreStatusCode['1001']['code'] = "1001";
    $coreStatusCode['1001']['msg'] = "Success.";
    
    $coreStatusCode['1002']['code'] = "1002";
    $coreStatusCode['1002']['msg'] = "Tokenid expire.";
    
    $coreStatusCode['1003']['code'] = "1003";
    $coreStatusCode['1003']['msg'] = "Missing parameter.";
    
    $coreStatusCode['1004']['code'] = "1004";
    $coreStatusCode['1004']['msg'] = "Request method is incorrect.";
    
    $coreStatusCode['1007']['code'] = "1007";
    $coreStatusCode['1007']['msg'] = "Tokenid is not available.";
    
    $coreStatusCode['1008']['code'] = "1008";
    $coreStatusCode['1008']['msg'] = "API is not available.";
    
    $coreStatusCode['400']['code'] = "400";
    $coreStatusCode['400']['msg'] = "Data Not found.";
   
    if (count(array_values($_FILES))) {
        $token_session = $_SESSION[$valSiteManage . "core_session_jwt"]['token'];
        $tokenAlready= getTokenAlready($token_session);
		$valDateReal = strtotime(date("Y-m-d H:i:s"));
        if ($valDateReal > $tokenAlready['expire_time']) {
            $_SESSION[$valSiteManage . "core_session_id"] = 0;
            $_SESSION[$valSiteManage . "core_session_name"] = "";
            $_SESSION[$valSiteManage . "core_session_level"] = "";
            $_SESSION[$valSiteManage . "core_session_language"] = "Eng";
            $_SESSION[$valSiteManage . "core_session_groupid"] = 0;
            $_SESSION[$valSiteManage . "core_session_permission"] = "";
            $_SESSION[$valSiteManage . "core_session_logout"] = "";
            $_SESSION[$valSiteManage . 'core_session_usrcar'] = 0;
            $_SESSION[$valSiteManage . "core_session_typeproblem"] = 0;
            $_SESSION[$valSiteManage . "core_session_jwt"] = 0;
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('กรุณา Refresh หรือกด F5 หน้าเบราว์เซอร์เพื่อใช้งานใหม่');
            </script>");
            die;
        }
    }
}
?>
