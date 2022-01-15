<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Edit Kandidat : <?=$data->name?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data kandidat</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=candidates/index" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Periode</label>
                                    <select name="candidates[period_id]" id="" class="form-control">
                                        <?php foreach($periods as $period): ?>
                                        <option value="<?=$period->id?>" <?=$period->id==$data->period_id?'selected="}':''?>><?=$period->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="candidates[name]" class="form-control" required value="<?=$data->name?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Visi</label>
                                    <textarea name="candidates[vission]" id="" cols="30" rows="10" class="form-control"><?=$data->vission?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Misi</label>
                                    <textarea name="candidates[mission]" id="" cols="30" rows="10" class="form-control"><?=$data->mission?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="candidates[pic]" class="form-control">
                                    <br>
                                    <img src="<?=$data->pic?>" alt="" width="150px" id="pic">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>