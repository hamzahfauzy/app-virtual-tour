<?php
$conn = conn();
$db   = new Database($conn);

if(request() == 'POST')
{
    $pic  = $_FILES['image'];
    $ext  = pathinfo($pic['name'], PATHINFO_EXTENSION);
    $name = strtotime('now').'.'.$ext;
    $file = 'assets/'.$name;
    copy($pic['tmp_name'],'../storage/'.$file);
    $_POST['assets']['image_url'] = "index.php?r=api/get-asset&asset=$file";

    $db->insert('assets',$_POST['assets']);

    set_flash_msg(['success'=>'Aset Lokasi berhasil ditambahkan']);
    header('location:index.php?r=location-assets/index&location_id='.$_POST['assets']['location_id']);
}

$categories = $db->all('categories');

return compact('categories');