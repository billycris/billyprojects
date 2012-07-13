<?php
	require_once("../config/config.php");
    // $a_refn 		= isset($_POST['a_refn']) ? $_POST['a_refn'] : ""; 
    $a_icode 		= isset($_POST['a_icode']) ? $_POST['a_icode'] : ""; 
	$i_name 	= isset($_POST['i_name']) ? $_POST['i_name'] : ""; 
	// $p_code 	= isset($_POST['p_code']) ? $_POST['p_code'] : ""; 
	$i_desc 	= isset($_POST['i_desc']) ? $_POST['i_desc'] : ""; 
	// $i_irl		= isset($_POST['i_irl']) ? $_POST['i_irl'] : ""; 
	// $i_isl		= isset($_POST['i_isl']) ? $_POST['i_isl'] : ""; 
	// $i_ibl 		= isset($_POST['i_ibl']) ? $_POST['i_ibl'] : ""; 
	// $i_irp 		= isset($_POST['i_irp']) ? $_POST['i_irp'] : ""; 
	// $i_iwsp 	= isset($_POST['i_iwsp']) ? $_POST['i_iwsp'] : ""; 
	// $i_idp 		= isset($_POST['i_idp']) ? $_POST['i_idp'] : ""; 
	// $i_bcode 	= isset($_POST['i_bcode']) ? $_POST['i_bcode'] : ""; 
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