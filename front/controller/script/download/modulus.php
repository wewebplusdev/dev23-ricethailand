<?php

function downloadShow($search) {
    global $config, $db;
    $sql = "SELECT
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id,
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_masterkey,
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_subject,
    " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_title,
    " . $config['dwf']['db'] . "." . $config['dwf']['db'] . "_filename,
    " . $config['dwf']['db'] . "." . $config['dwf']['db'] . "_name,
    " . $config['dwf']['db'] . "." . $config['dwf']['db'] . "_download,
    '" . $config['dwf']['db'] . "' as td
FROM
  " . $config['dwn']['db'] . "
INNER JOIN
  " . $config['dwf']['db'] . "
ON
  " . $config['dwf']['db'] . "." . $config['dwf']['db'] . "_contantid = " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id
WHERE
" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_status != 'Disable' AND
" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_masterkey = '".$config['dwn']['masterkey']."'
";

if (!empty($search)) {
    $sql .= " and " . $config['dwf']['db'] . "." . $config['dwf']['db'] . "_name like '%$search%' ";
}


$sql.=" ORDER BY " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id DESC ";
    $result = $db->execute($sql);

    return $result;

}
 include_once("analyticstracking.php"); 
