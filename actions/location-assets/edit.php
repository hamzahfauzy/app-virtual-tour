<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('assets',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    $_POST['assets']['image_url'] = $data->image_url;
    if(!empty($_FILES['image']['name']))
    {
        $pic  = $_FILES['image'];
        $ext  = pathinfo($pic['name'], PATHINFO_EXTENSION);
        $name = strtotime('now').'.'.$ext;
        $file = 'assets/'.$name;
        copy($pic['tmp_name'],'../storage/'.$file);
        $_POST['assets']['image_url'] = "index.php?r=api/get-asset&asset=$file";
    }
    $db->update('assets',$_POST['assets'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Aset Lokasi berhasil diupdate']);
    header('location:index.php?r=location-assets/index&location_id='.$data->location_id);
}

return compact('data');