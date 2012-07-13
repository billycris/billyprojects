<?php
	require_once("../config/config.php");
	
    $exp_id = isset($_POST['exp_id']) ? $_POST['exp_id'] : ""; 
	$sql = "SELECT prod_id,quantity,unit_price,ex_date,customer_id FROM export_invoice where ex_id=$exp_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		
		$prod_id =  $row['prod_id'];
		$cDate =  $row['ex_date'];
		$buyer_id =  $row['customer_id'];
	}
	if($result){
		echo json_encode(array('e' =>1,
						'prod_id'=>$prod_id, 
						'buyer_id'=>$buyer_id, 
						'cDate'=>$cDate
						));
	}else{
		echo json_encode(array('e' => 0));
	}

?>