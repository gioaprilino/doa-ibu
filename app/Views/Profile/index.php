<?= $this->extend('Layout/main'); ?>
<?= $this->section('content'); ?>

<?= validation_list_errors(); ?>

<form action="<?= base_url('profile'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="username-wrapper">
        <label for="">Username</label>
        <input type="text" name="username" value="<?= user()->username; ?>">
        <?= validation_show_error('username'); ?>
    </div>
    <div class="email-wrapper">
        <label for="">Email</label>
        <input type="text" name="email" value="<?= user()->email; ?>">
        <?= validation_show_error('email'); ?>
    </div>
    <div class="fullname-wrapper">
        <label for="">Full Name</label>
        <input type="text" name="name" value="<?= user()->name; ?>">
        <?= validation_show_error('name'); ?>
    </div>
    <div class="profile-wrapper">
        <label for="">Profile</label>
        <input type="file" name="profile">
    </div>
    <button type="submit">Kirim</button>
</form>

<?= $this->endSection(); ?>