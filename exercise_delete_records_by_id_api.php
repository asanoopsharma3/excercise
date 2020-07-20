<?php

/*
 * db structure
 * 
 CREATE TABLE `router_details` (
  `id` int(11) NOT NULL,
  `router_name` varchar(255) NOT NULL,
  `loop_back` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 * 
 */
include './libraries/database.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$databaseService = new DatabaseService();
$conn = $databaseService->getConnection();
//
$data = json_decode(file_get_contents("php://input"));

//$table_name = 'router_functionality';
$table_name2 = 'router_details';
$ip = $data->ip;
$query = "delete from ".$table_name2." WHERE ip=?";
$stmt = $conn->prepare( $query );
$stmt->bindParam(1, $sap_id);
if($stmt->execute())
{
    http_response_code(200);
    echo json_encode(array("message" => "delete successfully."));
}
else{
    http_response_code(400);

    echo json_encode(array("message" => "data not found.")); 
}
exit();

?>


