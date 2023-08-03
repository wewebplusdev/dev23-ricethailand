<?php 

if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {

} else {

    $langMod["meu:group"] =  "กลุ่ม".getNameMenu($_REQUEST["menukeyid"]);
    $langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);
    $langMod["meu:Complaints"] =getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:titleaddg"] = "สร้างข้อมูล" . $langMod["meu:group"];
    $langMod["txt:titleeditg"] = "แก้ไขข้อมูล" . $langMod["meu:group"];
    $langMod["txt:titleviewg"] = "แสดงผลข้อมูล" . $langMod["meu:group"];
    $langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล" . $langMod["meu:group"];


    $langMod["txt:subject"] = "ข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:subjectDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลเนื้อหาในหน้ารวมข้อมูลทั้งหมดของเมนูนี้บนเว็บไซต์ของคุณ";
    $langMod["txt:title"] = "ข้อมูลรายละเอียด" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["viw:titleDe"] = "ข้อมูลรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
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
    $langMod["txt:video"] = "ข้อมูลวิดีโอ ";
    $langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
    $langMod["txt:pic"] = "รูปภาพประกอบ";
    $langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";


    $langMod["inp:seotitle"] = "ผู้ติดต่อ ";
    $langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seodes"] = "เลขบัตรประจำตัวประชาชน ";
    $langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seokey"] = "ที่อยู่ ";
    $langMod["inp:seokey1"] = "อีเมล์ ";
    $langMod["inp:seokey2"] = "เบอร์โทรศัพท์ ";
    $langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["txt:titleedits"]= "แก้ไขอีเมล์แจ้งเตือน";

    $langMod["inp:album"] = "เลือกรูปภาพ";
    $langMod["inp:chfile"] = "เปลี่ยนชื่อเอกสารแนบ";
    $langMod["inp:sefile"] = "เลือกเอกสารแนบ";
    $langMod["inp:notefile"] = "หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
    $langMod["inp:notedate"] = "หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
    $langMod["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthPic . "x" . $sizeHeightPic . " พิกเซล";
    $langMod["inp:notealbum"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthAlbum . "x" . $sizeHeightAlbum . " พิกเซล";

    $langMod["tit:subject"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"])." ";
    $langMod["tit:subject_name"] = "ชื่อผู้" . getNameMenu($_REQUEST["menukeyid"])." ";
    $langMod["tit:subjectg"] = "ชื่อ" . $langMod["meu:group"]." ";
    $langMod["tit:sdate"] = "วันเริ่มต้น ";
    $langMod["tit:edate"] = "วันสิ้นสุด ";
    $langMod["tit:title"] = "รายละเอียด ";
    $langMod["tit:typevdo"] = "ประเภทวิดีโอ";
    $langMod["tit:linkvdo"] = "เว็บไซต์ Youtube";
    $langMod["tit:uploadvdo"] = "อัพโหลดไฟล์";
    $langMod["tit:linkvdonote"] = "หมายเหตุ : เฉพาะชื่อ URL youtube.com เท่านั้น";
    $langMod["tit:uploadvdonote"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .flv, .wmv, .mp3, .wav, .wma, .avi และ .mpeg เท่านั้น";
    $langMod["tit:noteg"] = "คำอธิบาย ";
    $langMod["tit:selectg"] = "เลือก" . $langMod["meu:group"];
    $langMod["op:selectg"] = $langMod["meu:group"]." (ทั้งหมด) ";
    $langMod["tit:selectgn"] = $langMod["meu:group"]." ";
    $langMod["txt:subjectg"] = "ข้อมูล" . $langMod["meu:group"];
    $langMod["txt:subjectgDe"] = "โปรดป้อนข้อมูล" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

    $langMod["file:type"] = "ประเภท";
    $langMod["file:size"] = "ขนาด";
    $langMod["file:download"] = "ดาวน์โหลด";

    $langMod["home:detail"] = "อ่านรายละเอียด";

    $langMod["tit:view"] = "เข้าชม ";
    $langMod["tit:inpName"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]);

    $langMod["tit:play"] = "การแสดงผล ";
    $langMod["tit:playauto"] = "เล่นอัตโนมัติ";
    $langMod["tit:playmanual"] = "เล่นเมื่อคลิก";
    $langMod["tit:tltle1"] = "แก้ไขกลุ่มแจ้งเหตุทางทะเลและชายฝั่ง";
    $langMod["tit:email1"] = "อีเมล์";

    $langMod["tit:contact"]="ข้อมูลการติดต่อกลับ";

    $txt_mod["add:contangroup"] ="กลุ่ม".getNameMenu($_POST["menukeyid"])."";
    $txt_mod["txt:Subject"] = "หัวข้อ".getNameMenu($_POST["menukeyid"])."";
    $txt_mod["view:contanttitle"] ="แสดง".getNameMenu($_POST["menukeyid"])." ";
    $txt_mod["view:contantname"] ="ชื่อผู้ติดต่อ";
    $txt_mod["view:contanttitle"] ="รายละเอียด";
    $txt_mod["view:contantaddress"] ="ที่อยู่";
    //$txt_mod["view:contantemail"] ="อีเมล์";
    $txt_mod["view:contanttel"] ="เบอร์โทรศัพท์";
    $txt_mod["txt:credate"] = "วันที่สร้าง";
    $txt_mod["txt:status"] = "สถานะ";

    $langMod["txt:maildata"] = "ข้อมูล".$langMod["tit:email1"];
    $langMod["txt:maildataDe"]="ข้อมูล".$langMod["tit:email1"]."แจ้งเรื่องร้องเรียน เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["txt:setDe"] ="กรุณากรอกข้อมูลอีเมล์เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["ats:email"] ="อีเมล์ซ้ำกับที่มีอยู่ในระบบแล้ว";
    $langMod["txt:ContactDe"]="ข้อมูลการติดต่อกลับเพื่อใช้ในการติดต่อกลับหน้าเว็บไซต์ของคุณ";
    $langMod["tit:name"] = "ชื่อผู้ติดต่อ";
    $langMod["tit:subject_table"] = "หัวข้อติดต่อเรา ";

    $langMod = checkpageText($langMod);

}
?>
