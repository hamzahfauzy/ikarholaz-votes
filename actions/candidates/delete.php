<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('candidates',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Kandidat berhasil dihapus']);
header('location:index.php?r=candidates/index');
die();