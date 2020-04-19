<?php
	global $conn;

	//enabling error reprting
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

// This function establihes the connection with database
function connect_db(){
	global $conn;
	// change below credentials
	define("HOST", "database_host_name"); // replace database_host_name to your database host name
	define("USERNAME", "database_user_name"); // replace database_user_name to your database username
	define("PASS", "database_password"); // replace database_password with your database password
	define("DBNAME", "database_name"); // replace database_name with the name of the database

	$conn = new mysqli(HOST, USERNAME, PASS, DBNAME);

	if ($conn->connect_error){
		die('Connection Error');
    }

    return $conn;
}

// This function checks if a given username already exists or not
function is_username_exist($username){
	global $conn;

	$sql = "Select username from user_data";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while ($db_usernames = $result->fetch_assoc()){		
			if ($db_usernames['username'] == $username){
				return TRUE;
			}
		}
	}
	return FALSE;
}

// This function validates the username and password from the database
function login_check($login_data){
	global $conn;
	
	$sql = "select username, password from user_data";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($db_data = $result->fetch_assoc()){
			if ($db_data['username'] == $login_data['username'] && $db_data['password'] == md5($login_data['password'])) {
				return TRUE;
			}
		}
	}
	return FALSE;
}