<?php
function callGroupstatic($masterkey = null)
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

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callGroupCard($masterkey = null)
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

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

//   print_pre($sql);
  $result = $db->execute($sql);
  $arrData = array();
  foreach($result as $keyresult => $valueresult){
    $callNews = callNews($valueresult['id']);
    $arrData[$keyresult]['id'] = $valueresult['id'];
    $arrData[$keyresult]['masterkey'] = $valueresult['masterkey'];
    $arrData[$keyresult]['subject'] = $valueresult['subject'];
    $arrData[$keyresult]['count'] = $callNews->_numOfRows;
  }
  // $result = $db->pageexecute($sql, $limit, $page);
  return $arrData;
}

function callNews($id = null)
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

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC
  ";

//   print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}