<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>OTP</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/logo-munas-transparant.png" type="image/x-icon"/>

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
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>

                <?php if($error_msg): ?>
                <div class="alert alert-danger"><?=$error_msg?></div>
                <?php endif ?>
                <div class="card full-height">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/logo-munas-transparant.png" width="150px" height="100px" alt="logo" style="object-fit:cover;">
                        </center>
                        <div class="card-title text-center">OTP Form</div>
                        <div class="card-category text-center">Masukkan OTP anda yang telah dikirimkan ke nomor anda.</div>

                        <form action="" method="post">
                            <input type="hidden" name="NRA" value="<?=$nra?>">
                            <div class="form-group">
                                <label for="">NRA</label>
                                <input type="text" class="form-control" value="<?=$nra?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">OTP</label>
                                <input type="text" name="OTP" id="" class="form-control mb-2" placeholder="OTP Disini...">
                                <button class="btn btn-primary btn-block btn-round" name="submit_type" value="verifikasi">Verifikasi</button>
                                <button class="btn btn-danger btn-block btn-round" name="submit_type" value="batal">Batal</button>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
var adminForm = document.querySelector('#form-admin')
var votersForm = document.querySelector('#form-voters')
function showVoters()
{
    adminForm.classList.add('d-none')
    votersForm.classList.remove('d-none')
}

function showAdmin()
{
    votersForm.classList.add('d-none')
    adminForm.classList.remove('d-none')
}
</script>
</html>