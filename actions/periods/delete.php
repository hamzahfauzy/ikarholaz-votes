<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('periods',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Periode berhasil dihapus']);
header('location:index.php?r=periods/index');
die();