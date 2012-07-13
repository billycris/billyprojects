<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
$sortorder	= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query 		= isset($_POST['query']) ? $_POST['query'] : false;
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false;
$prod_code 	= isset($_GET['prod_code']) ? $_GET['prod_code'] : "";
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

function countRec($item_id,$tname,$prod_code='') {
	if($prod_code!=''){
		$sql = "SELECT count($item_id) FROM $tname Where product_code='$prod_code'";
	}else{
		$sql = "SELECT count($item_id) FROM $tname ";
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

	if (!$sortname) $sortname = 'item_id';
	if (!$sortorder) $sortorder = 'desc';

	$sort = "ORDER BY $sortname $sortorder";

	if (!$page) $page = 1;
	if (!$rp) $rp = 10;

	$start = (($page-1) * $rp);

	$limit = "LIMIT $start, $rp";
	$where = "";
	if(isset($prod_code)&&$prod_code!=''){
		$query = $prod_code;
		$qtype = 'product_code';
		$total = countRec('item_id','item_listing',$prod_code);
	}else{
		$total = countRec('item_id','item_listing');
	}
	
	// die($query);
	if ($query) $where = " WHERE $qtype LIKE '%".$query."%' ";

	$sql = "SELECT item_id,item_code,item_name,item_photo,item_description,item_retail_price ,item_whole_sale_price ,item_dealer_price 
			FROM item_listing $where $sort $limit";

	$result = runSQL($sql);
	
	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
	$cntr = 1;
		while($row = mysql_fetch_assoc($result)){
			$retP = $row['item_retail_price'];
			$whlP = $row['item_whole_sale_price'];
			$delP = $row['item_dealer_price'];
			$entry = array('id'=>$row['item_id'],
			
				'cell'=>array(
					// "<input type='checkbox'/>",
					$row['item_code'],
					"<img id ='image_disp' src=".$base_url."../images/".$row['item_photo']." width='150px' height='110px'>",
					$row['item_name'],
					$row['item_description']
					// 'P '.number_format((isset($retP)&&$retP!=0)?$retP:'0', 2),
					// 'P '.number_format((isset($whlP)&&$whlP!=0)?$whlP:'0', 2),
					// 'P '.number_format((isset($delP)&&$delP!=0)?$delP:'0', 2)
				),
			);
			$jsonData['rows'][] = $entry;
		}
	echo json_encode($jsonData);
