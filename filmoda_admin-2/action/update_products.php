<?php
	require_once("../config/config.php");
    $prod_id 	= isset($_GET['prod_id']) ? $_GET['prod_id'] : ""; 
    $prod_code 	= isset($_GET['pcode']) ? $_GET['pcode'] : ""; 
	$prod_name 	= isset($_GET['pname']) ? $_GET['pname'] : ""; 
	$prod_desc 	= isset($_GET['pdesc']) ? $_GET['pdesc'] : ""; 
	$prod_cost 	= isset($_GET['pcost']) ? $_GET['pcost'] : ""; 
	$prod_image = isset($_GET['pPhoto']) ? $_GET['pPhoto'] : ""; 
	$date = date('Y-m-d H:i:s');
	
	$sql = "UPDATE product SET
						product_code='$prod_code', 
						product_name='$prod_name', 
						product_description='$prod_desc',
						product_cost='$prod_cost',
						product_photo='$prod_image',
						date_updated='$date'
						where product_id= $prod_id LIMIT 1
						";
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('success' =>true,
						'm'=>'Data Successfully updated.'
						));
	}else{
		echo json_encode(array('success' => false,
							'm'=>'Error in updating data!'
						));
	}
?>