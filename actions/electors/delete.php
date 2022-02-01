<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('electors',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'DPT berhasil di unverified']);
header('location:index.php?r=electors/index');
die();