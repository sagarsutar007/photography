<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Categories</title>
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
            <h1 class="m-0">Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                    <h3 class="card-title">Category List</h3>
                    <div class="card-tools">
                        <button type="button" id="delete-category" class="btn btn-tool btn-danger btn-disabled" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-primary btn-new" >
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                  <?php if($this->session->flashdata('success_msg') != ""){ ?>
                    <div class="row">
                      <div class="col-md-6 offset-md-3">
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
                      <div class="col-md-6 offset-md-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error!</strong> <?= $this->session->flashdata('error_msg'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                    <div class="table-condensed w-50 mx-auto">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th width="5%"><input type="checkbox" id="select-all"></th>
                                    <th>Name</th>
                                    <th>Created On</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($categories) && count($categories) > 0){ 
                                        foreach ($categories as $key => $obj) {
                                ?>
                                    <tr>
                                        <td>
                                          <input type="checkbox" name="id[]" class="id-checkbox" value="<?= $obj['id']; ?>">
                                        </td>
                                        <td><?= $obj['name']; ?></td>
                                        <td><?= date('d.m.Y',strtotime($obj['createdAt'])); ?></td>
                                        <td align="right">
                                            <button data-recordid="<?= $obj['id']; ?>" data-name="<?= $obj['name']; ?>" class="btn btn-success btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            <a href="<?= base_url('category/delete/' . $obj['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? It can not be undone?');"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">No Category Found!</td>
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
<div class="modal fade" id="modal-secondary">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="change-category-details" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="catid" value="">
          <div class="form-group">
            <input type="text" name="name" class="form-control" value="" placeholder="Enter category name" required>
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
          $("#delete-category").prop("disabled", false);
          $("#delete-category").removeClass("btn-disabled");
        } else {
          $('.id-checkbox').prop('checked',false);
          $("#delete-category").prop("disabled", true);
          $("#delete-category").addClass("btn-disabled");
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
          $("#delete-category").prop("disabled", false);
          $("#delete-category").removeClass("btn-disabled");
        } else {
          $("#delete-category").prop("disabled", true);
          $("#delete-category").addClass("btn-disabled");
        }
		  });
      
      $("#delete-category").on('click', function(){
        let _approval = confirm("Are you sure to delete? This can not be undone.");
        if(_approval){
          var albumids = [];
          $("input[name='id[]']:checked").each(function(){
              albumids.push(this.value);
          });
          $.ajax({
            'url': '<?= base_url('category/delete-multiple'); ?>',
            'type': 'post',
            'data': { 'ids': JSON.stringify(albumids) }
          }).done(function(msg){
            location.reload();
          });
        }
      });

      $('.btn-edit').on('click', function(){
        let _id = $(this).data('recordid');
        let _name = $(this).data('name');
        $("[name='catid']").val(_id);
        $("[name='name']").val(_name);
        $('#modal-secondary').find('.modal-title').text('Edit Category');
        $('#modal-secondary').find('form').attr('id','change-category-details');
        $('#modal-secondary').modal('show');
      });

      $('.btn-new').on('click', function(){
        let _id = "";
        let _name = "";
        $("[name='catid']").val(_id);
        $("[name='name']").val(_name);
        $('#modal-secondary').find('.modal-title').text('Add Category');
        $('#modal-secondary').find('form').attr('id','add-category-details');
        $('#modal-secondary').modal('show');
      });

      $(document).on('submit', '#change-category-details', function(e){
        e.preventDefault();
        $.ajax({
          url: '<?= base_url('category/update-category'); ?>',
          type: 'POST',
          data: $(this).serialize(),
        })
        .done(function(response) {
            res = $.parseJSON(response);
            if(res.status == "ERROR"){
              alert(res.msg);
            }else{
              location.reload();
            }
        });
      });

      $(document).on('submit', '#add-category-details', function(e){
        e.preventDefault();
        $.ajax({
          url: '<?= base_url('category/add-category'); ?>',
          type: 'POST',
          data: $(this).serialize(),
        })
        .done(function(response) {
            res = $.parseJSON(response);
            if(res.status == "ERROR"){
              alert(res.msg);
            }else{
              location.reload();
            }
        });
      });
  });
</script>
</body>
</html>