<?php 

function login($username , $password){
	global $db;

	$db->where("username" , $username);
	if(!$db->has("users")) {
		return false;
	} 


	$db->where("username" , $username);
	$db->where("password" , $password);
	$user_data = $db->getOne("users");

	if(!isset($user_data) || $user_data == null ||  
		!isset($user_data['username']) || $user_data['username'] == "") {
		return false;
	}

	$_SESSION['name'] = $user_data['name'];
	$_SESSION['username'] = $user_data['username'];
	$_SESSION['level'] = $user_data['level'];
	$_SESSION['user_id'] = $user_data['id'];
	$_SESSION['login'] = true;
	return true;
} 


function check_login() {
	return ( isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['name']) 
		&& $_SESSION['name'] != "" && isset($_SESSION['user_id']) );
}

function is_duplicate_username($username ) {
	global $db;
	$db->where("username" , $username);
	if($db->has("users"))
		return true;
	return false;
}

function is_duplicated_username_edit($username , $id) {
	global $db;
	$db->where("id" , $id);
	$info = $db->getOne("users");
	if($username == $info['username'])
		return false;
	$db->where("username" , $username);
	if($db->has("username"))
		return true;
	return false;
}

function logout() {
	if(check_login()) {
		$_SESSION['login'] = false;
	}
	session_unset();
}

?>