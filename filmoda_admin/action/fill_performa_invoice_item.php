<?php
	require_once("../config/config.php");
	
    $prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : ""; 
	$sql = "SELECT buyer_code FROM proforma_invoice where pi_no=$prof_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		$b_code =  $row['buyer_code'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'bcode'=>$b_code
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>