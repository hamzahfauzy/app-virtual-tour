<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=app('name')?> - <?=$location->name?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>
    body {
        margin:0;
        padding:0;
    }
    #panorama {
        width: 100%;
        height: 100vh;
    }
    </style>
</head>
<body>

<div id="panorama"></div>
<script>
pannellum.viewer('panorama', {   
    "default": {
        "firstScene": "<?=array_keys($scenes)[0]?>",
        "author": "<?=app('name')?>",
        "sceneFadeDuration": 1000,
        "autoLoad": true
    },

    "scenes": <?=json_encode($scenes,JSON_PRETTY_PRINT)?>,
});
</script>

</body>
</html>