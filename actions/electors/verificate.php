<?php

$conn = conn();
$db   = new Database($conn);
$id   = $_GET['id'];

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    // $data = $db->all('electors',['period_id'=>$period->id]);
    $uri = config('api_url');
    $response = simple_curl($uri . '/mobile/admin/alumni/'.$id,'GET');
    $data = json_decode($response['content']);
    $data = $data->data;

    $db->insert('electors',[
        'period_id' => $period->id,
        'NRA' => $data->NRA,
        'name' => $data->name,
        'graduation_year' => $data->graduation_year,
        'verificated_by' => auth()->user->name,
        'registered_at' => $data->tanggal,
    ]);

    set_flash_msg(['success'=>'DPT berhasil diverifikasi']);
    header('location:index.php?r=electors/index');
}