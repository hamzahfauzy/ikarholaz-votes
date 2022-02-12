<?php

$conn = conn();
$db   = new Database($conn);
$id   = $_GET['id'];

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    // $data = $db->all('electors',['period_id'=>$period->id]);
    // $id  = http_build_query($id);
    $uri = config('api_url');
    $response = simple_curl($uri . '/mobile/admin/alumni','GET');
    $data = json_decode($response['content']);
    $data = $data->data;

    foreach($data as $alumni)
    {
        if(in_array($alumni->id,$id))
        {
            $db->insert('electors',[
                'period_id' => $period->id,
                'NRA' => $alumni->NRA,
                'name' => addslashes($alumni->name),
                'graduation_year' => $alumni->graduation_year,
                'verificated_by' => auth()->user->name,
                'registered_at' => $alumni->tanggal,
            ]);
        }
    }


    set_flash_msg(['success'=>'DPT berhasil diverifikasi']);
    header('location:index.php?r=electors/index');
}