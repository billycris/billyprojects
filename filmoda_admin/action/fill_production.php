<?php
	require_once("../config/config.php");
	
    $prod_id = isset($_GET['prod_id']) ? $_GET['prod_id'] : ""; 
	$sql = "SELECT product_name,product_description,product_photo,product_cost,prod_quantity FROM product where product_id=$prod_id";
	$result=mysql_query($sql);
	
	while($row = mysql_fetch_assoc($result)){
		$prod_cost = $row['product_cost'];
		$prod_photo =  $row['product_photo'];
		$prod_name =  $row['product_name'];
		$prod_desc =  $row['product_description'];
		$prod_price =  $row['product_cost'];
		$prod_quant =  $row['prod_quantity'];
	}
	if($result){
		echo json_encode(array('success' =>true,
						'prod_cost'=>$prod_cost, 
						'prod_photo'=>$prod_photo,
						'prod_name'=>$prod_name,
						'prod_desc'=>$prod_desc,
						'prod_price'=>$prod_price,
						'prod_quant'=>$prod_quant
						));
	}else{
		echo json_encode(array('success' => false));
	}

?>