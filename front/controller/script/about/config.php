<?php
Seo('Home','','');

$config['mem']['db'] = "md_mem";
$config['mem']['masterkey'] = "mem";

$config['album']['db'] = "md_al";
$config['album']['masterkey'] = "ab";

$config['alf']['db'] = "md_alf";

//booking
$config['booking']['db'] = "md_booking";

//Top g
$config['tgp']['db'] = "md_tgp";
$config['tgp']['masterkey'] = "tgp";

$arrTypeReward = array(
    '0' => '',
    '1' => 'ยอดโอนครบ จับฉลากทันที',
    '2' => 'เลขท้าย 2 ตัว (บน)',
    '3' => 'เลขท้าย 2 ตัว (ล่าง)',
    '4' => 'อื่นๆ',
);