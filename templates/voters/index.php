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
            <div class="col-sm-12 col-md-6 mx-auto">
                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>

                <?php if($error_msg): ?>
                <div class="alert alert-danger"><?=$error_msg?></div>
                <?php endif ?>
                <div class="card full-height">
                    <div class="card-body">
                        <h1 class="text-center">eVote Application</h1>
                        <div class="card-title text-center">Selamat Datang</div>
                        <center>
                            <img src="<?= auth()->user->profile_pic ? config('profile_url') . '/' .auth()->user->profile_pic : 'assets/img/user-placeholder.png' ?>" height="150px" alt="logo" style="object-fit:cover;">
                        </center>
                        <div class="card-category text-center">
                            <?=auth()->user->name?><br>
                            NRA : <b><?=auth()->user->NRA?></b>
                        </div>

                        <center>
                            <?php 
                            if($period): 
                                if(empty($elector))
                                {
                                    echo '<div class="d-block"><span class="alert alert-danger">NRA anda belum di verifikasi untuk periode '.$period->name.'</span></div><br>';
                                }
                                if(empty($vote)):
                            ?>   
                            <a href="index.php?r=voters/vote" class="btn btn-success">Mulai Voting</a>
                            <?php else: ?>
                            <br>
                            <span class="alert alert-success">Anda sudah melakukan Voting</span><br>
                            <br>
                            <?php endif; else: ?>
                            <br>
                            <span class="alert alert-warning">Tidak ada sesi Voting yang aktif</span><br>
                            <br>
                            <?php endif ?>
                            <a href="index.php?r=auth/logout" class="btn btn-danger">Log Out</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>