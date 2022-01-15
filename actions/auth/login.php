<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$display = get_flash_msg('display');

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    if(isset($_POST['NRA']))
    {
        $uri = config('api_url');
        $response = simple_curl($uri . '/mobile/login-nra','POST','NRA='.$_POST['NRA']);
        $data = json_decode($response['content'],1);
        if(!isset($data['error']))
        {
            set_flash_msg([
                'NRA' => $_POST['NRA']
            ]);
            header('location:index.php?r=auth/otp');    
            die();
        }
        set_flash_msg(['error'=>'Login Gagal! NRA tidak ditemukan','display'=>'NRA']);
        header('location:index.php');
        die();
    }
    else
    {
        $user = $db->single('users',[
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        ]);
    
        if($user)
        {
            Session::set(['user_id'=>$user->id]);
            header('location:index.php');
            die();
        }
    
        set_flash_msg(['error'=>'Login Gagal! Nama Pengguna atau Kata Sandi tidak cocok']);
        header('location:index.php');
        die();
    }

}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
    'display' => $display,
];