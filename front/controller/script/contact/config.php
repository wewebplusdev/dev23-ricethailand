<?php
Seo('Home','','');

$config['mem']['db'] = "md_mem";
$config['mem']['masterkey'] = "mem";
$config['contact']['db'] = "md_cus";
$config['contact']['mail'] = "md_cue";
$config['contact']['masterkey'] = "ct";

$config['album_lucky']['db'] = "md_cma";

//booking
$config['booking']['db'] = "md_booking";

//Top g
$config['tgp']['db'] = "md_tgp";
$config['tgp']['masterkey'] = "tgp";

//Setiing
$config['setting']['db'] = "md_site";
$config['setting']['masterkey'] = "site";


$arrTypeReward = array(
    '0' => '',
    '1' => 'ยอดโอนครบ จับฉลากทันที',
    '2' => 'เลขท้าย 2 ตัว (บน)',
    '3' => 'เลขท้าย 2 ตัว (ล่าง)',
    '4' => 'อื่นๆ',
);