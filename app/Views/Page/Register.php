<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/register.css">
</head>

<body>

    <div class="Register">
        <div class="logo">
            <img src="<?= base_url(); ?>assets/logo.png" width="200" height="200">
        </div>
        <div class="card">
            <h2 class="card-header">Register</h2>
            <div class="card-body">
                <form action="<?= url_to('register') ?>" method="post" class="form">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>

                    <div class="form-group">
                        <label for="email"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" placeholder="Full Name" value="<?= old('name') ?>">
                    </div>

                    <div class="form-group">
                        <label for="password"><?= lang('Auth.password') ?></label>
                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                    <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>" style="color: white;"><?= lang('Auth.signIn') ?></a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>