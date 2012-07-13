<?php
	require_once("../config/config.php");
	
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
	$sql = "SELECT item_listing.item_photo,item_listing.item_description, costing.item_price FROM item_listing
			INNER JOIN costing ON item_listing.item_id = costing.item_id WHERE item_listing.item_id=$item_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		$item_photo 	=  $row['item_photo'];
		$item_desc		=  $row['item_description'];
		$item_cost		=  $row['item_price'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'item_photo'=>$item_photo,
						'item_desc'=>$item_desc,
						'item_cost'=>$item_cost
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>