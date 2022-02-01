<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$nra = get_flash_msg('NRA');
if(request() == 'GET' && !$nra)
{
    header('location:index.php');
    die();
}

if(request() == 'POST')
{
    $uri = config('api_url');
    $post = http_build_query($_POST);
    $response = simple_curl($uri . '/mobile/verify-otp-nra','POST',$post);
    $data = json_decode($response['content'],1);
    if(isset($data['data']))
    {
        Session::set(['voter' => $data['data']]);
        // header('location:index.php?r=voters/index');
        echo json_encode(['status'=>'success', 'response' => $data]);
        die();
    }
    echo json_encode(['status'=>'fail', 'response' => $data]);
    die();
}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
    'nra' => $nra
];