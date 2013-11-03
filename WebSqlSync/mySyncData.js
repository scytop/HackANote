var SYNCDATA = {
    url: 'http://localhost:3306',// Set your server URL here	______
    database: 'noteListDB',	// webSQL database object (line 237 of indext.html)
    tableToSync: [{
        {tableName: 'task', idName: 'taskID'}
        {tableName: 'user', idName: 'userID'},
        {tableName: 'group', idName: 'groupID'}
    ],
    sync_info: {//Example of user info
        userEmail: 'name@gmail.com',//the user mail is not always here
        device_uuid: 'UNIQUE_DEVICE_ID_287CHBE873JB',//if no user mail, rely on the UUID
        lastSyncDate: '0',
		device_version: '5.1',
        device_name: 'test navigator',
		userAgent: navigator.userAgent,
        //app data
        appName: 'noteList',
        noteList_version: '0.1',
        lng: 'en'
    },
    _nullDataHandler: function(){

    },
    _errorHandler: function(transaction, error){
        console.error('Error : ' + error.message + ' (Code ' + error.code + ') Transaction.name = ' + transaction.name);
    }
};
