<?php
	require_once("../config/config.php");
    $a_bcode 		= isset($_POST['a_bcode']) ? $_POST['a_bcode'] : ""; 
    $a_bname 		= isset($_POST['a_bname']) ? $_POST['a_bname'] : ""; 
	$a_bdesc 		= isset($_POST['a_bdesc']) ? $_POST['a_bdesc'] : ""; 
	$a_baddress 	= isset($_POST['a_baddress']) ? $_POST['a_baddress'] : ""; 
	$a_bcontact 	= isset($_POST['a_bcontact']) ? $_POST['a_bcontact'] : ""; 
	$a_bstatus		= isset($_POST['a_bstatus']) ? $_POST['a_bstatus'] : ""; 
	
	$date = date('Y-m-d H:i:s');
		    
	$sql = "INSERT INTO buyer(
			buyer_code, 
			buyer_name, 
			buyer_description,
			buyer_address,
			buyer_contact,
			buyer_status,
			date_updated
			)
			VALUES(
			'$a_bcode',
			'$a_bname', 
			'$a_bdesc',
			'$a_baddress',
			'$a_bcontact',
			'$a_bstatus',
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