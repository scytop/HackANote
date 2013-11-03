<?php
/*
 * Name  : setContact.php	called by: webSqlSyncAdapter.php
 * Goal  : To INSERT and UPDATE in Contact table in the sync process with a JSON coming from the webSqlApp 
 * By (c): Alain Beauseigle from AffairesUP inc.
 * Date  : 2013-10-19
 * ToDo  : Test if the json is working with accents
 * ToDo  : Activate the authenetication
 * Status: It works, it update the data
 * ToTest: Use http://www.affairesup.com/webSqlApp/setContactTest.php
*/
public function getUsergroups($userID) {
/*$CLnum_rows = 1;
if ($CLnum_rows){
	require_once('connections/connDbUP.php');
	$currentDateTime =  date("Y-m-d H:i:s");				// usefull for the unit test of this function
	$clientData = $handler -> clientData;

	$clientLastSyncDateUnix= $clientData['info']['lastSyncDate']/1000;	// It gives a 10 digits Unix dateTime format
	$clientLastSyncDate= date('Y-m-d H:i:s', $clientLastSyncDateUnix);	// to show the date in YYYY-MM-DD HH:MM:SS format (MySQL datetime format). Result: 2007-12-20 14:00:00

	$count = count($clientData['data']['users']);
	for ($i=0; $i < $count; $i++) {
		$newrec = $clientData['data']['users'][$i];  
		$userID = $newrec['userID']; $userID = mysql_real_escape_string($userID);*/
	
		require_once('connections/connDbUP.php');
		$dbhandle = sqlite_open('FriendNote.db.11531226.hostedresource.com', 0666, $error);
		$groupSQL = "SELECT userGroups FROM users WHERE userID = ". $userID;
		$groupString = sqlite_exec($dbhandle, $sqlInsert, $error);

		if (!$groupString)
		   die("Cannot execute query. $error");

		echo "Database Friends created successfully";

		sqlite_close($dbhandle);
}
/*		//if (ID == -1 ) do an INSERT INTO MySQL
		//if (ID <> -1 AND last_sync_date < clientRecLastSyncDate) do an UPDATE INTO MySQL
		//if (ID <> -1 AND last_sync_date > clientRecLastSyncDate) do nothing because MySQL is more recent
		if ($ContactID == -1) {
			$insert_value 	 = "(" .$id. ", '".$firstName."', '".$lastName."', ".$qte.", ".$MaJdate.", ".$cbFait.", '".$rbABC."', ".$UniteID.", '" .$currentDateTime. "')";
			$sqlInsert = "INSERT INTO Contacts (id, firstName, lastName, qte, MaJdate, cbFait, rbABC, UniteID, last_sync_date) VALUES ".$insert_value;
			//echo $sqlInsert, "<br>", "<br>";
			$queryInsert = mysql_query($sqlInsert) or die('line 72. '.mysql_error());
			// Note: By changing last_sync_date to the currentDateTime, the getModifiedContact.php SELECT query will force to update ContactID in webSQL db  

/*			// Do an UPDATE to MySQL to force webSqlSync to change the ContactID from -1 to N
			$getNewContactIDsql = "SELECT ContactID FROM Contacts WHERE id = ". $id;
			//echo $getNewContactIDsql, "<br>", "<br>";
			$newContactIDResult = mysql_query($getNewContactIDsql) or die(mysql_error());
			$row_NewContactIDResult = mysql_fetch_assoc($newContactIDResult);
			//echo $totalRows_moreRecentResult = mysql_num_rows($moreRecentResult);	// donne 0 
			$NewContactID = $row_NewContactIDResult['ContactID'];
			$sqlUpdate = "UPDATE Contacts SET last_sync_date='". $currentDateTime ."' WHERE id = ". $id ;
			//echo $sqlUpdate, "<br>", "<br>";
			$queryUpdate = mysql_query($sqlUpdate) or die('line 82. '.mysql_error());
/*
		}
		if ($ContactID <> -1) {
			$moreRecentSQL = "SELECT last_sync_date FROM Contacts WHERE ContactID = ". $ContactID;
			//echo $moreRecentSQL, "<br>", "<br>";
			$moreRecentResult = mysql_query($moreRecentSQL) or die(mysql_error());
			$row_moreRecentResult = mysql_fetch_assoc($moreRecentResult);
			$serverRec_last_sync_date = $row_moreRecentResult['last_sync_date'];
			//echo "serverRec_last_sync_date = ", $serverRec_last_sync_date, "<br>";
			//echo "clientRecLastSyncDate   = ", $clientRecLastSyncDate, "<br>";
			//echo "if serverRec_last_sync_date:", $serverRec_last_sync_date, "< clientRecLastSyncDate: ", $clientRecLastSyncDate, "<br>", "<br>";
	
			if ($serverRec_last_sync_date < $clientLastSyncDate){
				$sqlUpdate = "UPDATE Contacts SET id='". $id. "', firstName='". $firstName. "', lastName='". $lastName. "', qte=". $qte. ", MaJdate='". $MaJdate. "', cbFait=". $cbFait .", rbABC='". $rbABC ."', UniteID=". $UniteID .", last_sync_date='". $currentDateTime ."' WHERE ContactID=". $ContactID ;
				//echo $sqlUpdate, "<br>", "<br>";
				$queryUpdate = mysql_query($sqlUpdate) or die('line 100. '.mysql_error());
			}
			//Else -> Do nothing because server is more recent than the client. The getContact will send the more recent data to client. 
		}
	}	//end for
}	//end if ($CLnum_rows)*/
?>