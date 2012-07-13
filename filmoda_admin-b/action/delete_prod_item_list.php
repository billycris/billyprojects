<?php
	require_once("../config/config.php");
	
    $prod_id = isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
	$sql = "DELETE FROM product_item WHERE prod_item_id=$prod_id";
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