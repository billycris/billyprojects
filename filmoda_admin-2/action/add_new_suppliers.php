<?php
	require_once("../config/config.php");
    $scode 		= isset($_POST['scode']) ? $_POST['scode'] : ""; 
    $sname 		= isset($_POST['sname']) ? $_POST['sname'] : ""; 
	$sdesc 		= isset($_POST['sdesc']) ? $_POST['sdesc'] : ""; 
	$saddr 		= isset($_POST['saddr']) ? $_POST['saddr'] : ""; 
	$stels 		= isset($_POST['stels']) ? $_POST['stels'] : ""; 
	// $date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO supplier(
			supplier_code,
			supplier_name,
			supplier_description,
			supplier_address,
			supplier_telno
			)
			VALUES(
			'$scode',
			'$sname', 
			'$sdesc',
			'$saddr',
			'$stels'
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