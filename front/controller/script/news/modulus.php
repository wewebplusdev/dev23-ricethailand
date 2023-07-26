<?php
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

function callNewsDetailMapID($id = null,$page = 1, $limit = 15, $order = null, $searchYear, $searchAgency, $searchSdate, $searchEdate, $searchKeyword)
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
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $config['cms']['masterkey'] . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' ";

  if($searchSdate == null && $searchEdate == null){
      $sql .= "AND
      ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
    ";
  }
if($searchYear != null){
  $sql .= "AND 
  " . $config['cms']['db']. "." . $config['cms']['db'] . "_yearid in 
  (SELECT " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_id FROM " . $config['cmg']['db']. " WHERE " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_subject LIKE '%".$searchYear."%')
    ";
}
if($searchAgency != null){
  $sql .= "AND 
  " . $config['cms']['db']. "." . $config['cms']['db'] . "_agenid in 
  (SELECT " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_id FROM " . $config['cmg']['db']. " WHERE " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_subject LIKE '%".$searchAgency."%')
    ";
}
if($searchSdate != null && $searchEdate != null){
  $sql .= "AND 
  (
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_sdate) BETWEEN TO_DAYS('".DateFormat($searchSdate)." 00:00:00') AND TO_DAYS('".DateFormat($searchEdate)." 23:59:00')
  AND
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_edate) BETWEEN TO_DAYS('".DateFormat($searchSdate)." 00:00:00') AND TO_DAYS('".DateFormat($searchEdate)." 23:59:00')
  )
  ";
}
if($searchSdate != null && $searchEdate == null){
  $sql .= "AND 
  (
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_sdate) >= TO_DAYS('".DateFormat($searchSdate)." 23:59:00')
  )
  ";
}
if($searchSdate == null && $searchEdate != null){
  $sql .= "AND 
  (
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_edate) <= TO_DAYS('".DateFormat($searchEdate)." 23:59:00')
  )
  ";
}
if($searchKeyword != null){
  $sql .= "AND 
  (" . $config['cms']['db']. "." . $config['cms']['db'] . "_subject LIKE '%".$searchKeyword."%'
  OR
  " . $config['cms']['db']. "." . $config['cms']['db'] . "_title LIKE '%".$searchKeyword."%')
  ";
}

  if (!empty($id)) {
    $sql .= "
    AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '" . $id . "'
    ";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order $order
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callNewsGroupDetail($id = null){
  global $config, $db, $url;
  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject 
  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['cms']['masterkey'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable' ";


  if (!empty($id)) {
    $sql .= "
    AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id = '" . $id . "'
    ";
  }


  // print_pre($sql);
//   $result = $db->execute($sql);
  $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callNewsUnitRows(){
  global $config, $db, $url;
  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject 
  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['masterkey']['agen'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable' ";

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
   $result = $db->execute($sql);
 // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callNewsYearRows(){
  global $config, $db, $url;
  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject 
  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['masterkey']['year'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable' ";

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
//   $result = $db->execute($sql);
  $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}



function callNewsDetail($id = null,$page = 1, $limit = 15, $order = null, $searchYear, $searchAgency, $searchSdate, $searchEdate, $searchKeyword)
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
	
	(
		(
			" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND 
			" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00'
		)   OR
		(
			" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND 
			TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) 
		) OR
		(
			TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) 
			AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' 
		)  OR
		(
			TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND 
			TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())
		)
	) 
	AND
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '" . $config['cms']['masterkey'] . "' and
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' ";

 
if($searchYear >=1){
  $sql .= " AND 
  " . $config['cms']['db']. "." . $config['cms']['db'] . "_yearid =  '".$searchYear."' ";
}
if($searchAgency >=1){
  $sql .= " AND 
  " . $config['cms']['db']. "." . $config['cms']['db'] . "_agenid =  '".$searchAgency."' ";
}

if($searchSdate != null && $searchEdate != null){
  $sql .= "AND 
  (
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_credate) BETWEEN TO_DAYS('".convReDateThai($searchSdate)." 00:00:00') AND TO_DAYS('".convReDateThai($searchEdate)." 23:59:00')
 
  )
  ";
}
if($searchSdate != null && $searchEdate == null){
  $sql .= "AND 
  (
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_credate) >= TO_DAYS('".convReDateThai($searchSdate)." 23:59:00')
  )
  ";
}
if($searchSdate == null && $searchEdate != null){
  $sql .= "AND 
  (
    TO_DAYS(" . $config['cms']['db']. "." . $config['cms']['db'] . "_credate) <= TO_DAYS('".convReDateThai($searchEdate)." 23:59:00')
  )
  ";
}
if($searchKeyword != null){
  $sql .= "AND 
  (" . $config['cms']['db']. "." . $config['cms']['db'] . "_subject LIKE '%".$searchKeyword."%'
  OR
  " . $config['cms']['db']. "." . $config['cms']['db'] . "_title LIKE '%".$searchKeyword."%')
  ";
}

  if (!empty($id)) {
    $sql .= "
    AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '" . $id . "'
    ";
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order $order
  ";

//  print_pre($sql);
//   $result = $db->execute($sql);
  $result = $db->pageexecute($sql, $limit, $page);
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

  $result = $db->execute($sql);
//   print_pre($sql);
//   return $sql;
  $view = $result->fields[0] + 1;

  $listView[$config['cms']['db'] . '_view'] = $view;
  $updateView = sqlupdate($listView, $config['cms']['db'], $config['cms']['db'] . "_id", "'" . $id . "'");

  return $updateView;
}

