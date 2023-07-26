<?php  
date_default_timezone_set('Asia/Bangkok');
ini_set('memory_limit', '128M');

## nut add 01/03/17 ##
error_reporting(0);
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
## Core Folder Local  ######################################################
$core_pathname_folderlocal = "";

## Core Upload  ######################################################
$core_pathname_upload = "../../upload";
$core_pathname_upload_fornt = "upload";
$core_pathname_mupload = "../core/upload/";
$core_pathname_logs = "../../logs";
$core_pathname_crupload = "../../upload/core";

## Core Path RSS  ##################################################

$core_fullpath_rss = "http://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal . "/upload";
$core_variable_charset = "UTF-8";
$core_relativepath_rss = "../../rss";

## Core Path Name  ##################################################
$core_full_path = "http://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal;

## Core Path SQL Language ##################################################
$coreLanguageSQL = "mysqli";

## Core Table  ######################################################
$core_tb_staff = "sy_stf";
$core_tb_staff_tmp = "sy_stf_tmp";
$core_tb_menu = "sy_mnu";
$core_tb_group = "sy_grp";
$core_tb_permission = "sy_mis";
$core_tb_box = "sy_box";
$core_tb_search = "sy_sea";
$core_tb_log = "sy_logs";
$core_tb_sort = "sy_stm"; 
$core_tb_setting = "sy_stt";
$core_tb_usercar = "md_srd";
$core_tb_service = "md_srs";
$core_tb_user = "sy_usr";
$md_root_tb = "md_cms";
$md_group_tb = "md_cmg";
$md_file_tb = "md_cmg";

## Other Table  ######################################################
$other_tb_geography = "ot_geo";
$other_tb_province = "ot_pro";
$other_tb_amphur = "ot_amp";
$other_tb_district = "ot_dis";
$other_tb_nation = "ot_nat";
$other_tb_pe = "md_pe";
$other_tb_pe_mk = "ct";

## Core Icon  ######################################################
$core_icon_columnsize = 15;
$core_icon_maxsize = 75;
$core_icon_librarypath = "../img/iconmenu";

## Database Connect #################################################

if ($coreLanguageSQL == "mysqli") {
    // $core_db_hostname = "192.168.254.58";
    // $core_db_username = "root";
    // $core_db_password = "KIS@2021km";
    // $core_db_name = "prod_dmsckis";

    $core_db_hostname = "192.168.1.129";
    $core_db_username = "root";
    $core_db_password = "IySY?Pk7!!mH";
    $core_db_name = "2023_ricethailand";
} else {
    // $core_db_hostname = "192.168.254.58";
    // $core_db_username = "root";
    // $core_db_password = "KIS@2021km";
    // $core_db_name = "prod_dmsckis";

    $core_db_hostname = "192.168.1.129";
    $core_db_username = "root";
    $core_db_password = "IySY?Pk7!!mH";
    $core_db_name = "2023_ricethailand";
}
$core_db_charecter_set = array(
    'charset' => "utf8",
    'collation' => "utf8_general_ci"
);


## Core Val Setting #############################################
$toolEditorStyle = "ToolbarAll";
$core_default_pagesize = 25;
$core_default_maxpage = 25;
$core_default_reduce = 10;
$core_sort_number = "DESC";
$core_height_leftmenu = 40;

## Core Language #############################################
$coreLanguageThai = "Thai";
$coreLanguageEng = "Eng";

## Core Email #############################################
$core_send_email = "info@dmcr.co.th";
$core_goto_email = "info@dmcr.co.th";

