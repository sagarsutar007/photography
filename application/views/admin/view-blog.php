<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Blog</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/fontawesome-free/css/all.min.css'; ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini sidebar-collapse">
<div class="wrapper">
  <?php 
    $this->load->view('admin/navbar'); 
    $this->load->view('admin/sidebar');  
  ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/blog'); ?>">Blog</a></li>
              <li class="breadcrumb-item active">View Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                  <h3 class="card-title"><?= isset($blog)?$blog['title']:"View Blog"; ?></h3>
                  <br>
                  <p class="text-muted"><?= stripslashes($blog['exercept']); ?></p>
                  <br>
                  <?php 
                    if(empty($blog['picture'])){
                      $image = "https://via.placeholder.com/1500x1000?text=preview";
                    }else{
                      if (file_exists('assets/site/images/' . $blog['picture'])) {
                        $image = base_url('assets/site/images/' . $blog['picture']);
                      } else {
                        $image = "https://via.placeholder.com/1500x1000?text=preview";
                      }
                    }
                  ?>
                  <img src="<?= $image; ?>" class="img-fluid" alt="">
                  <?php 
                    echo stripslashes(html_entity_decode($blog['text']));
                  ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('admin/footer'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script src="<?= ADMIN_ASSETS . 'plugins/summernote/summernote-bs4.min.js'; ?>"></script>
<script>
  $(document).ready(function(){
    $('#summernote').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
      ],
      height: 250 
    });
  });
</script>
</body>
</html>
