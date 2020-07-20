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

$table_name = 'router_functionality';
$table_name2 = 'router_details';
$sap_id = $data->sap_id;

$query = "SELECT rf.function_name FROM " . $table_name . " as rf inner join ".$table_name2." as rd on rf.router_id=rd.id WHERE sap_id = ?";
$stmt = $conn->prepare( $query );
$stmt->bindParam(1, $sap_id);
$stmt->execute();
$data = $stmt->fetchAll();
$result = $data->fetchAll(PDO::FETCH_ASSOC);
if(!empty($result))
{
   
    $responseArr = [];
    $responseArr['data'] = $result;
    $responseArr['message'] = 'fetch successfully';
    
    http_response_code(200);
    echo json_encode($responseArr);
}
else{
    http_response_code(400);

    echo json_encode(array("message" => "data not found.")); 
}
exit();

?>


