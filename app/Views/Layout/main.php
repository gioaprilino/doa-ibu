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
                        <a href="index.html">GOSSIP</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">GS</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown">
                            <a href="<?= base_url('home'); ?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                        </li>
                    </ul>
                </aside>
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
</body>

</html>