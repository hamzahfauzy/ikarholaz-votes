<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    $data = $db->all('complaints',[
        'period_id' => $period->id
    ]);
}

return [
    'datas' => $data,
    'success_msg' => $success_msg
];