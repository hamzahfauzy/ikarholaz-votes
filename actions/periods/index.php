<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$data = $db->all('periods');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];