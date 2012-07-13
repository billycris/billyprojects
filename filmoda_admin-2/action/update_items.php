<?php
	require_once("../config/config.php");
    $item_id 	= isset($_POST['item_id']) ? $_POST['item_id'] : "";
    $a_icode 	= isset($_POST['a_icode']) ? $_POST['a_icode'] : "";
	$i_name 	= isset($_POST['i_name']) ? $_POST['i_name'] : ""; 
	$p_code 	= isset($_POST['p_code']) ? $_POST['p_code'] : ""; 
	$i_desc 	= isset($_POST['i_desc']) ? $_POST['i_desc'] : ""; 
	// $pPhoto 	= isset($_POST['pPhoto']) ? $_POST['pPhoto'] : ""; 
	
	$date = date('Y-m-d H:i:s');
	$sql = "UPDATE item_listing SET
			item_code='$a_icode',
			item_name='$i_name',
			item_description='$i_desc',
			product_code='$p_code'
			where item_id=$item_id LIMIT 1
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