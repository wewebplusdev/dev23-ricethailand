<?php  
$check_login_status = 1;
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

// if(!empty($_POST['g-recaptcha-response']) || true) // ให้ true ผ่านเงื่อนไขนี้ไปก่อน
if(!empty($_POST['g-recaptcha-response'])) // ให้ true ผ่านเงื่อนไขนี้ไปก่อน
{
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secert.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
        // if($_POST['inputkeyCode']==$_SESSION['security_code']){
            $validateCode = sendEmail();
            $sql = "SELECT MAX(".$core_tb_staff_tmp."_order) FROM ".$core_tb_staff_tmp;
            $Query=wewebQueryDB($coreLanguageSQL,$sql);
            $Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
            $maxOrder = $Row[0]+1;
            
            $insert=array();
            $insert[$core_tb_staff_tmp."_groupid"] = "'2'";
            $insert[$core_tb_staff_tmp."_storeid"] = "'".changeQuot($_REQUEST['inputStoreID'])."'";
            $insert[$core_tb_staff_tmp."_username"] = "'".changeQuot($_REQUEST['inputUserName'])."'";
            $insert[$core_tb_staff_tmp."_password"] = "'".encodeStr(changeQuot($_REQUEST['inputPass']))."'";
            $insert[$core_tb_staff_tmp."_prefix"] = "'".changeQuot($_REQUEST['inputPrefix'])."'";
            if($_REQUEST['inputPrefix']=='Mr.'){
                $insert[$core_tb_staff_tmp."_gender"] = "'Male'";
            }else{
                $insert[$core_tb_staff_tmp."_gender"] = "'Female'";
            }
            $insert[$core_tb_staff_tmp."_fnamethai"] = "'".changeQuot($_REQUEST['inputfnamethai'])."'";
            $insert[$core_tb_staff_tmp."_lnamethai"] = "'".changeQuot($_REQUEST['inputlnamethai'])."'";
            $insert[$core_tb_staff_tmp."_fnameeng"] = "'".changeQuot($_REQUEST['inputfnameeng'])."'";
            $insert[$core_tb_staff_tmp."_lnameeng"] = "'".changeQuot($_REQUEST['inputlnameeng'])."'";
            
            $insert[$core_tb_staff_tmp."_position"] = "'".changeQuot($_REQUEST['inputPosirionUser'])."'";	
            $insert[$core_tb_staff_tmp."_usertype"] = "'".changeQuot($_REQUEST['inputTypeUser'])."'";	

            $insert[$core_tb_staff_tmp."_email"] = "'".changeQuot($_REQUEST['inputEmail'])."'";		
            $insert[$core_tb_staff_tmp."_address"] = "'".changeQuot($_REQUEST['inputlocation'])."'";
            $insert[$core_tb_staff_tmp."_telephone"] = "'".changeQuot($_REQUEST['inputtelephone'])."'";
            $insert[$core_tb_staff_tmp."_mobile"] = "'".changeQuot($_REQUEST['inputmobile'])."'";
            $insert[$core_tb_staff_tmp."_other"] = "'".changeQuot($_REQUEST['inputother'])."'";
            // $insert[$core_tb_staff_tmp."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
            // $insert[$core_tb_staff_tmp."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
            $insert[$core_tb_staff_tmp."_credate"] = "".wewebNow($coreLanguageSQL)."";
            $insert[$core_tb_staff_tmp."_lastdate"] = "".wewebNow($coreLanguageSQL)."";
            // $insert[$core_tb_staff_tmp."_unitid"] = "'".changeQuot($_REQUEST['inputFixid'])."'";
            // $insert[$core_tb_staff_tmp."_unitid_sub"] = "'".changeQuot($_REQUEST['inputFixSubid'])."'";
            $insert[$core_tb_staff_tmp."_agency"] = "'".changeQuot($_REQUEST['inputgroupAgency'])."'";
            $insert[$core_tb_staff_tmp."_active_status"] = "'".changeQuot($validateCode)."'";
            $insert[$core_tb_staff_tmp."_status"] = "'Enable'";
            $insert[$core_tb_staff_tmp."_order"] = "'".$maxOrder."'";
            $sql="INSERT INTO ".$core_tb_staff_tmp."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
            // print_pre($_REQUEST);
            // print_pre($sql);die;
            $Query=wewebQueryDB($coreLanguageSQL,$sql);	
            ?>
            <script language="JavaScript"  type="text/javascript">
                jQuery(".success-regis").show();
                jQuery(".form-default").hide();
                jQuery("#loadAlertLogin").hide();
                jQuery("#loadAlertLoginOA").hide();
                jQuery("#loadAlertreCaptcha").hide();
            </script>
            <?php  

        }
        else{
                ?>
                <script language="JavaScript"  type="text/javascript">
                    jQuery("#loadAlertLogin").show();
                    jQuery("#loadAlertLoginOA").hide();
                    jQuery("#loadAlertreCaptcha").hide();
                </script>
                <?php  
        }
}else{
    ?>
    <script language="JavaScript"  type="text/javascript">
        jQuery("#loadAlertreCaptcha").show();
        jQuery("#loadAlertLoginOA").hide();
        jQuery("#loadAlertLogin").hide();
    </script>
    <?php  
}


