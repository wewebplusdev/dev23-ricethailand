<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function jsonGroupAct($masterkey, $id) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['news']['group'] . "." . $config['news']['group'] . "_id as id,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_masterkey as masterkey,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_subject as subject,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_title as title,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_credate as credate,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_col as col,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_gid as gid

    FROM
    " . $config['news']['group'] . "
    WHERE
    " . $config['news']['group'] . "." . $config['news']['group'] . "_masterkey = '$masterkey' AND
    " . $config['news']['group'] . "." . $config['news']['group'] . "_status != 'Disable'
    ";

     if (!empty($id)) {
       $sql .= "
       AND " . $config['news']['group'] . "." . $config['news']['group'] . "_id = $id
       ";
     }

      $sql .= "
      ORDER  BY " . $config['news']['group'] . "." . $config['news']['group'] . "_order DESC
      ";
    //  print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}

 

function jsonGroupNews($masterkey, $id) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['news']['group'] . "." . $config['news']['group'] . "_id as id,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_masterkey as masterkey,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_subject as subject,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_title as title,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_credate as credate,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_col as col,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_gid as gid

    FROM
    " . $config['news']['group'] . "
    WHERE
    " . $config['news']['group'] . "." . $config['news']['group'] . "_masterkey = '$masterkey' AND
    " . $config['news']['group'] . "." . $config['news']['group'] . "_status != 'Disable'
    ";

     if (!empty($id)) {
       $sql .= "
       AND " . $config['news']['group'] . "." . $config['news']['group'] . "_id = $id
       ";
     }

      $sql .= "
      ORDER  BY " . $config['news']['group'] . "." . $config['news']['group'] . "_order DESC
      ";
    //  print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}

function jsonAct($masterkey, $id, $limit = 15) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    
    $sql = "SELECT
    " . $config['news']['db'] . "." . $config['news']['db'] . "_id as id,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey as masterkey,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_subject as subject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_title as title,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_htmlfilename as htmlfilename,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_credate as credate,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_pic as pic,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_gid as groupProoject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_picshow as picshow

    FROM
    " . $config['news']['db'] . "
    WHERE
    " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey = '$masterkey' AND
    " . $config['news']['db'] . "." . $config['news']['db'] . "_status != 'Disable' AND
    ((" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW())  ))

    ";

    if (!empty($id)) {
      $sql .= "

      AND " . $config['news']['db'] . "." . $config['news']['db'] . "_gid = '$id'

      ";

    }
    $sql .= "
    ORDER  BY " . $config['news']['db'] . "." . $config['news']['db'] . "_order DESC LIMIT $limit
    ";


    // print_pre($sql);
    $result = $db->execute($sql);
    // $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function jsonNews($masterkey, $id, $limit = 15) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    
    $sql = "SELECT
    " . $config['news']['db'] . "." . $config['news']['db'] . "_id as id,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey as masterkey,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_subject as subject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_title as title,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_htmlfilename as htmlfilename,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_credate as credate,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_pic as pic,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_groupProoject as groupProoject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_picshow as picshow

    FROM
    " . $config['news']['db'] . "
    WHERE
    " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey = '$masterkey' AND
    " . $config['news']['db'] . "." . $config['news']['db'] . "_status != 'Disable' AND
    ((" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW())  ))

    ";

    if (!empty($id)) {
      $sql .= "

      AND " . $config['news']['db'] . "." . $config['news']['db'] . "_groupProoject = '$id'

      ";

    }
    $sql .= "
    ORDER  BY " . $config['news']['db'] . "." . $config['news']['db'] . "_order DESC LIMIT $limit
    ";


    // print_pre($sql);
    $result = $db->execute($sql);
    // $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function jsonDownload($masterkey, $id, $limit = 15) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    
    $sql = "SELECT
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id as id,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_masterkey as masterkey,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_subject as subject,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_title as title,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_htmlfilename as htmlfilename,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_pic as pic,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_credate as credate,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_download as download,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_filename as filename,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_lastdate as lastdate,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_view as view,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_type as type,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_url as url,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_file as file 

    FROM
    " . $config['dwn']['db'] . "
    WHERE
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_masterkey = '$masterkey' AND
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_status != 'Disable' AND
    ((" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate)>=TO_DAYS(NOW())  ))

    ";

/*
    if (!empty($id)) {
      $sql .= "

      AND " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_did = $id

      ";
    }
	*/
    $sql .= "
    ORDER  BY " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_order DESC LIMIT $limit
    ";

    // print_pre($sql);
    $result = $db->execute($sql);
    // $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}


function jsonCallNews($masterkey = null, $gid = null)
{
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_htmlfilename as htmlfilename,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_lastdate as lastdate,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_view as view,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_description as description,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_keywords as keywords,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_metatitle as metatitle,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_type as type,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_target as target,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as idg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_pic as picg

  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_id =  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $masterkey . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '" . $gid . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' AND
  ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
(TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
(TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
";

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC
  ";

  print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function chkSyntaxAnd($var){

return str_replace("&","And",$var);
}