<?php

$conn = conn();
$db   = new Database($conn);

$location = $db->single('locations',[
    'id' => $_GET['location_id']
]);

$scenes = [];
$assets = $db->all('assets',[
    'location_id' => $_GET['location_id']
]);
foreach($assets as $asset)
{
    $hotspots = $db->all('hotspots',[
        'asset_id' => $asset->id
    ]);
    $_hotspots = [];
    foreach($hotspots as $hotspot)
    {
        if($hotspot->asset_target_id)
        {
            $hs_scene = $db->single('assets',[
                'id' => $hotspot->asset_target_id
            ]);
            $sceneId = str_replace(' ','_',$hs_scene->title);
            $_hotspots[] = [
                'pitch'=>(double) $hotspot->target_pitch,
                'yaw'=>(double) $hotspot->target_yaw,
                'type'=>'scene',
                'text'=>$hs_scene->title,
                'sceneId'=>$sceneId
            ];
        }
        else
        {
            $_hotspots[] = [
                'pitch'=>(double) $hotspot->target_pitch,
                'yaw'=>(double) $hotspot->target_yaw,
                'type'=>'info',
                'text'=>$hotspot->hs_text,
                'URL' =>$hotspot->hs_url
            ];
        }
    }
    $scene_name = str_replace(' ','_',$asset->title);
    $scenes[$scene_name] = [
        "hfov" => 0,
        "yaw"  => 0,
        "type" => "equirectangular",
        "panorama" => $asset->image_url,
        "hotSpots" => $_hotspots
    ];
}

return compact('scenes','location');