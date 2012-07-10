<?php
	require_once("../config/config.php");
	
    $cost_id = isset($_POST['cost_id']) ? $_POST['cost_id'] : ""; 
	$sql = "DELETE FROM costing WHERE costing_no =$cost_id";
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