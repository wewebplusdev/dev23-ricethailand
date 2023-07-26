<?php
function Call_DataDetailFile($id)
{
  global $config, $db, $url;
  $lang = $url->pagelang[3];

  $sql = "SELECT 
          " . $config['alf']['db'] . "." . $config['alf']['db'] . "_id                AS id,
          " . $config['alf']['db'] . "." . $config['alf']['db'] . "_contantid         AS contantid,
          " . $config['alf']['db'] . "." . $config['alf']['db'] . "_filename          AS filename,
          " . $config['alf']['db'] . "." . $config['alf']['db'] . "_name              AS name,
          " . $config['alf']['db'] . "." . $config['alf']['db'] . "_download          AS download
  FROM " . $config['alf']['db'] . "  
  WHERE 1=1 AND
  " . $config['alf']['db'] . "." . $config['alf']['db'] . "_contantid = '" . $id . "'
  ";

  $sql .= " ORDER BY " . $config['alf']['db'] . "." . $config['alf']['db'] . "_id ASC ";
//   print_pre($sql);

  $result = $db->execute($sql);
  return $result;
}


function callNewsDetail($id = 0)
{
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['album']['db'] . "." . $config['album']['db'] . "_id as id,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_masterkey as masterkey,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_subject as subject,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_title as title,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_htmlfilename as htmlfilename,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_pic as pic,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_credate as credate,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_lastdate as lastdate,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_view as view,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_description as description,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_keywords as keywords,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_metatitle as metatitle,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_type as type,
  " . $config['album']['db'] . "." . $config['album']['db'] . "_target as target

  FROM
  " . $config['album']['db'] . "
  WHERE
  " . $config['album']['db'] . "." . $config['album']['db'] . "_masterkey = '" . $config['album']['masterkey'] . "' and
  " . $config['album']['db'] . "." . $config['album']['db'] . "_status != 'Disable'
  ";

  if (!empty($id)) {
    $sql .= "
    AND " . $config['album']['db'] . "." . $config['album']['db'] . "_id = '" . $id . "'
    ";
  }

  $sql .= "
  ORDER  BY " . $config['album']['db'] . "." . $config['album']['db'] . "_order DESC
  ";

//   print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function updateView($id, $masterkey)
{
  global $config, $db, $url;

  $sql = "SELECT
     " . $config['album']['db'] . "." . $config['album']['db'] . "_view
    FROM
      " . $config['album']['db'] . "
    WHERE
    " . $config['album']['db'] . "." . $config['album']['db'] . "_masterkey = '$masterkey' 
    AND
    " . $config['album']['db'] . "." . $config['album']['db'] . "_id = '$id' 
    ";

  $result = $db->execute($sql);
//   print_pre($sql);
//   return $sql;
  $view = $result->fields[0] + 1;

  $listView[$config['album']['db'] . '_view'] = $view;
  $updateView = sqlupdate($listView, $config['album']['db'], $config['album']['db'] . "_id", "'" . $id . "'");

  return $updateView;
}