<?php 

if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {

} else {
    $langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:setOffice"] = "ข้อมูลการตั้งค่าระบบจัดการเว็บไซต์";
    $langMod["txt:setOfficeDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าระบบจัดการเว็บไซต์";

    $langMod["txt:set"] = "ข้อมูลการตั้งค่าเว็บไซต์";
    $langMod["txt:setDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod["txt:about"] = "ข้อมูลข้อความของระบบ";
    $langMod["txt:aboutDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod["txt:seminar"] = "ข้อมูลข้อความสัมมนา";
    $langMod["txt:seminarDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod["txt:info"] = "ข้อมูลการติดต่อ";
    $langMod["txt:infoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการติดต่อหน้าเว็บไซต์ของคุณ";

    /* by nut 02-03-17 */
    $langMod["txt:setSocial"] = "ข้อมูลโซเชียลมีเดีย";
    $langMod["txt:setSocialDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod["social:link"] = "ชื่อ URL ";
    $langMod["social:fb"] = "Facebook";
    $langMod["social:tw"] = "Twitter";
    $langMod["social:yt"] = "Youtube";
    $langMod["social:li"] = "Line";
    $langMod["social:ig"] = "Instagram";
    $langMod["social:lk"] = "Link";
    // $langMod["social:lk"] = "Linkedin";
    $langMod["social:gg"] = "Google";
    $langMod["social:mail"] = "Email";
	$langMod["social:ap"] = "Application";
	
	$langMod["txt:app"] = "ข้อมูลแอปพลิเคชัน";
	$langMod["txt:appDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";


    $langMod["social:note"] = "หมายเหตุ : กรุณากรอกชื่อ URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น"."<br>"."กรณีไม่มีชื่อ URL ให้ใส่เครื่องหมาย #";

    /* by nut 27-03-17 */

    $langMod['info:title'] = "ข้อมูลพื้นฐานทั่วไป";
    $langMod['info:titlede'] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod['info:address'] = "ที่อยู่ ";
    $langMod['info:tel'] = "เบอร์โทรศัพท์ ";
    $langMod["info:telde"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 022985735 ห้ามมีอักขระหรืออักษรใดๆ";
    $langMod["info:telde2"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 012-234-345 ต่อ 123 หรือ 022985735";
    $langMod['info:fax'] = "เบอร์โทรสาร ";
    $langMod["info:faxde"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 022985735 ห้ามมีอักขระหรืออักษรใดๆ";
    $langMod['info:email'] = "อีเมล์ ";

    $langMod['info:googlemap'] = "แผนที่ googlemap ";
    $langMod["info:googlemapde"] = "ให้ทำการ copy ละติจูด,ลองจิจูด ในหน้าของ google map มาใส่เพื่อใช้เป็นการตั้งค่า <a href='https://www.google.com/maps/' target='_blank'>Google Map</a>";
    $langMod['info:latiture'] = "ละติจูด";
    $langMod['info:longtiture'] = "ลองจิจูด";
    $langMod["info:picaddress"] = "รูปภาพแผนที ";

      $langMod["info:qr"] = "QR code";
      $langMod["info:pichotline"] = "ไอคอนสายด่วน";
      $langMod["info:pichotlineH"] = "ไอคอนสายด่วน Header";
    $langMod['info:googleanalysis'] = "googleanalysis";
    $langMod["info:googleanalysisde"] = "นำโค้ดที่ได้รับจาก google anlysis มาใส่";
    $langMod["info:hotline"] = "Call Center ";
    $langMod["info:hotlinede"] = "รูปแบบในการกรอกเบอร์ Call Center : 1310  ห้ามมีอักขระหรืออักษรใดๆ";

    $langMod["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthReal . "x" . $sizeHeightReal . " พิกเซล";

    /* end nut */

    $langMod["tit:email"] = "อีเมล์";
    $langMod["tit:subject"] = "ชื่อระบบไทย";
    $langMod["tit:tel"] = "เบอร์โทรศัพท์";
    $langMod["tit:by"] = "ผู้ติดต่อ";
    $langMod["tit:mgs"] = "ข้อความ";
    $langMod["tit:address"] = "ที่อยู่";
    $langMod["tit:no"] = "ลำดับ";

    $langMod["ats:email"] = "อีเมล์ซ้ำกับที่มีอยู่ในระบบแล้ว";

    $langMod["inp:seotitle"] = "Tag Title ";
    $langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seodes"] = "Tag Description ";
    $langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seokey"] = "Tag Keywords ";
    $langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

    $langMod["ab:subject"] = "ชื่อระบบ ";
    $langMod["ab:title"] = "ชื่อระบบ ";
    $langMod["ab:titleEn"] = "คำบรรยายภาษาอังกฤษ";
    $langMod["ab:titleNo"] = "คำบรรยาย";

    $langMod["txt:subjectOffice"] = "ชื่อระบบ";
    $langMod["txt:titleOffice"] = "คำบรรยายระบบ";

    $langMod["txt:app"] = "ข้อมูลแอปพลิเคชัน";
    $langMod["txt:appDe"] = "ข้อมูลส่วนนี้คือส่วนกำหนดลิงค์แอปพลิเคชันในเว็บไซต์ของคุณ";
    $langMod["txt:apple"] = "App Store(iOS)";
    $langMod["txt:android"] = "Google Play Store(Android)";


    $langMod["ab:office"] = "ชื่อองค์กร";

     $langMod["txt:slogan"] = "ข้อมูลสโลแกน";
     $langMod["txt:sloganDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าสโลแกนในเว็บไซต์ของคุณ";
     $langMod["ab:slogan1"] = "โครงการ";
     $langMod["ab:slogan2"] = "ข่าวสารและโปรโมชั่น";
     $langMod["ab:slogan3"] = "ดีแลนด์ แฟมิลี่";
     $langMod["ab:slogan4"] = "ข้อมูลบริษัท";
     $langMod["ab:slogan5"] = "CARE to inspire";
     $langMod["ab:slogan6"] = "ร่วมงานกับเรา";
     $langMod["ab:slogan7"] = "ติดต่อเรา";

     $langMod["set:open"] = "เวลาเปิด/ปิดทำการ";
     $langMod["info:faction"] = "สำนักงาน / ฝ่าย";
     $langMod["info:factiontel"] = "เบอร์โทรศัพท์";
   // $langMod = checkpageText($langMod);
     $langMod["txt:oneaccount"] = 'ข้อมูล URL One Account';
     $langMod["txt:oneaccountDe"] = 'ข้อมูลส่วนนี้คือส่วนกำหนด URL One Account';
    $langMod["social:oneaccount"] = "One Account";

    $langMod["txt:pdpa"] = 'ข้อมูล URL PDPA';
    $langMod["txt:pdpaDe"] = 'ข้อมูลส่วนนี้คือส่วนกำหนด URL PDPA';
    $langMod["social:pdpa"] = "PDPA";
    $langMod["social:expdpa"] = "อายุการใช้งาน Cookie (วัน)";
    $langMod["txt:expdpa"] = "อายุการใช้งานต้องมากกว่าหรือเท่ากับ 1 วัน";
}
?>
