<?php
## setting
$copyright=str_replace("http://","",_URL); //http://www.bualuang.co.th => www.bualuang.co.th
$copyright=str_replace("www.","",_URL); //www.bualuang.co.th => bualuang.co.th
$copyright="&amp;copy; ".date("Y")." ".$copyright;

$DataArray = array();
$DataArray['channel']['title'] = $callNameGroup->fields['subject'];
$DataArray['channel']['description'] = $valNameSite["fullName"];
$DataArray['channel']['link'] = $urlRss;
$DataArray['channel']['lastBuildDate'] = date("r");
$DataArray['channel']['copyright'] = $copyright;

foreach($callNews as $keycallNews => $valuecallNews){
	$valImgNewsDb = fileinclude($valuecallNews['pic'],'pictures',$valuecallNews['masterkey'],'link');
	
	if($valuecallNews[11]=='file'){
		$valDownloadFunc = fileinclude($valuecallNews[13],'file',$valuecallNews[1],'download');
		$link = $linkRSSDetail.'/'. $valDownloadFunc."&amp;n=". $valuecallNews[8]."&amp;t=".encodeStr('md_dwn')."";
	}else{
		$link = $valuecallNews[12];
	}
	
    $DataArray['channel']['item'][$keycallNews]['title'] = $valuecallNews['subject'];
    $DataArray['channel']['item'][$keycallNews]['description'] = $valuecallNews['title'];
    $DataArray['channel']['item'][$keycallNews]['link'] = $link;
    //$DataArray['channel']['item'][$keycallNews]['enclosure '] = $valImgNewsDb;
    $DataArray['channel']['item'][$keycallNews]['pubDate'] = $valuecallNews['credate'];
}
echo json_encode($DataArray);
// print_pre($DataArray);
