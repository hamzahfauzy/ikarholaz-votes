<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
$_votes = [];
if($period)
{
    $data = $db->all('electors',['period_id'=>$period->id]);
    $votes = $db->all('votes',['period_id'=>$period->id]);
    foreach($votes as $vote)
    {
        $_votes[$vote->NRA] = $vote->created_at;
    }
}
// $data = $db->all('periods');

return [
    'datas' => $data,
    'votes' => $votes,
    'success_msg' => $success_msg
];