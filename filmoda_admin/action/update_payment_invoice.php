<?php
	require_once("../config/config.php");
    $pay_id 		= isset($_POST['pay_id']) ? $_POST['pay_id'] : "";
    $a_sId 			= isset($_POST['a_sId']) ? $_POST['a_sId'] : "";
	$a_pAmount 		= isset($_POST['a_pAmount']) ? $_POST['a_pAmount'] : ""; 
	$a_pTamount 	= isset($_POST['a_pTamount']) ? $_POST['a_pTamount'] : ""; 
	$a_pIDate 		= isset($_POST['a_pIDate']) ? $_POST['a_pIDate'] : ""; 
	$a_pdetials 	= isset($_POST['a_pdetials']) ? $_POST['a_pdetials'] : ""; 
	
	
	$sql = "UPDATE payables SET
			supplier_code='$a_sId',
			pn_total_amount='$a_pTamount',
			invoice_date='$a_pIDate' 
			where payables_no=$pay_id LIMIT 1
			";
	$result=mysql_query($sql);
	
	$sql= "UPDATE payable_details SET
			payable_details='$a_pdetials',
			payable_amount='$a_pAmount'
			Where payable_no = $pay_id LIMIT 1
		";
	$result=mysql_query($sql);
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully Updated.'
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error in Updating data!'
						));
	}
?>