<?php

function callSettingMap()
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
    " . $config['setting']['db'] . "." . $config['setting']['db'] . "_lastdate as lastdate

    
  
    FROM
    " . $config['setting']['db'] . "
    WHERE
    " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey = '" . $config['setting']['masterkey'] . "' 
    ";



    $result = $db->execute($sql);

    $SettingMainSite = array();
    $SettingMainSite['social'] = unserialize($result->fields['social']);
    $SettingMainSite['config'] = unserialize($result->fields['config']);

    $SettingContact = array();
    $SettingContact['config'] = unserialize($result->fields['config']);
    $SettingContact['datail'] = $result->fields['addresspic'];
    $SettingContact['masterkey'] = $result->fields['masterkey'];
    // print_pre($SettingContact);
    
    // $_SESSION['settingpage'] = serialize($result);
    // $_SESSION['settingMainSite'] = serialize($SettingMainSite);

    return $SettingContact;
}

function callMailContactUs()
{
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    // print_pre($url);
    $sql = "SELECT
    " . $config['contact']['mail'] . "." . $config['contact']['mail'] . "_email as email
  
    FROM
    " . $config['contact']['mail'] . "
    WHERE
    " . $config['contact']['mail'] . "." . $config['contact']['mail'] . "_key = '" . $config['contact']['masterkey'] . "' 
    ";


	//print_pre($sql);
    $result = $db->execute($sql);

    return $result;
}

/* ############################################### */

function loadSendEmailToContact($mailTo, $mailFrom = null, $subjectMail = null, $messageMail = null)
{
    /* ############################################### */

    // require_once('phpmailer/class.phpmailer.php');

    // $core_smtp_host = "mail.sakolgroup.co.th";
    // $core_smtp_port = "587";
    // $core_smtp_username = "info@sakolgroup.co.th";
    // $core_smtp_password = "oruFNIf1";

    // // $core_smtp_host = "ssl://smtp.gmail.com";
    // // $core_smtp_port = "465";
    // // $core_smtp_username = "dev@wewebplus.com";
    // // $core_smtp_password = "wewebadmin";

    // $core_send_email = $mailFrom;
    // $core_smtp_title = "Sakol group";
    // $core_smtp_charSet = "utf-8";
    // $mail = new PHPMailer();
    // $mail->IsSMTP();
    // $mail->IsHTML(true); //หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
    // $mail->SMTPAuth = true;
    // $mail->CharSet = $core_smtp_charSet; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8
    // $mail->Host = $core_smtp_host; //กำหนดค่าเป็นที่ gmail ได้เลยครับ
    // $mail->Port = $core_smtp_port; // 25 กำหนด port เป็น 465 ตามที่ google บอกครับ
    // $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
    // $mail->Username = $core_smtp_username; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
    // $mail->Password = $core_smtp_password; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
    // $mail->From = $core_send_email; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
    // $mail->FromName = $core_smtp_title; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
    // $mail->Subject = $subjectMail;
    // $mail->ClearAddresses();
    // $mail->AddAddress($mailTo);
    // $mail->Body = $messageMail;

    // $mail->Send();

    // $valSendMailStatus = 1;

    $core_smtp_host = "ssl://smtp.gmail.com";
    $core_smtp_port = "465";
    $core_smtp_username = "dev.mail@wewebplus.com";
    $core_smtp_password = "dev.mail1234";
    $core_send_email = $mailFrom;
    $core_smtp_title = "DMSC KIS";
    $core_smtp_charSet = "utf-8";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(true); //หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
    $mail->CharSet = $core_smtp_charSet; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8
    $mail->Host = $core_smtp_host; //กำหนดค่าเป็นที่ gmail ได้เลยครับ
    $mail->Port = $core_smtp_port; // 25 กำหนด port เป็น 465 ตามที่ google บอกครับ
    $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
    $mail->Username = $core_smtp_username; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
    $mail->Password = $core_smtp_password; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
    $mail->From = $core_send_email; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
    $mail->FromName = $core_smtp_title; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
    $mail->Subject = $subjectMail;
    $mail->ClearAddresses();
    $mail->AddAddress($mailTo);

    foreach($bcclist as $key => $to){
        $mail->AddBCC($to , 'admin');  
    }
    
    $mail->Body = $messageMail;

     $valSendMailStatus = $mail->Send();

    //$valSendMailStatus = 1;

    return $valSendMailStatus;
}
