<?php
//recaptcha
$smarty->assign("recaptcha_sitekey", $recaptcha_sitekey);

// $callSetWebsite = new settingWebsite();
// $infoSetting = $callSetWebsite->callSetting();

/* #### Start About Footer ######## */
$callAboutFooter = callAboutFooter();
$smarty->assign("callAboutFooter", $callAboutFooter);
/* #### End About Footer ######## */

/* #### Start VersionTemp ######## */
$valVersionTemp = '?v='.date('YmdHis');
$smarty->assign("setVersionTemp", $valVersionTemp);
/* #### Start VersionTemp ######## */

/* #### Start News Navbars ######## */
$callNewsNav = callNewsNav(); 
$smarty->assign("callNewsNav", $callNewsNav);
/* #### End News Navbars ######## */

/* #### Start News Navbars ######## */
$callActNav = callActNav(); 
$smarty->assign("callActNav", $callActNav);
/* #### End News Navbars ######## */

/* #### Start News Navbars ######## */
$callNewsFooter = callNewsNav(); 
$smarty->assign("callNewsFooter", $callNewsFooter);
/* #### End News Navbars ######## */

/* #### Start Setting ######## */
$callSetWebsite = new settingWebsite();
// $infoSetting = $callSetWebsite->callSetting();

// $valMainSiteData = unserialize($_SESSION['settingpage']);
// $valSiteUpdatedateArray = explode(" ", $valMainSiteData->fields['lastdate']);
// $valSiteUpdatedate = strtotime("+1 day",strtotime($valSiteUpdatedateArray[0]));
// $valSiteRealdate = strtotime(date('Y-m-d'));
// if($valMainSiteData=="" || $valSiteUpdatedate>=$valSiteRealdate){
//     $callSetWebsite->callSetting();
// }
$callSetWebsite->callSetting();
$valMainSiteData = unserialize($_SESSION['settingpage']);
$valMainSiteDataInfo = unserialize($_SESSION['settingMainSite']);
$dataTextHead = explode(" ", trim($valMainSiteData->fields['subject']));
$smarty->assign("settingpage", $valMainSiteData->fields);
$smarty->assign("SettingMainSite", $valMainSiteDataInfo);
$smarty->assign("settingpageHeadsy", $dataTextHead[0]);
$smarty->assign("settingpageHeaddep", $dataTextHead[1]);
/* #### End Setting ######## */


/* #### Start TG ######## */
$callTGP = callTGP();
$smarty->assign("callTGP", $callTGP);
// print_pre($callTGP->fields);
/* #### End TG ######## */

/* #### Start Seo ######## */
$valDataMainImg = _URL."front/template/default/assets/img/static/brand.png";
$valMainSiteSeoData = Seo();
$smarty->assign("seo", $valMainSiteSeoData);

/* #### End Seo ######## */

// print_pre($infoSetting);
// $smarty->assign("typeMember", $typeMember);
// $infoLogoWeb = $callSetWebsite->callLogo();
// $infoSettingGraphic = $callSetWebsite->callGraphic();
// $smarty->assign("infoLogoWeb", $infoLogoWeb->fields);
// $smarty->assign("infoSettingGraphic", $infoSettingGraphic->fields);
// $smarty->assign("icon_web", fileinclude($infoSettingGraphic->fields['icon'],'real', $infoSettingGraphic->fields['masterkey'], 'link'));
// print_pre($infoLogoWeb);
#function assign seo & title page

