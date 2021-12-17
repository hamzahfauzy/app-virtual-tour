<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Lokasi : <?=$data->name?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data aset lokasi</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=locations/index" class="btn btn-warning btn-round">Kembali</a> &nbsp;
                        <a href="index.php?r=location-assets/create&location_id=<?=$data->id?>" class="btn btn-secondary btn-round">Tambah Asset</a>
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
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($assets as $index => $asset): ?>
                                        <tr>
                                            <td><?=$index+1?></td>
                                            <td><?=$asset->title?></td>
                                            <td>
                                                <a href="<?=$asset->image_url?>" target="_blank">
                                                    <img src="<?=$asset->image_url?>" width="200px" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="index.php?r=location-assets/view&id=<?=$asset->id?>" class="btn btn-sm btn-success"><i class="fas fa-cog"></i> Setting Hotspot</a>
                                                <a href="index.php?r=location-assets/edit&location_id=<?=$_GET['location_id']?>&id=<?=$asset->id?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                <a href="index.php?r=location-assets/delete&id=<?=$asset->id?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<?php load_templates('layouts/bottom') ?>