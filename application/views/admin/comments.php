<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Comments</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/fontawesome-free/css/all.min.css'; ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
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
            <h1 class="m-0">Comments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Comments</li>
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
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Comments</h3>
                    <div class="card-tools">
                        <button type="button" id="delete-comments" class="btn btn-tool btn-danger btn-disabled" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
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
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th width="5%"><input type="checkbox" id="select-all"></th>
                                    <th width="15%">Name</th>
                                    <th>Text</th>
                                    <th>Status</th>
                                    <th width="15%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($comments) && count($comments) > 0){ 
                                        foreach ($comments as $key => $obj) {
                                ?>
                                    <tr>
                                        <td>
                                          <input type="checkbox" name="id[]" class="id-checkbox" value="<?= $obj['id']; ?>">
                                        </td>
                                        <td width="15%"><?= $obj['name']; ?></td>
                                        <td>
                                            <?= $obj['text']; ?>
                                        </td>
                                        <td>
                                          <?= ucfirst($obj['status']); ?>
                                        </td>
                                        <td width="15%" class="text-center">
                                          <?php if ($obj['status'] == "pending") { ?>
                                            <a href="<?= base_url('comments/changeStatus/' . $obj['id']) . '/1'; ?>" class="btn btn-info btn-sm"><i class="fas fa-check"></i></a>
                                            <a href="<?= base_url('comments/changeStatus/' . $obj['id']) . '/0'; ?>" class="btn btn-warning text-white btn-sm"><i class="fas fa-times"></i></a>
                                            <a href="<?= base_url('comments/delete/' . $obj['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? It can not be undone?');"><i class="fas fa-trash"></i></a>
                                          <?php } else { ?>
                                            <a href="<?= base_url('comments/delete/' . $obj['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? It can not be undone?');"><i class="fas fa-trash"></i></a>
                                          <?php } ?>
                                        </td>
                                    </tr>
                                <?php } } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">No Comments Found!</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                  <?= isset($links)?$links:''; ?>
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
<script>
  $(document).ready(function(){

      $('#select-all').on('click',function(){
        var isChecked = $(this).is(":checked");
        if(isChecked){
          $('.id-checkbox').prop('checked',true);
          $("#delete-comments").prop("disabled", false);
          $("#delete-comments").removeClass("btn-disabled");
        } else {
          $('.id-checkbox').prop('checked',false);
          $("#delete-comments").prop("disabled", true);
          $("#delete-comments").addClass("btn-disabled");
        }
      });

      $(document).on('click','.id-checkbox',function() {
		    var checkboxes = $('.id-checkbox:checkbox:checked').length;
		    var totalboxes = $('.id-checkbox:checkbox').length;
	    	if(totalboxes==checkboxes){
	    		$('#select-all').prop('checked',true);
	    	}else{
	    		$('#select-all').prop('checked',false);
	    	}

        if(checkboxes > 0){
          $("#delete-comments").prop("disabled", false);
          $("#delete-comments").removeClass("btn-disabled");
        } else {
          $("#delete-comments").prop("disabled", true);
          $("#delete-comments").addClass("btn-disabled");
        }
		  });
      
      $("#delete-comments").on('click',function(){
        let _approval = confirm("Are you sure to delete? This can't be undone!");
        if(_approval){
          var albumids = [];
          $("input[name='id[]']:checked").each(function(){
              albumids.push(this.value);
          });
          $.ajax({
            'url': '<?= base_url('comments/deleteComments'); ?>',
            'type': 'post',
            'data': { 'ids': JSON.stringify(albumids) }
          }).done(function(msg){
            location.reload();
          });
        }
      });


  });
</script>
</body>
</html>