<nav class="navbar navbar-expand-lg main-navbar bg-new">
    <form class="form-inline mr-auto" method="get" action="<?= base_url('search'); ?>">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" id="sidebar-btn" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>
    </form>
    <?php if (!logged_in()) : ?>
        <ul class="navbar-nav navbar-right">
            <a class="px-3" style="color: white; font-weight:bold;" href="<?= base_url('login'); ?>">Login</a>
            <a class="px-3" style="color: white; font-weight:bold;" href="<?= base_url('register'); ?>">Register</a>
        </ul>
    <?php endif; ?>
</nav>