<?php
	require_once("../config/config.php");
    $p_mName 		= isset($_POST['p_mName']) ? $_POST['p_mName'] : ""; 
    $p_mDesc 		= isset($_POST['p_mDesc']) ? $_POST['p_mDesc'] : ""; 
	$p_mSupplier 	= isset($_POST['p_mSupplier']) ? $_POST['p_mSupplier'] : ""; 
	$p_mPrice 		= isset($_POST['p_mPrice']) ? $_POST['p_mPrice'] : ""; 
	$p_mQuant 		= isset($_POST['p_mQuant']) ? $_POST['p_mQuant'] : ""; 
	$p_mPurDate		= isset($_POST['p_mPurDate']) ? $_POST['p_mPurDate'] : ""; 
	$p_mRecDate		= isset($_POST['p_mRecDate']) ? $_POST['p_mRecDate'] : ""; 
	$pPhoto			= isset($_POST['pPhoto']) ? $_POST['pPhoto'] : ""; 
	
	$date = date('Y-m-d H:i:s');
		    
	$sql = "INSERT INTO purchasing(
			pur_quantity,
			pur_item_id,
			pur_description,
			pur_price,
			pur_date,
			pur_receive_date,
			pur_mat_photo,
			supplier_id 
			)
			VALUES(
			'$p_mQuant',
			'$p_mName', 
			'$p_mDesc',
			'$p_mPrice',
			'$p_mPurDate',
			'$p_mRecDate',
			'$pPhoto',
			'$p_mSupplier'
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