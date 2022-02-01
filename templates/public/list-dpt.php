<?php load_templates('layouts/top-public') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">List DPT Tahun <?=$period->year?></h2>
                        <h5 class="text-white op-7 mb-2">List DPT</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-hover table-sales">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama</th>
                                            <th>Alumni</th>
                                            <th>NRA</th>
                                            <th>Register</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $d): ?>
                                        <tr>
                                            <td><?=$index+1?></td>
                                            <td><?=$d->name?></td>
                                            <td><?=$d->graduation_year?></td>
                                            <td><?=$d->NRA?></td>
                                            <td><?=$d->registered_at?></td>
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