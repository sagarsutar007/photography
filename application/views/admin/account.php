<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/fontawesome-free/css/all.min.css'; ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <style>
    .profile-user-img{
      height: 100px;
    }

    .user-panel img{
      height: 2.1rem!important;
    }

    .btn-fav{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 30px;
        font-size: 12px;
        border-radius: 50%;
        margin: 0px auto;
    }

    .btn-fav-success{
        background-color: #00FF00;
    }
    .btn-fav-danger{
        background-color: #FF0000;
    }
    .img-rounded {
        border-radius: .25rem;
        height: 80px;
        margin-right: 10px;
    }
  </style>
</head>
<body class="hold-transition dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini sidebar-collapse">
<div class="wrapper">
  <?php 
    $this->load->view('admin/navbar'); 
    $this->load->view('admin/sidebar');  
  ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
              <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                      <?php 
                        if(empty($admin['photo'])){
                           $image = "https://via.placeholder.com/120x120?text=preview";
                        }else{
                           if (file_exists('assets/site/images/' . $admin['photo'])) {
                              $image = base_url('assets/site/images/' . $admin['photo']);
                           } else {
                              $image = "https://via.placeholder.com/120x120?text=preview";
                           }
                        }
                      ?>
                      <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle" src="<?= $image; ?>" alt="User profile picture" />
                      </div>
                      <h3 class="profile-username text-center"><?= $admin['name']; ?></h3>
                      <p class="text-muted text-center"><?= $admin['designation']; ?></p>
                      <form method="post" action="<?= base_url('admin/updateProfilePic'); ?>" id="change-profile" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="file" class="custom-file-input" id="profilePic">
                              <label class="custom-file-label" for="profilePic">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Now</button>   
                      </form>   
                  </div>
              </div>
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">About Me</h3>
                  </div>
                  <div class="card-body">
                      <?= $admin['about']; ?>
                  </div>
              </div>
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Work</h3>
                  </div>
                  <div class="card-body">
                      <?= $admin['work']; ?>
                  </div>
              </div>
          </div>
          <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                          <a class="nav-link active" href="#personal" data-toggle="tab">Personal</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#company" data-toggle="tab">Company</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#account" data-toggle="tab">Account</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="personal">
                          <form action="<?= base_url('admin/updatePersonal'); ?>" id="personal-form" method="post">
                          <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control" name="name" value="<?= $admin['name']; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" name="email" value="<?= $admin['email']; ?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Phone</label>
                                  <input type="text" class="form-control" name="phone" value="<?= $admin['phone']; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label>Address</label>
                                  <textarea class="form-control" name="address" rows="5"><?= $admin['address']; ?></textarea>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="url" class="form-control" name="facebook" value="<?= $admin['facebook']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="url" class="form-control" name="twitter" value="<?= $admin['twitter']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="url" class="form-control" name="instagram" value="<?= $admin['instagram']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Behance</label>
                                    <input type="url" class="form-control" name="behance" value="<?= $admin['behance']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Dribbble</label>
                                    <input type="url" class="form-control" name="dribble" value="<?= $admin['dribble']; ?>">
                                </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                          </form>
                        </div>
                        <div class="tab-pane" id="company">
                            <form action="<?= base_url('admin/updateCompany'); ?>" id="company-form" method="post">
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company" value="<?= $admin['companyName']; ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" name="designation" value="<?= $admin['designation']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Work</label>
                                <textarea class="form-control" name="work"><?= $admin['work']; ?></textarea>
                              </div>
                              <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" name="about"><?= $admin['about']; ?></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="account">
                            <form action="<?= base_url('admin/updateAccount'); ?>" id="account-form" method="post">
                              <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" class="form-control w-50" name="cur_pass" required>
                              </div>
                              <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control w-50" name="new_pass" required>
                              </div>
                              <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control w-50" name="con_pass" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('admin/footer'); ?>
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://kit.fontawesome.com/5be04f7085.js"></script>
<script>
  $(document).ready(function(){

  });
</script>
</body>
</html>