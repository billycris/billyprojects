<?php
	require_once("../config/config.php");
    $supp_id 	= isset($_POST['supp_id']) ? $_POST['supp_id'] : ""; 
    $scode 		= isset($_POST['scode']) ? $_POST['scode'] : ""; 
    $sname 		= isset($_POST['sname']) ? $_POST['sname'] : ""; 
	$sdesc 		= isset($_POST['sdesc']) ? $_POST['sdesc'] : ""; 
	$saddr 		= isset($_POST['saddr']) ? $_POST['saddr'] : ""; 
	$stels 		= isset($_POST['stels']) ? $_POST['stels'] : ""; 
	

	$sql = "UPDATE supplier SET
			supplier_code='$scode',
			supplier_name='$sname',
			supplier_description='$sdesc',
			supplier_address='$saddr',
			supplier_telno='$stels' 
			where supplier_id =$supp_id LIMIT 1
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