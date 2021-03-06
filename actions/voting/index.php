<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    $query = "SELECT votes.*, electors.name FROM votes JOIN electors ON electors.NRA = votes.NRA WHERE votes.period_id = $period->id";
    $db->query = $query;
    $data = $db->exec('all');
}
// $data = $db->all('periods');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];