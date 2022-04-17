<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($record)?"Edit Album":"Add New Album"; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/fontawesome-free/css/all.min.css'; ?>">
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/summernote/summernote-bs4.min.css'; ?>">
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
            <h1 class="m-0"><?= isset($record)?"Edit Album":"Add New Album"; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/albums'); ?>">Albums</a></li>
              <li class="breadcrumb-item active"><?= isset($record)?"Edit Album":"Add New Album"; ?></li>
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
          <div class="col-12">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title"><?= isset($record)?"Edit Album":"Add Album"; ?></h3>
                </div>
                <div class="card-body">
                    <form id="form-album" action="<?= base_url('albums/save-album'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?php if (isset($record['id'])) { ?>
                        <input type="hidden" name="id" value="<?= $record['id']; ?>">
                        <?php } ?>
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                              <label for="name">Album Name</label>
                              <input type="text" name="name" id="name" class="form-control" value="<?= isset($record['name'])?$record['name']:''; ?>" required>
                              <input type="checkbox" name="favourite" id="fav" <?= ($record['favourite']==1)?'checked':''; ?>> <label for="fav" class="text-sm" style="font-weight: 400;">Set as slider</label>
                            </div>
                            <div class="form-group">
                              <label for="bg">Background Image</label>
                              <input type="hidden" name="bgimg" value="<?= isset($record['background'])?$record['background']:''; ?>">
                              <div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" name="file" class="custom-file-input" id="bgimg">
                                      <label class="custom-file-label" for="bgimg">Choose file</label>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Exercept</label>
                              <textarea id="exercept" class="form-control" name="excercept"><?= isset($record['exercept'])?$record['exercept']:''; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>About</label>
                              <textarea id="summernote" name="about"><?= isset($record['about'])?html_entity_decode(stripslashes($record['about'])):''; ?></textarea>
                            </div>
                            <div class="text-right">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        </div>
                    </form>
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
