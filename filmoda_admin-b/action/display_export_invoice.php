<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder  = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query 		= isset($_POST['query']) ? $_POST['query'] : false;
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false;

 // To use the SQL, remove this block
$usingSQL = true;
$base_url = "http://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
function runSQL($rsql) {
	require_once("../config/config.php");
	$result = mysql_query($rsql) or die ('test');
	return $result;
	mysql_close($connect);
}

function countRec($id,$tname) {
	$sql = "SELECT count($id) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'ex_id';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT export_invoice.ex_id,export_invoice.quantity,export_invoice.customer_id,export_invoice.unit_price,export_invoice.ex_date,
		product.product_description,buyer.buyer_name,buyer.buyer_code, product.product_name, product.product_code,product.product_id
		FROM export_invoice 
		INNER JOIN product ON  export_invoice.prod_id = product.product_id
		INNER JOIN buyer ON export_invoice.customer_id = buyer.buyer_code
		$where $sort $limit";
	$result = runSQL($sql);
	$total = countRec('ex_id','export_invoice');

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$total = $row['quantity'] * $row['unit_price'];
			$prod_id = $row['product_id'];
			$date = $row['ex_date'];
			$buyer_id = $row['buyer_code'];
			$eid = $row['ex_id'];
			$entry = array('id'=>$row['ex_id'],
				'cell'=>array(
					$row['buyer_name'],
					$row['product_code'],
					$row['product_name'],
					$row['ex_date'],
					"<a href='action/toPDF.php?pid=".$prod_id."&bid=".$buyer_id."&eid=".$eid."&cDate=".$date."'><img alt='' src='".$base_url."pdfsmall.gif'/></a>"
					// "<img alt='' src='".$base_url."pdfsmall.gif' onclick='jQuery.exportInvoice.toPDF({prodId:\"$prod_id\",buyerId:\"$buyer_id\",cDate:\"$date\"})'/>"
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
