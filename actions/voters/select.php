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

if($period && $elector)
{
    $vote = $db->single('votes',[
        'period_id' => $period->id,
        'NRA' => $NRA
    ]);

    if(empty($vote))
    {
        
        $vote = $db->insert('votes',[
            'period_id' => $period->id,
            'NRA' => $NRA,
            'candidate_id' => $_GET['id'],
        ]);

        $candidate = $db->single('candidates',[
            'id' => $_GET['id']
        ]);

        $uri = config('api_url');
        $postdata = array_merge((array) $elector, [
            'period' => $period->year,
            'no_urut' => $vote->id,
            'candidate_name' => $candidate->name
        ]);

        $postdata = http_build_query($postdata);

        simple_curl($uri . '/send-pdf','POST',$postdata);

        set_flash_msg(['success'=>'Selamat! Voting anda sudah masuk ke dalam kotak suara']);
    }
}

header('location:index.php?r=voters/index');
die();