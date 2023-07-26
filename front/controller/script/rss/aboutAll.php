<?php
header("Content-Type: application/xml; charset=utf-8");
$copyright=str_replace("http://","",_URL); //http://www.bualuang.co.th => www.bualuang.co.th
$copyright=str_replace("www.","",_URL); //www.bualuang.co.th => bualuang.co.th
$copyright="&amp;copy; ".date("Y")." ".$copyright;
$data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";
$data .="<rss version=\"2.0\">\r\n";
$data .="<channel>\r\n";

$data .="<title>".$TitleRSS."</title>\r\n";
$data .="<description>".$lang["site:fullName"]."</description>\r\n";
$data .="<link>"._URL."</link>\r\n";
$data.="<lastBuildDate>".date("r")."</lastBuildDate>\r\n";
$data.="<copyright>".$copyright."</copyright>\r\n";

if ($callNews->_numOfRows > 0){
$data2 ="";
  foreach ($callNews as $value) {

	$url = fileinclude($value['pic'],'pictures',$value['masterkey'],'link');
    // $htmlfile = fileinclude($value[2],'html',$value[1]);

      $link = $linkRSSDetail.'/'.$value['link'];
    //   echo $link;
      $data2 .= '<item>'."\n";
      $data2 .= '<title>'.$value['subject'].'</title>'."\n";
      $data2 .= '<description> </description>'."\n";
      $data2 .= '<link>'.$link.'</link>'."\n";
      $data2 .= "<enclosure url=\"".$url."\" length=\"".$length."\" type=\"".$type."\" />\r\n";
      $data2 .= '<pubDate></pubDate>'."\n";
      $data2 .= '</item>'."\n";
  }


  $data .= $data2;
  $data .="</channel>"."\n";
  $data .="</rss>"."\n";
  echo $data;
}else {
  // $xmlfile=$masterkey."Thai". $group .".xml";
  // $rssfile=_URL.$core_relativepath_rss."/".$xmlfile;
  //
  // if(file_exists($rssfile)){
  //   @unlink($rssfile);
  // }
}