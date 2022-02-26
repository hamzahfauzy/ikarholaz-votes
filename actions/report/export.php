<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

$period = $db->single('periods',['status'=>'Aktif']);
$data = [];
if($period)
{
    $query = "SELECT votes.*, electors.name as elector_name, candidates.name as candidate_name FROM votes JOIN electors ON electors.NRA = votes.NRA JOIN candidates ON candidates.id = votes.candidate_id WHERE votes.period_id = $period->id";
    $db->query = $query;
    $data = $db->exec('all');

    $delimiter = ","; 
    $filename = "export-data-" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 

    // Set column headers 
    $fields = array('ID', 'NAMA', 'NRA', 'Pilihan Caketum', 'Tanggal Vote'); 

    fputcsv($f, $fields, $delimiter); 

    foreach($data as $i => $d)
    {
        $lineData = array($i+1, $d->elector_name, $d->NRA, $d->candidate_name, $d->created_at); 
        fputcsv($f, $lineData, $delimiter); 
    }

    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 

    die();
}
// $data = $db->all('periods');

return [
    'datas' => $data,
    'success_msg' => $success_msg
];