<?php
	require_once("../config/config.php");
	
    $buyer_id = isset($_POST['buyer_id']) ? $_POST['buyer_id'] : ""; 
	$sql = "SELECT buyer_name,buyer_description,buyer_code FROM buyer where id=$buyer_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		
		$b_code =  $row['buyer_code'];
		$b_desc =  $row['buyer_description'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'bcode'=>$b_code, 
						'bdesc'=>$b_desc
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>