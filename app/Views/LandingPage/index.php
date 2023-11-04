<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gossip</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/landingpage.css">
</head>

<body>
    <div class="div1">
        <div class="background">
            <div class="logo">
                <a href="<?= base_url('home'); ?>">
                    <img src="<?= base_url(); ?>assets/logo.png" width="50" height="50">
                </a>
            </div>

            <form action="<?= base_url('search'); ?>" method="get">
                <input type="text" name="search" placeholder="cari postingan">
            </form>
            <a href="<?= base_url('register'); ?>" class="button2">Register</a>
            <a href="<?= base_url('login'); ?>" class="button">Login</a>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-item">
            <p>Selamat datang di forum Gossip
                tempat dimana ide-ide dan pengetahuan bertemu dalam suasana yang
                ramah dan berinovasi. Bergabunglah dengan komunitas kami yang beragam
                berbagi pengalaman, dan mendapatkan wawasan baru
                Bersama-sama, kita akan menjelajahi berbagai topik menarik
                mendiskusikan masalah yang relevan, dan membangun jaringan yang kuat
                Jadilah bagian dari perubahan dan pertukaran ide yang tak terbatas
                Selamat berselancar di dunia diskusi yang penuh inspirasi ini!</p>
        </div>

        <div class="grid-item2 ">
            <img src="<?= base_url(); ?>assets/org.png" alt="">
        </div>

    </div>

</body>

</html>