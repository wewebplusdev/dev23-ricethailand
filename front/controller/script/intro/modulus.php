<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 function callIntro(){
   global $config, $db, $url;

   $sql = "SELECT
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_id,
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_masterkey,
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_subject,
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_credate,
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_file,
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_color
   FROM
   " . $config['intro']['db'] . "
   WHERE
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_masterkey = '".$config['intro']['masterkey']."' and
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_status != 'Disable' AND
   ((" . $config['intro']['db'] . "." . $config['intro']['db'] . "_sdate='0000-00-00 00:00:00' AND
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_edate='0000-00-00 00:00:00')   OR
   (" . $config['intro']['db'] . "." . $config['intro']['db'] . "_sdate='0000-00-00 00:00:00' AND
   TO_DAYS(" . $config['intro']['db'] . "." . $config['intro']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
   (TO_DAYS(" . $config['intro']['db'] . "." . $config['intro']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
   " . $config['intro']['db'] . "." . $config['intro']['db'] . "_edate='0000-00-00 00:00:00' )  OR
   (TO_DAYS(" . $config['intro']['db'] . "." . $config['intro']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
   TO_DAYS(" . $config['intro']['db'] . "." . $config['intro']['db'] . "_edate)>=TO_DAYS(NOW())  ))

   ";



   $sql .= "
   ORDER  BY " . $config['intro']['db'] . "." . $config['intro']['db'] . "_order DESC
   ";

   // print_pre($sql);

   $result = $db->execute($sql);
   // $result = $db->pageexecute($sql, $limit, $page);
   return $result;
 }
