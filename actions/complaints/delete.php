<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('complaints',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Pengaduan berhasil dihapus']);
header('location:index.php?r=complaints/index');
die();