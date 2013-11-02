function task(taskID, groupID, assignedUserID, taskName, taskDetails, completed, dueDate)
{
	this.taskID = taskID;
	this.groudID = groupID;
	this.assignedUser = assignedUser;
	this.taskName = taskName;
	this.taskDetails = taskDetails;
	this.completed = completed;
	this.dueDate = dueDate;
}

function user(userID, userName, userGroups[]){
	this.userID = userID;
	this.userName = userName;
	this.userGroups[] = userGroups[];
}

function group(groupID, groupName, userIDs[], taskIDs[]){
	this.groupID = groupID;
	this.groupName = groupName;
	this.userIDs[] = userIDs[];
	this.taskIDs[] = taskIDs[];
}