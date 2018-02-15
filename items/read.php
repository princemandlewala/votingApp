<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../object/items.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$items = new items($db);

$items->userName = isset($_GET['userName']) ? $_GET['userName'] : die(); 
// query products
$stmt = $items->read();
$num = $stmt->rowCount();

 
// check if more than 0 record found
if($num>0){
    // products array
    $items_arr=array();
    $items_arr["records"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $items_item=array(
            "itemId" => $itemId,
            "itemName" => $itemName,
            "description" => $Description,
            "imgSrc" => $ImgSrc,
            "noOfVotes" => $noOfVotes,
            "votes" => $votes
        );
 
        array_push($items_arr["records"],$items_item);
    }
    echo json_encode($items_arr["records"],JSON_PRETTY_PRINT);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>
