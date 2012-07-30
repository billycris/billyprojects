<?php
	require_once("../config/config.php");
    
    $a_icode	= isset($_POST['a_icode']) ? $_POST['a_icode'] : ""; 
	$i_name 	= isset($_POST['i_name']) ? $_POST['i_name'] : ""; 
	$i_desc 	= isset($_POST['i_desc']) ? $_POST['i_desc'] : ""; 
	$pPhoto 	= isset($_POST['pPhoto']) ? $_POST['pPhoto'] : "";
	
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO item_listing(
			item_code,
			item_name,
			item_photo,
			item_description,
			date_added
			)
			VALUES(
			'$a_icode',
			'$i_name',
			'$pPhoto',
			'$i_desc',
			'$date'
			)";
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully added.'
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error on adding data!'
						));
	}
?>