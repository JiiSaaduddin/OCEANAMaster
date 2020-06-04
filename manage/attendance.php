<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Attendance Table (By Hour)</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance Table (By Hour)</li>
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
            <!--div class="box-header with-border"> <a href="#addnew" data-toggle="modal" class="btn btn-default btn-sm btn-flat"><i class="fa fa-plus"></i> Insert Manual</a> </div-->
            <div class="box-body">
              <table id="data_attlog" class="table !table-bordered" width="100%">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Time Out</th> 
                  <th>Hour/s</th>  
                  <th hidden></th>  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, employees.employee_id AS empid, attendance.id AS attid 
					FROM attendance 
					LEFT JOIN employees ON employees.id=attendance.employee_id  
					ORDER BY attendance.date DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
					$kpa = ($row['num_hr'] / 8 * 100);
                      $status = ($row['status'])?'&nbsp;<span title="'.$oceana_content['-ontime'].'" class="label label-success fa fa-check"> </span>':'&nbsp;<span title="'.$oceana_content['-late'].'"  class="label label-danger fa fa-exclamation-triangle"> </span>';
					  $isCut = $row['time_out']>='17:00:00'?'&nbsp;<span title="'.$oceana_content['-latebutokout'].'">&nbsp;'.$kpa.'%</span>':'&nbsp;<span title="'.$oceana_content['-undertime'].'" >&nbsp;'.$kpa.'%</span>';
					  $isnoCut = $row['time_out']>='17:00:00'?'&nbsp;<span title="'.$oceana_content['-latebutokout'].'" class="label label-success fa fa-check"> </span>':'&nbsp;<span title="'.$oceana_content['-undertime'].'" class="label label-warning fa fa-question-circle"> </span>';
                      $status2 = $row['num_hr'] < 8?$isnoCut:'&nbsp;<span title="'.$oceana_content['-okout'].'" class="label label-success fa fa-check"> </span>';
                      $effratings = $row['num_hr'] < 8?$isCut:'&nbsp;<span title="'.$oceana_content['-okout'].'" >&nbsp;'.$kpa.'%</span>';
                      echo "
                        <tr>
						<td class='hidden'></td>
						<td>".date('M d, Y', strtotime($row['date']))."</td>
						<td>".$row['empid']."</td>
						<td>".$row['firstname'].' '.$row['lastname']."</td>
						<td>".date('h:i A', strtotime($row['time_in'])).$status."</td>
						<td>".date('h:i A', strtotime($row['time_out'])).$status2."</td> 
                           <td style='font-weight:900;text-align:right;font-size:18px'>".$row['num_hr']."</td>  
                           <td style='font-weight:900;font-size:22px'><i class='fa fa-clock-o'></i></td>  
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
				<tfoot>
					<tr>
						<th colspan="5" style="text-align:right">OVERALL TOTAL<br>(filtered):</th>
						<th style="font-size:22px;text-align:right;"></th> 
						<th style="font-size:22px;-">Hrs</th> 
					</tr>
				</tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'views/attendance.php'; ?>
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
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>

<script>
$(document).ready(function() {
    $('#data_attlog').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data; 
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            }; 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                pageTotal
            ); 
        }
    } );
} );
 
$(document).ready(function() {
	
    $('#data_attlog2').DataTable( {
		
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data; 
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            }; 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
		var table = $('#data_attlog2').DataTable();
			// Update footer
			$( api.column( 5 ).footer() ).html(
                (pageTotal / table.rows().count()).toFixed(2)
			);  
        }
    } );
	
	 
} );
</script>
</body>
</html>
