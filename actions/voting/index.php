<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    $data = $db->all('votes',['period_id'=>$period->id]);
}
// $data = $db->all('periods');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];