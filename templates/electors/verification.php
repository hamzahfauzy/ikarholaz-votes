<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Verifikasi DPT</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data DPT</h5>
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
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div class="table-responsive table-hover table-sales">
                                <button class="btn btn-success btn-sm" onclick="selectAll()">Select All</button>
                                <button class="btn btn-primary btn-sm" onclick="verifiedSelected()">Verifikasi yang Terpilih</button>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama</th>
                                            <th>Alumni</th>
                                            <th>NRA</th>
                                            <th>Register</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $d): ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" name="check[]" value="<?=$d->id?>"></td>
                                            <td><?=$d->name?></td>
                                            <td><?=$d->graduation_year?></td>
                                            <td><?=$d->NRA?></td>
                                            <td><?=$d->tanggal?></td>
                                            <td>
                                                <a href="index.php?r=electors/verificate&id[]=<?=$d->id?>" class="btn btn-success">Verifikasi</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-sm" onclick="verifiedSelected()">Verifikasi yang Terpilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function selectAll()
    {
        document.querySeletorAll('.checkbox').forEach(el => {
            el.checked = true
        })
    }
    function verifiedSelected()
    {
        var query_string = ""
        var checkedBoxes = document.querySelectorAll('input.checkbox:checked');
        for(i=0;i<checkBoxes.length;i++)
        {
            query_string += "id[]="+checkBoxes[i].value+"&"
        }

        window.location = "index.php?r=electors/verificate&" + query_string
    }
    </script>
<?php load_templates('layouts/bottom') ?>