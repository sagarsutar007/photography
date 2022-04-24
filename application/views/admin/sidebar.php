<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= ADMIN_ASSETS. '/img/AdminLTELogo.png'; ?>" alt="logo icon" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= APPNAME; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php
                if(empty($this->session->userdata('photo'))){
                    $image = ADMIN_ASSETS. 'img/user2-160x160.jpg';
                } else {
                    $photo = "assets/site/images/" . $this->session->userdata('photo');
                    if(file_exists($photo)){
                        $image = $photo;
                    } else {
                        $image = ADMIN_ASSETS. 'img/user2-160x160.jpg';
                    }
                }
            ?>
            <img src="<?= $image; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('name'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?= base_url('admin'); ?>" class="nav-link <?= ($page=='dashboard')?'active':''; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('albums/viewAll'); ?>" class="nav-link <?= ($page=='albums')?'active':''; ?>">
                    <i class="nav-icon fas fa-photo-video"></i>
                    <p> Albums </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/blog'); ?>" class="nav-link <?= ($page=='blog')?'active':''; ?>">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p> Blog </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/comments'); ?>" class="nav-link <?= ($page=='comments')?'active':''; ?>">
                <i class="nav-icon fas fa-comments"></i>
                    <p> Comments <span class="right badge badge-danger">New</span> </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link <?= ($page=='settings')?'active':''; ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p> Settings <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/categories'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/account'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Account</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- ./Main Sidebar Container -->