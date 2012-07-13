<?php
	require_once("../config/config.php");
	$prod_name 	= isset($_GET['pname']) ? $_GET['pname'] : ""; 
	$pcode 	= isset($_GET['pcode']) ? $_GET['pcode'] : ""; 
	$prod_desc 	= isset($_GET['pdesc']) ? $_GET['pdesc'] : ""; 
	$prod_cost 	= isset($_GET['pcost']) ? $_GET['pcost'] : ""; 
	$prod_image = isset($_GET['pPhoto']) ? $_GET['pPhoto'] : ""; 
	$date = date('Y-m-d H:i:s');
	
	$sql = "INSERT INTO product(product_code,product_name, product_description,product_cost,product_photo,date_added,date_updated)
				VALUES('$pcode','$prod_name','$prod_desc','$prod_cost','$prod_image','$date','$date')";
	// die($sql);
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('success' =>true,
						'm'=>'Data Successfully added.'
						));
	}else{
		echo json_encode(array('success' => false,
							'm'=>'Error on adding data!'
						));
	}
?>