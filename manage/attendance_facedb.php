<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
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
            
			<div class="box-body">
              <table id="face_device" class="table" width="100%">
                <thead> 
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Status</th>   
                </thead>
                <tbody>
<?php 
 
function biss_hours($start, $end){

   $startDate = new DateTime($start);
   $endDate = new DateTime($end);

   //Set the start and end dates to the start of the working day
   $startofday = clone $startDate;
   $startofday->setTime(8,30);
   $enddaystart = clone $endDate;
   $enddaystart->setTime(8,30);

   //get the rest time on start day in hours
   $t1 = $startofday->format('Y-m-d H:i:s');
   $t2 = $startDate->format('Y-m-d H:i:s');
   $firstDayRest = calculate_hours($t1, $t2);

   //get the rest time on start day in hours
   $t3 = $enddaystart->format('Y-m-d H:i:s');
   $t4 = $endDate->format('Y-m-d H:i:s');
   $lastDayRest = calculate_hours($t3, $t4);

   //Get the number of days between the two dates
   $daysBetween = getWeekdayDifference($start, $end);
   //multiply the days by the 8 working hours
   $hoursBetween = $daysBetween * 8;
   //add the rest times onto the number of working hours between the two dates.
   return $hoursBetween + $firstDayRest + $lastDayRest;
}

//returns the hours between two dates
function calculate_hours($t1, $t2){
   $t1 = StrToTime ($t1);
   $t2 = StrToTime ($t2);

	$diff = $t2 - $t1;
	$hours = $diff / ( 60 * 60 );

   return $hours;
}
//returns the number of days (excluding weekends) between two dates
function getWeekdayDifference($startDate, $endDate)
{
   $days = 0;

   $startDate = new DateTime($startDate);
   $endDate = new DateTime($endDate);

   while($startDate->diff($endDate)->days > 0) {
      $days += $startDate->format('N') < 6 ? 1 : 0;
      $startDate = $startDate->add(new DateInterval("P1D"));
   }

   return $days;
}
?> 

                  <?php  
					$sql = "SELECT * FROM attendance_device ";
					$query = $conn->query($sql);
					while($row = $query->fetch_assoc()){ 
					$time1 = $row['time'];
					$time2 = $row['time'];
                      echo "<tr>  
							<td>". date('m-d-Y', strtotime($row['time'])) ."</td> 
							<td>".$row['person_id']."</td> 
							<td>".$row['name']."</td>  
							<td>". date('h.i a', strtotime($row['time'])) ."</td> 
							<td>".$row['status']."</td>  
						 </tr>
                      ";
				}
                  ?>
				</tbody> 
				<tfoot>
					<tr>
						<th></th> 
						<th></th> 
						<th style="text-align:right">TOTAL HOURS:</th>
						<th></th>  
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
</div>
<?php include 'includes/scripts.php'; ?>
 


<script>
$(document).ready(function() {
    $('#face_device').DataTable( {
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
				.column( 3, { page: 'current'} )
				.data()
				.reduce( function (e) {
					return intVal(a) + intVal(b);
				}, 0 );

			// Update footer
			$( api.column( 3 ).footer() ).html(
				pageTotal
			); 
        }
    } );
} );
</script>

</body>
</html>


