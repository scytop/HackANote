<?php
// Name   : webSqlSyncAdapterOO.php - called by the webSqlApp (index.html)
// Goal   : To communicate data from a MySQL query using myJob to a webSqlSync json format. Result: It works one way. All server table data to Client.
// Version: 2013-10-08
// It uses: webSqlSyncHandler.php and loginCheck.php that uses connections/connDbUP.php;
// To do  : Debug the 2 way sync mecanism.
// To do  : Take the userId and the password from userParam table from webSQL 
// To test: use: http://www.affairesup.com/webSqlApp/sqlSyncAdapter.php?username=exp&password=4success

//require_once('loginCheck.php');
//echo "<p> CLnum_rows in sqlSyncAdapter is ", $CLnum_rows, "</p>"; //R: GOOD
// if $CLnum_rows = 1, we have the OK to get the server data
$CLnum_rows = 1; //To bypass loginCheck (for debug use)
if ($CLnum_rows){
	include("webSqlSyncHandler.php");
	$handler = new SqlSyncHandler();	// to initialize the json handler from 'php://input'. It put it in $clientData
	
	$handler -> call('myJob',$handler);	// call a custom function which will make a job with parsed data
}
else{
	echo "<p> Your're not authorized to get the data from this server."; 
}
	
function myJob($handler){
	$currentDateTime =  date("Y-m-d H:i:s");
	$clientLastSyncDate = $handler -> clientData['info']['lastSyncDate']/1000;	// It gives a 10 digits unix date time
	//$clientLastSyncDate= $clientData['info']['lastSyncDate']/1000;	// It gives a 10 digits unix date time

	require_once('setContact.php');	// With the JSON, it does many INSERTs or UPDATEs to MySQL following some conditions

	// My job is to get all the table data from the server and send a json to client
	$handler -> reply(true,"this is a positive reply", getServerData($clientLastSyncDate));	// with a dynamic array coming from a MySQL query //function reply($status,$message,$data)
	// It return $serverAnswer from SqlSyncHandler.php:	{"result":"OK","message":"this is a positive reply","syncDate":1327075596000,"data":{"Unites":[{"UniteID":"0","UniteSymbol":"h"},{"UniteID":"1","UniteSymbol":"km"},{"UniteID":"2","UniteSymbol":"$"},{"UniteID":"3","UniteSymbol":"U$"},{"UniteID":"4","UniteSymbol":"\u20ac"},{"UniteID":"5","UniteSymbol":"$P"}]}} 

	// a error reply example
	//$handler -> reply(false,"this is a error reply",array('browser' => 'firefox'));
}

function getServerData($clientLastSyncDate){		//get the modified data from the server using an associative array

	// Define here the tables to sync Server side param1 is the webSql table name and param2 is the MySQL table name
	$tablesToSync = array(
		array( "tableNameWebSql" => 'Contacts',		"tableName_MySql" => 'Contacts',		"getQueryFile" => 'getModifiedContact.php'),
	//	array( "tableNameWebSql" => 'Activites',	"tableName_MySql" => 'RN_Activite',		"getQueryFile" => 'getModifiedActivity.php'),
	//	array( "tableNameWebSql" => 'Projets',		"tableName_MySql" => 'RN_Projet',		"getQueryFile" => 'getModifiedProject.php'),
	//	array( "tableNameWebSql" => 'Ressources',	"tableName_MySql" => 'RN_Ressource',	"getQueryFile" => 'getModifiedRessource.php'),
	//	array( "tableNameWebSql" => 'Categories',	"tableName_MySql" => 'RN_Categorie',	"getQueryFile" => 'getModifiedCategory.php'),
		array( "tableNameWebSql" => 'Unites',		"tableName_MySql" => 'RN_Unite',		"getQueryFile" => 'getModifiedUnit.php')
	);

	$getServerData = array();
	//require_once('loginCheck.php');	// � mettre plus tard ??? et faire la requ�te en fonction de ClientID obtenu de loginCheck
	require_once('connections/connDbUP.php');
	foreach($tablesToSync as $value){
		require_once($value['getQueryFile']);
		$getServerData[$value['tableNameWebSql']] = $sql_result;
	}
	//unset($value); // Usefull ??? Suppos� d�truire la r�f�rence sur le dernier �l�ment
	return $getServerData;
}
?>