<?php
require _DIR . '/front/libs/vendor/autoload.php'; #load Ribary

$jsonReturn = null;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

$core_smtp_title = "ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์";

$mail = new PHPMailer();
$mail->isSMTP();
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->CharSet = "utf-8";
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';
$email = 'kmteam.dmsc@gmail.com'; //gmail ของผู้ส่ง
$clientId = '442116138851-b3aopooe4b9b37hjdb0i1bsddjjl3fto.apps.googleusercontent.com'; //ClienId ที่ได้จาก Google console
$clientSecret = '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'; //ClienSecret ที่ได้จาก Google console
// $refreshToken = '1//0gNIzPRHn7kPDCgYIARAAGBASNwF-L9IrOe0SIyIEErzf-zsK5ftX9l1gn8HAXjMFoWZLvzHIdzUALco4RlrB7tgfqK1J6DhHYMA'; // refresgToken
$refreshToken = '1//0geXY8URCEcuHCgYIARAAGBASNwF-L9IryeI4PgK4gWxk_FiwGYBPkkhosJO72KGPEegg4n6Xjsc7sZCIuWVQE0FCMQUmGtEYg7A'; // refresgToken
$provider = new Google(
[
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]
);
$mail->setOAuth(
new OAuth(
    [
    'provider' => $provider,
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'refreshToken' => $refreshToken,
    'userName' => $email,
    ]
)
);
$mail->setFrom($mailFrom, $core_smtp_title); //ชื่อผู้ส่ง กับ Email ผู้ส่ง
$mail->addAddress($mailTo); //ส่งถึงใคร
$mail->isHTML(true);
$mail->Subject = $subjectMail; // หัวข้อเรื่อง
$mail->Body    = $messageMail; // ตัว Body ของ Gmail
if ($mail->Send()) {
    $valSendMailStatus = 1;
} else {
    $valSendMailStatus = 0;
}
