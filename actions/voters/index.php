<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$period = $db->single('periods',[
    'status' => 'Aktif'
]);
$vote = [];
$elector = [];

if($period)
{
    $elector = $db->single('electors',[
        'period_id' => $period->id,
        'NRA' => auth()->user->NRA
    ]);

    $vote = $db->single('votes',[
        'period_id' => $period->id,
        'NRA' => auth()->user->NRA
    ]);
}

return compact('success_msg','error_msg','period','vote','elector');