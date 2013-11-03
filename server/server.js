initializeDatabase: function() {
    TABLES_TO_SYNC = [
        {tableName: 'task', idName: 'taskID'}
        {tableName: 'user', idName: 'userID'},
        {tableName: 'group', idName: 'groupID'} //if idName not specified, it will assume that it's "id"
    ];
    sync_info: {//Example of user info
        userEmail: 'test@gmail.com',//the user mail is not always here
        device_uuid: 'UNIQUE_DEVICE_ID_287CHBE873JB',//if no user mail, rely on the UUID
        lastSyncDate: 0,
        device_version: '5.1',
        device_name: 'test navigator',
        userAgent: navigator.userAgent,
        //app data
        appName: 'noteList',
        noteList_version: '0.1',
        lng: 'en'
    },
    DBSYNC.initSync(TABLES_TO_SYNC, notelistDB, sync_info, 'http://localhost:3306', callBackEndInit);
}