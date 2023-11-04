<?php

use CodeIgniter\I18n\Time;

$time = Time::parse($data['created_at']);

?>
<?= $this->extend('Layout/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <div class="profile">
                <img src="<?= base_url(); ?>uploads/default.png" alt="">
            </div>
            <div class="profile-detail">
                <span><?= $data['name']; ?></span>
                <br>
                <span><?= $time->humanize(); ?></span>
            </div>
        </div>
        <div class="card-body">
            <div class="komen-col">
                <div class="col-6">
                    <h4><?= $data['judul']; ?></h4>
                </div>
                <?php if ($data['file'] != NULL) : ?>
                    <div class="col-6">
                        <img src="<?= base_url() . $data['file']; ?>" alt="" class="img-fluid">
                    </div>
                <?php endif; ?>
                <div class="<?= ($data['file'] != NULL) ? 'col-6' : 'col-12'; ?>">
                    <p class="card-text"><?= $data['postingan']; ?></p>
                </div>
            </div>
            <div class="komentar-section">
                <form action="<?= base_url('comment') . '/' . $data['id_postingan']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="komentar-wrapper col-11">
                            <input type="text" class="form-control comment-field" placeholder="Tambahkan Komentar..." name="comment">
                            <label for="file">
                                <i class="fa fa-file"></i>
                                <input type="file" id="file" style="display: none" name="file" accept="image/gif,image/jpeg,image/jpg,image/png">
                            </label>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary w-full">kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="list-komentar">
                <?php
                $comment = $komenModel->getComment($data['id_postingan']);
                foreach ($comment as $i => $value) :
                    $timeComment = Time::parse($value['created_at']);
                ?>
                    <div class="komentar">
                        <div class="komentar-profile">
                            <div class="profile">
                                <img src="<?= base_url(); ?>uploads/default.png" alt="">
                            </div>
                            <div class="profile-detail">
                                <span><?= $value['name']; ?> • <?= $timeComment->humanize(); ?></span>
                                <br>
                                <p><?= $value['comment']; ?></p>
                                <?php if ($value['file'] != NULL) : ?>
                                    <div class="col-6">
                                        <img src="<?= base_url() . $value['file']; ?>" alt="" class="img-fluid">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>