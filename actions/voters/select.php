<?php

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods',[
    'status' => 'Aktif'
]);

if($period)
{
    $vote = $db->single('votes',[
        'period_id' => $period->id,
        'NRA' => auth()->user->NRA
    ]);

    if(empty($vote))
    {
        $db->insert('votes',[
            'period_id' => $period->id,
            'NRA' => auth()->user->NRA,
            'candidate_id' => $_GET['id'],
        ]);

        set_flash_msg(['success'=>'Selamat! Voting anda sudah masuk ke dalam kotak suara']);
    }
}

header('location:index.php?r=voters/index');
die();