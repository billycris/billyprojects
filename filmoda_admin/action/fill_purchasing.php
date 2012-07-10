<?php
	require_once("../config/config.php");
	
    $purr_id = isset($_POST['purr_id']) ? $_POST['purr_id'] : ""; 
	$sql = "SELECT supplier_id,pur_item_id FROM purchasing where pur_id=$purr_id";
	$result=mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$supp_id = $row['supplier_id'];
		$pur_item_id = $row['pur_item_id'];
	}
	
	$sql = "SELECT item_photo FROM item_listing where item_id=$pur_item_id";
	$result=mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$item_photo = $row['item_photo'];
	}
	// $sql1 = "SELECT supplier_name FROM supplier where supplier_id =$supp_id";
	// $result1=mysql_query($sql1);
	// while($row = mysql_fetch_assoc($result1)){
		// $supp_name =$row['supplier_name'];
	// }
	if($result){
		echo json_encode(array('e' =>1,
						'sname'=>$supp_id,
						'pur_id'=>$pur_item_id,
						'item_photo'=>$item_photo
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>