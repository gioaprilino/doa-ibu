<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Bootstrap Components &rsaquo; Navbar &mdash; Stisla</title>


    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/custom.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
</head>

<body>
    <div id="app">
        <?= $this->include('Layout/navbar'); ?>
        <div class="main-wrapper main-wrapper-1">
            <div class="main-sidebar sidebar-style-2 d-flex flex-column justify-content-between">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url('home'); ?>">GOSSIP</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('home'); ?>">GS</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown">
                            <a href="<?= base_url('home'); ?>" class="nav-link"><i class="fas fa-home" style="font-size: 1.3rem;"></i><span style="font-size: 1.5rem;">Home</span></a>
                            <?php if (logged_in()) : ?>
                                <a data-bs-toggle="modal" data-bs-target="#modal-insert" class="nav-link"><i class="fas fa-plus-square" style="font-size: 1.3rem;"></i><span style="font-size: 1.5rem;">Create</span></a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </aside>
                <?php if (logged_in()) : ?>
                    <li class="dropdown"><a data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() . user()->profile; ?>" class="rounded-circle mr-1 img-fluid p-sidebar">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username; ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('profile'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                <?php endif; ?>
            </div>

            <div class="main-content">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
    <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script> -->
    <!-- <script src="<?= base_url(); ?>assets/js/stisla.js"></script> -->

    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/js/page/bootstrap-modal.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/custom.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            if (!window.matchMedia('(max-width: 1024px)').matches) {
                $('#sidebar-btn').hide();
            }
        })
    </script>
    <?= $this->renderSection('modal'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-insert">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Postingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('post'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="postingan" class="form-label">Konten</label>
                            <textarea name="postingan" id="postingan" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" id="file" name="file" class="form-control">
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
</body>

</html>