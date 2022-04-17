<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Albums</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/fontawesome-free/css/all.min.css'; ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
  <!-- Lightbox -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/ekko-lightbox/ekko-lightbox.css'; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <style>
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
    .brx-5{
      border-radius: 5px;
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
            <h1 class="m-0">Albums</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('albums'); ?>">Albums</a></li>
              <li class="breadcrumb-item active">View Album</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php if($this->session->flashdata('success_msg') != ""){ ?>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?= $this->session->flashdata('success_msg'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if($this->session->flashdata('error_msg') != ""){ ?>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $this->session->flashdata('error_msg'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                Upload your files here!
                            </h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool close-upload" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('albums/uploadPictures'); ?>" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="albumid" value="<?= $this->uri->segment(3); ?>">
                                <div class="form-group">
                                  <label for="input-files">File input</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="file[]" class="custom-file-input" id="input-file" multiple>
                                      <label class="custom-file-label" for="input-file">Choose file</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group text-center">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php 
                      if($this->session->flashdata('upload_error') != ""){
                        foreach ($this->session->flashdata('upload_error') as $errors => $error) {
                          echo $error;
                        }
                      } 
                    ?>
                </div>
                <div class="col">
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">Album Pictures</h3>

                      </div>
                      <div class="card-body">
                        <?php  if(isset($photos) && count($photos) > 0){ ?>
                          <div class="row">
                            <div class="col-12">
                              <h6>Total Pictures Found: <span id="countPics"><?= count($photos); ?></span></h6>
                            </div>
                          </div>
                        <?php } ?>
                        <div class="row">
                            <?php 
                              if(isset($photos) && count($photos) > 0){
                                foreach($photos AS $pics => $pic){
                            ?>
                            <div class="col-2 mb-3 image-box">
                              <a href="<?= base_url() . 'assets/site/images/'.$pic['picture']; ?>" data-toggle="lightbox" data-title="<?= $pic['title']; ?>" data-gallery="gallery">
                                <img data-src="<?= base_url() . 'assets/site/images/'.$pic['picture']; ?>" class="lazy brx-5 mb-2" height="250px" width="100%" alt="<?= $pic['title']; ?>" />
                              </a>
                              <div class="btn-group btn-group-sm w-100" role="group">
                                <button data-id="<?= $pic['id']; ?>" data-title="<?= $pic['title']; ?>" data-about="<?= $pic['about']; ?>" data-toggle="modal" data-target="#modal-secondary" class="btn btn-primary btn-edit">Edit</button>
                                <button data-id="<?= $pic['id']; ?>" class="btn btn-danger btn-delete">Delete</button>
                              </div>
                            </div> 
                            <?php } } else { ?>
                            <div class="col-12 text-center">
                              <p class="text-danger">No pictures are there in this album!</p>
                            </div>
                            <?php } ?>
                        </div>
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

<div class="modal fade" id="modal-secondary">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title">Edit Image Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" id="change-picture-details">
      <div class="modal-body">
        <input type="hidden" name="picid" value="">
        <div class="form-group">
          <input type="text" name="title" class="form-control" value="" placeholder="Enter picture title" required>
        </div>
        <div class="form-group">
          <textarea name="about" class="form-control" placeholder="Enter picture description"></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
<!-- Lightbox -->
<script src="<?= ADMIN_ASSETS . 'plugins/ekko-lightbox/ekko-lightbox.min.js'; ?>"></script>
<!-- Lazyload -->
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.7.0/dist/lazyload.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function(){

      var _totalPics = <?= count($photos); ?>;

      var lazyLoadInstance = new LazyLoad();

      $('.close-upload').on('click', function(){
          $(this).closest('.col-md-4').remove();
      });

      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.btn-delete').on('click', function(){
        let _id = $(this).data('id');
        let _curObj = $(this);
        if(confirm('Are you sure?')){
          $.ajax({
            url: '<?= base_url('albums/deletePicture'); ?>',
            type: 'POST',
            data: {id: _id},
          })
          .done(function(response) {
            res = $.parseJSON(response);
            if(res.status == "ERROR"){
              alert(res.msg);
            }else{
              _totalPics = parseInt(_totalPics)-1;
              $('#countPics').text(_totalPics);
              _curObj.closest('.image-box').remove();
            }
          });
        }
      });

      $('.btn-edit').on('click',function(){
        let _id = $(this).data('id');
        let _title = $(this).data('title');
        let _about = $(this).data('about');
        $("[name='picid']").val(_id);
        $("[name='title']").val(_title);
        $("textarea[name='about']").val(_about);
      });

      $(document).on('submit', '#change-picture-details', function(e){
        e.preventDefault();
        $.ajax({
          url: '<?= base_url('albums/updatePicture'); ?>',
          type: 'POST',
          data: $(this).serialize(),
        })
        .done(function(response) {
            res = $.parseJSON(response);
            if(res.status == "ERROR"){
              alert(res.msg);
            }else{
              $('button[data-id="'+res.picid+'"]').attr({
                'data-title': res.title, 
                'data-about': res.about 
              });
              $('#modal-secondary').modal('hide');
            }
        });
      });

      $('input[type=file]').change(function () {
          fileCount = this.files.length;
          $('[for="input-file"]').text(fileCount + ' Selected');
      });

  });
</script>
</body>
</html>