<?php
	require_once("../config/config.php");
	
    $buyer_id = isset($_POST['buyer_id']) ? $_POST['buyer_id'] : ""; 
	$sql = "DELETE FROM buyer WHERE id=$buyer_id";
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