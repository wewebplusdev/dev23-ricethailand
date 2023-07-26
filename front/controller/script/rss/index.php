<?php
if (!empty($url->segment[1])) {
  $explo1 = explode(".xml",$url->segment[1]);
  $explo2 = explode("Thai",$explo1[0]);
  // print_pre($explo2);
  $masterkey = $explo2[0]; //masterkey
  $group = $explo2[1]; //group
  // print_pre(_URL.$url->pagelang[1]);
  // $masterkey = 'news';
  // print_pre($lang["site:fullName"]);die;
  if (!empty($group)) {
    switch ($masterkey) {
      case 'nw':
          $callNews = rssNews($masterkey,$group , 100);
          $callNameGroup = rssGroupNews($masterkey,$callNews->fields[7]); //ส่ง group ไปค้นหา
          $linkRSSDetail = _URL."news/".$callNameGroup->fields[0]."/detail";
          $TitleRSS = $callNameGroup->fields[2];
          $urlRss = _URL.'news/'.$group;
          // print_pre($linkRSSDetail);
          require_once _DIR . '/front/controller/script/rss/create.php';
        break;
      case 'act':
          $callNews = rssAct($masterkey,$group , 100);
          $callNameGroup = rssGroupAct($masterkey,$callNews->fields[7]); //ส่ง group ไปค้นหา
          $linkRSSDetail = _URL."activity/".$callNameGroup->fields[0]."/detail";
          $TitleRSS = $callNameGroup->fields[2];
          $urlRss = _URL.'activity/'.$group;
          // print_pre($linkRSSDetail);
          require_once _DIR . '/front/controller/script/rss/create.php';
        break;
      case 'dt':
	
          $callNews = rssDownload($masterkey,$group , 100);
          $linkRSSDetail = _URL."download";
          $TitleRSS = "แผนการจัดการความรู้";
          $urlRss = _URL.'kmplan/'.$group;
          // print_pre($linkRSSDetail);
         require_once _DIR . '/front/controller/script/rss/createDownload.php';
        break;
      case 'ab':
          $callNews = rssNewsAbout($masterkey);
          // $callNameGroup = rssGroupNews($masterkey,$callNews->fields[7]); //ส่ง group ไปค้นหา
          // print_pre($callNews);
          // die;
          $linkRSSDetail = _URL."/about";
          $TitleRSS = "เกี่ยวกับหน่วยงาน";
          $urlRss = _URL.'about/';
          require_once _DIR . '/front/controller/script/rss/create.php';
        break;

      case 'pc':
        $callNews = rssNews($masterkey,$group);
        $callNameGroup = rssGroupNews($masterkey,$callNews->fields[7]);
        $linkRSSDetail = _URL."detailAll";
        $urlRss = _URL;
        $TitleRSS = $callNameGroup->fields[2];
        require_once _DIR . '/front/controller/script/rss/create.php';
      break;
      default:
        echo('no rss');
        break;
    }
  }else {
    if($masterkey == 'speciallist'){
      // print_pre('s');
      $callNews = rssSpecial();
      // print_pre($callNews);
          // $callNameGroup = rssGroupNews($masterkey,$callNews->fields[7]);
      $linkRSSDetail = _URL."specialDetail";
      $TitleRSS = "นามสงเคราะห์";
      // print_pre($linkRSSDetail);
      $urlRss = _URL;
      require_once _DIR . '/front/controller/script/rss/create.php';
    }elseif ($masterkey == 'rssAboutAll'){
      $linkRSSDetail = _URL;
      $TitleRSS = "เกี่ยวกับเรา";
      $callNews = rssAboutMenu($config['about']['menu:masterkey']);
      require_once _DIR . '/front/controller/script/rss/aboutAll.php';

    }else{
	  $linkRSSDetail = _URL."aboutus/".$masterkey;
      $CallTitleRSS = callAboutName($config['about']['menu:masterkey'],"aboutus/".$masterkey);
      $TitleRSS = $CallTitleRSS->fields['subject']; 
      $callNews = rssAboutus($masterkey);

      require_once _DIR . '/front/controller/script/rss/createAbout.php';
    }
        
  }


}
