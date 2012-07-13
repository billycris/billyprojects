<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder 	= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query		= isset($_POST['query']) ? $_POST['query'] : false;
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false;

 // To use the SQL, remove this block
$usingSQL = true;
$base_url = "http://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
function runSQL($rsql) {
	// die($rsql);
	require_once("../config/config.php");
	$result = mysql_query($rsql) or die ('test');
	return $result;
	mysql_close($connect);
}

function countRec($pi_no,$tname) {
	$sql = "SELECT count($pi_no) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'pi_no';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	/*
	$sql = "SELECT proforma_invoice.pi_status,proforma_invoice.pi_no,proforma_invoice.buyer_code,proforma_invoice.pi_date_created,proforma_invoice.pi_delivery_date,
			pi_details.costing_no,costing.item_code,costing.item_price,costing.item_currency,buyer.buyer_name
			FROM proforma_invoice 
			INNER JOIN pi_details ON proforma_invoice.pi_no=pi_details.pi_no 
			INNER JOIN costing ON pi_details.costing_no=costing.costing_no 
			INNER JOIN buyer ON proforma_invoice.buyer_code=buyer.buyer_code
			$where $sort $limit";*/
	$sql = "SELECT proforma_invoice.pi_status,proforma_invoice.pi_no,proforma_invoice.buyer_code,proforma_invoice.pi_date_created,proforma_invoice.pi_delivery_date,
			buyer.buyer_name
			FROM proforma_invoice 
			INNER JOIN buyer ON proforma_invoice.buyer_code=buyer.buyer_code
			$where $sort $limit";
	$result = runSQL($sql);
	$total = countRec('pi_no','proforma_invoice');

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			switch($row['pi_status']){
				case 0:
					$status = 'Pending';
					break;
				case 1:
					$status = 'Waiting';
					break;
				case 2: 
					$status = 'Received';
					break;
			}
			// $total = $row['item_price'] *  $row['item_currency'];
			$total =0;
			$entry = array('id'=>$row['pi_no'],
				'cell'=>array(
					// "<input type='checkbox'/>",
					$row['buyer_name'],
					'<a href="#">Invoice No. '.$row['pi_no'].'</a>',
					// 'P '.number_format((isset($total)&&$total>0)?$total:0,2),
					// '',
					$row['pi_delivery_date'],
					$row['pi_date_created'],
					$status
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
