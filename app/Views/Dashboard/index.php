<?php

use CodeIgniter\I18n\Time;

?>
<?= $this->extend('Layout/main'); ?>
<?= $this->section('content'); ?>
<div class="create-postingan">
    <form action="<?= base_url('post'); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="judul">
            <input type="text" name="judul">
        </div>
        <div class="konten">
            <textarea name="postingan" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="file-upload">
            <input type="file" name="file">
        </div>
        <button type="submit">Kirim</button>
    </form>
</div>

<div class="row">
    <?php
    foreach ($data as $index => $values) :
        $time = Time::parse($values['created_at']);
    ?>
        <a href="<?= base_url('post') . '/' . $values['id_postingan']; ?>" class="postingan-link">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="profile">
                        <img src="<?= base_url() . $values['profile']; ?>" alt="">
                    </div>
                    <div class="profile-detail">
                        <span><?= $values['name']; ?></span>
                        <br>
                        <span><?= $time->humanize(); ?></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="komen-col">
                        <div class="col-6">
                            <h4><?= $values['judul']; ?></h4>
                        </div>
                        <?php if ($values['file'] != NULL) : ?>
                            <div class="col-6">
                                <img src="<?= base_url() . $values['file']; ?>" alt="" class="img-fluid">
                            </div>
                        <?php endif; ?>
                        <div class="<?= ($values['file'] != NULL) ? 'col-6' : 'col-12'; ?>">
                            <p class="card-text"><?= $values['postingan']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>