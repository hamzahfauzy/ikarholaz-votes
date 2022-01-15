<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$db->query = "SELECT candidates.*, periods.name as period_name FROM candidates JOIN periods ON periods.id = candidates.period_id";
$data = $db->exec('all');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];