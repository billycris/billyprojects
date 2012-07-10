<?php
	require_once("../config/config.php");
    $a_sId 			= isset($_POST['a_sId']) ? $_POST['a_sId'] : ""; 
    $a_pAmount 		= isset($_POST['a_pAmount']) ? $_POST['a_pAmount'] : ""; 
	$a_pTamount 	= isset($_POST['a_pTamount']) ? $_POST['a_pTamount'] : ""; 
	$a_pIDate 		= isset($_POST['a_pIDate']) ? $_POST['a_pIDate'] : ""; 
	$a_pdetials 	= isset($_POST['a_pdetials']) ? $_POST['a_pdetials'] : ""; 


	$sql = "INSERT INTO payables(
			supplier_code,
			pn_total_amount,
			invoice_date
			)
			VALUES(
			'$a_sId', 
			'$a_pTamount', 
			'$a_pIDate'
			)";
	$result=mysql_query($sql);
	
	$rsql = "SELECT payables_no  FROM payables ORDER BY payables_no  DESC LIMIT 0,1";
	$result_id = mysql_query($rsql);
	while($row = mysql_fetch_assoc($result_id)){
		$pay_id = $row['payables_no'];
	}
	
	$sql = "INSERT INTO payable_details(
			payable_no,
			payable_details,
			payable_amount 
			)
			VALUES(
			'$pay_id', 
			'$a_pdetials', 
			'$a_pAmount'
			)";
	$result=mysql_query($sql);
	
	
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully added.'
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error on adding data!'
						));
	}
?>