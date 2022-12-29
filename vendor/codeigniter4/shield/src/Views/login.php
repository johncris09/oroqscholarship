
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <link rel="shortcut icon" href="<?= '/img/favicon.ico' ?>">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/unplug-ui-kit-pro/src/css/unplug-ui-kit.css">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/unplug-ui-kit-pro/demo/assets/css/unplug-ui-kit-demo.css"> 
</head>
<body>
    <main class="auth">
        <div class="container-fluid">
            <div class="row vh-100">
            
                <div class="col-md-6 text-center py-5 d-flex flex-column justify-content-center auth-bg-section text-white" style="background-image: url(<?=base_url()?>/img/login-bg.png)">
                     
                </div>
                <div class="col-md-6 text-center d-flex flex-column py-5 justify-content-center">
                    <div class="auth-form-section">
                        <div class="logo"><img src="<?=base_url()?>/img/login-black.png" class="img-fluid" alt="Unplug UI" width="500"></div>
                        <h2>Sign in</h2>   
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
                        
                        <form action="<?= url_to('login') ?>" method="post" class="auth-form">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="manabojc@gmail.com" required />
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control" name="password" inputmode="text" autocomplete="current-password" value="Test1234" placeholder="<?= lang('Auth.password') ?>" required />
                            </div>
                            <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?> 
                            <div class="d-md-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                                    <label class="form-check-label" for="termsAgriment">
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div> 
                            </div> 
                            <?php endif; ?> 
                        <button type="submit" class="btn btn-primary btn-block my-3"><?= lang('Auth.login') ?></button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>