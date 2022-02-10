<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('complaints',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    $db->update('complaints',$_POST['complaints'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Pengaduan berhasil diupdate']);
    header('location:index.php?r=complaints/index');
}

return [
    'data' => $data
];