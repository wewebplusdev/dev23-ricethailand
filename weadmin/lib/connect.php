<?php  
include 'adodb5/adodb.inc.php';
$dbConnect = NewADOConnection($coreLanguageSQL);

wewebConnect($coreLanguageSQL, $core_db_hostname, $core_db_username, $core_db_password) or die("Warning !! N0 Connect DataBase");
// wewebSelectDB($coreLanguageSQL, $core_db_name) or die("Warning !!  N0 Select DataBase");

/* ADODB CONNECT */

//$dbConnect = NewADOConnection($coreLanguageSQL);
//$dbConnect->Connect($core_db_hostname, $core_db_username, $core_db_password, $core_db_name);
//$dbConnect->charSet = 'SET NAMES utf8';
//
//$dbConnect->Execute("SET character_set_results=utf8");
//$dbConnect->Execute("SET collation_connection=utf8_general_ci");
//$dbConnect->Execute("SET NAMES 'utf8'");
//
//date_default_timezone_set("Asia/Bangkok");
//$dbConnect->SetFetchMode(ADODB_FETCH_ASSOC);
//$dbConnect->cacheSecs = 3600 * 12;
//print_r($dbConnect);
//
//############################################
//function getNameSeo($valTable, $valField, $valMasterKey) {
//############################################
//    global $coreLanguageSQL;
//    $sql_pic = "SELECT " . $valField . "  FROM " . $valTable . " WHERE   " . $valTable . "_masterkey 	='" . $valMasterKey . "'";
//    $query_pic = mysqli_query($sql_pic);
//    $row_pic = mysqli_fetch_array($query_pic);
//    $txt_pic_funtion = $row_pic[0];
//
//    return $txt_pic_funtion;
//}

############################################
function getNameSeo($valTable, $valField) {
############################################
    global $coreLanguageSQL;
    global $dbConnect;
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    $sql_pic = "SELECT " . $valField . "  FROM " . $valTable . " WHERE  1=1";
    $row_pic = $dbConnect->execute($sql_pic);
    $txt_pic_funtion = $row_pic->fields[$valField];
    return $txt_pic_funtion;
}


## Core Title  ######################################################

$fornt_name_keywords =getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$fornt_name_description =getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$core_name_title =getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$valNameSystem = getNameSeo($core_tb_setting,$core_tb_setting."_subject");
$valTitleSystem = getNameSeo($core_tb_setting,$core_tb_setting."_title");
$valPicSystem = getNameSeo($core_tb_setting,$core_tb_setting."_pic");
$valPicHeaderSystem = getNameSeo($core_tb_setting,$core_tb_setting."_header");
$valPicBgSystem = getNameSeo($core_tb_setting,$core_tb_setting."_bg");
?>
