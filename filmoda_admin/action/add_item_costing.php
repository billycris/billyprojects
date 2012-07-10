<?php
	require_once("../config/config.php");
    $item_id 	= isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
    $item_price = isset($_POST['item_price']) ? $_POST['item_price'] : ""; 
	$item_quan 	= isset($_POST['item_quan']) ? $_POST['item_quan'] : ""; 
	// $c_curr 	= isset($_POST['c_curr']) ? $_POST['c_curr'] : ""; 

	$date = date('Y-m-d H:i:s');
	
	$itemList = "SELECT item_code FROM item_listing where item_id='$item_id'";
	$result=mysql_query($itemList);
	while($row=mysql_fetch_assoc($result)){
		$item_code = $row['item_code'];
	}
	$sql = "INSERT INTO costing(
			item_id,
			item_code,
			item_price,
			item_qty,
			cost_date_added,
			cost_date_updated 
			)
			VALUES(
			'$item_id', 
			'$item_code', 
			'$item_price',
			'$item_quan',
			'$date',
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