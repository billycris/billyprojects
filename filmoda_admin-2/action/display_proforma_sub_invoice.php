<?php
$page 			= isset($_POST['page']) ? $_POST['page'] : 1;
$rp				= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname		= isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder		= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query 			= isset($_POST['query']) ? $_POST['query'] : false;
$qtype 			= isset($_POST['qtype']) ? $_POST['qtype'] : false;
$prof_id 		= isset($_GET['prof_id']) ? $_GET['prof_id'] : "";

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

function countRec($proforma_id,$tname,$prof_id='') {
	if($prof_id!=''){
		$sql = "SELECT count($proforma_id) FROM $tname WHERE proforma_pi_no='$prof_id'";
	}else{
		$sql = "SELECT count($proforma_id) FROM $tname ";
	}
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'proforma_id';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if(isset($prof_id)&&$prof_id!=''){
		$query = $prof_id;
		$qtype = 'proforma_pi_no';
		$total = countRec('proforma_id','proforma_item',$prof_id);
	}else{
		$total = countRec('proforma_id','proforma_item');
	}
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT proforma_item.proforma_id,proforma_item.proforma_item_id, proforma_item.proforma_quantity, proforma_item.proforma_pi_no,
	item_listing.item_code,item_listing.item_name,costing.item_price
	FROM proforma_item 
	INNER JOIN item_listing ON proforma_item.proforma_item_id=item_listing.item_id
	INNER JOIN costing ON proforma_item.proforma_item_id=costing.item_id 
	$where $sort $limit";

	$result = runSQL($sql);
	// $total = countRec('proforma_id','proforma_item',$prof_id);

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$total =$row['proforma_quantity'] * $row['item_price'];
			
			$entry = array('id'=>$row['proforma_id'],
				'cell'=>array(
					$row['item_code'],
					$row['item_name'],
					$row['item_price'],
					$row['proforma_quantity'],
					$total
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
