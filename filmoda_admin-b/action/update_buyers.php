<?php
	require_once("../config/config.php");
    $buyer_id 		= isset($_POST['buyer_id']) ? $_POST['buyer_id'] : ""; 
    $a_bcode 		= isset($_POST['a_bcode']) ? $_POST['a_bcode'] : ""; 
    $a_bname 		= isset($_POST['a_bname']) ? $_POST['a_bname'] : ""; 
	$a_bdesc 		= isset($_POST['a_bdesc']) ? $_POST['a_bdesc'] : ""; 
	$a_baddress 	= isset($_POST['a_baddress']) ? $_POST['a_baddress'] : ""; 
	$a_bcontact 	= isset($_POST['a_bcontact']) ? $_POST['a_bcontact'] : ""; 
	$a_bstatus		= isset($_POST['a_bstatus']) ? $_POST['a_bstatus'] : ""; 
	$date = date('Y-m-d H:i:s');
	$sql = "UPDATE buyer SET
			buyer_code='$a_bcode', 
			buyer_name= '$a_bname', 
			buyer_description='$a_bdesc',
			buyer_address='$a_baddress',
			buyer_contact='$a_bcontact',
			buyer_status='$a_bstatus',
			date_updated='$date'
			where id=$buyer_id LIMIT 1
			";
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully Updated.'
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error in Updating data!'
						));
	}
?>