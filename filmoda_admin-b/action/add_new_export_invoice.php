
<?php
	require_once("../config/config.php");
	$buyer_id 	= isset($_POST['buyer_id']) ? $_POST['buyer_id'] : ""; 
	$prod_id 	= isset($_POST['a_icode']) ? $_POST['a_icode'] : ""; 
	$ex_date 	= isset($_POST['ex_date']) ? $_POST['ex_date'] : ""; 
	// die($ex_date);
	
	$sql = "INSERT INTO export_invoice(
			prod_id,
			ex_date,
			customer_id
			)
			VALUES(
			'$prod_id',
			'$ex_date',
			'$buyer_id'
			)";
	$result=mysql_query($sql);
	if($result){
		$rsql = "SELECT ex_id,ex_date FROM export_invoice ORDER BY ex_id DESC LIMIT 0,1";
		$result_id = mysql_query($rsql);
		while($row = mysql_fetch_assoc($result_id)){
			$ex_id = $row['ex_id'];
			$ex_date = $row['ex_date'];
		}
		echo json_encode(array('e' =>1,
						'm'=>'Data Successfully added.',
						'ex_id'=>$ex_id,
						'ex_date'=>$ex_date
						));
	}else{
		echo json_encode(array('e' => 0,
							'm'=>'Error on adding data!'
						));
	
	}
?>