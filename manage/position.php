<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'functions.php'; ?>

<body class="hold-transition !skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Positioning Template
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Positioning Template</li>
      </ol>
    </section>
	
    <!-- Main content -->
<section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-default pull-right btn-sm btn-flat"><i class="fa fa-plus"></i></a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Rank Title</th>
                  <th>Employee Type</th>
                  <th>Daily Rate</th>
                  <th>Flat Rate</th>
                  <!--th hidden title="Based on the SSS Contribution Table">SSS <i class="fa fa-question-circle-o"></i></th>
                  <th hidden>Pag-Ibig</th>
                  <th hidden>PhilHealth</th-->
                  <th>Tools</th>
                </thead>
                <tbody>
              <?php
                    $sql = "SELECT * FROM position";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
					
	
                      echo "
                        <tr>
                          <td>".$row['description']."</td> 
                          <td>".$row['job_type']."</td> 
                          <td>".number_format($row['rate'], 2)."</td>
                          <td>".number_format($row['rateflat'], 2)."</td>
                          <!--td title='Based on the SSS Contribution Table'>".number_format($row['gsss'], 2)."</td>
                          <td>".number_format($row['gpagibig'], 2)."</td>
                          <td>".number_format($row['gphilhealth'], 2)."</td-->
                          <td>
                            <button class='btn btn-default btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i></button>
                            <button class='btn btn-default btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i></button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'includes/footer.php'; ?>
  <?php include 'views/position.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
 
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_job_type').val(response.job_type);
      $('#edit_rate').val(response.rate);
      $('#edit_rateflat').val(response.rateflat);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}

// Rate balance of the employee and each types. 
// @libary.php
$(function() {
    $('#rate').focus(function(){ $('#rateflat').prop('disabled', 'disabled'); 
		}).blur(function(){ $('#rateflat').prop('disabled', '');  
	});
    $('#rateflat').focus(function(){$('#rate').prop('disabled', 'disabled'); 
		}).blur(function(){$('#rate').prop('disabled', ''); 
	});
    $('#edit_rate').focus(function(){ $('#edit_rateflat').prop('disabled', 'disabled'); 
		}).blur(function(){ $('#edit_rateflat').prop('disabled', '');  
	}); 
    $('#edit_rateflat').focus(function(){$('#edit_rate').prop('disabled', 'disabled'); 
		}).blur(function(){$('#edit_rate').prop('disabled', ''); 
	});
});
</script>
</body>
</html>
