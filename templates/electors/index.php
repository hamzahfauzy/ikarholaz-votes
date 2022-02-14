<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">DPT</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data DPT</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    <a href="index.php?r=electors/verification" class="btn btn-secondary btn-round">Verifikasi DPT</a>
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
                                            <?php if($role->name == 'administrator'): ?>
                                            <th>Alumni</th>
                                            <?php endif ?>
                                            <th>NRA</th>
                                            <th>Register</th>
                                            <th>Tgl. Approve</th>
                                            <th>Status</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $role = get_role(auth()->user->id);
                                        foreach($datas as $index => $d): 
                                        ?>
                                        <tr>
                                            <td><?=$index+1?></td>
                                            <td><?=$d->name?></td>
                                            <?php if($role->name == 'administrator'): ?>
                                            <td><?=$d->graduation_year?></td>
                                            <?php endif ?>
                                            <td><?=$d->NRA?></td>
                                            <td><?=$d->registered_at?></td>
                                            <td><?=$d->created_at?></td>
                                            <td>
                                                <?php if(isset($votes[$d->NRA])): ?>
                                                <span class="badge badge-success">Sudah Vote</span>
                                                <br>
                                                <a href="index.php?r=electors/resend-pdf&id=<?=$d->id?>">Resend PDF</a>
                                                <br>
                                                (<?=$votes[$d->NRA]?>)
                                                <?php if($role->name == 'administrator'): ?>
                                                <a href="index.php?r=electors/download-pdf&id=<?=$d->id?>" target="_blank">Download PDF</a>
                                                <?php endif ?>
                                                <?php else: ?>
                                                <span class="badge badge-danger">Belum Vote</span>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <a href="index.php?r=electors/delete&id=<?=$d->id?>" class="btn btn-warning btn-sm">Un Verified</a>
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