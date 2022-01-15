<?php
$conn = conn();
$db   = new Database($conn);

if(request() == 'POST')
{
    $pic  = $_FILES['candidates'];
    $ext  = pathinfo($pic['name']['pic'], PATHINFO_EXTENSION);
    $name = strtotime('now').'.'.$ext;
    $file = 'uploads/books/'.$name;
    copy($pic['tmp_name']['pic'],$file);
    $_POST['candidates']['pic'] = $file;

    $db->insert('candidates',$_POST['candidates']);

    set_flash_msg(['success'=>'Kandidat berhasil ditambahkan']);
    header('location:index.php?r=candidates/index');
}

$periods = $db->all('periods');

return compact('periods');