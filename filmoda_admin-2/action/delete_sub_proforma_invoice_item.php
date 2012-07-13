<?php
	require_once("../config/config.php");
	
    $profItem_id = isset($_POST['profItem_id']) ? $_POST['profItem_id'] : ""; 
	$sql = "DELETE FROM proforma_item WHERE proforma_id=$profItem_id";
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