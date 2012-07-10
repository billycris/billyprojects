<?php
	require_once("../config/config.php");
	
    $receive_id = isset($_POST['receive_id']) ? $_POST['receive_id'] : ""; 
	$sql = "SELECT buyer_code FROM receivables where receivable_no=$receive_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		$buyer_code	=  $row['buyer_code'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'buyer_code'=>$buyer_code
						));
	}else{
		echo json_encode(array('e' => 0));
	}
?>