## Core Value #############################################
$coreYearDef =  2021;
$coreYearEndDef =  date('Y')+1;
$coreMonthMem = array("-", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$coreMonthMemEng = array("-", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$coreTxtSexMember = array("", "ชาย", "หญิง");
$coreTxtSexMemberEn = array("", "Male", "Female");
$core_config_val = 0;
$core_config_transportation = 100;

$coreBankTransferMem = array("", "กสิกรไทย/066-2-64435-8/บจก. สมอล เวิลด์ อินเตอร์เทรด", "ไทยพาณิชย์/095-2-76962-9/บจก. สมอล เวิลด์ อินเตอร์เทรด", "กรุงเทพ/195-4-84204-1/บจก. สมอล เวิลด์ อินเตอร์เทรด");
$coreBankTransferMemEn = array("", "KASIKORNBANK Bank/066-2-64435-8/Small World Intertrade CO.,LTD.", "The Siam Commercial Bank/095-2-76962-9/Small World Intertrade CO.,LTD.", "Bangkok Bank/195-4-84204-1/Small World Intertrade CO.,LTD.");
## Core Theme #############################################
$core_main_theme = array(
    0 => array("color" => "#e74962", "theme" => "theme.css"),
    1 => array("color" => "#e3a224", "theme" => "theme2.css"),
    2 => array("color" => "#d73f92", "theme" => "theme3.css"),
    3 => array("color" => "#c1243f", "theme" => "theme4.css"),
    4 => array("color" => "#04a351", "theme" => "theme5.css"),
    5 => array("color" => "#8c4e9b", "theme" => "theme6.css"),
    6 => array("color" => "#f3403c", "theme" => "theme7.css"),
    7 => array("color" => "#ee1820", "theme" => "theme8.css"),
    8 => array("color" => "#93c765", "theme" => "theme9.css"),
    9 => array("color" => "#e27e30", "theme" => "theme10.css")
);
$colorpatten = array("#e6e6e6", "#f46b23", "#ffb400", "#e7352b", "#8d42a1", "#3853d8", "#20a5ea", "#5cb328", "#7c5e4c", "#484848", "#01d2f9", "#7f8c8d");


## Core path nopic #############################################
$core_nopic_fb = "images/nopic/nopic_fb.jpg";
$core_nopic_tg = "images/nopic/nopic_tg.jpg";
$core_nopic_tr_large = "images/nopic/nopic_tr_large.jpg";
$core_nopic_bn = "images/nopic/nopic_bn.jpg";
$core_nopic_country = "images/nopic/nopic_country.jpg";
$core_nopic_map = "images/nopic/nopic_map.jpg";
$core_nopic_tr = "images/nopic/nopic_tr.jpg";


## Core Value Mail #############################################
$core_mail_Order = "ใบสั่งซื้อสินค้า";
$core_mail_thankyou = "Thank you ,";
$core_mail_company = "Small World Intertrade CO.,LTD.";
$core_mail_sentby = "This e-mail was sent by:";
$core_mail_address = "9/28 อาคาร เวิร์คเพลส แขวงบางแวก เขตภาษีเจริญ กรุงเทพ 10160 Tel. 02-683-4296 Fax 091-2280-280";
$core_default_typemail = 1;

## Core Value FB #############################################
$valAppIdFB = '1562116060778897';
$valSecretIdFB = '995727c99327902421892d09da572a84';
$valReturnUrlFB = 'http://www.wewebplaza.com/tomandkate/th/fblogin/';
$valReturnUrlFBEn = 'http://www.wewebplaza.com/tomandkate/en/fblogin/';
$valReturnUrlFBCn = 'http://www.wewebplaza.com/tomandkate/cn/fblogin/';

## Core Value FB Order #############################################
$valReturnUrlFBOrder = 'http://www.wewebplaza.com/tomandkate/th/fbloginorder/';


$core_tb_datadb = "md_data";
$core_tb_datadb_group = "md_datag";
$core_mk_year = "year";
$core_mk_sea_animal = "sa";
$core_mk_island = "il";
$core_mk_location = "lct";
$core_mk_resource = "mcr";
$core_mk_area = "ca";
$core_mk_protected_area = "pa";
$core_mk_maritime_territory = "mt";


$arrTypeUser = array(
    '1' => 'Private User',
    '2' => 'Domain User One Account'
);

## date month ##
$strMonthCut['shot']['th'] = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
$strMonthCut['shot']['en'] = array("", 'Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.');
$strMonthCut['shot2']['en'] = array("", 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

$strMonthCut['full']['th'] = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$strMonthCut['full']['en'] = array('', 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December', );

$core_send_email = "dev.mail@wewebplus.com";

## Core Google Recaptcha #############################################
$recaptcha_sitekey = "6LdGzjEnAAAAANXfZuqUYCnks0pWeWmoxQtfXe72";
$recaptcha_secert = "6LdGzjEnAAAAAN2DjOnYk_toNNXzyo0c2cm1IiQi";

## Allow type file  ###################################
$core_allow_pic_masterkey = "fpic";
$core_allow_file_masterkey = "fatt";
