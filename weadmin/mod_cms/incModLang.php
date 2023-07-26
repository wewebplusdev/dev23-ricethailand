<?php  
if($_SESSION[$valSiteManage."core_session_language"]=="Eng"){
	$langMod["meu:group"] = "group " .getNameMenu($_REQUEST["menukeyid"]);
$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

$langMod["txt:titleadd"] = "" .getNameMenu($_REQUEST["menukeyid"])." New";
$langMod["txt:titleedit"] = "" .getNameMenu($_REQUEST["menukeyid"])." Edit";
$langMod["txt:titleview"] = "" .getNameMenu($_REQUEST["menukeyid"])." Display";
$langMod["txt:sortpermis"] = "" .getNameMenu($_REQUEST["menukeyid"])." Sort";

$langMod["txt:titleaddg"] = "". $langMod["meu:group"]." New";
$langMod["txt:titleeditg"] = "". $langMod["meu:group"]." Edit";
$langMod["txt:titleviewg"] = "". $langMod["meu:group"]." Display";
$langMod["txt:sortpermisg"] = "". $langMod["meu:group"]." Sort";

    $langMod["viw:subjectgDe"] = "ข้อมูลชื่อ" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

$langMod["txt:subject"] = "" .getNameMenu($_REQUEST["menukeyid"])." Info";
$langMod["txt:subjectDe"] = "Please enter a selection, group, title and subtitle. To use to display content on the page, include all of this menu information on your site. ";
$langMod["txt:title"] = "Detailed information " .getNameMenu($_REQUEST["menukeyid"]);
$langMod["txt:titleDe"] = "Please enter details. For use in display on your website. ";
$langMod["txt:attfile"] = "Attachment information";
$langMod["txt:attfileDe"] = "Attachment information To use to display the attachment of this content. In the form of downloading documents stored on a computer on your website. ";
$langMod["txt:seo"] = "Support for Search Engine Search";
$langMod["txt:seoDe"] = "This information is used to support search engines such as Google or Yahoo.";
$langMod["txt:date"] = "Set display date";
$langMod["txt:dateDe"] = "This is the section used to set the display date. For use in display on your website. ";

$langMod["txt:datec"] = "Set creation date on display";
$langMod["txt:datecDe"] = "This is the section used to set the creation date. For use in display on your website. ";

$langMod["txt:album"] = "Photo album information";
$langMod["txt:albumDe"] = "Photo album information To use to display this image of the content. In slideshows format on your website ";
$langMod["txt:video"] = "Video Info";
$langMod["txt:videoDe"] = "Video information For use in video rendering of this content. In video player format on your website. ";
$langMod["txt:pic"] = "Image Gallery";
$langMod["txt:picDe"] = "Image data includes For use in displaying images of this content. ";


$langMod["inp:seotitle"] = "Title Tag";
$langMod["inp:seotitlenote"] = "Note: Content will be displayed in the Search Topics section of the Search Engine (Google, Yahoo).";
$langMod["inp:seodes"] = "Tag Description";
$langMod["inp:seodesnote"] = "Note: Content will be displayed in the Search Topics section of the Search Engine (Google, Yahoo)";
$langMod["inp:seokey"] = "Tag Keywords";
$langMod["inp:seokeynote"] = "Note: Search words or phrases in Search Engine (Google, Yahoo)";

$langMod["inp:album"] = "Select photo";
$langMod["inp:chfile"] = "Rename attachment";
$langMod["inp:sefile"] = "Select attachment";
$langMod["inp:notefile"] = "Note: Please select a file with a size that is not too large. This is because large files will result in delays in uploading files. ";
$langMod["inp:notedate"] = "Note: If you do not want to specify a start date And the end date of this content. Please do not fill out any information. ";
$langMod["inp:notepic"] = "Note: Please upload only .jpg, .png and .gif files, the size of the image should not exceed 2 Mb and the image provided in the upload should have a proportional ". $sizeWidthPic." X ". $sizeHeightPic." Pixels ";
$langMod["inp:notealbum"] = "Note: Please upload only .jpg, .png and .gif files, the image size should not exceed 2 Mb. ". $sizeWidthAlbum." X ". $sizeHeightAlbum." Pixels ";

$langMod["tit:subject"] = "Name " .getNameMenu($_REQUEST["menukeyid"]);
$langMod["tit:subjectg"] = "Name " .$langMod["meu:group"];
$langMod["tit:sdate"] = "Start date";
$langMod["tit:edate"] = "End date";
$langMod["tit:title"] = "Subtitle";
$langMod["tit:typevdo"] = "Video type";
$langMod["tit:linkvdo"] = "link URL";
$langMod["tit:uploadvdo"] = "Upload a file";
$langMod["tit:linkvdonote"] = "Note: The only link is the youtube.com URL.";
$langMod["tit:uploadvdonote"] = "Note: Please upload only .flv, .wmv, .mp3, .wav, .wma, .avi, and .mpeg files.";
$langMod["tit:noteg"] = "Note";
$langMod["tit:selectg"] = "Select ". $langMod["meu:group"];
$langMod["tit:selectgn"] = $langMod["meu:group"];
$langMod["txt:subjectg"] = "". $langMod["meu:group"]." Info";
$langMod["txt:subjectgDe"] = "Please enter a name ". $langMod["meu:group"]. "To be used for display on your site.";

$langMod["file: type"] = "Type";
$langMod["file: size"] = "Size";
$langMod["file: download"] = "Download";

$langMod["home: detail"] = "Read details";

$langMod["tit:view"] = "Visit";
$langMod["tit:inpName"] = "Name " .getNameMenu($_REQUEST["menukeyid"]);
}else{

    $langMod["viw:subjectgDe"] = "ข้อมูลชื่อ" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["meu:group"] = "กลุ่ม".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleadd"] = "สร้างข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleedit"] = "แก้ไขข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleview"] = "แสดงผลข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleaddg"] = "สร้างข้อมูล".$langMod["meu:group"];
		$langMod["txt:titleeditg"] = "แก้ไขข้อมูล".$langMod["meu:group"];
		$langMod["txt:titleviewg"] = "แสดงผลข้อมูล".$langMod["meu:group"];
		$langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล".$langMod["meu:group"];


		$langMod["txt:groupType"] = "ข้อมูลประเภทรายละเอียด";
		$langMod["txt:groupTypeDe"] = "กรุณากรอกส่วนที่ใช้ในกำหนดรายละเอียดการแสดงผลข่าว เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์";
	
		$langMod["tit:groupType"] = "ประเภทรายละเอียด";

		$langMod["txt:subject"] = "ข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subjectDe"] = "โปรดป้อนเลือกกลุ่ม, ชื่อและคำบรรยาย เพื่อใช้ในการแสดงผลเนื้อหาในหน้ารวมข้อมูลทั้งหมดของเมนูนี้บนเว็บไซต์ของคุณ";
		$langMod["txt:title"] = "ข้อมูลรายละเอียด".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ";
		$langMod["txt:attfileDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";
		$langMod["txt:seo"] = "ข้อมูลรองรับการค้นหาของ Search Engine";
		$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการรองรับการค้นหาของ Search Engine ไม่ว่าจะเป็น Google หรือ Yahoo เป็นต้น";
		$langMod["txt:date"] = "กำหนดวันที่ในการแสดงผล";
		$langMod["txt:dateDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["txt:datec"] = "กำหนดวันที่สร้างในการแสดงผล";
		$langMod["txt:datecDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่สร้างในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["txt:album"] = "ข้อมูลอัลบั้มภาพ";
		$langMod["txt:albumDe"] = "ข้อมูลอัลบั้มภาพ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้ ในรูปแบบภาพพสไลด์บนเว็บไซต์ของคุณ";
		$langMod["txt:video"] = "ข้อมูลวิดีโอ";
		$langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
		$langMod["txt:pic"] = "รูปภาพประกอบ";
		$langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";


		$langMod["inp:seotitle"] ="Tag Title";
		$langMod["inp:seotitlenote"] ="หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
		$langMod["inp:seodes"] ="Tag Description";
		$langMod["inp:seodesnote"] ="หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
		$langMod["inp:seokey"] ="Tag Keywords";
		$langMod["inp:seokeynote"] ="หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

		$langMod["inp:album"] ="เลือกรูปภาพ";
		$langMod["inp:chfile"] ="เปลี่ยนชื่อเอกสารแนบ";
		$langMod["inp:sefile"] ="เลือกเอกสารแนบ";
		$langMod["inp:notefile"] ="หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
		$langMod["inp:notedate"] ="หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
		$langMod["inp:notepic"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ |weweb_pic| เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthPic."x".$sizeHeightPic." พิกเซล";
		$langMod["inp:notealbum"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthAlbum."x".$sizeHeightAlbum." พิกเซล";

		$langMod["tit:subject"] ="ชื่อ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:subjectg"] ="ชื่อ".$langMod["meu:group"];
		$langMod["tit:sdate"] ="วันเริ่มต้น";
		$langMod["tit:edate"] ="วันสิ้นสุด";
		$langMod["tit:title"] ="คำบรรยาย";
		$langMod["tit:typevdo"] ="ประเภทวิดีโอ";
		$langMod["tit:linkvdo"] ="ลิงค์ (URL)";
		$langMod["tit:uploadvdo"] ="อัพโหลดไฟล์";
		$langMod["tit:linkvdonote"] ="หมายเหตุ : ลิงค์ที่ใช่ คือ URL youtube.com เท่านั้น";
		$langMod["tit:uploadvdonote"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .flv, .wmv, .mp3, .wav, .wma, .avi และ .mpeg เท่านั้น";
		$langMod["tit:noteg"] ="หมายเหตุ";
		$langMod["tit:selectg"] ="เลือก".$langMod["meu:group"];
		$langMod["tit:selectgn"] =$langMod["meu:group"];
		$langMod["txt:subjectg"] = "ข้อมูล".$langMod["meu:group"];
		$langMod["txt:subjectgDe"] = "โปรดป้อนชื่อ".$langMod["meu:group"]." เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["file:type"] ="ประเภท";
		$langMod["file:size"] ="ขนาด";
		$langMod["file:download"] ="ดาวน์โหลด";

		$langMod["home:detail"] ="อ่านรายละเอียด";

		$langMod["tit:view"] ="เข้าชม";
		$langMod["tit:inpName"] = "ชื่อ".getNameMenu($_REQUEST["menukeyid"]);

		$langTxt["mg:pin"] = "Pin";

		$langTxt["mg:ribbon"] = "Ribbon";

		$langMod["txt:picG"] = "รูปภาพประกอบ";
		$langMod["txt:picGDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพไอคอนของเนื้อหานี";
		$langMod["inp:noteG"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg,.png และ .gif เท่านั้น, รูปภาพควรเป็นสีขาว และ ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 580 x 295 พิกเซล";
		$langMod["inp:noteG2"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .png เท่านั้น, รูปภาพควรเป็นสีเข้ม และ ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 580 x 295 พิกเซล";
		$langTT["us:inputpicselect1"] = "เลือกรูปภาพสีขาว";
		$langTT["us:inputpicselect2"] = "เลือกรูปภาพสีเข้ม";

                $langMod["txt:project"] = "โครงการที่เกี่ยวข้อง";
                $langMod["txt:projectDe"] = "ข้อมูลส่วนนี้เป็นข้อมูลโครงการที่เกี่ยวข้อง";
                $langMod["txt:projectselect"] = "เลือกโครงการ";

$langMod["txt:upcoming"] = "Pin Contant"; 
}
?>
