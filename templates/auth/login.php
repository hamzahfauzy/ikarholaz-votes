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
                <div class="card full-height d-none" id="form-admin">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/logo-munas-transparant.png" width="150px" height="50" alt="logo" style="object-fit: fill;">
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

                <div class="card full-height" id="form-voters">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/logo-munas-transparant.png" width="150px" height="50" alt="logo" style="object-fit: fill;">
                        </center>
                        <div class="card-title text-center">Login Form</div>
                        <div class="card-category text-center">Masukkan NRA anda.</div>

                        <form id="form-nra" action="" method="post" onsubmit="return false">
                            <div class="form-group">
                                <label for="">NRA</label>
                                <input type="text" name="NRA" id="" class="form-control mb-2" placeholder="NRA Disini...">
                                <!-- <button class="btn btn-primary btn-block btn-round">Request OTP</button> -->
                            </div>
                            <div class="form-group" id="recaptcha-container"></div>
                            <p align="center">Jika anda admin atau pengawas Klik <a href="javascript:void(0)" onclick="showAdmin()">Disini</a> untuk login sebagai admin atau pengawas.</p>
                        </form>

                        <form id="form-otp" action="" method="post" onsubmit="return false" style="display:none">
                            <div class="form-group">
                                <label for="">OTP</label>
                                <input type="text" name="OTP" id="" class="form-control mb-2" placeholder="OTP Disini...">
                                <button class="btn btn-primary btn-block btn-round btn-otp" onclick="handleOTP()">Verifikasi OTP</button>
                                <br>
                                <p align="center">Jika anda admin atau pengawas Klik <a href="javascript:void(0)" onclick="showAdmin()">Disini</a> untuk login sebagai admin atau pengawas.</p>
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
<script src="assets/js/firebase.js"></script>
<script>
const auth = firebaseauth.getAuth();

var adminForm = document.querySelector('#form-admin')
var votersForm = document.querySelector('#form-voters')

initRecaptcha()

function showVoters()
{
    adminForm.classList.add('d-none')
    votersForm.classList.remove('d-none')
    initRecaptcha()
}

function showAdmin()
{
    votersForm.classList.add('d-none')
    adminForm.classList.remove('d-none')
}

function initRecaptcha()
{
    if(window.recaptchaVerifier)
        window.recaptchaVerifier.clear()
    
    window.recaptchaVerifier = new firebaseauth.RecaptchaVerifier('recaptcha-container', {
        'size': 'normal',
        'callback': login
    }, auth);
    window.recaptchaVerifier.render().then((widgetId) => {
        window.recaptchaWidgetId = widgetId;
    });
}

async function login(){
    try{

        let NRA = document.querySelector('input[name=NRA]').value
        const appVerifier = window.recaptchaVerifier;

        // if(phoneNumber.startsWith(0)){
        //     phoneNumber = '+62'+phoneNumber.slice(1)
        // }

        var formData = new FormData();
        formData.append('NRA',NRA)

        fetch('<?=config('api_url').'/mobile/login-nra'?>',{
            method:'POST',
            body:formData
        })
        .then(res => res.json())
        .then(res => {
            if(res.status == 'success')
            {
                var phoneNumber = res.phone
                firebaseauth.signInWithPhoneNumber(auth, phoneNumber, appVerifier)
                .then((confirmationResult) => {
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;
                    var postData = {'phone':phoneNumber,'token_data':res.token_data}

                    localStorage.setItem("postData",JSON.stringify(postData))

                    document.querySelector('#form-otp').style.display = 'block'
                    document.querySelector('#form-nra').style.display = 'none'
                    // window.location = '{{route('otp')}}'
                }).catch((error) => {
                    console.error(error)
                });
            }
            else
            {
                alert('Nomor HP tidak Valid')
                window.recaptchaVerifier.clear()

                initRecaptcha()
            }
        })

        // signInWithPhoneNumber(auth, phoneNumber, appVerifier)
        // .then((confirmationResult) => {
        //     // SMS sent. Prompt user to type the code from the message, then sign the
        //     // user in with confirmationResult.confirm(code).
        //     window.confirmationResult = confirmationResult;
        //     var postData = {'phone':phoneNumber,'login':this.isAdmin ? 'admin' : 'user'}

        //     localStorage.setItem("postData",JSON.stringify(postData))
        //     this.$router.push('/otp')
        // }).catch((error) => {
        //     console.error(error)
        // });
        
    }catch(err){
        console.log(err)
    }
}

function handleOTP()
{
    var postedData = JSON.parse(localStorage.getItem("postData"))
    var btn_otp = document.querySelector('.btn-otp')
    btn_otp.innerHTML = "Memverifikasi OTP..."
    var otp = document.querySelector('input[name=OTP]').value
    if (otp) {
        window.confirmationResult.confirm(otp).then( async (result) => {
            var formData = new FormData
            formData.append('phone',postedData.phone)
            formData.append('otp',otp)
            formData.append('token_data',postedData.token_data)
            fetch('index.php?r=auth/otp',{
                method:'POST',
                body:formData
            })
            .then(res => res.json())
            .then(res => {
                if(res.status == 'success')
                {
                    window.location = 'index.php?r=voters/index'
                }
                else
                {
                    alert("OTP Tidak Valid")
                }
                btn_otp.innerHTML = "Submit"
            })
        }).catch((error) => {
            console.error(error)
            btn_otp.innerHTML = "Submit"
        });

    } else {
        alert("Lengkapi otp terlebih dahulu");
    }
}
</script>
</html>