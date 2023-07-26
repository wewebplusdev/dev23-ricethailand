<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function callAboutName($masterkey,$link){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_id as id,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_masterkey as masterkey,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_subject as subject,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_link as link,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_rss as rss
  FROM
  " . $config['about']['menu'] . "
  WHERE
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_masterkey = '$masterkey' and
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_status = 'Enable'

  ";

  if(!empty($link)){
      $sql .= "AND " . $config['about']['menu'] . "." . $config['about']['menu'] . "_link = '$link'";
  }

  $sql .= "
  ORDER  BY " . $config['about']['menu'] . "." . $config['about']['menu'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

function rssGroupAct($masterkey, $id) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['news']['group'] . "." . $config['news']['group'] . "_id,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_masterkey,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_subject,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_title,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_credate,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_col,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_gid

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
     
    $result = $db->execute($sql);
    return $result;
}


function rssGroupNews($masterkey, $id) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['news']['group'] . "." . $config['news']['group'] . "_id,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_masterkey,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_subject,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_title,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_credate,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_col,
    " . $config['news']['group'] . "." . $config['news']['group'] . "_gid

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
     
    $result = $db->execute($sql);
    return $result;
}


function rssAct($masterkey, $id , $limit = 15) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['news']['db'] . "." . $config['news']['db'] . "_id,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_subject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_title,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_htmlfilename,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_credate,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_pic,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_gid,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_picshow

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

      AND " . $config['news']['db'] . "." . $config['news']['db'] . "_gid = $id

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


function rssNews($masterkey, $id , $limit = 15) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['news']['db'] . "." . $config['news']['db'] . "_id,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_subject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_title,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_htmlfilename,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_credate,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_pic,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_groupProoject,
    " . $config['news']['db'] . "." . $config['news']['db'] . "_picshow

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

      AND " . $config['news']['db'] . "." . $config['news']['db'] . "_groupProoject = $id

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

function rssNewsAbout($masterkey) {
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT
  " . $config['about']['db'] . "." . $config['about']['db'] . "_id,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_subject,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_title,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_htmlfilename,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_credate,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_pic

  FROM
  " . $config['about']['db'] . "
  WHERE
  " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey = '$masterkey' AND
  " . $config['about']['db'] . "." . $config['about']['db'] . "_status != 'Disaboutle'

  ";

  if (!empty($id)) {
    $sql .= "

    AND " . $config['about']['db'] . "." . $config['about']['db'] . "_groupProoject = $id

    ";

  }
  $sql .= "
  ORDER  BY " . $config['about']['db'] . "." . $config['about']['db'] . "_order DESC LIMIT 0,15
  ";


  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function rssDownload($masterkey, $id , $limit = 15) {
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

function rssCareer($masterkey) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['job']['db'] . "." . $config['job']['db'] . "_id,
    " . $config['job']['db'] . "." . $config['job']['db'] . "_masterkey,
    " . $config['job']['db'] . "." . $config['job']['db'] . "_subject,
    " . $config['job']['db'] . "." . $config['job']['db'] . "_title,
    " . $config['job']['db'] . "." . $config['job']['db'] . "_htmlfilename,
    " . $config['job']['db'] . "." . $config['job']['db'] . "_credate,
    " . $config['job']['db'] . "." . $config['job']['db'] . "_pic

    FROM
    " . $config['job']['db'] . "
    WHERE
    " . $config['job']['db'] . "." . $config['job']['db'] . "_masterkey = '$masterkey' AND
    " . $config['job']['db'] . "." . $config['job']['db'] . "_status != 'Disable' AND
    ((" . $config['job']['db'] . "." . $config['job']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['job']['db'] . "." . $config['job']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['job']['db'] . "." . $config['job']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['job']['db'] . "." . $config['job']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['job']['db'] . "." . $config['job']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['job']['db'] . "." . $config['job']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['job']['db'] . "." . $config['job']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['job']['db'] . "." . $config['job']['db'] . "_edate)>=TO_DAYS(NOW())  ))

    ";

    $sql .= "
    ORDER  BY " . $config['job']['db'] . "." . $config['job']['db'] . "_order DESC LIMIT 0,15
    ";


    // print_pre($sql);
    $result = $db->execute($sql);
    // $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function rssAboutus($masterkey){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['about']['db'] . "." . $config['about']['db'] . "_id,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_htmlfilename,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_credate,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_view,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_description,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_keywords,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_metatitle
  FROM
  " . $config['about']['db'] . "
  WHERE
  " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey = '$masterkey' and
  " . $config['about']['db'] . "." . $config['about']['db'] . "_status = 'Enable'

  ";

  // $sql .= "
  // ORDER  BY " . $config['about']['db'] . "." . $config['about']['db'] . "_order DESC
  // ";

  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}


function rssSpecial($gid,$keyword){
  global $db,$config,$url;
  $sql = "SELECT
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_id as id,
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_masterkey as masterkey,
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_subject as subject,
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_title as title,
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_gid as gid,
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_credate as credate
 FROM
 " . $config['specia']['db'] . "
 WHERE
 " . $config['specia']['db'] . "." . $config['specia']['db'] . "_status != 'Disable'
 ";

  if (!empty($gid)) {
    $sql .= "
    AND " . $config['specia']['db'] . "." . $config['specia']['db'] . "_gid = $gid
    ";
  }

      $sql .= "
      AND " . $config['specia']['db'] . "." . $config['specia']['db'] . "_tid = 0
      ";



    $sql .= "
    AND " . $config['specia']['db'] . "." . $config['specia']['db'] . "_masterkey = '".$config['specia']['masterkey']."'
    ";

   $sql .= "
   ORDER  BY " . $config['specia']['db'] . "." . $config['specia']['db'] . "_order DESC
   ";
    // print_pre($sql);
 $result = $db->execute($sql);
 return $result;
}



function rssAboutMenu($masterkey,$link){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_id as id,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_masterkey as masterkey,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_subject as subject,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_link as link,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_rss as rss,
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_pic as pic
  FROM
  " . $config['about']['menu'] . "
  WHERE
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_masterkey = '$masterkey' and
  " . $config['about']['menu'] . "." . $config['about']['menu'] . "_status = 'Enable'

  ";

  if(!empty($link)){
      $sql .= "AND " . $config['about']['menu'] . "." . $config['about']['menu'] . "_link = '$link'";
  }

  $sql .= "
  ORDER  BY " . $config['about']['menu'] . "." . $config['about']['menu'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}


function chkSyntaxAnd($var){

return str_replace("&","And",$var);
}