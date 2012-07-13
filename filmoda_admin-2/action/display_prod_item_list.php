<?php
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query = isset($_POST['query']) ? $_POST['query'] : false;
$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
$prod_id 	= isset($_GET['prod_id']) ? $_GET['prod_id'] : "";
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

function countRec($prod_item_id ,$tname,$prod_id ='') {
	if($prod_id!=''){
		$sql = "SELECT count($prod_item_id) FROM $tname Where p_prod_id ='$prod_id'";
	}else{
		$sql = "SELECT count($prod_item_id) FROM $tname ";
	}
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return (isset($row[0])&&$row[0]>0)?$row[0]:'0';
	}
}
	$page = $_POST['page'];
	$rp = $_POST['rp'];
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];

	if (!$sortname) $sortname = 'prod_item_id ';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if(isset($prod_id)&&$prod_id!=''){
		$query = $prod_id;
		$qtype = 'p_prod_id';
		$total = countRec('prod_item_id','product_item',$prod_id);
	}else{
		$total = countRec('prod_item_id','product_item');
	}
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";
	$rsql = "SELECT  product_item.prod_item_id,item_listing.item_code,item_listing.item_name,item_listing.item_photo,item_listing.item_description 
	FROM product_item 
	INNER JOIN item_listing ON product_item.p_item_id = item_listing.item_id
	$where $sort $limit";
	$result = runSQL($rsql);
	$total = countRec('prod_item_id ','product_item',$prod_id);

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$entry = array('id'=>$row['prod_item_id'],
				'cell'=>array(
					$row['item_code'],
					"<img id ='image_disp' src=".$base_url."../images/".$row['item_photo']." width='150px' height='110px'>",
					$row['item_name'],
					$row['item_description']
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
