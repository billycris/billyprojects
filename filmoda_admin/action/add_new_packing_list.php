<?php
	require_once("../config/config.php");
    $icode 	= isset($_POST['icode']) ? $_POST['icode'] : ""; 
    $color = isset($_POST['color']) ? $_POST['color'] : ""; 
	$npbag 	= isset($_POST['npbag']) ? $_POST['npbag'] : ""; 
	$qtypcs 	= isset($_POST['qtypcs']) ? $_POST['qtypcs'] : ""; 
	$gw 	= isset($_POST['gw']) ? $_POST['gw'] : ""; 
	$nw 	= isset($_POST['nw']) ? $_POST['nw'] : ""; 
	$meas 	= isset($_POST['meas']) ? $_POST['meas'] : ""; 
  
	$sql = "INSERT INTO packing_list(
			p_item_code,
			p_color,
			p_no_bag,
			p_pcs_bag,
			p_gw,
			p_nw,
			p_meas 
			)
			VALUES(
			'$icode', 
			'$color',
			'$npbag',
			'$qtypcs',
			'$gw',
			'$nw',
			'$meas'
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