<?php

$conn = conn();
$db   = new Database($conn);

$hotspot = $db->single('hotspots',[
    'id' => $_GET['id']
]);

$db->delete('hotspots',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Hotspot berhasil dihapus']);
header('location:index.php?r=location-assets/view&id='.$hotspot->asset_id);
die();