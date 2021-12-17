<?php
$conn = conn();
$db   = new Database($conn);

if(request() == 'POST')
{

    $location = $db->insert('locations',$_POST['locations']);

    set_flash_msg(['success'=>'Lokasi berhasil ditambahkan']);
    header('location:index.php?r=location-assets/index&location_id='.$location->id);
}

$categories = $db->all('categories');

return compact('categories');