function Seo($title = '', $desc = '', $keyword = '', $pic = ''){
  global $valSetSetingSeo,$valMainSiteData,$valDataMainImg;
  $list = array();
  if (!empty($title)) {
      if (!empty($valMainSiteData->fields['metatitle'])) {
          $list_last = $valMainSiteData->fields['metatitle'];
      } elseif(!empty($valMainSiteData->fields['subject'])){
          $list_last = $valMainSiteData->fields['subject'];
      }else {
          $list_last = $valSetSetingSeo['title'];
      }

      $list['title'] = trim($title) . " - " . $list_last;
  } else {
      if (!empty($valMainSiteData->fields['metatitle'])) {
          $list['title'] = $valMainSiteData->fields['metatitle'];
      } elseif(!empty($valMainSiteData->fields['subject'])){
          $list['title'] = $valMainSiteData->fields['subject'];
      }else {
          $list['title'] = $valSetSetingSeo['title'];
      }
  }

  if (!empty($desc)) {
      $list['desc'] = trim($desc);
  } else {
      if (!empty($valMainSiteData->fields['description'])) {
          $list['desc'] = $valMainSiteData->fields['description'];
      }else {
          $list['desc'] = $valSetSetingSeo['description'];
      }
  }

  if (!empty($keyword)) {
      $list['keyword'] = trim($keyword);
  } else {
      if (!empty($valMainSiteData->fields['keywords'])) {
          $list['keyword'] = $valMainSiteData->fields['keywords'];
      }else {
          $list['keywords'] = $valSetSetingSeo['description'];
      }
  }

  if (!empty($pic)) {
      $list['pic'] = trim($pic);
  }else{
      $list['pic'] = $valDataMainImg;
}

$list['author'] = $valMainSiteData->fields['subjectoffice'];


return $list;
}

