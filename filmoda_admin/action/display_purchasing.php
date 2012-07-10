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

function countRec($pur_id,$tname) {
	$sql = "SELECT count($pur_id) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'pur_id';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";

	$sql = "SELECT purchasing.pur_id,purchasing.pur_quantity,purchasing.pur_material_name,purchasing.pur_description,purchasing.pur_price,purchasing.pur_old_price,
			purchasing.pur_date,purchasing.pur_receive_date,purchasing.pur_mat_photo,purchasing.supplier_id,supplier.supplier_name,supplier.supplier_address,
			item_listing.item_name,item_listing.item_description,item_listing.item_photo
			FROM purchasing 
			INNER JOIN supplier ON purchasing.supplier_id=supplier.supplier_id
			INNER JOIN item_listing ON purchasing.pur_item_id=item_listing.item_id
			$where $sort $limit";

	$result = runSQL($sql);
	$total = countRec('pur_id','purchasing');

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$total = $row['pur_price']*$row['pur_quantity'];
			$entry = array('id'=>$row['pur_id'],
				'cell'=>array(
					// "<input type='checkbox'/>",
					"<img id ='image_disp' src=".$base_url."../images/".$row['item_photo']." width='100px' height='100px'>",
					$row['item_name'],
					$row['item_description'],
					$row['supplier_name'],
					$row['supplier_address'],
					'P '.number_format($row['pur_price'],2),
					$row['pur_quantity'],
					'P '.number_format((isset($total)&&$total!=0)?$total:'0',2),
					$row['pur_date'],
					$row['pur_receive_date']
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
