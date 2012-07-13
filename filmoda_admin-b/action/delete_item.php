<?php
	require_once("../config/config.php");
	
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
	$sql = "DELETE FROM item_listing WHERE item_id=$item_id";
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully deleted.'
						));
	}else{
		echo json_encode(array('e' =>0,
						'm'=>'Data not deleted.'
		));
	}
?>