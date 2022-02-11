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
    $uri = config('api_url');
    $response = simple_curl($uri . '/mobile/admin/alumni','GET');
    $data = json_decode($response['content']);
    if($data)
    {
        $data = $data->data;
        foreach($data as $key => $value)
        {
            if(in_array($value->NRA,$ids))
            {
                unset($data[$key]);
            }
        }
    }
}
// $data = $db->all('periods');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];