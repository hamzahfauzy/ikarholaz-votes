<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('candidates',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    if(!empty($_FILES['candidates']['name']['pic']))
    {
        $pic  = $_FILES['candidates'];
        $ext  = pathinfo($pic['name']['pic'], PATHINFO_EXTENSION);
        $name = strtotime('now').'.'.$ext;
        $file = 'uploads/books/'.$name;
        copy($pic['tmp_name']['pic'],$file);
        $_POST['candidates']['pic'] = $file;
    }
    else
        $_POST['candidates']['pic'] = $data->pic;
        
    $db->update('candidates',$_POST['candidates'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Kandidat berhasil diupdate']);
    header('location:index.php?r=candidates/index');
}

return [
    'data' => $data
];