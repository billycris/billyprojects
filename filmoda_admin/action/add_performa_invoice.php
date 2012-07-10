<?php
	require_once("../config/config.php");
    
	$b_id 		= isset($_POST['b_id']) ? $_POST['b_id'] : ""; 
	$pur_date 	= isset($_POST['pur_date']) ? $_POST['pur_date'] : ""; 
	$rec_date 	= isset($_POST['rec_date']) ? $_POST['rec_date'] : ""; 
	
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO proforma_invoice(
			buyer_code,
			pi_date_created,
			pi_delivery_date
			)
			VALUES(
			'$b_id',
			'$pur_date',
			'$rec_date'
			)";
	$result = mysql_query($sql);
	
	$rsql = "SELECT pi_no,pi_date_created FROM proforma_invoice ORDER BY pi_no DESC LIMIT 0,1";
	$result_id = mysql_query($rsql);
	while($row = mysql_fetch_assoc($result_id)){
		$pro_id = $row['pi_no'];
		$cDate = $row['pi_date_created'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully added.',
						'pro_id'=>$pro_id,
						'cDate'=>$cDate
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error on adding data!'
						));
	}
?>