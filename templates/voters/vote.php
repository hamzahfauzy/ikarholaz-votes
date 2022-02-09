<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Voter Page</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/main-logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-12 text-center">
                <h2>Pilih Kandidat Anda</h2>
            </div>
            <?php foreach($candidates as $candidate): ?>
            <div class="col-12 col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <img src="<?=$candidate->pic?>" width="100%" height="200px" alt="logo" style="object-fit:cover;">
                            <p style="font-weight:bold;"><?=$candidate->name?></p>
                            <a href="index.php?r=voters/select&id=<?=$candidate->id?>" onclick="if(confirm('Apakah anda yakin akan memilih <?=$candidate->name?> ?')){return true}else{return false}" class="btn btn-success btn-sm">Pilih Kandidat Ini</a>
                        </center>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <div class="col-12 text-center">
                <a href="index.php?r=voters/index" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>