<?php
	require_once("../config/config.php");
    $id 		= isset($_POST['id']) ? $_POST['id'] : ""; 
    $cDate 		= isset($_POST['cDate']) ? $_POST['cDate'] : ""; 
    $item_id 		= isset($_POST['item_id']) ? $_POST['item_id'] : ""; 
	$item_quan 		= isset($_POST['item_quan']) ? $_POST['item_quan'] : ""; 
	 			
	$date = date('Y-m-d H:i:s');
		 
	$sql = "INSERT INTO proforma_item(
			proforma_pi_no,	
			proforma_item_id, 
			proforma_quantity, 
			date
			)
			VALUES(
			'$id',
			'$item_id', 
			'$item_quan',
			'$cDate'
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