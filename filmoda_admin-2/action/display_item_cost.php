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
	require_once("../config/config.php");
	$result = mysql_query($rsql) or die ('test');
	return $result;
	mysql_close($connect);
}

function countRec($ref_id,$tname) {
	$sql = "SELECT count($ref_id) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'costing_no';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT costing.costing_no,costing.product_code,costing.item_code,costing.item_price,costing.item_qty,costing.item_currency,
			item_listing.item_photo,item_listing.item_description,item_listing.item_name FROM costing
			INNER JOIN item_listing ON costing.item_id = item_listing.item_id $where $sort $limit";
	$result = runSQL($sql);
	$total = countRec('costing_no','costing');

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$total = $row['item_price'] * $row['item_qty'];
			
			$entry = array('id'=>$row['costing_no'],
				'cell'=>array(
					// "<input type='checkbox'/>",
					$row['item_code'],
					"<img id ='image_disp' src=".$base_url."../images/".$row['item_photo']." width='150px' height='110px'>",
					$row['item_name'],
					$row['item_description'],
					"P ".number_format($row['item_price'],2),
					'',
					$row['item_qty'],
					"P ".number_format((isset($total)&&$total!=0)?$total:'0',2)
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
