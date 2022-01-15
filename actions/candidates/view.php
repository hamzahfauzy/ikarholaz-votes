<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('candidates',[
    'id' => $_GET['id']
]);

$period = $db->single('periods',[
    'id' => $data->period_id
]);

return compact('data','period');