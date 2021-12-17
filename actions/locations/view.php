<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$data = $db->single('locations',[
    'id' => $_GET['id']
]);

$category = $db->single('categories',[
    'id' => $data->category_id
]);

return compact('data','category','success_msg');