function callNewsDetailData($id = 0)
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
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_picshow as picshow,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_dwnid as dwnid,
  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_tag as tag,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as idg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_pic as picg,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_typeplan as typeplan

  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_id =  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject
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

function callNewsDetailFooter($gid = null,$limit = 15,$id = null)
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
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectg

  FROM
  " . $config['cms']['db'] . "
  INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_id =  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject
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

  if (!empty($gid)) {
    $sql .= "
    AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject = '" . $gid . "'
    ";
  }
  if (!empty($id)) {
    $sql .= "
    AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id != '" . $id . "'
    ";
  }
  if(!empty($limit)){
    $limit = "LIMIT ".$limit;
  }

  $sql .= "
  ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ".$limit."
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
//   $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callDownloadData($id = 0)
{
  global $config, $db, $url;

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
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_file as file,
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_agencyid as agencyid,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subjectyear 

  FROM
  " . $config['dwn']['db'] . "
    INNER JOIN
  " . $config['cmg']['db'] . "
  ON
  " . $config['cmg']['db']. "." . $config['cmg']['db'] . "_id =  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_yearid
  WHERE
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_masterkey = '" . $config['dwn']['masterkey'] . "' and
  " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_status != 'Disable'AND
  ((" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate='0000-00-00 00:00:00' AND
" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate='0000-00-00 00:00:00')   OR
(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate='0000-00-00 00:00:00' AND
TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
(TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate='0000-00-00 00:00:00' )  OR
(TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
TO_DAYS(" . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_edate)>=TO_DAYS(NOW())  ))
  ";

  if (!empty($id)) {
    $sql .= "
    AND " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id = '" . $id . "'
    ";
  }
  $sql .= "
  GROUP  BY " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_id
  ";

  $sql .= "
  ORDER  BY " . $config['dwn']['db'] . "." . $config['dwn']['db'] . "_order DESC
  ";
   // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function callmapID($Query){
  $mapID = array();
  foreach ($Query as $keyQuery => $valueQuery) {
    $mapID[] = $valueQuery[0];
    # code...
  }
  // print_pre($mapID);
  return $mapID;
}

function callDataTag($id = 0)
{
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id as id,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey as masterkey,
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_subject as subject

  FROM
  " . $config['cmg']['db'] . "
  WHERE
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_masterkey = '" . $config['cmg']['masterkeytag'] . "' and
  " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_status != 'Disable'
  ";

  if($id != null){
    $sql .= " AND " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_id in (" . implode(" , ", $id) . ")";
  }

  $sql .= "
  ORDER  BY " . $config['cmg']['db'] . "." . $config['cmg']['db'] . "_order DESC
  ";

  // print_pre($sql);
  $result = $db->execute($sql);
  // $result = $db->pageexecute($sql, $limit, $page);
  return $result;
}

function convReDateThai($valdate){
   $valdatearr = explode( '/', $valdate );
   $valReturn = ($valdatearr[2]-543)."-".$valdatearr[1]."-".$valdatearr[0];

   return $valReturn;

}
