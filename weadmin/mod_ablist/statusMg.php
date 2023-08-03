<?php 
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$loaddder = $_POST['Valueloaddder'];
$tablename = $_POST['Valuetablename'];
$statusname = $_POST['Valuestatusname'];
$statusid = $_POST['Valuestatusid'];
$loadderstatus = $_POST['Valueloadderstatus'];
$filestatus = $_POST['Valuefilestatus'];


if ($statusname == "Enable") {
    $inputstatusname = "Disable";
} else if ($statusname == "Disable") {
    $inputstatusname = "Enable";
}


        $sqlPin = "SELECT ".$tablename."_masterkey  FROM ".$tablename." WHERE  ".$tablename."_status = 'Enable' ";
		// print_pre($sqlPin);
		
		$queryPin=wewebQueryDB($coreLanguageSQL,$sqlPin);
		// print_pre($queryPin->_numOfRows);

		// if ($queryPin->_numOfRows <= 0) {

			// $inputstatusname = "Enable";

			$sql = "UPDATE ".$tablename." SET "
			.$tablename."_status = '$inputstatusname'  WHERE ".$tablename."_id='". $statusid."'";
			// print_pre($sql);
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			
		// } else {

		// 	$inputstatusname = "Disable";

        // $sql = "UPDATE ".$tablename." SET "
        // .$tablename."_status = '$inputstatusname'  WHERE ".$tablename."_id='". $statusid."'";
        // // print_pre($sql);
        // $Query=wewebQueryDB($coreLanguageSQL,$sql);
        // }


// $sql = "UPDATE " . $tablename . " SET "
//         . $tablename . "_status= '$inputstatusname'  WHERE " . $tablename . "_id='" . $statusid . "'";
// $Query = wewebQueryDB($coreLanguageSQL,$sql);
?>
<?php  if ($inputstatusname == "Enable") { ?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?php  echo  $loaddder ?>', '<?php  echo  $tablename ?>', '<?php  echo  $inputstatusname ?>', '<?php  echo  $statusid ?>', '<?php  echo  $loadderstatus ?>', '<?php  echo  $filestatus ?>')" ><span class="fontContantTbEnable"><?php  echo  $inputstatusname ?></span></a>



<?php  } else { ?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?php  echo  $loaddder ?>', '<?php  echo  $tablename ?>', '<?php  echo  $inputstatusname ?>', '<?php  echo  $statusid ?>', '<?php  echo  $loadderstatus ?>', '<?php  echo  $filestatus ?>')" ><span class="fontContantTbDisable"><?php  echo  $inputstatusname ?></span></a>


<?php  } ?>

<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?php  echo  $loaddder ?>" />
