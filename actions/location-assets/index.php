<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$data = $db->single('locations',[
    'id' => $_GET['location_id']
]);

$assets = $db->all('assets',[
    'location_id' => $_GET['location_id']
]);

return compact('data','assets','success_msg');