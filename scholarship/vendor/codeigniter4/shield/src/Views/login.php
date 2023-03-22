<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url('/public/img/favicon.ico') ?>">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-18/css/style.css"> 
    <style>
        
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: 15px;
        margin-right: 5px;
        position: relative;
        z-index: 2;
        cursor: pointer;
    }
    </style>
</head>

<body>
	<section class="ftco-section">
		<div class="container"> 
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6  col-sm-12">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center"> 
                            <img src="<?=base_url()?>/public/img/logo-sm.png" class="img-fluid" alt="Logo" width="500">
                        </div>
						<h3 class="text-center mb-4">Oroquieta City Scholarship Program</h3>
						<h6 class="text-center mb-4">Please login to your account</h6>
                        <?php if (session('error') !== null) : ?>
                            <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                        <?php elseif (session('errors') !== null) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php if (is_array(session('errors'))) : ?>
                                    <?php foreach (session('errors') as $error) : ?>
                                        <?= $error ?>
                                        <br>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <?= session('errors') ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>

                        <?php if (session('message') !== null) : ?>
                        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                        <?php endif ?>
                        
                        <form action="<?= url_to('login') ?>" method="post" class="login-form auth-form"> 
							<div class="form-group"> 
                                <input type="text" class="form-control rounded-left text-center" name="username" inputmode="username" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" required />
                            </div>
							<div class="form-group d-flex"> 
                                <input type="password" class="form-control rounded-left text-center" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required />
                                <span toggle="#password" class="fa fa-fw field-icon toggle-password fa-eye"></span>
                            </div>
                             
							<div class="form-group"> 
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5"> <i class="fa fa-user"></i> <?= lang('Auth.login') ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://preview.colorlib.com/theme/bootstrap/login-form-18/js/jquery.min.js"></script>
	<script src="https://preview.colorlib.com/theme/bootstrap/login-form-18/js/popper.js"></script>
	<script src="https://preview.colorlib.com/theme/bootstrap/login-form-18/js/bootstrap.min.js"></script>
    <script>
    // show password when toggle
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $('input[name="password"');
        console.info(input.attr("type")) 
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    </script>
</body>

</html>