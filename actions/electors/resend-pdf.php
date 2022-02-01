<?php

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods',[
    'status' => 'Aktif'
]);

if($period)
{
    $elector = $db->single('electors',[
        'id' => $_GET['id']
    ]);

    $vote = $db->single('votes',[
        'period_id' => $period->id,
        'NRA' => $elector->NRA
    ]);

    if(!empty($vote))
    {
        $candidate = $db->single('candidates',[
            'id' => $vote->candidate_id
        ]);

        $uri = config('api_url');
        $postdata = array_merge((array) $elector, [
            'period'=>$period->year,
            'candidate_name' => $candidate->name
        ]);
        simple_curl($uri . '/send-pdf','POST',$postdata);

        set_flash_msg(['success'=>'PDF Sudah dikirim ulang.']);
        header('location:index.php?r=electors/index');
        die();
    }
}

set_flash_msg(['fail'=>'Gagal.']);
header('location:index.php?r=electors/index');
die();