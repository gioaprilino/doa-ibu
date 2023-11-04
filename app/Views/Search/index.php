<?php

use CodeIgniter\I18n\Time;
?>
<?= $this->extend('Layout/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <?php
    foreach ($data as $index => $values) :
        $time = Time::parse($values['created_at']);
    ?>
        <a href="<?= base_url('post') . '/' . $values['id_postingan']; ?>" class="postingan-link" style="width: 100%;">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="profile">
                        <img src="<?= base_url() . $values['profile']; ?>" alt="" loading="lazy">
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
                                <img src="<?= base_url() . $values['file']; ?>" alt="" class="img-fluid" loading="lazy">
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