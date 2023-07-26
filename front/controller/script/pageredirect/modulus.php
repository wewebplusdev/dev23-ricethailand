<?php
class pageredirectPage
{
  function callcms($masterkey, $id = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject" . $lang . " as subject,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_lastdate as lastdate,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_gid as gid,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_type as type,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_url as url,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_urlc as urlc,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_target as target

    FROM
    " . $config['cms']['db'] . "
    WHERE
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject" . $lang . " != '' AND
    ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

    $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' ";

    if (!empty($id)) {
      $sql .= " AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id = '" . $id . "' ";
    }

    $sql .= " ORDER  BY "  . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }
}
