<?php
$page		 = isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		 = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	 = isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder	 = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query		 = isset($_POST['query']) ? $_POST['query'] : false;
$qtype		 = isset($_POST['qtype']) ? $_POST['qtype'] : false;

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

function countRec($buyer_code,$tname) {
	$sql = "SELECT count($buyer_code) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'buyer_code';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT buyer_code,buyer_name,buyer_description,buyer_address,buyer_contact,buyer_status,date_updated  FROM buyer $where $sort $limit";

	$result = runSQL($sql);
	$total = countRec('buyer_code','buyer');

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			
			$entry = array('id'=>$row['buyer_code'],
				'cell'=>array(
					$row['buyer_name'],
					$row['buyer_contact'],
					$row['buyer_address'],
					$row['date_updated'],
					(isset($row['buyer_status'])&&$row['buyer_status']!=0)?'Active':'Inactive'
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
