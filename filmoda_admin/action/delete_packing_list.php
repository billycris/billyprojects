<?php
	require_once("../config/config.php");
	
    $pack_id = isset($_POST['pack_id']) ? $_POST['pack_id'] : ""; 
	$sql = "DELETE FROM packing_list WHERE p_bx_no =$pack_id";
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