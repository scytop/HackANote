<?php

public function setGroup($groupID, $groupName, $userID) {
/*$CLnum_rows = 1;
if ($CLnum_rows){*/
	require_once('connections/connDbUP.php');
	$currentDateTime =  date("Y-m-d H:i:s");

	$clientLastSyncDateUnix= $clientData['info']['lastSyncDate']/1000;
	$clientLastSyncDate= date('Y-m-d H:i:s', $clientLastSyncDateUnix);

	$insert_value = "(".$groupID.", '".$groupName."', '".$userID"', "", '".$currentDateTime."')";
	$sqlInsert = "INSERT INTO groups (groupID, groupName, userIDs, taskIDs, last_sync_date) VALUES ".$insert_value; 
	mysql_query($db, $sqlInsert);
}

public function createNewGroup($groupName, $userID){
	//used for when you need to create a group
            //Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "FriendNote.db.11531226.hostedresource.com";
            $username = "FriendNote";
            $dbname = "FriendNote";

            //These variable values need to be changed by you before deploying
            $password = "Dickbutt1!";
            $usertable = "groups";        
            //Connecting to your database
            $theDB = mysql_connect($hostname, $username, $password) OR DIE ("Unable to 
            connect to database! Please try again later.");
            mysql_select_db($dbname);
            //generate unique taskID: 9 digit number with a nonzero number at 9th digit
            //should also be odd.  
            $query = "SELECT * FROM $usertable";
            $results = mysql_query($query);
            $myfield = "groupID"
            $currentMax = 100000001;

            if($results){
            	while ($row = mysql_fetch_array($results)){
            		$tempTaskID = $row["$myfield"];
            		if($tempTaskID > $currentMax)
            		{
            			$currentMax = $tempTaskID;
            		}
            	}
            }
            //finds largest current ID, adds 2
            $currentMax += 2;
            $newGroupID = $currentMax;
            //this ensures a unique taskID
            //0 group ID represents self
            setGroup($newGroupID, $groupName, $username);
}


public function userInsert($groupID, $userID) {
	require_once('connections/connDbUP.php');
	$currentDateTime =  date("Y-m-d H:i:s");

	$clientLastSyncDateUnix= $clientData['info']['lastSyncDate']/1000;
	$clientLastSyncDate= date('Y-m-d H:i:s', $clientLastSyncDateUnix);

	$retrive_value = "SELECT userIDs FROM groups WHERE groupID = ". $groupID;
	$group_retrieve = mysql_query($retrieve_value) or die(mysql_error());
	$userIDs = $group_retrieve . $userID . ",";

	$retrive_value2 = "SELECT groupName FROM groups WHERE groupID = ". $groupID;
	$groupName = mysql_query($retrieve_value2) or die(mysql_error());

	$insert_value = "(".$groupID.", '".$groupName."', '".$userID"', "", '".$currentDateTime."')";
	$sqlInsert = "INSERT INTO groups (groupID, groupName, userIDs, taskIDs, last_sync_date) VALUES ".$insert_value;
		mysql_query($db, $sqlInsert);
}
/*	$count = count($clientData['data']['users']);
	for ($i=0; $i < $count; $i++) {
		$newrec = $clientData['data']['users'][$i];  
		$userID = $newrec['userID']; $userID = mysql_real_escape_string($userID);
		$username = $newrec['username']; $id = mysql_real_escape_string($username);
		$userGroups = $newrec['userGroups']; $id = mysql_real_excape_string($userGroups);
		$clientRecLastSyncDate = $newrec['last_sync_date']; $clientRecLastSyncDate = mysql_real_escape_string($clientRecLastSyncDate);
	
		//if (ID == -1 ) do an INSERT INTO MySQL
		//if (ID <> -1 AND last_sync_date < clientRecLastSyncDate) do an UPDATE INTO MySQL
		//if (ID <> -1 AND last_sync_date > clientRecLastSyncDate) do nothing because MySQL is more recent
		if ($userID == -1) {
			$insert_value 	 = "(" .$userID. ", '".$username."', " .$userGroups. ", '" .$currentDateTime. "')";
			$sqlInsert = "INSERT INTO users (userID, username, userGroups, last_sync_date) VALUES ".$insert_value;
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

		}
		if ($ContactID <> -1) {
			$moreRecentSQL = "SELECT last_sync_date FROM users WHERE userID = ". $userID;
			//echo $moreRecentSQL, "<br>", "<br>";
			$moreRecentResult = mysql_query($moreRecentSQL) or die(mysql_error());
			$row_moreRecentResult = mysql_fetch_assoc($moreRecentResult);
			$serverRec_last_sync_date = $row_moreRecentResult['last_sync_date'];
			//echo "serverRec_last_sync_date = ", $serverRec_last_sync_date, "<br>";
			//echo "clientRecLastSyncDate   = ", $clientRecLastSyncDate, "<br>";
			//echo "if serverRec_last_sync_date:", $serverRec_last_sync_date, "< clientRecLastSyncDate: ", $clientRecLastSyncDate, "<br>", "<br>";
	
			if ($serverRec_last_sync_date < $clientLastSyncDate){
				$sqlUpdate = "UPDATE user SET userID='". $userID. "', username='". $username. "', groupID='". $groupID. "', last_sync_date='". $currentDateTime ."' WHERE userID=". $userID ;
				//echo $sqlUpdate, "<br>", "<br>";
				$queryUpdate = mysql_query($sqlUpdate) or die('line 100. '.mysql_error());
			}
			//Else -> Do nothing because server is more recent than the client. The getContact will send the more recent data to client. 
		}
	}	//end for
}	//end if ($CLnum_rows)*/
?>