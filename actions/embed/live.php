<?php

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods');
$count_candidate = 0;
$count_suara = 0;
$count_dpt = 0;
$votes = [];
$candidates = [];
if($period)
{
    $clause = ['period_id'=>$period->id];
    $count_candidate = count($db->all('candidates',$clause));
    $count_suara = count($db->all('votes',$clause));

    $db->query = "SELECT * FROM votes WHERE period_id = $period->id ORDER BY id DESC LIMIT 20";
    $votes = $db->exec('all');
    $uri = config('api_url');
    $response = simple_curl($uri . '/mobile/dpt');
    $count_dpt = $response['content'];

    $db->query = "SELECT candidates.*, count(votes.id) as total_vote FROM candidates LEFT JOIN votes ON votes.candidate_id = candidates.id WHERE candidates.period_id = $period->id GROUP BY candidates.name";
    $candidates = $db->exec('all');
}

return compact('period','count_candidate','count_suara','count_dpt','votes','candidates');