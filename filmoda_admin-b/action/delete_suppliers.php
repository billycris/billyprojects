<?php
	require_once("../config/config.php");
    
    $supp_id 	= isset($_POST['supp_id']) ? $_POST['supp_id'] : ""; 
	$sql = "Delete from supplier where supplier_id  = '$supp_id' limit 1 ";
	$result=mysql_query($sql);
	if($result){
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully deleted.'
						));
	}else{
		echo json_encode(array('e' =>0,
						'm'=>'Data not deleted.'
		));
	}
	
?>