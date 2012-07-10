<?php
	require_once("../config/config.php");
    $purr_id 		= isset($_POST['purr_id']) ? $_POST['purr_id'] : ""; 
    $p_mName 		= isset($_POST['p_mName']) ? $_POST['p_mName'] : ""; 
    $p_mDesc 		= isset($_POST['p_mDesc']) ? $_POST['p_mDesc'] : ""; 
	$p_mSupplier 	= isset($_POST['p_mSupplier']) ? $_POST['p_mSupplier'] : ""; 
	$p_mPrice 		= isset($_POST['p_mPrice']) ? $_POST['p_mPrice'] : ""; 
	$p_mQuant 		= isset($_POST['p_mQuant']) ? $_POST['p_mQuant'] : ""; 
	$p_mPurDate		= isset($_POST['p_mPurDate']) ? $_POST['p_mPurDate'] : ""; 
	$p_mRecDate		= isset($_POST['p_mRecDate']) ? $_POST['p_mRecDate'] : ""; 
	$pPhoto			= isset($_POST['pPhoto']) ? $_POST['pPhoto'] : ""; 
	
	$date = date('Y-m-d H:i:s');
	$sql = "UPDATE purchasing SET
			pur_quantity='$p_mQuant',
			pur_item_id='$p_mName',
			pur_description='$p_mDesc',
			pur_price='$p_mPrice',
			pur_date='$p_mPurDate',
			pur_receive_date='$p_mRecDate',
			pur_mat_photo='$pPhoto',
			supplier_id='$p_mSupplier' 
			where pur_id=$purr_id LIMIT 1
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