<?php
$menuActive = "intro";
// $listjs[] = '<script type="text/javascript" src="front/controller/script/intro/js/script.js"></script>';
$menuActive = "intro";
$infoIntro = callIntro();
// print_pre($infoIntro);


/*## Start SEO #####*/
if ($infoIntro->fields['md_int_file'] !== '') {
  $fullpath_pic = fileinclude($infoIntro->fields['md_int_file'], 'real', $infoIntro->fields['md_int_masterkey'], 'link');
} else {
  $fullpath_pic = '';
}
$valPageHomeSeoTitle = ($infoIntro->fields['metatitle'] != '' ? $infoIntro->fields['metatitle'] : $infoIntro->fields['md_int_subject']);
$valPageHomeSeoDesc = ($infoIntro->fields['description'] != '' ? $infoIntro->fields['description'] : $infoIntro->fields['md_int_subject']);
$valPageHomeSeokey = ($infoIntro->fields['keywords'] != '' ? $infoIntro->fields['keywords'] : $infoIntro->fields['md_int_subject']);
$valPageHomeSeoPic = ($infoIntro->fields['pic'] != '' ? $fullpath_pic : '');
$valDataHomeSiteSeo = Seo($valPageHomeSeoTitle, $valPageHomeSeoDesc, $valPageHomeSeokey, $valPageHomeSeoPic);
$smarty->assign("seo", $valDataHomeSiteSeo);
/*## End SEO #####*/

if ($infoIntro->_numOfRows > 0) {
  $infoIntroTpl = callIntro();
  $smarty->assign("infoIntroTpl", $infoIntroTpl);
  $settingPage = array(
      "page" => "intro",
      "template" => "index.tpl",
      "display" => "page-intro"
  );
} else {
  header("Location:" . $linklang . "/home");
  exit();
}

$smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "intro-header.tpl");
$smarty->assign("footer", "intro-footer.tpl");
