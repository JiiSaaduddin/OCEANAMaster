<?php
class TableQueries
{  
	public function tblAttendanceFilterStatus(){
		$sqlx = "SELECT * FROM attendance";
		$queryx = $conn->query($sqlx);
		$total = $queryx->num_rows;
		
		$sql = "SELECT * FROM attendance WHERE status = 1";
		$query = $conn->query($sql);
		$early = $query->num_rows;
		$percentage = ($early / $total * 100);
	}
}; 

function sssct(){
	$srccredit=2000; 
	$curcredit= 15000; 
	
	$SSSCT = max($srccredit, $curcredit);
	switch ($SSSCT) { 
		case 2000 : printf(number_format(160+80,2)); break; 
		case 2500 : printf(number_format(200+100,2)); break; 
		case 3000 : printf(number_format(240+120,2)); break; 
		case 3500 : printf(number_format(280+140,2)); break; 
		case 4000 : printf(number_format(320+160,2)); break; 
		case 4500 : printf(number_format(360+180,2)); break; 
		case 5000 : printf(number_format(400+200,2)); break; 
		case 5500 : printf(number_format(440+220,2)); break; 
		case 6000 : printf(number_format(480+240,2)); break; 
		case 6500 : printf(number_format(520+260,2)); break; 
		case 7000 : printf(number_format(560+280,2)); break; 
		case 7500 : printf(number_format(600+300,2)); break; 
		case 8000 : printf(number_format(640+320,2)); break; 
		case 8500 : printf(number_format(680+340,2)); break; 
		case 9000 : printf(number_format(720+360,2)); break; 
		case 9500 : printf(number_format(760+380,2)); break; 
		case 10000 : printf(number_format(800+400,2)); break; 
		case 10500 : printf(number_format(840+420,2)); break; 
		case 11000 : printf(number_format(880+440,2)); break; 
		case 11500 : printf(number_format(920+460,2)); break; 
		case 12000 : printf(number_format(960+480,2)); break; 
		case 12500 : printf(number_format(1000+500,2)); break; 
		case 13000 : printf(number_format(1040+520,2)); break; 
		case 13500 : printf(number_format(1080+540,2)); break; 
		case 14000 : printf(number_format(1120+560,2)); break; 
		case 14500 : printf(number_format(1160+580,2)); break; 
		case 15000 : printf(number_format(1200+600,2)); break; 
		case 15500 : printf(number_format(1240+620,2)); break; 
		case 16000 : printf(number_format(1280+640,2)); break; 
		case 16500 : printf(number_format(1320+660,2)); break; 
		case 17000 : printf(number_format(1360+680,2)); break; 
		case 17500 : printf(number_format(1400+700,2)); break; 
		case 18000 : printf(number_format(1440+720,2)); break; 
		case 18500 : printf(number_format(1480+740,2)); break; 
		case 19000 : printf(number_format(1520+760,2)); break; 
		case 19500 : printf(number_format(1560+780,2)); break; 
		case 20000 : printf(number_format(1600+800,2)); break;   
		default :  echo number_format(0,2);
	}
}
?>
