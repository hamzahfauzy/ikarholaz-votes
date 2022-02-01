<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    $all_electors = $db->all('electors',['period_id'=>$period->id]);
    $all_electors = (array) $all_electors;
    $ids = array_column($all_electors, 'NRA');
    $ids = implode(',',$ids);
    $uri = config('api_url');
    $response = simple_curl($uri . '/mobile/admin/alumni?nras='.$ids,'GET');
    $data = json_decode($response['content']);
    $data = $data->data;
}
// $data = $db->all('periods');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];