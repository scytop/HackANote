<?php
// Name : connDb.php

// Prevent caching.
///header('Cache-Control: no-cache, must-revalidate');
///header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
///header('Content-type: application/json');
//$id = $_GET['id'];	// usefull if we need a specific record

	$dbhost  = "FriendNote.db.11531226.hostedresource.com";
	$dbname  = "FriendNote";
	$dbuname = "FriendNote";
	$dbpass  = "Dickbutt1!";
	
$connect = mysqli_connect($dbhost, $dbuname, $dbpass) or die("Cannot connect to the server $server" + mysql_error()); 
//$connect = mysql_connect ($dbhost, $dbuname, $dbpass) or header("Location: ExpertUPDown.html"); //die(mysql_error());
$db= mysqli_select_db($connect, $dbname) or die("Could not select database"+ mysql_error());

mysql_set_charset('utf8', $connect);	
?>