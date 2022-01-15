<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Voting Dashboard</h5>
                    </div>
                </div>
            </div>
        </div>
        <?php if(empty($period)): ?>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12">
                    <div class="card full-height">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Overall statistics</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Jumlah Kandidat</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Jumlah Suara Masuk</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Jumlah Pemilih</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">20 Pemilih Terakhir</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>NRA</td>
                                        <td>Waktu</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($votes as $key => $vote): ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$vote->NRA?></td>
                                        <td><?=$vote->created_at?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Quick Count</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kandidat</th>
                                        <th>Total Suara</th>
                                        <th>Presentase Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($candidates as $index => $candidate): 
                                        $presentation = $candidate->total_vote != 0 ? $candidate->total_vote / $count_suara : 0;
                                        $presentation *= 100;
                                    ?>
                                    <tr>
                                        <td style="text-align:center;">
                                            <div class="p-4">
                                                <img src="<?=$candidate->pic?>" alt="" width="100px"><br>
                                                <?=$candidate->name?>
                                            </div>
                                        </td>
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
        <?php endif ?>
    </div>
    <?php if(!empty($period)): ?>
    <!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
    <script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:<?=$count_candidate?>,
			maxValue:<?=$count_candidate?>,
			width:7,
			text: <?=$count_candidate?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:<?=$count_suara?>,
			maxValue:<?=$count_dpt?>,
			width:7,
			text: <?=$count_suara?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:<?=$count_dpt?>,
			maxValue:<?=$count_dpt?>,
			width:7,
			text: <?=$count_dpt?>,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
        setTimeout(e => {
            location.reload()
        },60000)
	</script>
    <?php endif ?>
<?php load_templates('layouts/bottom') ?>