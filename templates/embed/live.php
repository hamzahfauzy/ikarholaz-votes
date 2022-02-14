
<?php if(!empty($period)): ?>
<h1>Quick Count</h1>
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
<script> 
setTimeout(e => {
    location.reload()
},5000)
</script>
<?php endif ?>