<?php 

include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");



if ($_REQUEST['execute'] == "create") {

    $delTemp = "DELETE FROM " . $mod_tb_parent_group . " WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_status = 'Temp'";
    $delTemp .= " and " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_parent is null ";
    $delTemp .= " and " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_cid = '" . $_REQUEST['cid'] ."'";
    $dbConnect->execute($delTemp);
    
    $delTemp = "DELETE FROM " . $mod_tb_parent_group . " WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_status = 'Temp'";
    $delTemp .= " and " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_parent = '" . $_REQUEST['cid'] ."'";
    $dbConnect->execute($delTemp);


    if (!empty($_REQUEST['cid'])) {
        $randomNumber = $_REQUEST['cid'];
    } else {
        $randomNumber = session_id();
    }
    
    $insert[$mod_tb_parent_group . "_cid"] = "'".$randomNumber."'";
    $insert[$mod_tb_parent_group . "_masterkey"] = "'" . $_REQUEST['masterkey'] . "'";
    $insert[$mod_tb_parent_group . "_datecre"] = "NOW()";
    $insert[$mod_tb_parent_group . "_status"] = "'Temp'";

    $sql = "INSERT INTO " . $mod_tb_parent_group . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $contantID = wewebInsertID($coreLanguageSQL);

    $returnList['cid'] = $randomNumber;
    $returnList['parent'] = $contantID;
    echo json_encode($returnList);
}


if ($_REQUEST['execute'] == "del") {
    // $delTemp = "DELETE FROM " . $mod_tb_parent_group . " WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_masterkey = '" . $_REQUEST['masterkey'] . "' and " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_id = " . $_REQUEST['id'];
    // $statusDel = $dbConnect->execute($delTemp);
    $delTemp = "DELETE FROM " . $mod_tb_parent_group . " WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_masterkey = '" . $_REQUEST['masterkey'] . "' and ( " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_id = " . $_REQUEST['id'] . " or  " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_parent = " . $_REQUEST['id'] .")";
    
    $statusDel = $dbConnect->execute($delTemp);
    if ($statusDel) {
        echo json_encode(array("status" => "1"));
    } else {
        echo json_encode(array("status" => "0"));
    }

    // $delTempParent = "DELETE FROM " . $mod_tb_parent_group . " WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_masterkey = '" . $_REQUEST['masterkey'] . "' and " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_parent = " . $_REQUEST['id'];
    // $statusDelParent = $dbConnect->execute($delTempParent);
}



