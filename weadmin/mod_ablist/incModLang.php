<?php 

if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {

} else {
    $langMod["meu:group"] = "กลุ่ม" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:titleaddg"] = "สร้างข้อมูล" . $langMod["meu:group"];
    $langMod["txt:titleeditg"] = "แก้ไขข้อมูล" . $langMod["meu:group"];
    $langMod["txt:titleviewg"] = "แสดงผลข้อมูล" . $langMod["meu:group"];
    $langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล" . $langMod["meu:group"];

    $langMod["txt:subject"] = "ข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:subjectDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["txt:title"] = "ข้อมูลรายละเอียด" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

    $langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ ";
    $langMod["txt:attfileDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";
    $langMod["txt:seo"] = "ข้อมูลรองรับการค้นหาของ Search Engine";
    $langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการรองรับการค้นหาของ Search Engine ไม่ว่าจะเป็น Google หรือ Yahoo เป็นต้น";

    $langMod["inp:chfile"] = "เปลี่ยนชื่อเอกสารแนบ";
    $langMod["inp:sefile"] = "เลือกเอกสารแนบ";
    $langMod["inp:notefile"] = "หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";

    $langMod["inp:seotitle"] = "Tag Title ";
    $langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seodes"] = "Tag Description ";
    $langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seokey"] = "Tag Keywords ";
    $langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

    $langMod["tit:subject"] = "หัวข้อ" . getNameMenu($_REQUEST["menukeyid"]);

    $langMod["file:type"] = "ประเภท";
    $langMod["file:size"] = "ขนาด";
    $langMod["file:download"] = "ดาวน์โหลด";

    $langMod["home:detail"] = "อ่านรายละเอียด";

    $langMod["tit:selectg"] = "เลือก" . $langMod["meu:group"];
    $langMod["op:selectg"] = $langMod["meu:group"]." (ทั้งหมด) ";
    $langMod["tit:selectgn"] = "ชื่อ" . $langMod["meu:group"]." ";
    $langMod["txt:subjectg"] = "ข้อมูล" . $langMod["meu:group"];
    $langMod["viw:subjectgDe"] = "ข้อมูลชื่อ" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["txt:subjectgDe"] = "โปรดป้อนชื่อ" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["tit:inpName"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"])." ";
    $langMod["tit:noteg"] = "คำอธิบาย ";

    $langMod["tit:type"] = "การแสดงผล";
    $langMod["tit:typeContent"] = "Content";
    $langMod["tit:typeChart"] = "Chart";
    $langMod["tit:typeTree"] = "Tree";

    $langMod["txt:chart"] = "การแสดงผลแบบ Chart";
    $langMod["txt:chartDe"] = "เนื้อหาจะทำการแสดงแบบ chart";

    $langMod = checkpageText($langMod);

    $langMod["txt:groupType"] = "ข้อมูลประเภทรายละเอียด";
    $langMod["txt:groupTypeDe"] = "กรุณากรอกส่วนที่ใช้ในกำหนดรายละเอียดการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์";

    $langMod["tit:groupType"] = "ประเภทรายละเอียด";

    $langMod["tit:linkvdo"] ="ชื่อ URL ";
    $langMod["edit:linknote"] ="หมายเหตุ : กรุณากรอกชื่อ URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น"."<br>"."กรณีไม่มีชื่อ URL ให้ใส่เครื่องหมาย #";
    
    $langMod["txt:album"] = "ข้อมูลอัลบั้มภาพ";
    $langMod["txt:albumDe"] = "ข้อมูลอัลบั้มภาพ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้ ในรูปแบบภาพพสไลด์บนเว็บไซต์ของคุณ";
    $langMod["txt:video"] = "ข้อมูลวิดีโอ";
    $langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
    $langMod["txt:pic"] = "รูปภาพประกอบ";
    $langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";
    $langMod["inp:album"] ="เลือกรูปภาพ";
    $langMod["inp:chfile"] ="เปลี่ยนชื่อเอกสารแนบ";
    $langMod["inp:sefile"] ="เลือกเอกสารแนบ";
    $langMod["inp:notefile"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ |weweb_file| เท่านั้น เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
    $langMod["inp:notedate"] ="หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
    $langMod["inp:notepic"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ |weweb_pic| เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthPic."x".$sizeHeightPic." พิกเซล";
    $langMod["inp:notealbum"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthAlbum."x".$sizeHeightAlbum." พิกเซล";

}
?>
