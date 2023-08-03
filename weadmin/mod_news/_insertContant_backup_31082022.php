<?php 
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
$core_default_typemail = 1;

if ($_REQUEST['execute'] == "insert") {
    // $randomNumber = randomNameUpdate(1);

    if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
        mkdir($core_pathname_upload . "/" . $masterkey, 0777);
    }
    if (!is_dir($mod_path_html)) {
        mkdir($mod_path_html, 0777);
    }


    if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
        @unlink($mod_path_html . "/" . $htmlfiledelete);
    }

    if ($_POST['inputHtml'] != "") {
        $filename = $_POST["valEditID"] . "-" . $randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
        $fp = fopen($mod_path_html . "/" . $filename, "w");
        chmod($mod_path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }

    $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
    $maxOrder = $Row[0] + 1;

    $insert = array();
    $insert[$mod_tb_root . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
	
    $insert[$mod_tb_root . "_agenid"] = "'" . $_POST["inputAgency"] . "'";
    $insert[$mod_tb_root . "_yearid"] = "'" . $_POST["inputGroupyear"] . "'";
    $insert[$mod_tb_root . "_groupProoject"] = "'" . $_POST["inputGroupID"] . "'";
    $insert[$mod_tb_root . "_groupProoject_bk"] = "'" . $_POST["inputGroupID"] . "'";
    $insert[$mod_tb_root . "_dwnid"] = "'" . $_POST["inputDwnID"] . "'";
	
    $insert[$mod_tb_root . "_per"] = "'" . changeQuot($_REQUEST['inputPer']) . "'";
    $insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
    $insert[$mod_tb_root . "_title"] = "'" . changeQuot($_REQUEST['inputDescription']) . "'";
    
	$insert[$mod_tb_root . "_tag"] = "'" . serialize($_POST["inputGroupTag"]) . "'";
	
    $insert[$mod_tb_root . "_view"] = "'" . $_POST["Inputviewconf"] . "'";
    $insert[$mod_tb_root . "_pic"] = "'" . $_POST["picname"] . "'";
	$insert[$mod_tb_root . "_picshow"] = "'" . $_POST["inputTypePic"] . "'";
    $insert[$mod_tb_root . "_type"] = "'" . $_POST["inputType"] . "'";
    $insert[$mod_tb_root . "_url"] = "'" . changeQuot($_REQUEST['inputurl']) . "'";
    $insert[$mod_tb_root . "_filevdo"] = "'" . $_POST["vdoname"] . "'";
    $insert[$mod_tb_root . "_htmlfilename"] = "'" . $filename . "'";
    $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_description"] = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
    $insert[$mod_tb_root . "_keywords"] = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
    $insert[$mod_tb_root . "_metatitle"] = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
    $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";

    if ($_REQUEST['cdateInput'] != "") {
        $insert[$mod_tb_root."_credate"]="'".DateFormatInsert($_REQUEST['cdateInput'], $_REQUEST['cHourInput'], $_REQUEST['cMinInput'])."'";

    } else {
        $insert[$mod_tb_root . "_credate"] = "NOW()";
    }

    $insert[$mod_tb_root . "_lastdate"] = "NOW()";
    $insert[$mod_tb_root . "_status"] = "'Disable'";
    $insert[$mod_tb_root . "_typeInfo"] = "0";
	
	if($_POST["inputTypeTheme"] == 2){
		$insert[$mod_tb_root . "_theme"] = "'" . $_POST["inputTheme"] . "'";
		$insert[$mod_tb_root . "_theme_link"] = "'" . changeQuot($_POST["inputThemeUrl"]) . "'";
	}
	$insert[$mod_tb_root . "_theme_type"] = "'" . changeQuot($_POST["inputTypeTheme"]) . "'";
	
	
    // $insert[$mod_tb_root."_pin"] = "'Unpin'";
    $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";

    $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $contantID = wewebInsertID($coreLanguageSQL);

    $sql_albumtemp = "SELECT " . $mod_tb_root_albumTemp . "_id," . $mod_tb_root_albumTemp . "_filename," . $mod_tb_root_albumTemp . "_name  FROM " . $mod_tb_root_albumTemp . " WHERE " . $mod_tb_root_albumTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_root_albumTemp . "_id ASC";
    $query_albumtemp = wewebQueryDB($coreLanguageSQL, $sql_albumtemp);
    $number_albumtemp = wewebNumRowsDB($coreLanguageSQL,$query_albumtemp);
    if ($number_albumtemp >= 1) {
        while ($row_albumtemp = wewebFetchArrayDB($coreLanguageSQL,$query_albumtemp)) {
            $downloadID = $row_albumtemp[0];
            $downloadFile = $row_albumtemp[1];
            $downloadName = $row_albumtemp[2];

            $insert=array();
            $insert[$mod_tb_root_album . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_root_album . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_root_album . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_root_album . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_root_album . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_root_albumTemp . " WHERE   " . $mod_tb_root_albumTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
        }
    }


    $sql_filetemp = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename," . $mod_tb_fileTemp . "_name  FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_fileTemp . "_id ASC";
    $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
    $number_filetemp = wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
    if ($number_filetemp >= 1) {
        while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)) {
            $downloadID = $row_filetemp[0];
            $downloadFile = $row_filetemp[1];
            $downloadName = $row_filetemp[2];

            $insert=array();
            $insert[$mod_tb_file . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_file . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_file . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_file . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_file . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_fileTemp . " WHERE   " . $mod_tb_fileTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
        }
    }


    logs_access('3', 'Insert');

    ## URL Search ###################################
    $txt_value_to = encodeStr($contantID);

    $valUrlSearchTH = $mod_url_search_th . "?d=" . $txt_value_to;
    $valUrlSearchEN = $mod_url_search_en . "?d=" . $txt_value_to;

    $insertSch = "";
    $insertSch[$core_tb_search . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
    $insertSch[$core_tb_search . "_contantid"] = "'" . $contantID . "'";
    $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
    $insertSch[$core_tb_search . "_subject"] = "'" . changeQuot($_POST["inputSubject"]) . "'";
    $insertSch[$core_tb_search . "_title"] = "'" . changeQuot($_POST["inputDescription"]) . "'";
    $insertSch[$core_tb_search . "_keyword"] = "'" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
    $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
    $insertSch[$core_tb_search . "_urlen"] = "'" . $valUrlSearchEN . "'";
    $insertSch[$core_tb_search . "_edate"] = "'" . DateFormatInsert($_POST["edateInput"]) . "'";
    $insertSch[$core_tb_search . "_sdate"] = "'" . DateFormatInsert($_POST["sdateInput"]) . "'";
    $insertSch[$core_tb_search . "_status"] = "'Disable'";
    $insertSch[$core_tb_search . "_pic"] = "'" . $_POST["picname"] . "'";
    $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
    $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
	
	
	
	if($_REQUEST['inputAgency']>=1){
		$subject = "DMSC KIS - แจ้งการอนุมัติองค์ความรู้(".$_REQUEST['inputSubject'].")";
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
                            <p>สวัสดี ผู้อนุมัติองค์ความรู้ </p>
                            <p>สมาชิกได้ดำเนินการเพิ่มองค์ความรู้ใหม่ กรุณาตรวจสอบความถูกต้องขององค์ความรู้เพื่อดำเนินการอนุมัติการแสดงในหน้าเว็บไซต์.</p>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                              <tbody>
                                <tr>
                                  <td align='left'>
                                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                      <tbody>
                                        <tr>
                                          <td> <a href='http://kis.dmsc.moph.go.th/weadmin' target='_blank'>เข้าสู่ระบบ</a> </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <p>กรณีที่ปุ่มเข้าสู่ระบบไม่ทำงาน สามารถคัดลอกและวางลิงค์ด้านล่างนี้ลงในแถบที่อยู่ของ browser ของคุณ เพื่อเข้าสู่ระบบ:</p>
                            <p>http://kis.dmsc.moph.go.th/weadmin</p>
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
		
		$sqlApprove = "SELECT ".$core_tb_staff."_email  as email FROM ".$core_tb_staff;
		$sqlApprove = $sqlApprove."  WHERE ".$core_tb_staff."_status !='Superadmin'   ";
		$sqlApprove = $sqlApprove."AND  ".$core_tb_staff."_typemini != '1'";
		$sqlApprove = $sqlApprove."AND  ".$core_tb_staff."_active_status = 'true'";
		$sqlApprove = $sqlApprove."AND  ".$core_tb_staff."_agency = '".$_REQUEST['inputAgency']."'";
		$sqlApprove = $sqlApprove."AND  ".$core_tb_staff."_groupid = '4'";
		$queryApprove = wewebQueryDB($coreLanguageSQL, $sqlApprove);
		$count_recordApprove=wewebNumRowsDB($coreLanguageSQL,$queryApprove);
		if($count_recordApprove>=1){
			while($rowApprove=wewebFetchArrayDB($coreLanguageSQL,$queryApprove)) {
				$valEmailApprove = $rowApprove['email'];
				$to = $valEmailApprove;
				$form = "kis@moph.go.th";
				$mailstatus =loadSendEmailTo($to,$form,$subject,$meg);
				
			}
		}
   }

}
?>
<?php  include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo  $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php  echo  $_REQUEST['inputGh'] ?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php  echo  $_REQUEST['inputTh'] ?>" />
    <input name="inputGh2" type="hidden" id="inputGh2" value="<?php  echo $_REQUEST['inputGh2']?>" />
    <input name="inputGh31" type="hidden" id="inputGh31" value="<?php  echo $_REQUEST['inputGh31']?>" />
    <input name="inputGh3" type="hidden" id="inputGh3" value="<?php  echo $_REQUEST['inputGh3']?>" />
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