if ($_REQUEST['execute'] == "updatepic") {
    if (!empty($_REQUEST['masterkey'])) {
        foreach ($_FILES as $inputId => $value) {
            $error = "";
            $msg = "";
            $fileElementName = $inputId;
            if (!empty($_FILES[$inputId]['error'])) {
                switch ($_FILES[$inputId]['error']) {

                    case '1':
                        $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                        break;
                    case '2':
                        $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                        break;
                    case '3':
                        $error = 'The uploaded file was only partially uploaded';
                        break;
                    case '4':
                        $error = 'No file was uploaded.';
                        break;

                    case '6':
                        $error = 'Missing a temporary folder';
                        break;
                    case '7':
                        $error = 'Failed to write file to disk';
                        break;
                    case '8':
                        $error = 'File upload stopped by extension';
                        break;
                    case '999':
                    default:
                        $error = 'No error code avaiable';
                }
            } elseif ($_FILES[$inputId]['tmp_name'] == 'none') {
                $error = 'No file was uploaded..';
            } else {

                if (!is_dir($core_pathname_upload . "/" . $_REQUEST['masterkey'])) {
                    mkdir($core_pathname_upload . "/" . $_REQUEST['masterkey'], 0777);
                }
                if (!is_dir($mod_path_pictures)) {
                    mkdir($mod_path_pictures, 0777);
                }
                if (!is_dir($mod_path_office)) {
                    mkdir($mod_path_office, 0777);
                }
                if (!is_dir($mod_path_real)) {
                    mkdir($mod_path_real, 0777);
                }

                $inputGallery = $_FILES[$inputId]['tmp_name'];
                $arrfile = $_FILES[$inputId];
                $ERROR = $_FILES[$inputId]['error'];
                $TIME = time();

                // print_pre($arrfile);

                if (!$ERROR) {

                    $filename = "pic-" . $_REQUEST['myID'];

                    $p = new pic();
                    $p->addpic($arrfile);
                    $p->chktypepic();

                    //    print_pre($p);

                    $ext = $p->ret();
                    $picname = $filename . "." . $ext;

                    ##  Real ################################################################################
                    if (copy($inputGallery, $mod_path_real . "/" . $picname)) {
                        @chmod($mod_path_real . "/" . $picname, 0777);
                    }

                    $imgReal = $mod_path_real . "/" . $picname; // File image location
                    ##  Pictures ################################################################################
                    $arrImgInfo = getimagesize($imgReal);
                    if ($arrImgInfo[0] <= ($sizeWidthPic + 10)) {

                        if (copy($inputGallery, $mod_path_pictures . "/" . $picname)) {
                            @chmod($mod_path_real . "/" . $picname, 0777);
                        }
                    } else {
                        $newfilename = $mod_path_pictures . "/" . $picname;
                        // New file name for thumb
                        $w = $sizeWidthPic;
                        $h = $sizeHeightPic;
                        $thumbnail = resize($imgReal, $w, $h, $newfilename);
                    }

                    ##  Office ################################################################################
                    $newfilename = $mod_path_office . "/" . $picname;
                    ; // New file name for thumb
                    $w = $sizeWidthOff;
                    $h = $sizeHeightOff;
                    $thumbnail = resize($imgReal, $w, $h, $newfilename);

                    $sql = "UPDATE " . $mod_tb_parent_group . " SET " . $mod_tb_parent_group . "_pic = '" . $picname . "' WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_id = " . $_REQUEST['myID'];
                    $Query = wewebQueryDB($coreLanguageSQL, $sql);

                    $msg .= "<img src=\"" . $mod_path_office . "/" . $picname . "\"     />";
                    //    $msg .= "<div style=\"width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;\" onclick=\"delPicUpload(\'deletePicInsert.php\')\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"22\" height=\"22\"  border=\"0\"/></div>";
                    //   $msg .= "<input name=\"picname\" class=\"inputpicname\" type=\"hidden\" id=\"picname-" . $_REQUEST['myID'] . "\" value=\"$picname\" /> ";
                } else {
                    $msg .= "<img src=\"../img/btn/del.png\"  />";
                }
            }
            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        }
    }
}


if ($_REQUEST['execute'] == "add") {
    $insert[$mod_tb_parent_group . "_cid"] = "'".$_REQUEST['cid']."'";
    $insert[$mod_tb_parent_group . "_parent"] = $_REQUEST['parent'];
    $insert[$mod_tb_parent_group . "_masterkey"] = "'" . $_REQUEST['masterkey'] . "'";
    $insert[$mod_tb_parent_group . "_datecre"] = "NOW()";
    $insert[$mod_tb_parent_group . "_status"] = "'Temp'";

    $sql = "INSERT INTO " . $mod_tb_parent_group . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";

    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $contantID = wewebInsertID($coreLanguageSQL);

    // $returnList['subject'] = "Name";
    $returnList['id'] = $contantID;
    echo json_encode($returnList);
}



if ($_REQUEST['execute'] == "updateNode") {
    // $insert[$mod_tb_parent_group . "_pic"] = $_REQUEST['pic'];
    // $insert[$mod_tb_parent_group . "_cid"] = $_REQUEST['cid'];
    // $insert[$mod_tb_parent_group . "_parent"] = $_REQUEST['parent'];
    // $insert[$mod_tb_parent_group . "_datecre"] = "NOW()";
    // $insert[$mod_tb_parent_group . "_status"] = "'Temp'";

    $sql = "UPDATE " . $mod_tb_parent_group . " SET " . $mod_tb_parent_group . "_subject = '" . str_replace("\n", "<br>", $_REQUEST['subject']) . "' WHERE " . $mod_tb_parent_group . "." . $mod_tb_parent_group . "_id = " . $_REQUEST['id'];
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
	if($Query){
		$valReturn=$_REQUEST['id'];
	}else{
		$valReturn="";
	}
	echo json_encode($valReturn);

 
}
?>