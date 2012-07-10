<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder	= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query 		= isset($_POST['query']) ? $_POST['query'] : false;
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false;
// die($prod_code);
 // To use the SQL, remove this block
$usingSQL = true;
$base_url = "http://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
function runSQL($rsql) {
	require_once("../config/config.php");
	$result = mysql_query($rsql);
	return $result;
	mysql_close($connect);
}

function countRec($supplier_code,$tname) {
	$sql = "SELECT count($supplier_code) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return (isset($row[0])&&$row[0]>0)?$row[0]:'0';
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'payables_no ';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	// die($query);
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";

	$sql = "SELECT 	payables.payables_no,payables.supplier_code,payables.pn_total_amount,payables.invoice_date,payables.payable_description,
			payable_details.payable_details,payable_details.payable_amount,
			supplier.supplier_name
			FROM payables 
			INNER JOIN payable_details ON payables.payables_no = payable_details.payable_no
			INNER JOIN supplier ON payables.supplier_code = supplier.supplier_id
			$where $sort $limit";

	$result = runSQL($sql);
	$total = countRec('supplier_code','payables');
	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$entry = array('id'=>$row['payables_no'],
			
				'cell'=>array(
					$row['supplier_name'],
					$row['payable_details'],
					number_format($row['payable_amount'],2),
					number_format($row['pn_total_amount'],2),
					$row['invoice_date']
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
