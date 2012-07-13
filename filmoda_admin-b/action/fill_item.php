<?php
	require_once("../config/config.php");
	
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
	$sql = "SELECT item_name,product_code,item_photo FROM item_listing where item_id=$item_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		$item_photo =  $row['item_photo'];
		$p_code		=  $row['product_code'];
		$item_name		=  $row['item_name'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'item_photo'=>$item_photo,
						'p_code'=>$p_code,
						'i_name'=>$item_name
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>