function callNewsNav(){
    global $config, $db, $url;
  
    $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title as title,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_pic as pic,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_credate as credate
  
  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['cmg']['masterkey'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Enable'
  ";
  
  
    $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

  function callAboutFooter($id = null, $limit = 10)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
  
    $sql = "SELECT
    " . $config['al']['db'] . "." . $config['al']['db'] . "_id as id,
    " . $config['al']['db'] . "." . $config['al']['db'] . "_masterkey as masterkey,
    " . $config['al']['db'] . "." . $config['al']['db'] . "_subject as subject,
    " . $config['al']['db'] . "." . $config['al']['db'] . "_pic as pic,
    " . $config['al']['db'] . "." . $config['al']['db'] . "_credate as credate,
    " . $config['al']['db'] . "." . $config['al']['db'] . "_htmlfilename as htmlfilename,
    " . $config['al']['db'] . "." . $config['al']['db'] . "_title as title
  
  
    FROM
    " . $config['al']['db'] . "
    WHERE
    " . $config['al']['db'] . "." . $config['al']['db'] . "_masterkey = '".$config['al']['masterkey']."'
    ";
  
    $sql .= " ORDER  BY " . $config['al']['db'] . "." . $config['al']['db'] . "_order DESC ";
    $sql .= " limit ".$limit." ";
  // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

function callTGP(){
  global $config, $db, $url;

  $sql = "SELECT
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_id as id,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey as masterkey,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_subject as subject,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_title as title,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_pic as pic,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_url as url,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_target as target,
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_credate as credate

FROM
" . $config['tgp']['db'] . "
WHERE
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey = '" . $config['tgp']['masterkey'] . "' and
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_status = 'Enable' and
((" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00')   OR
(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
(TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00' )  OR
(TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW())  ))

";


  $sql .= "
ORDER  BY " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_order DESC
";

  $result = $db->execute($sql);
  return $result;
}

#### SETTING


$settingWeb = array();
$settingWeb['masterkey'] = $infoSetting->fields['masterkey'];
$settingWeb['subject'] = $infoSetting->fields['subject'];
$settingWeb['subjectoffice'] = $infoSetting->fields['subjectoffice'];
$settingWeb['description'] = $infoSetting->fields['description'];
$settingWeb['keywords'] = $infoSetting->fields['keywords'];
$settingWeb['metatitle'] = $infoSetting->fields['metatitle'];
$settingWeb['contact'] = unserialize($infoSetting->fields['config']);
$settingWeb['social'] = unserialize($infoSetting->fields['social']);
$settingWeb['addresspic'] = $infoSetting->fields['addresspic'];
$settingWeb['qr'] = $infoSetting->fields['qr'];

$smarty->assign("settingWeb", $settingWeb);


class settingWebsite
{
    function callSetting()
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        // print_pre($url);
        $sql = "SELECT
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_id as id,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey as masterkey,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subject as subject,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subjectoffice as subjectoffice,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_description as description,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_keywords as keywords,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_metatitle as metatitle,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_social as social,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_config as config,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_addresspic  as addresspic,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_qr as qr,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_lastdate as lastdate,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subjecten as subjecten

        
      
        FROM
        " . $config['setting']['db'] . "
        WHERE
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey = '" . $config['setting']['masterkey'] . "' 
        ";



        $result = $db->execute($sql);

        $SettingMainSite = array();
        $SettingMainSite['social'] = unserialize($result->fields['social']);
        $SettingMainSite['config'] = unserialize($result->fields['config']);
        //print_pre($SettingMainSite);
        
        $_SESSION['settingpage'] = serialize($result);
        $_SESSION['settingMainSite'] = serialize($SettingMainSite);

        return $result;
    }

    // function callLogo(){
    //     global $config, $db, $url;
    //     $lang = $url->pagelang[3];
    //     // print_pre($url);
    //     $sql = "SELECT
    //     " . $config['logo']['db'] . "." . $config['logo']['db'] . "_id as id,
    //     " . $config['logo']['db'] . "." . $config['logo']['db'] . "_pic as pic,
    //     'core' as masterkey



    //     FROM
    //     " . $config['logo']['db'] . "
    //     ORDER BY
    //     " . $config['logo']['db'] . "." . $config['logo']['db'] . "_id DESC LIMIT 1 
    //     ";




    //     $result = $db->execute($sql);
    //     return $result;
    // }


    // function callGraphic(){
    //     global $config, $db, $url;
    //     $lang = $url->pagelang[3];
    //     // print_pre($url);
    //     $sql = "SELECT
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_id as id,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_masterkey as masterkey,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_subject as subject,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_title as title,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic as pic_login,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic2 as pic_home1,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic3 as pic_home2,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic4 as pic_detail,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic5 as pic_inner1,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic6 as pic_inner2,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_pic7 as pic_inner3,
    //     " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_icon as icon,
    //     " . $config['graphic']['file'] . "." . $config['graphic']['file'] . "_filename as audio

    //     FROM
    //     " . $config['graphic']['db'] . "
    //     LEFT JOIN " . $config['graphic']['file'] . " ON
    //     " . $config['graphic']['file'] . "." . $config['graphic']['file'] . "_contantid = " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_id
    //     WHERE " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_masterkey = '".$config['graphic']['masterkey']."'
    //     AND " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_status != 'Disable'
    //     ";

    //     $sql .= checkStartEnd($config['graphic']['db']);
    //     $sql .=" ORDER BY " . $config['graphic']['db'] . "." . $config['graphic']['db'] . "_order DESC LIMIT 1  ";

    //     $result = $db->execute($sql);
    //     return $result;
    // }

    
    function updateView($id, $masterkey, $table)
    {
        global $config, $db, $url;

        $sql = "SELECT
        " . $table . "." . $table . "_view
        FROM
        " . $table . "
        WHERE
        " . $table . "." . $table . "_masterkey = '$masterkey' 
        AND
        " . $table . "." . $table . "_id = '$id' 
        ";
        // print_pre($sql);
        $result = $db->execute($sql);
        $view = $result->fields[0] + 1;

        $listView[$table . '_view'] = $view;
        $updateView = sqlupdate($listView, $table, $table . "_id", "'" . $id . "'");

        return $updateView;
    }
}

function callActNav(){
    global $config, $db, $url;
  
    $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title as title,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_pic as pic,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_credate as credate
  
  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['act']['masterkey'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Enable'
  ";
  
  
    $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }
