<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('locations',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    $db->update('locations',$_POST['locations'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Lokasi berhasil diupdate']);
    header('location:index.php?r=location-assets/index&location_id='.$_GET['id']);
}

$categories = $db->all('categories');

return compact('categories','data');