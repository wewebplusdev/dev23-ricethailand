<?php
function callNewsDetail($id = 0)
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
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_url as url,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_filevdo as filevdo,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_picshow as picshow

  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $config['cms']['masterkey'] . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable'
  ";

  if (!empty($id)) {
    $sql .= "
    AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id = '" . $id . "'
    ";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC
  ";

//   print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callNews($page = 1, $limit = 15, $search = null, $order = null)
{
  global $config, $db, $url;
  if ($order == null) {
    $order = 'DESC';
  }
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
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_url as url,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_filevdo as filevdo,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_picshow as picshow

  FROM
  " . $config['cms']['db'] . "
  WHERE
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $config['cms']['masterkey'] . "' and
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

  if ($search != null) {
    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject LIKE '%".$search."%' OR " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title LIKE '%".$search."%' ";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order $order
  ";

//   print_pre($sql);
//   $result = $db->execute($sql);
  $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function Call_DataDetaiAlbum($id)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT 
          " . $config['cma']['db'] . "." . $config['cma']['db'] . "_id                AS id,
          " . $config['cma']['db'] . "." . $config['cma']['db'] . "_contantid         AS contantid,
          " . $config['cma']['db'] . "." . $config['cma']['db'] . "_filename          AS filename,
          " . $config['cma']['db'] . "." . $config['cma']['db'] . "_name              AS name,
          " . $config['cma']['db'] . "." . $config['cma']['db'] . "_download          AS download
  FROM " . $config['cma']['db'] . "  
  WHERE 1=1 AND
  " . $config['cma']['db'] . "." . $config['cma']['db'] . "_contantid = '" . $id . "'
  ";

  $sql .= " ORDER BY " . $config['cma']['db'] . "." . $config['cma']['db'] . "_id ASC ";
//   print_pre($sql);

  $result = $db->execute($sql);
  return $result;
}

function Call_DataDetailFile($id)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT 
          " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_id                AS id,
          " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_contantid         AS contantid,
          " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_filename          AS filename,
          " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_name              AS name,
          " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_download          AS download
  FROM " . $config['cmf']['db'] . "  
  WHERE 1=1 AND
  " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_contantid = '" . $id . "'
  ";

  $sql .= " ORDER BY " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_id ASC ";
//   print_pre($sql);

  $result = $db->execute($sql);
  return $result;
}

function updateView($id, $masterkey)
{
  global $config, $db, $url;

  $sql = "SELECT
     " . $config['cms']['db'] . "." . $config['cms']['db'] . "_view
    FROM
      " . $config['cms']['db'] . "
    WHERE
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '$masterkey' 
    AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id = '$id' 
    ";

    // print_pre($sql);
  $result = $db->execute($sql);
//   return $sql;
  $view = $result->fields[0] + 1;

  $listView[$config['cms']['db'] . '_view'] = $view;
  $updateView = sqlupdate($listView, $config['cms']['db'], $config['cms']['db'] . "_id", "'" . $id . "'");

  return $updateView;
}