/* START FUNCTION SEND EMAIL */
function sendEmail(){
    // +7 day
    $datenow = date('Y-m-d');
    $date = strtotime($datenow);
    $date = strtotime("+7 day", $date);
    $date_result = date('Y-m-d',$date);
    $Expiredate = DateThai($date_result,1,'th','shot');
    // สร้างรหัสสุ่ม
    $arr_a_z = range( 'a' , 'z' );
    $arr_A_Z = range( 'A' , 'Z' );
    $arr_0_9 = range( 0 , 9 ) ; 
    $arr_a_9 = array_merge( $arr_a_z , $arr_A_Z , $arr_0_9 ) ; 
    $str_a_9 = implode( $arr_a_9 ) ; 
    $str_a_9 = str_shuffle( $str_a_9 ) ; 
    $member_verify_code = substr( $str_a_9 , 0 , 15 );
    // get path 
    // $getpathCoreWeadmin = getpathCoreWeadmin($_SERVER['REQUEST_URI']);
    $urlVerify = $_SERVER['HTTP_HOST']."/weadmin/user_action/verifyEmail.php?token=".$member_verify_code."";
    // set up form
    $to = $_REQUEST['inputEmail'];
    $subject = 'Confirm your account';
    $meg = "<!doctype html>
    <html>
      <head>
        <meta name='viewport' content='width=device-width' />
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Simple Transactional Email</title>
        <style>
          /* -------------------------------------
              GLOBAL RESETS
          ------------------------------------- */
          
          /*All the styling goes here*/
          
          img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; 
          }
    
          body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; 
          }
    
          table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
            table td {
              font-family: sans-serif;
              font-size: 14px;
              vertical-align: top; 
          }
    
          /* -------------------------------------
              BODY & CONTAINER
          ------------------------------------- */
    
          .body {
            background-color: #f6f6f6;
            width: 100%; 
          }
    
          /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
          .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; 
          }
    
          /* This should also be a block element, so that it will fill 100% of the .container */
          .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px; 
          }
    
          /* -------------------------------------
              HEADER, FOOTER, MAIN
          ------------------------------------- */
          .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%; 
          }
    
          .wrapper {
            box-sizing: border-box;
            padding: 20px; 
          }
    
          .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
          }
    
          .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%; 
          }
            .footer td,
            .footer p,
            .footer span,
            .footer a {
              color: #999999;
              font-size: 12px;
              text-align: center; 
          }
    
          /* -------------------------------------
              TYPOGRAPHY
          ------------------------------------- */
          h1,
          h2,
          h3,
          h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px; 
          }
    
          h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; 
          }
    
          p,
          ul,
          ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px; 
          }
            p li,
            ul li,
            ol li {
              list-style-position: inside;
              margin-left: 5px; 
          }
    
          a {
            color: #3498db;
            text-decoration: underline; 
          }
    
          /* -------------------------------------
              BUTTONS
          ------------------------------------- */
          .btn {
            box-sizing: border-box;
            width: 100%; }
            .btn > tbody > tr > td {
              padding-bottom: 15px; }
            .btn table {
              width: auto; 
          }
            .btn table td {
              background-color: #ffffff;
              border-radius: 5px;
              text-align: center; 
          }
            .btn a {
              background-color: #ffffff;
              border: solid 1px #3498db;
              border-radius: 5px;
              box-sizing: border-box;
              color: #3498db;
              cursor: pointer;
              display: inline-block;
              font-size: 14px;
              font-weight: bold;
              margin: 0;
              padding: 12px 25px;
              text-decoration: none;
              text-transform: capitalize; 
          }
    
          .btn-primary table td {
            background-color: #3498db; 
          }
    
          .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff; 
          }
    
          /* -------------------------------------
              OTHER STYLES THAT MIGHT BE USEFUL
          ------------------------------------- */
          .last {
            margin-bottom: 0; 
          }
    
          .first {
            margin-top: 0; 
          }
    
          .align-center {
            text-align: center; 
          }
    
          .align-right {
            text-align: right; 
          }
    
          .align-left {
            text-align: left; 
          }
    
          .clear {
            clear: both; 
          }
    
          .mt0 {
            margin-top: 0; 
          }
    
          .mb0 {
            margin-bottom: 0; 
          }
    
          .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; 
          }
    
          .powered-by a {
            text-decoration: none; 
          }
    
          hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0; 
          }
    
          /* -------------------------------------
              RESPONSIVE AND MOBILE FRIENDLY STYLES
          ------------------------------------- */
          @media only screen and (max-width: 620px) {
            table[class=body] h1 {
              font-size: 28px !important;
              margin-bottom: 10px !important; 
            }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
              font-size: 16px !important; 
            }
            table[class=body] .wrapper,
            table[class=body] .article {
              padding: 10px !important; 
            }
            table[class=body] .content {
              padding: 0 !important; 
            }
            table[class=body] .container {
              padding: 0 !important;
              width: 100% !important; 
            }
            table[class=body] .main {
              border-left-width: 0 !important;
              border-radius: 0 !important;
              border-right-width: 0 !important; 
            }
            table[class=body] .btn table {
              width: 100% !important; 
            }
            table[class=body] .btn a {
              width: 100% !important; 
            }
            table[class=body] .img-responsive {
              height: auto !important;
              max-width: 100% !important;
              width: auto !important; 
            }
          }
    
          /* -------------------------------------
              PRESERVE THESE STYLES IN THE HEAD
          ------------------------------------- */
          @media all {
            .ExternalClass {
              width: 100%; 
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%; 
            }
            .apple-link a {
              color: inherit !important;
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              text-decoration: none !important; 
            }
            #MessageViewBody a {
              color: inherit;
              text-decoration: none;
              font-size: inherit;
              font-family: inherit;
              font-weight: inherit;
              line-height: inherit;
            }
            .btn-primary table td:hover {
              background-color: #34495e !important; 
            }
            .btn-primary a:hover {
              background-color: #34495e !important;
              border-color: #34495e !important; 
            } 
          }
    
        </style>
      </head>
      <body class=''>
        <span class='preheader'>This is preheader text. Some clients will show this text as a preview.</span>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
          <tr>
            <td>&nbsp;</td>
            <td class='container'>
              <div class='content'>
    
                <!-- START CENTERED WHITE CONTAINER -->
                <table role='presentation' class='main'>
    
                  <!-- START MAIN CONTENT AREA -->
                  <tr>
                    <td class='wrapper'>
                      <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                        <tr>
                          <td>
                            <p style='font-size: 20px;'>ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์</p>
                            <p>การสมัครสมาชิกของคุณจะเสร็จสิ้น หลังจากยืนยันอีเมลของคุณจะทำให้สามารถเข้าใช้งานระบบได้อย่างสมบูรณ์ โปรดยืนยันอีเมลนี้ภายในวันที่ ". $Expiredate ." </p>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                              <tbody>
                                <tr>
                                  <td align='left'>
                                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                      <tbody>
                                        <tr>
                                          <td> <a href='http://".$urlVerify."' target='_blank'>ยืนยันการลงทะเบียน</a> </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <p>กรณีที่ปุ่มยืนยันไม่ทำงาน สามารถคัดลอกและวางลิงค์ด้านล่างนี้ลงในแถบที่อยู่ของ browser ของคุณ เพื่อยืนยันการลงทะเบียน:</p>
                            <p>http://".$urlVerify."</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
    
                <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->
    
                <!-- START FOOTER -->
                <div class='footer'>
                  <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td class='content-block'>
                        <span class='apple-link'> Department of Medical Sciences, Ministry of Public Health, Tivanond Road Nonthaburi 11000, Thailand</span>
                        
                      </td>
                    </tr>
                    
                  </table>
                </div>
                <!-- END FOOTER -->
    
              </div>
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>
    ";
    // send email
    $postRequest = array(
        'to' => $to,
        'sbj' => $subject,
        'meg' => $meg,
        'tm' => 'DMSC KIS'
    );
    // $cURLConnection = curl_init('http://183.88.224.221/apimail/mail.php?token=U:L_2DHp993w');
    // curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
    
    // $apiResponse = curl_exec($cURLConnection);
    // curl_close($cURLConnection);
    // print_pre($apiResponse);
    loadSendEmailTo($to,$to,$subject,$meg);
    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => 'http://183.88.224.221/apimail/mail.php?token=U:L_2DHp993w&to='.$to.'&subject='.$subject.'&meg='.$meg.'&tm=DMSC KIS',
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => '',
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => 'GET'
    // ));

    // $response = curl_exec($curl);
    // curl_close($curl);
    // echo $response;
    // print_pre($response);
    // print_pre($curl);
    return $member_verify_code;
}
/* END FUNCTION SEND EMAIL */
?>