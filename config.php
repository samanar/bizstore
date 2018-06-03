<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$database_file = file_get_contents("database.json");
$database_info = json_decode($database_file);

$username = $database_info->username; 
$servername = $database_info->servername; 
$password = $database_info->password; 
$database_name = "bizstore";



// if (substr(php_uname(), 0, 7) == "Windows"){
//      pclose(popen('start /B php.exe server_use.php 2>nul >nul', "r")); 
// }
// else {
//      exec('server_use.php 2>nul >nul');
// }
// $output = "";
// exec("php.exe server_use.php 2>&1" , $output);
// print_r($output);


// // Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // header("Location: ./initial.php");
    echo "Error creating database: " . $conn->connect_error;
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . $database_name . " CHARACTER SET utf8 COLLATE utf8_persian_ci;";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

// session_start();


// $project_name = "market";
// $root_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $project_name;

// function get_root() {
// 	global $project_name;
// 	return $_SERVER['DOCUMENT_ROOT'] . "/" . $project_name;
// }

// adding imports
include("./imports/MysqliDb.php");

// database init
$db =  new MysqliDb ($servername, $username, $password, $database_name);

// adding functinos
include("./functions/database.php");
// include("./functions/public.php");
// include("./functions/views.php");
// include("./functions/table_timestamps.php");
// include("./functions/login_functions.php");

if(! $db->tableExists('products'))
{
	createTable("users" , $users_table);
	createTable("products" , $products_table);
	createTable("store" , $store_table);

}
?>

