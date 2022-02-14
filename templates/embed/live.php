<?php if(!empty($period)): ?>
<style>
* {
    font-family:Arial;
}
</style>
<table class="table" id="myTable" style="color:#FFF">
    <tr>
        <th>KANDIDAT</th>
        <th>TOTAL SUARA</th>
    </tr>
    <?php 
    foreach($candidates as $index => $candidate): 
        $presentation = $candidate->total_vote != 0 ? $candidate->total_vote / $count_suara : 0;
        $presentation *= 100;
    ?>
    <tr>
        <td><?=$candidate->name?></td>
        <td><?=$candidate->total_vote?></td>
    </tr>
    <?php endforeach ?>
</table>

<table class="table" style="color:#FFF">
    <tbody>
        <tr>
            <td>JUMLAH SUARA</td>
            <td><?=$count_suara?></td>
        </tr>
        <tr>
            <td>UPDATE DPT</td>
            <td><span id="updatedpt"></span></td>
        </tr>
    </tbody>
</table>
<script> 
setTimeout(e => {
    location.reload()
},5000)

function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

sortTable();
fetch('<?=config('api_url')?>/mobile/dpt').then(res => res.text()).then(res => {
    document.querySelector('#updatedpt').innerHTML = res
})
</script>
<?php endif ?>