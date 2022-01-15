<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Masuk</title>
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
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>

                <?php if($error_msg): ?>
                <div class="alert alert-danger"><?=$error_msg?></div>
                <?php endif ?>
                <div class="card full-height <?=!empty($display) && $display == 'NRA' ? 'd-none' : ''?>" id="form-admin">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/main-logo.png" width="150px" height="100px" alt="logo" style="object-fit:cover;">
                        </center>
                        <div class="card-title text-center">Login Form</div>
                        <div class="card-category text-center">Masukkan Username dan Password anda pada bidang di bawah ini.</div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama Pengguna</label>
                                <input type="text" name="username" id="" class="form-control mb-2" placeholder="Nama Pengguna Disini...">
                                <label for="">Kata Sandi</label>
                                <input type="password" name="password" id="" class="form-control mb-2" placeholder="Kata Sandi Disini...">
                                <button class="btn btn-primary btn-block btn-round">Masuk</button>
                                <br>
                                <p align="center">Jika anda voters Klik <a href="javascript:void(0)" onclick="showVoters()">Disini</a> untuk login sebagai voters.</p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card full-height <?=!empty($display) && $display == 'NRA' ? '' : 'd-none'?>" id="form-voters">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/main-logo.png" width="150px" height="100px" alt="logo" style="object-fit:cover;">
                        </center>
                        <div class="card-title text-center">Login Form</div>
                        <div class="card-category text-center">Masukkan NRA anda.</div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">NRA</label>
                                <input type="text" name="NRA" id="" class="form-control mb-2" placeholder="NRA Disini...">
                                <button class="btn btn-primary btn-block btn-round">Request OTP</button>
                                <br>
                                <p align="center">Jika anda admin atau pengawas Klik <a href="javascript:void(0)" onclick="showAdmin()">Disini</a> untuk login sebagai admin atau pengawas.</p>
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