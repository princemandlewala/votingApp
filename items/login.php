<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../object/items.php';

$database = new Database();
$db = $database->getConnection();

$items = new items($db);

$items->userName = isset($_GET['userName']) ? $_GET['userName'] : die();

$stmt = $items->readUsers();
$nums = $stmt->rowCount();

if($nums>0){
    // products array
    echo json_encode(
    	array("message" => "Found")
    );
}
else{
	echo json_encode(
    	array("message" => "not found")
    );
}
?>