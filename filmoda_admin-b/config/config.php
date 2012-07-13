<?php
	$base_url = "http://".$_SERVER['HTTP_HOST'];
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	
	// $this->json  			= (object)array('e'=>0,'m'=>'','d'=>'');
	
	$db['default']['hostname'] = "localhost";
	$db['default']['username'] = "root";
	$db['default']['password'] = "@jumpsite123";
	$db['default']['database'] = "filmoda";

	$db['live']['hostname'] = 'localhost';
	$db['live']['username'] = '';
	$db['live']['password'] = '';
	$db['live']['database'] = '';

	$active_group = 'default';

	$connect = mysql_connect($db[$active_group]['hostname'],$db[$active_group]['username'],$db[$active_group]['password']) or die ("Error: could not connect to database");
	$db = mysql_select_db($db[$active_group]['database']);
?>