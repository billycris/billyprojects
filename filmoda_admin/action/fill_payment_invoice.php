<?php
	require_once("../config/config.php");
	
    $pay_id = isset($_POST['pay_id']) ? $_POST['pay_id'] : ""; 
	$sql = "SELECT supplier_code FROM payables where payables_no=$pay_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		$supplier_code	=  $row['supplier_code'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'supplier_code'=>$supplier_code
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>