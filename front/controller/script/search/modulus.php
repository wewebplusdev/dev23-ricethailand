<?php

function callNews_bk($page = 1, $limit = 15, $search = null, $order = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  if ($order == null) {
    $order = 'DESC';
  }

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject as gid


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

  if ($search != null) {
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject LIKE '%".$search."%' OR " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title LIKE '%".$search."%' ";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order $order
  ";

  // print_pre($sql);
  $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callNews($page = 1, $limit = 15, $search = null, $order = null,$tag = null, $keywordtag = null, $Sdate = null, $Edate = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  if ($order == null) {
    $order = 'DESC';
  }

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_tag as tag,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject as gid


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

  if ($search != null) {
    $sql .= " AND (" . 
    
      $config['cms']['db'] . "." . $config['cms']['db'] . "_subject LIKE '%".$search."%' 
      OR " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title LIKE '%".$search."%' ";
      // if count tag more than 1 add OR start
      if(count($tag)>0){
        $strOR = "OR";
      }else{
        $strOR = "";
      }
      $sql .= " ".$strOR."  " . implode(" OR ", $tag) . ") ";
  }
  if (!empty($keywordtag)) {
    // $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_tag REGEXP '.*;s:[0-9]+:\"".$keywordtag."\".*'";
    $sql .= $keywordtag;
  }

  if (!empty($Sdate) && !empty($Edate)) {
    $sql .= " AND (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate 
    BETWEEN '" . $Sdate . " 00:00:00' AND '" . $Edate . " 23:59:59' 
    )
    ";
  }elseif(!empty($Sdate) && empty($Edate)){
    $sql .= " AND (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate >= '" . $Sdate . " 00:00:00' )
    ";
  }elseif(empty($Sdate) && !empty($Edate)){
    $sql .= " AND (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate <= '" . $Edate . " 00:00:00' )
    ";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order $order
  ";

  // print_pre($sql);
  // print_pre(count($tag));
  $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callTag($search = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_pic as pic,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_credate as credate,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title as title


  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '".$config['cmg']['masterkeyTag']."' AND
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Enable'

  ";

  if ($search != null) {
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject LIKE '%".$search."%' OR " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title LIKE '%".$search."%' ";
  }

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  $tagID = array();
  foreach($result as $key => $valueresult){
    $tagID[] = $config['cms']['db'] . "." . $config['cms']['db'] . "_tag REGEXP '.*;s:[0-9]+:\"".$valueresult['id']."\".*' ";
  }
  return $tagID;
}

function callTagName($search = null, $keyword = null, $array_id = array())
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_pic as pic,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_credate as credate,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_title as title


  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '".$config['cmg']['masterkeyTag']."' AND
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Enable'

  ";

  if (!empty($search)) {
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = '".$search."'";
  }

  if (!empty($keyword)) {
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject LIKE '%".$keyword."%' ";
  }

  if (gettype($array_id) == 'array' && !empty($array_id)) {
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id in (" . implode(" , ", $array_id) . ")";
  }

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

