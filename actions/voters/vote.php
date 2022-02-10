<?php

$conn = conn();
$db   = new Database($conn);

$NRA = auth()->user->NRA;
$elector = [];

$period = $db->single('periods',[
    'status' => 'Aktif'
]);

if($period)
$elector = $db->single('electors',[
    'period_id' => $period->id,
    'NRA' => $NRA
]);


if(empty($period) || empty($elector))
{
    header('location:index.php?r=voters/index');
    die();
}

$candidates = $db->all('candidates',[
    'period_id' => $period->id
]);

return compact('candidates','period');