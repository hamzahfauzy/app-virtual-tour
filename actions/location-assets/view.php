<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$asset = $db->single('assets',[
    'id' => $_GET['id']
]);

$data = $db->single('locations',[
    'id' => $asset->location_id
]);

$assets = $db->all('assets',[
    'id' => ['<>', $asset->id]
]);

if(request() == 'POST')
{
    if($_POST['hs_type'] == 'asset')
    {
        $db->insert('hotspots',[
            'hs_type' => $_POST['hs_type'],
            'asset_id' => $_GET['id'],
            'asset_target_id' => $_POST['asset_target_id'],
            'target_yaw' => $_POST['yaw'],
            'target_pitch' => $_POST['pitch'],
        ]);
    }
    else
    {
        $db->insert('hotspots',[
            'hs_type' => $_POST['hs_type'],
            'asset_id' => $_GET['id'],
            'target_yaw' => $_POST['yaw'],
            'target_pitch' => $_POST['pitch'],
            'hs_text' => $_POST['hs_text'],
            'hs_url' => $_POST['hs_url'],
        ]);
    }
    set_flash_msg(['success'=>'Hotspot berhasil dibuat']);
    header('location:index.php?r=location-assets/view&id='.$_GET['id']);
    die();
}

$hotspots = $db->all('hotspots',[
    'asset_id' => $_GET['id']
]);

return compact('data','asset','assets','success_msg','hotspots');