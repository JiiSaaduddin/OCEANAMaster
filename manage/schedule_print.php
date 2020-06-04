<?php
	include 'includes/session.php';

	function generateRow($conn){
		$contents = '';
		error_reporting(0);
		$sql = "SELECT *,`employees`.`id` AS `empid` FROM `employees`  
			LEFT JOIN `schedules` ON `schedules`.`id` = `employees`.`schedule_id`
			LEFT JOIN `departments` ON `departments`.`id` = `employees`.`department_id`
			LEFT JOIN `companies` ON `companies`.`id` = `employees`.`department_id`";

		$query = $conn->query($sql);
		$total = 0;
		while($row = $query->fetch_assoc()){
		$contents .= "
			<tr>
				<td>".$row['lastname'].", ".$row['firstname']."</td>
				<td>".$row['employee_id']."</td>
				<td>".$row['company']."</td>
				<td>".$row['department']."</td>
				<td>".date('h:i A', strtotime($row['time_in'])).' - '. date('h:i A', strtotime($row['time_out']))."</td>
			</tr>
			";
		}

		return $contents;
	}

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('ABFI - Employee Schedule');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">OCEANA HR Solutions</h2>
      	<h4 align="center">Employee Schedule</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
		<tr>  
			<th align="center"><b>Employee Name</b></th>
			<th align="center"><b>Employee ID</b></th>
			<th align="center"><b>Company</b></th>
			<th align="center"><b>Department</b></th>
			<th align="center"><b>Schedule</b></th> 
		</tr>  
      ';  
    $content .= generateRow($conn); 
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('schedule.pdf', 'I');

?>