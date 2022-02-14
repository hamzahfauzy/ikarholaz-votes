<?php if(!empty($period)): ?>
<table class="table" style="color:#FFF">
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
            <td><?=$candidate->name?></td>
            <td><?=$candidate->total_vote?></td>
            <td><?=number_format($presentation)?>%</td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<table class="table" style="color:#FFF">
    <tbody>
        <tr>
            <td>Jumlah Kandidat</td>
            <td><?=$count_candidate?></td>
        </tr>
        <tr>
            <td>Jumlah Suara</td>
            <td><?=$count_suara?></td>
        </tr>
        <tr>
            <td>Jumlah DPT</td>
            <td><?=$count_dpt?></td>
        </tr>
    </tbody>
</table>
<script> 
setTimeout(e => {
    location.reload()
},5000)
</script>
<?php endif ?>