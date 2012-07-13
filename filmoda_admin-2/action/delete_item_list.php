<?php
	require_once("../config/config.php");
    
    $id 	= isset($_POST['id']) ? $_POST['id'] : ""; 
	
	$sql = "Delete from item_listing where id = '$id' limit 1 ";
	$result=mysql_query($sql);
	return $result;
	
?>