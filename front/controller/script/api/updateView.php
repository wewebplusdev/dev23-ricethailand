<?php

 /*## Start Update View #####*/
 if (!isset($_COOKIE['VIEW_' . $config['ban']['masterkey'] . '_' . urldecode($_POST['id'])])) {
    setcookie("VIEW_" . $config['ban']['masterkey'] . '_' . urldecode($_POST['id']), true, time() + 600);
    $viewContent = updateView($_POST['id'], $config['ban']['masterkey'],$config['ban']['db']);
}
$callWeblink = callWeblinkApi($_POST['id']);
$data_respone['id'] = $callWeblink->fields['id'];
$data_respone['link'] = $callWeblink->fields['link'];
$data_respone['target'] = $callWeblink->fields['target'];
echo json_encode($data_respone);
/*## End Update View #####*/