<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($record)?"Edit Blog":"Add New Blog"; ?></title>
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
            <h1 class="m-0"><?= isset($record)?"Edit Blog":"Add New Blog"; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/blog'); ?>">Blog</a></li>
              <li class="breadcrumb-item active"><?= isset($record)?"Edit Blog":"Add New Blog"; ?></li>
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
                    <h3 class="card-title"><?= isset($record)?"Edit blog":"Add blog"; ?></h3>
                </div>
                <div class="card-body">
                    <form id="form-blog" action="<?= base_url('blog/save'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?php if (isset($record['id'])) { ?>
                        <input type="hidden" name="id" value="<?= $record['id']; ?>">
                        <?php } ?>
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                              <label for="blog-title">Blog Title</label>
                              <input type="text" name="title" id="title" class="form-control" value="<?= isset($record['title'])?$record['title']:''; ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="blog-category">Category</label>
                              <select name="categoryId" id="category" class="form-control" required>
                                <?php 
                                  if(isset($categories)){
                                    foreach ($categories as $category => $cat) {
                                      if($cat['id'] == $record['categoryId']){
                                        echo "<option value='".$cat['id']."' selected>".$cat['name']."</option>";
                                      } else {
                                        echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
                                      }
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="bg">Primary Image</label>
                              <input type="hidden" name="bgimg" value="<?= isset($record['picture'])?$record['picture']:''; ?>">
                              <div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" name="file" class="custom-file-input" id="bgimg">
                                      <label class="custom-file-label" for="bgimg">Choose file</label>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Exercept</label>
                              <textarea id="exercept" class="form-control" name="exercept"><?= isset($record['exercept'])?$record['exercept']:''; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Body</label>
                              <textarea id="summernote" name="text"><?= isset($record['text'])?html_entity_decode(stripslashes($record['text'])):''; ?></textarea>
                            </div>
                            <div class="form-group">
                              <p>Status</p>
                            </div>
                            <div class="form-group">
                              <input type="radio" name="status" value="draft" <?= (isset($record['status']) && ($record['status']=='draft'))?'checked':'checked'; ?>>
                              <label for="status-draft">Draft</label>
                              &nbsp;&nbsp;
                              <input type="radio" name="status" value="published" <?= (isset($record['status']) && ($record['status']=='published'))?'checked':''; ?>>
                              <label for="status-publish">Publish</label>
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
