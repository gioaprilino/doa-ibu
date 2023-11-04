<?php

use CodeIgniter\I18n\Time;

?>

<?= $this->extend('Layout/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="profile-wrapper">
            <div class="wrapper">
                <img src="<?= base_url() . user()->profile; ?>" alt="" class="img-fluid">
                <div class="detail-profile">
                    <span><?= user()->name; ?></span>
                    <br>
                    <span>@<?= user()->username; ?></span>
                </div>
            </div>
            <div class="update-btn-wrapper p-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Update Profile
                </button>
            </div>
        </div>
    </div>
    <div class="col-12">
        <h4 class="mt-4 mb-4" style="text-align:center; color:black;">Postingan</h4>
        <?php
        foreach ($data as $index => $values) :
            $time = Time::parse($values['created_at']);
        ?>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="profile">
                        <img src="<?= base_url() . user()->profile; ?>" alt="">
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
                    <div class="komentar-section">
                        <form action="<?= base_url('comment') . '/' . $values['id_postingan']; ?>" method="post" enctype="multipart/form-data">
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
                        $comment = $komenModel->getComment($values['id_postingan']);
                        foreach ($comment as $i => $value) :
                            $timeComment = Time::parse($value['created_at']);
                        ?>
                            <div class="komentar">
                                <div class="komentar-profile">
                                    <div class="profile">
                                        <img src="<?= base_url() . user()->profile; ?>" alt="">
                                    </div>
                                    <div class="profile-detail">
                                        <span><?= $values['name']; ?> • <?= $timeComment->humanize(); ?></span>
                                        <br>
                                        <p><?= $value['comment']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('modal'); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('profile'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= user()->username; ?>">
                        <?= validation_show_error('username'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= user()->email; ?>">
                        <?= validation_show_error('email'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?= user()->name; ?>">
                        <?= validation_show_error('name'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Profile</label>
                        <input type="file" class="form-control" id="formFile" name="profile">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>