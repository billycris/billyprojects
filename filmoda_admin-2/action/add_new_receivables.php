<?php
	require_once("../config/config.php");
    $a_bcode 	= isset($_POST['a_bcode']) ? $_POST['a_bcode'] : ""; 
    $a_pamount 	= isset($_POST['a_pamount']) ? $_POST['a_pamount'] : ""; 
	$a_tamount 	= isset($_POST['a_tamount']) ? $_POST['a_tamount'] : ""; 
	$a_idate 	= isset($_POST['a_idate']) ? $_POST['a_idate'] : ""; 
	$a_details	= isset($_POST['a_details']) ? $_POST['a_details'] : "";
  
	$sql = "INSERT INTO receivables(
			buyer_code,
			ar_total_amount,
			invoice_date,
			receivable_description
			)
			VALUES(
			'$a_bcode',
			'$a_tamount',
			'$a_idate',
			''
			)";
	$result=mysql_query($sql);
	
	$sql = "SELECT receivable_no FROM receivables ORDER BY receivable_no DESC LIMIT 0,1";
	$receivable_no = mysql_query($sql);
	
	while($row = mysql_fetch_assoc($receivable_no)){
		$id = $row['receivable_no'];
	}
	
	$sql = "INSERT INTO receivable_details(
			receivable_no,
			receivable_details,
			receivable_amount
			)
			VALUES(
			'$id',
			'$a_details',
			'$a_pamount'
			)";
	
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully added.'
						));
	}
	else{
		echo json_encode(array('e' => 0,
							'm'=>'Error on adding data!'
						));
	}
?>