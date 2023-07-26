<?php
 
function callTopGraphic($masterkey = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_id as id,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey as masterkey,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_subject as subject,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_pic as pic,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_credate as credate,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_url as url,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_title as title,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_target as target


  FROM
  " . $config['tgp']['db'] . "
  WHERE
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey = '$masterkey' AND
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_status = 'Enable' AND
  ((" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

  $sql .= " ORDER  BY " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_order DESC ";

  $result = $db->execute($sql);
  return $result;
}

function callNewsGroup1($id = null, $limit = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as idg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg


  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$id."' AND
  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
  if($limit != null){
    $sql .= " limit ".$limit." ";
  }
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callActivetyGroup($limit = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_gid  as idg


  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['act']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Home'  AND
  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
  if($limit != null){
    $sql .= " limit ".$limit." ";
  }
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}


function callPlanKm(){
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id as id
  FROM
  " . $config['dwn']['db'] . "
  WHERE
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_masterkey = '".$config['dwn']['masterkey']."' AND
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_status = 'Enable' AND
  ((" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

  $sql .= " ORDER  BY " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_order DESC ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}


function callService()
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title


  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkeysv']."' AND
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

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
  $sql .= " limit 30 ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callWeblink($masterkey = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_id as id,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_masterkey as masterkey,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_subject as subject,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_pic as pic,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_credate as credate,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_link as link,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_title as title,
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_target as target


  FROM
  " . $config['ban']['db'] . "
  WHERE
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_masterkey = '".$config['ban']['masterkey']."' AND
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_status = 'Enable' AND
  ((" . $config['ban']['db'] . "." . $config['ban']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['ban']['db'] . "." . $config['ban']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['ban']['db'] . "." . $config['ban']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['ban']['db'] . "." . $config['ban']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['ban']['db'] . "." . $config['ban']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['ban']['db'] . "." . $config['ban']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['ban']['db'] . "." . $config['ban']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

  $sql .= " ORDER  BY " . $config['ban']['db'] . "." . $config['ban']['db'] . "_order DESC ";
  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callAbout($id = null, $limit = 10)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['al']['db'] . "." . $config['al']['db'] . "_id as id,
  " . $config['al']['db'] . "." . $config['al']['db'] . "_masterkey as masterkey,
  " . $config['al']['db'] . "." . $config['al']['db'] . "_subject as subject,
  " . $config['al']['db'] . "." . $config['al']['db'] . "_pic as pic,
  " . $config['al']['db'] . "." . $config['al']['db'] . "_credate as credate,
  " . $config['al']['db'] . "." . $config['al']['db'] . "_htmlfilename as htmlfilename,
  " . $config['al']['db'] . "." . $config['al']['db'] . "_title as title


  FROM
  " . $config['al']['db'] . "
  WHERE
  " . $config['al']['db'] . "." . $config['al']['db'] . "_masterkey = '".$config['al']['masterkey']."'
  ";

  $sql .= " ORDER  BY " . $config['al']['db'] . "." . $config['al']['db'] . "_order DESC ";
  $sql .= " limit ".$limit." ";
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callGroup($id = null, $limit = null)
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
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = 'Home'

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

/* NEW EDIT BY BONZ 23/12/2564 */ 
function callGroupcountHome($status = 'Home')
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
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '".$config['cmg']['masterkey']."'

  ";

  if($status != null){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status = '".$status."' ";
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

function callNewsGroupHome($id = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as idg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg


  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$config['cms']['masterkey']."' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Enable' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '".$id."' AND
  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
  if($limit != null){
    $sql .= " limit ".$limit." ";
  }
// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function callNewsList($masterkey, $id = null, $limit = null)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_typec as typec,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_urlc as urlc,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_target as target,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as gid,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg


  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = " . $config['cms']['db'] . "." . $config['cms']['db'] . "_gid
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' AND
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

  $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
  if($limit != null){
    $sql .= " limit ".$limit." ";
  }
  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}