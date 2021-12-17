<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('locations',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Lokasi berhasil dihapus']);
header('location:index.php?r=locations/index');
die();