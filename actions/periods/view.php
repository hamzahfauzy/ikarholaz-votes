<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('periods',[
    'id' => $_GET['id']
]);

$db->query = "SELECT count(*) as total FROM votes WHERE period_id = $_GET[id]";
$vote = $db->exec('single');
$total = $vote->total;

$db->query = "SELECT candidates.*, count(votes.id) as total_vote FROM candidates LEFT JOIN votes ON votes.candidate_id = candidates.id WHERE candidates.period_id = $data->id GROUP BY candidates.name";
$candidates = $db->exec('all');

return compact('data','candidates','total');