<?php

$conn = conn();
$db   = new Database($conn);

$asset = $db->single('assets',[
    'id' => $_GET['id']
]);

$db->delete('assets',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Aset Lokasi berhasil dihapus']);
header('location:index.php?r=location-assets/index&location_id='.$asset->location_id);
die();