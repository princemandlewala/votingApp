<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../object/updateItems.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$updateItems = new items($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
// set ID property of product to be edited
$updateItems->itemIdUpdate = isset($_GET['itemId']) ? $_GET['itemId'] : die();
// set product property values
$updateItems->userNameUpdate = isset($_GET['loginName']) ? $_GET['loginName'] : die();

// update the product
if($updateItems->insertLog()){
	echo '{';
	echo '"message": "log was updated."';
	echo '}';
}

// if unable to update the product, tell the user
else{
	echo '{';
	echo '"message": "Unable to update log."';
	echo '}';
}