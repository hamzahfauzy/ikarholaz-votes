<?php

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $period = $db->single('periods',['status'=>'Aktif']);

    $_POST['complaints']['period_id'] = $period->id;
    $_POST['complaints']['created_by'] = auth()->user->name;

    $db->insert('complaints',$_POST['complaints']);

    set_flash_msg(['success'=>'Pengaduan berhasil ditambahkan']);
    header('location:index.php?r=complaints/index');
}