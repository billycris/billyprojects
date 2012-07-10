<?php
	require_once("../config/config.php");
    $cost_id 		= isset($_POST['cost_id']) ? $_POST['cost_id'] : ""; 
    $item_id 		= isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
    $item_price 	= isset($_POST['item_price']) ? $_POST['item_price'] : ""; 
	$item_quan 		= isset($_POST['item_quan']) ? $_POST['item_quan'] : ""; 

	$date = date('Y-m-d H:i:s');
	
	$itemList = "SELECT item_code FROM item_listing where item_id='$item_id'";
	$result=mysql_query($itemList);
	while($row=mysql_fetch_assoc($result)){
		$item_code = $row['item_code'];
	}
	
	$sql = "UPDATE costing SET
			item_id='$item_id',
			item_code='$item_code',
			item_price='$item_price',
			item_qty='$item_quan',
			cost_date_updated='$date'
			where costing_no='$cost_id'
			";
	$result = mysql_query($sql);
	
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