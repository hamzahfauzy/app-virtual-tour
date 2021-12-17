<?php load_templates('layouts/top') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>
    #panorama {
        width: 100%;
        height: 400px;
    }
    </style>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Setting Hotspot : <?=$asset->title?> di <?=$data->name?></h2>
                        <h5 class="text-white op-7 mb-2">Setting hotspot asset</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=location-assets/index&location_id=<?=$data->id?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div id="panorama"></div>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Tipe</label>
                                    <select name="hs_type" id="hs_type" class="form-control" onchange="toggleType(this.value)">
                                        <option value="">- Pilih -</option>
                                        <?php foreach(['asset','text'] as $type): ?>
                                        <option value="<?=$type?>"><?=$type?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group hs-type text-type d-none">
                                    <label for="">Text</label>
                                    <input type="text" name="hs_text" class="form-control">
                                </div>
                                <div class="form-group hs-type text-type d-none">
                                    <label for="">URL (Boleh Kosong)</label>
                                    <input type="text" name="hs_url" class="form-control">
                                </div>
                                <div class="form-group hs-type asset-type d-none">
                                    <label for="">Target Aset</label>
                                    <select name="asset_target_id" id="" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <?php foreach($assets as $ast): ?>
                                        <option value="<?=$ast->id?>"><?=$ast->title?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pitch</label>
                                    <input type="text" name="pitch" id="pitch" class="form-control" required value="0">
                                </div>
                                <div class="form-group">
                                    <label for="">Yaw</label>
                                    <input type="text" name="yaw" id="yaw" class="form-control" required value="0">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <p></p>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Hotspot</th>
                                            <th>Detail</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($hotspots as $key => $hotspot): ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$asset->title?> Hotspot <?=$key+1?></td>
                                            <td>
                                                Pitch : <?=$hotspot->target_pitch?><br>
                                                Yaw : <?=$hotspot->target_yaw?><br>
                                                <?php if($hotspot->hs_type == 'text'): ?>
                                                Text : <?=$hotspot->hs_text?><br>
                                                URL : <?=$hotspot->hs_url?><br>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <a href="index.php?r=hotspot/delete&id=<?=$hotspot->id?>"></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var viewer = pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "<?=$asset->image_url?>",
        "autoLoad": true
    });

    viewer.on('mousedown', function(event) {
        // For pitch and yaw of center of viewer
        // console.log(viewer.getPitch(), viewer.getYaw());
        var coor = viewer.mouseEventToCoords(event)
        document.querySelector('#pitch').value = coor[0]
        document.querySelector('#yaw').value = coor[1]
        // For pitch and yaw of mouse location
        // console.log(viewer.mouseEventToCoords(event));
    });

    function toggleType(val)
    {
        document.querySelectorAll('.hs-type').forEach(el => {
            el.classList.add('d-none')
        })
        var typ = document.querySelectorAll('.'+val+'-type')
        typ.forEach(el => {
            el.classList.remove('d-none')
        })
    }
    </script>
<?php load_templates('layouts/bottom') ?>