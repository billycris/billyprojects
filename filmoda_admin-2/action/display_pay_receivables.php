<?php
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query = isset($_POST['query']) ? $_POST['query'] : false;
$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;

 // To use the SQL, remove this block
$usingSQL = true;
$base_url = "http://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
function runSQL($rsql) {
	// die($rsql);
	require_once("../config/config.php");
	$result = mysql_query($rsql);
	// print_r($result); die;
	return $result;
	mysql_close($connect);
}

function countRec($pbxno,$tname) {
	$sql = "SELECT count($pbxno) FROM $tname";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'receivable_no';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT receivables.receivable_no,receivables.buyer_code,receivables.ar_total_amount,receivables.invoice_date,receivables.receivable_description,
			receivable_details.receivable_details,receivable_details.receivable_amount,buyer.buyer_name
			FROM receivables
			INNER JOIN receivable_details ON receivables.receivable_no=receivable_details.receivable_no
			INNER JOIN buyer ON receivables.buyer_code=buyer.buyer_code
			$where $sort $limit";
	//die($sql);
	$result = runSQL($sql);
	$total = countRec('receivable_no','receivables');
	// $total = 5;

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$entry = array('id'=>$row['receivable_no'],
				'cell'=>array(
					$row['buyer_name'],	
					$row['receivable_details'],
					number_format($row['receivable_amount'],2),
					number_format($row['ar_total_amount'],2),
					$row['invoice_date']
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
