<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Masuk</title>
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
                <div class="card full-height" id="form-admin">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/logo-munas-transparant.png" width="150px" height="50" alt="logo" style="object-fit: fill;">
                        </center>
                        <div class="card-title text-center">Login Form</div>
                        <div class="card-category text-center">Masukkan Username dan Password anda pada bidang di bawah ini.</div>

                        <form method="post">
                            <div class="form-group">
                                <label for="">Nama Pengguna</label>
                                <input type="text" name="username" id="" class="form-control mb-2" placeholder="Nama Pengguna Disini...">
                                <label for="">Kata Sandi</label>
                                <input type="password" name="password" id="" class="form-control mb-2" placeholder="Kata Sandi Disini...">
                                <button class="btn btn-primary btn-block btn-round">Masuk</button>
                                <br>
                                <p align="center">Jika anda voters Klik <a href="index.php?r=auth/login">Disini</a> untuk login sebagai voters.</p>
                            </div>
                        </form>
                    </div>
                </div>

                <div>
                    <center>Klik <a href="index.php?r=public/list-dpt">disini</a> untuk melihat daftar DPT</center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>