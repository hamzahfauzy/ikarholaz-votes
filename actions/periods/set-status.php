<?php

$conn = conn();
$db   = new Database($conn);
$status = $_GET['status'];

if($status == 'Aktif')
    $db->update('periods',['status'=>'Tidak Aktif'],[
        'status' => 'Aktif'
    ]);

$db->update('periods',['status'=>$status],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Status Periode berhasil di update']);
header('location:index.php?r=periods/index');