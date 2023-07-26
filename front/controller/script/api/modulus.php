<?php
function updateView($id, $masterkey,$table)
{
  global $config, $db, $url;

  $sql = "SELECT
     " . $table . "." . $table . "_view
    FROM
      " .$table . "
    WHERE
    " . $table . "." . $table . "_masterkey = '$masterkey' 
    AND
    " . $table . "." . $table . "_id = '$id' 
    ";

  $result = $db->execute($sql);
  // print_pre($sql);
  // return $sql;
  $view = $result->fields[0] + 1;

  $listView[$table . '_view'] = $view;
  $updateView = sqlupdate($listView, $config['ban']['db'], $config['ban']['db'] . "_id", "'" . $id . "'");

  return $updateView;
}

function callWeblinkApi($id = null,$limit = null,$masterkey = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_id as id,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_masterkey as masterkey,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_subject as subject,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_link as link,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_target as target


  FROM
  " . $config['ban']['db'] . "
  WHERE
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_masterkey = '".$config['ban']['masterkey']."' AND
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_status = 'Enable'

  ";
  if($id != null){
    $sql .= " AND " . $config['ban']['db'] . "." . $config['ban']['db'] . "_id = '".$id."' ";
  }

  $sql .= " ORDER  BY " . $config['ban']['db'] . "." . $config['ban']['db'] . "_order DESC ".$limit."";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callGroupApi($id = null,$limit = null,$masterkey = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_col as col


  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '".$config['cmg']['masterkeyagen']."' AND
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Enable'

  ";
  if($id != null && $id != 0){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = '".$id."' ";
  }
  if($limit != null){
    $limit = "limit  ".$limit."";
  }else{
    $limit = "";
  }

  $sql .= " ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC ".$limit."";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callNewChart($id = null,$gid = null,$whereFalse = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject
  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable' AND


  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_agenid = '".$id."'  AND
  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";
  if($gid != null && $gid != 0){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$gid."' ";
  }
  if($whereFalse != null ){
    $sql .= " AND 1 = '".$whereFalse."' ";
  }

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callGroupNews($gid = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as idg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_col as col


  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable'

  ";
  if($gid != null){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$gid."'";
  }

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callGroupCard($masterkey = null,$gid = null,$agenid = null, $yearid = null)
{
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title as title,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_credate as credate,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_lastdate as lastdate

  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $masterkey . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable'
  ";

  if($gid != null){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id in (" . implode(" , ", $gid) . ")";
  }

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  $arrData = array();
  foreach($result as $keyresult => $valueresult){
    $callNews = callNews($valueresult['id'],$agenid,$yearid);
    $arrData[$keyresult]['id'] = $valueresult['id'];
    $arrData[$keyresult]['masterkey'] = $valueresult['masterkey'];
    $arrData[$keyresult]['subject'] = $valueresult['subject'];
    $arrData[$keyresult]['count'] = $callNews->_numOfRows;
  }
  // $result = $db->pageexecute($sql, $limit, $page);
  return $arrData;
}

function callNews($id = null,$agenid = null, $yearid = null)
{
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_lastdate as lastdate

  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $config['cms']['masterkey'] . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '" . $id . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable'
  ";

  if($agenid != null && $agenid != 0){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_agenid = '".$agenid."'";
  }
  if($yearid != null && $yearid != 0){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_yearid = '".$yearid."'";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callGroupHome($id = null,$limit = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_col as col


  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '".$config['cmg']['masterkey']."' AND
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable'

  ";
  if($id != null && $id != 0){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = '".$id."' ";
  }
  if($limit != null){
    $limit = "limit  ".$limit."";
  }else{
    $limit = "";
  }

  $sql .= " ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC ".$limit."";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callNewChartHome($id = null,$gid = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject
  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable' AND


  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_agenid = '".$id."'  AND
  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";
  // if($gid != null && $gid != 0){
  //   $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$gid."' ";
  // }
  if($gid != null){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject in (" . implode(" , ", $gid) . ")";
  }

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callYear($yearid = null)
{
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title as title,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_credate as credate,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_lastdate as lastdate,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_col as color

  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['cmg']['masterkeyyear'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable'
  ";

  if($yearid != null && $yearid != 0){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = '".$yearid."' ";
  }

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";
  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callNewChartApi($gid = null,$year = null, $agenid = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject
  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable' AND

  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";
  if($gid != null){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$gid."' ";
  }
  if($agenid != null && $agenid !=0){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_agenid = '".$agenid."' ";
  }
  if($year != null && $year != 0){
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_yearid = '".$year."' ";
  }

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}
function callGroupPro($id = null, $masterkey = null,$limit = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_col as col


  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '".$masterkey."' AND
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Enable'

  ";
  if($id != null && $id != 0){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = '".$id."' ";
  }
  if($limit != null){
    $limit = "limit  ".$limit."";
  }else{
    $limit = "";
  }

  $sql .= " ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC ".$limit."";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

/* ################################## BACK UP ################################## */ 
// function callNewChart($id = null,$gid = null)
// {
//   global $config, $db, $url;
//   $lang = $url->pagelang[3];

//   $sql = "SELECT
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject
//   FROM
//   " . $config['cms']['db'] . "
//   WHERE
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable' AND


//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject in 
//   (SELECT " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id FROM " . $config['cmg']['db'] . " WHERE " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_agenid = '".$id."') AND
//   ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
//   (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
//   TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
//   (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
//   " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
//   (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
//   TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

//   ";
//   if($gid != null){
//     $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$gid."' ";
//   }

//   $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
// // print_pre($sql);
//   $result = $db->execute($sql);
//   return $result;
// }




?>