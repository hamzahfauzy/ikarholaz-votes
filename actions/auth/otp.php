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
    $response = simple_curl($uri . '/mobile/verify-otp-nra','POST','NRA='.$_POST['NRA'].'&OTP='.$_POST['OTP']);
    $data = json_decode($response['content'],1);
    if(isset($data['data']))
    {
        Session::set(['voter' => $data['data']]);
        header('location:index.php?r=voters/index');
        die();
    }
    set_flash_msg(['error'=>'Gagal! OTP Tidak Valid','NRA' => $_POST['NRA']]);
    header('location:index.php?r=auth/otp');
    die();
}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
    'nra' => $nra
];