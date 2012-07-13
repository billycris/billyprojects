<?php
	require_once("../config/config.php");
	
    $cost_id = isset($_POST['cost_id']) ? $_POST['cost_id'] : ""; 
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
	if($cost_id!=''){
		$sql = "SELECT item_id FROM costing where costing_no='$cost_id'";
		$result=mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			$item_id =  $row['item_id'];
		}
	}
	
	$sql = "SELECT item_photo,item_code,item_name FROM item_listing where item_id='$item_id'";
	
	$result=mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$item_photo =  $row['item_photo'];
		$item_n_id	=  $row['item_name']." - ".$row['item_code'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'item_photo'=>$item_photo,
						'item_name_id'=>$item_id
						));
	}else{
		echo json_encode(array('e' => 0,
						'm'=>'Error Image.'
						));
	}

?>