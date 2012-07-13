<?php
	require_once("../config/config.php");
    $pack_id 	= isset($_POST['pack_id']) ? $_POST['pack_id'] : ""; 
    $icode 	= isset($_POST['icode']) ? $_POST['icode'] : ""; 
    $color = isset($_POST['color']) ? $_POST['color'] : ""; 
	$npbag 	= isset($_POST['npbag']) ? $_POST['npbag'] : ""; 
	$qtypcs 	= isset($_POST['qtypcs']) ? $_POST['qtypcs'] : ""; 
	$gw 	= isset($_POST['gw']) ? $_POST['gw'] : ""; 
	$nw 	= isset($_POST['nw']) ? $_POST['nw'] : ""; 
	$meas 	= isset($_POST['meas']) ? $_POST['meas'] : ""; 
  
	$sql = "UPDATE packing_list SET
			p_item_code='$icode',
			p_color='$color',
			p_no_bag='$npbag',
			p_pcs_bag='$qtypcs',
			p_gw='$gw',
			p_nw='$nw',
			p_meas='$meas' 
			where p_bx_no=$pack_id";
	$result=mysql_query($sql);
	
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully Updated.'
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error on Updating data!'
						));
	}
?>