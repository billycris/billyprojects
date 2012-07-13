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
	$result = mysql_query($rsql);
	return $result;
	mysql_close($connect);
}

function countRec($product_id,$tname) {
	$sql = "SELECT count($product_id) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'product_id';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$sql = "SELECT product_id,product_code,product_name,product_description,product_photo FROM product $where $sort $limit";

	$result = runSQL($sql);
	$total = countRec('product_id','product');

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$prodcode =$row['product_code'];
			$prodname =$row['product_name'];
			$prodid =$row['product_id'];
			$entry = array('id'=>$row['product_id'],
				'cell'=>array(
					"<img id ='image_disp' src=".$base_url."../images/".$row['product_photo']." width='150px' height='110px'>",
					$prodcode,
					$prodname,
					$row['product_description'],
					// "<a href='item_listing.php'>See Item List</a>"
					"<a  style='font-weight:normal;font-size:12px;text-decoration:underline; color:;' onclick='jQuery.production.item_list_sub({prod_id:\"$prodid\",prod_code:\"$prodcode\",prod_name:\"$prodname\"}); return false;' href='javascript:void(0)'>See Item List</a>",
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
