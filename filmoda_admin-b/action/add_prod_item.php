<?php
	require_once("../config/config.php");

	$i_id 		= isset($_POST['i_id']) ? $_POST['i_id'] : ""; 
	$p_code 	= isset($_POST['p_code']) ? $_POST['p_code'] : ""; 
	
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO product_item(
			p_item_id,
			p_prod_id,
			p_added_date
			)
			VALUE(
			'$i_id',
			'$p_code',
			'$date'
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