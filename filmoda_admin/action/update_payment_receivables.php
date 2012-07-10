<?php
	require_once("../config/config.php");
	$receive_id = isset($_POST['receive_id']) ? $_POST['receive_id'] : "";
	$a_bcode 	= isset($_POST['a_bcode']) ? $_POST['a_bcode'] : "";
	$a_pamount 	= isset($_POST['a_pamount']) ? $_POST['a_pamount'] : ""; 
	$a_tamount 	= isset($_POST['a_tamount']) ? $_POST['a_tamount'] : ""; 
	$a_idate 	= isset($_POST['a_idate']) ? $_POST['a_idate'] : ""; 
	$a_details	= isset($_POST['a_details']) ? $_POST['a_details'] : ""; 
	
	
	$sql = "UPDATE receivables SET
			buyer_code='$a_bcode',
			ar_total_amount='$a_tamount',
			invoice_date='$a_idate',
			receivable_description = ''
			where receivable_no=$receive_id LIMIT 1
			";
	$result=mysql_query($sql);
	
	$sql= 	"UPDATE receivable_details SET
			receivable_details='$a_details',
			receivable_amount='$a_pamount'
			Where receivable_no = $receive_id LIMIT 1
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