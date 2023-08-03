<?php  
$check_login_status = 1;
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

if(!empty($_POST['g-recaptcha-response'])){ // ให้ true ผ่านเงื่อนไขนี้ไปก่อน
    $secret = '6Ld3NKcbAAAAADzPkDWnYoG91A0Ro4DFeEPht5df';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secert.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
	
    if($responseData->success){
        if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'changepass'){
            // print_pre($_REQUEST);
            // die;
            
            $sql = "SELECT 
            " .$core_tb_staff_tmp. "_id,
            " .$core_tb_staff_tmp. "_groupid,
            " .$core_tb_staff_tmp. "_credate,
            " .$core_tb_staff_tmp. "_lastdate,
            " .$core_tb_staff_tmp. "_active_status
            FROM
            " .$core_tb_staff_tmp. "
            WHERE 
            " .$core_tb_staff_tmp. "_active_status = '" . $_REQUEST['token'] . "'
            ";
            $query = wewebQueryDB($coreLanguageSQL,$sql);
            $row = wewebFetchArrayDB($coreLanguageSQL,$query);
            
            $update=array();
            $update[]=$core_tb_staff."_password  ='".encodeStr(changeQuot($_REQUEST['inputPass']))."'";
            $sql="UPDATE ".$core_tb_staff." SET ".implode(",",$update)." WHERE ".$core_tb_staff."_id='".$row[1]."' ";
            $Query=wewebQueryDB($coreLanguageSQL,$sql);	
            
            $sql="DELETE FROM ".$core_tb_staff_tmp." WHERE ".$core_tb_staff_tmp."_groupid='".$row[1]."' ";
            $Query=wewebQueryDB($coreLanguageSQL,$sql);
            ?>
            <script language="JavaScript"  type="text/javascript">
                jQuery(".form-section-2").show();
                jQuery(".form-section-1").hide();
                jQuery(".form-section-3").hide();
            </script>
            <?php  
            
        }else{

            $sql = "SELECT 
            " . $core_tb_staff . "_id,
            " . $core_tb_staff . "_email
            FROM
            " . $core_tb_staff . "
            WHERE
            " . $core_tb_staff . "_email = '" . $_REQUEST['inputEmail'] . "'
            ";
            $query = wewebQueryDB($coreLanguageSQL,$sql);
            $numRow = wewebNumRowsDB($coreLanguageSQL,$query);
    
            if($numRow >= 1){
                $row = wewebFetchArrayDB($coreLanguageSQL,$query);
                $token = randomToken('token');
                // max order
                $sql = "SELECT MAX(".$core_tb_staff_tmp."_order) FROM ".$core_tb_staff_tmp;
                $Query=wewebQueryDB($coreLanguageSQL,$sql);
                $Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
                $maxOrder = $Row[0]+1;
                ## insert to tmp
                $insert=array();
                $insert[$core_tb_staff_tmp."_email"] = "'".changeQuot($_REQUEST['inputEmail'])."'";		
                $insert[$core_tb_staff_tmp."_active_status"] = "'".changeQuot($token)."'";
                $insert[$core_tb_staff_tmp."_groupid"] = "'".changeQuot($row[0])."'";
                $insert[$core_tb_staff_tmp."_credate"] = "".wewebNow($coreLanguageSQL)."";
                $insert[$core_tb_staff_tmp."_lastdate"] = "".wewebNow($coreLanguageSQL)."";
                $sql="INSERT INTO ".$core_tb_staff_tmp."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
    
                $Query=wewebQueryDB($coreLanguageSQL,$sql);	
                sendEmail($token);
                ?>
                <script language="JavaScript"  type="text/javascript">
                    jQuery(".form-section-2").show();
                    jQuery(".form-section-1").hide();
                </script>
                <?php  
            }else{
                ?>
                <script language="JavaScript"  type="text/javascript">
                    jQuery("#loadAlertLogin").show();
                    jQuery("#loadAlertLoginOA").hide();
                    jQuery("#loadAlertreCaptcha").hide();
                </script>
                <?php  
            }
        }
        
    }else{
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

/* START FUNCTION */
function randomToken($action = null){
    // สร้างรหัสสุ่ม
    $arr_a_z = range( 'a' , 'z' );
    $arr_A_Z = range( 'A' , 'Z' );
    $arr_0_9 = range( 0 , 9 ) ; 
    $arr_a_9 = array_merge( $arr_a_z , $arr_A_Z , $arr_0_9 ) ; 
    $str_a_9 = implode( $arr_a_9 ) ; 
    $str_a_9 = str_shuffle( $str_a_9 ) ; 
    $member_verify_code = substr( $str_a_9 , 0 , 15 );

    return $member_verify_code;
}
function sendEmail($token = null){
    // get path 
    // $getpathCoreWeadmin = getpathCoreWeadmin($_SERVER['REQUEST_URI']);
    $urlVerify = $_SERVER['HTTP_HOST']."/weadmin/user_action/verifyForget.php?token=".$token."";
    // set up form
    $to = $_REQUEST['inputEmail'];
    $subject = 'Reset password your account';
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
                            <p>สวัสดี</p>
                            <p>กรุณากดปุ่มเพื่อเปลี่ยนรหัสผ่าน</p>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                              <tbody>
                                <tr>
                                  <td align='left'>
                                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                      <tbody>
                                        <tr>
                                          <td> <a href='http://".$urlVerify."' target='_blank'>เปลี่ยนรหัสผ่าน</a> </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <p>กรณีที่ปุ่มเปลี่ยนรหัสผ่านไม่ทำงาน สามารถคัดลอกและวางลิงค์ด้านล่างนี้ลงในแถบที่อยู่ของ browser ของคุณ เพื่อเปลี่ยนรหัสผ่าน:</p>
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
    // $postRequest = array(
    //     'to' => $to,
    //     'sbj' => $subject,
    //     'meg' => $meg,
    //     'tm' => 'DMSC KIS'
    // );
    // $cURLConnection = curl_init('http://183.88.224.221/apimail/mail.php?token=U:L_2DHp993w');
    // curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
    // $apiResponse = curl_exec($cURLConnection);
    // curl_close($cURLConnection);

    loadSendEmailTo($to,$to,$subject,$meg);
}
/* END FUNCTION */
