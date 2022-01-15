<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Periode : <?=$data->name?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data periode voting</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="index.php?r=periods/index" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-hover table-sales">
                                <h1>Kandidat dan Hasil Votes</h1>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama</th>
                                            <th>Total Suara</th>
                                            <th>Presentase Suara</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($candidates as $index => $candidate): 
                                            $presentation = $candidate->total_vote != 0 ? $candidate->total_vote / $total : 0;
                                            $presentation *= 100;
                                        ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td><?=$candidate->name?></td>
                                            <td><?=$candidate->total_vote?></td>
                                            <td><?=number_format($presentation)?>%</td>
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