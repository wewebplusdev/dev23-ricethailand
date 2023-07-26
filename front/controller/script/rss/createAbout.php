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

    // $url = fileinclude($value[6],'pictures',$value[1],'link');
    // {$infoAbout->fields(2)|fileinclude:"html":$infoAbout->fields(1)|callHtml

    // $urlrelative = fileinclude($value[6],'pictures',$value[1],'link');
    // $length=filesize($urlrelative);
    // $mime=@getimagesize($urlrelative);
    // $type=$mime['mime'];

    $htmlfile = fileinclude($value[2],'html',$value[1]);

      $link = $linkRSSDetail;
      $data2 .= '<item>'."\n";
      $data2 .= '<title>'.$TitleRSS.'</title>'."\n";
      $data2 .= '<description> </description>'."\n";
      $data2 .= '<link>'.$link.'</link>'."\n";
      // $data2 .= "<enclosure url=\"".$url."\" length=\"".$length."\" type=\"".$type."\" />\r\n";
      $data2 .= '<pubDate>'.DateThai($value[3],1).'</pubDate>'."\n";
      $data2 .= '</item>'."\n";
  }


  $data .= $data2;
  $data .="</channel>"."\n";
  $data .="</rss>"."\n";
  echo $data;
  // $f = fopen( _URL.$core_relativepath_rss."/".'rss.xml' , 'w' );
  // fputs( $f , $data );
  // fclose( $f );
  // if(!is_dir($core_relativepath_rss)) { mkdir($core_relativepath_rss,0777); }
  // $xmlfile=$masterkey."Thai". $group .".xml";
  // $rssfile=_URL.$core_relativepath_rss."/".$xmlfile;
  // if(file_exists($rssfile)){
  //   @unlink($rssfile);
  // }

    // $fp=fopen($rssfile,"w+");
    // fwrite($fp,$data) or die("Failed to write contents to new file");
    // fclose($fp) or die("failed to close stream resource");

}else {
  // $xmlfile=$masterkey."Thai". $group .".xml";
  // $rssfile=_URL.$core_relativepath_rss."/".$xmlfile;
  //
  // if(file_exists($rssfile)){
  //   @unlink($rssfile);
  // }
}