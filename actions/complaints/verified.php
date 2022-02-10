<?php

$role = get_role(auth()->user->id);
if($role->name == 'administrator')
{
    $conn = conn();
    $db   = new Database($conn);
    
    $db->update('complaints',[
        'status' => $_GET['status']
    ],[
        'id' => $_GET['id']
    ]);
    
    set_flash_msg(['success'=>'Pengaduan berhasil diverifikasi']);
    header('location:index.php?r=complaints/index');
    die();
}