<?php

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods',[
    'status' => 'Aktif'
]);

if($period)
{
    $NRA = auth()->user->NRA;
    $vote = $db->single('votes',[
        'period_id' => $period->id,
        'NRA' => $NRA
    ]);

    if(empty($vote))
    {
        
        $db->insert('votes',[
            'period_id' => $period->id,
            'NRA' => $NRA,
            'candidate_id' => $_GET['id'],
        ]);

        $candidate = $db->single('candidates',[
            'id' => $_GET['id']
        ]);

        $elector = $db->single('electors',[
            'NRA' => $NRA
        ]);

        $uri = config('api_url');
        $postdata = array_merge((array) $elector, [
            'period' => $period->year,
            'candidate_name' => $candidate->name
        ]);
        simple_curl($uri . '/send-pdf','POST',$postdata);

        set_flash_msg(['success'=>'Selamat! Voting anda sudah masuk ke dalam kotak suara']);
    }
}

header('location:index.php?r=voters/index');
die();