<?php

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods',[
    'status' => 'Aktif'
]);

if(empty($period))
{
    header('location:index.php?r=voters/index');
    die();
}

$candidates = $db->all('candidates',[
    'period_id' => $period->id
]);

return compact('candidates','period');