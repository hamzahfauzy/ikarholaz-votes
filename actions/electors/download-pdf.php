<?php

$role = get_role(auth()->user->id);
if($role->name == 'administrator')
{
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
                'no_urut'=>$vote->id,
                'candidate_name' => $candidate->name
            ]);

            $postdata['created_at'] = $vote->created_at;

            $postdata = http_build_query($postdata);

            $response = simple_curl($uri . '/download-pdf','POST',$postdata);
            $data = json_decode($response['content']);
            if($data->status)
            {
                header('location:'.$data->file_url);
                die();
            }

            header('location:index.php?r=electors/index');
            die();
        }
    }
}