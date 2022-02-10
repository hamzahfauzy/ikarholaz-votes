<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Pengaduan</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data pengaduan voting</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=complaints/create" class="btn btn-secondary btn-round">Buat Pengaduan</a>
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
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama</th>
                                            <th>NRA</th>
                                            <th>Kandidat</th>
                                            <th>Alasan</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $role = get_role(auth()->user->id);
                                        foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td><?=$data->name?></td>
                                            <td><?=$data->NRA?></td>
                                            <td><?=$data->candidate_name?></td>
                                            <td><?=$data->description?></td>
                                            <td>
                                                <?php if($role->name == 'administrator'): ?>
                                                    <?php if($data->status): ?>
                                                        <?= $data->status?>
                                                    <?php else: ?>
                                                        <a href="index.php?r=complaints/verified&status=approve&id=<?=$data->id?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                                        <a href="index.php?r=complaints/verified&status=reject&id=<?=$data->id?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                                    <?php endif ?>
                                                <?php else: ?>
                                                    <a href="index.php?r=complaints/edit&id=<?=$data->id?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <a href="index.php?r=complaints/delete&id=<?=$data->id?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                <?php endif ?>
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