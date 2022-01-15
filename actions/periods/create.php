<?php

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $db->insert('periods',$_POST['periods']);

    set_flash_msg(['success'=>'Periode berhasil ditambahkan']);
    header('location:index.php?r=periods/index');
}