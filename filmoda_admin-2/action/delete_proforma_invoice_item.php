<?php
	require_once("../config/config.php");
	
    $prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : ""; 
	$sql = "DELETE FROM proforma_invoice WHERE pi_no=$prof_id";
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