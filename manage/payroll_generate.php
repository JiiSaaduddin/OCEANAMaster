<?php
	error_reporting(0);
	include 'includes/session.php';

	function generateRow($from, $to, $conn, $deduction){
		$contents = ''; 
		$sql = "SELECT *, sum(num_hr) AS total_hr, attendance.employee_id AS empid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id LEFT JOIN position ON position.id=employees.position_id WHERE date BETWEEN '$from' AND '$to' GROUP BY attendance.employee_id ORDER BY employees.lastname ASC, employees.firstname ASC";

		$query = $conn->query($sql);
		$total = 0;
		while($row = $query->fetch_assoc()){
			$empid = $row['empid'];

	      	$casql = "SELECT *, SUM(amount) AS cashamount FROM cashadvance WHERE employee_id='$empid' AND date_advance BETWEEN '$from' AND '$to'";

	      	$caquery = $conn->query($casql);
	      	$carow = $caquery->fetch_assoc();
	      	$cashadvance = $carow['cashamount'];

			$rateF = ($row['rateflat'] * 12 / 313 / 8);  
			$grossF = ($rateF * $row['total_hr']); 
			$grossD = ($row['rate'] * $row['total_hr']); 
			$total_deduction = ($deduction) + ($cashadvance);
			$net = ($grossD + $grossF) - ($total_deduction);
	;
			$total += $net;
			$contents .= '
			<tr>
				<td>'.$row['employee_id'].'</td>
				<td>'.$row['lastname'].', '.$row['firstname'].'</td>
				<td>'.$row['contact_info'].'</td>
				<td align="right">P'.number_format($net, 2).'</td>
			</tr>
			';
		}

		$contents .= '
			<tr>
				<td colspan="3" align="right"><b>Overall Total</b></td>
				<td align="right"><b>P'.number_format($total, 2).'</b></td>
			</tr>
		';
		return $contents;
	}

	$range = $_POST['date_range'];
	$ex = explode(' - ', $range);
	$from = date('Y-m-d', strtotime($ex[0]));
	$to = date('Y-m-d', strtotime($ex[1]));

	$sql = "SELECT *, SUM(amount) as total_amount FROM deductions";
    $query = $conn->query($sql);
   	$drow = $query->fetch_assoc();
    $deduction = $drow['total_amount'];

	$from_title = date('M d, Y', strtotime($ex[0]));
	$to_title = date('M d, Y', strtotime($ex[1]));

	require_once('../tcpdf/tcpdf.php');
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Payroll: '.$from_title.' - '.$to_title);
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
		<h2 align="center" style="font-weight:300">OCEANA HR Solutions<br><small><b>ANA`S BREEDERS FARMS, INC.</b> - BANK PAYROLL</small><br><small>Payroo Period ('.$from_title." - ".$to_title.')</small></h2>
      	<table border="1" cellspacing="0" cellpadding="3">
		<tr> 
			<th align="center"><b>Employee ID</b></th>
			<th align="center"><b>Employee Name</b></th>
			<th align="center"><b>Bank Account</b></th>
			<th align="center"><b>Total Net Pay</b></th>
		</tr>
      ';
    $content .= generateRow($from, $to, $conn, $deduction);
    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('payroll.pdf', 'I');

?>
