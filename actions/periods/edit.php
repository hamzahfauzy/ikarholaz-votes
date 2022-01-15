<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('periods',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    $db->update('periods',$_POST['periods'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Periode berhasil diupdate']);
    header('location:index.php?r=periods/index');
}

return [
    'data' => $data
];