<?php
	require_once("../config/config.php");
	
    $pay_id = isset($_POST['pay_id']) ? $_POST['pay_id'] : ""; 
	$sql = "DELETE FROM payables WHERE payables_no=$pay_id";
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