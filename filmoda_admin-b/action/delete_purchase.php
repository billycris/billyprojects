<?php
	require_once("../config/config.php");
	
    $purr_id = isset($_POST['purr_id']) ? $_POST['purr_id'] : ""; 
	$sql = "DELETE FROM purchasing WHERE pur_id=$purr_id";
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