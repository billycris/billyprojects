
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

	if (!$sortname) $sortname = 'p_bx_no';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT packing_list.p_bx_no,packing_list.p_item_code,packing_list.p_color,packing_list.p_no_bag,packing_list.p_pcs_bag,packing_list.p_gw,packing_list.p_nw,packing_list.p_meas,
			item_listing.item_code
			FROM packing_list
			INNER JOIN item_listing ON packing_list.p_item_code=item_listing.item_id
			$where $sort $limit";
	//die($sql);
	$result = runSQL($sql);
	$total = countRec('p_bx_no','packing_list');
	// $total = 5;

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$total = $row['p_no_bag'] * $row['p_pcs_bag'];
			$entry = array('id'=>$row['p_bx_no'],
				'cell'=>array(
					$row['p_bx_no'],
					$row['item_code'],
					$row['p_color'],
					$row['p_no_bag'],
					$row['p_pcs_bag'],
					$total,
					$row['p_gw'],
					$row['p_nw'],
					$row['p_meas']
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
