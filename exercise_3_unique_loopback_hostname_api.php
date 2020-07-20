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

$table_name = 'router_details';
$router_name = $data->router_name;
$loop_back = $data->loop_back;
$ip = $data->ip;

$query = "SELECT id FROM " . $table_name . " WHERE  loop_back = ? LIMIT 0,1";
$stmt = $conn->prepare( $query );
$stmt->bindParam(1, $loop_back);
$stmt->execute();
$num = $stmt->rowCount();
if($num <= 0)
{
    $queryinsert = "INSERT INTO " . $table_name . "
                SET router_name = :router_name,
                    loop_back = :loop_back,
                    ip = :ip,created_at=:created_at";

$stmt2 = $conn->prepare($queryinsert);
$stmt2->bindParam(':router_name', $router_name);
$stmt2->bindParam(':loop_back', $loop_back);
$stmt2->bindParam(':ip', $ip);
$stmt2->bindParam(':created_at',date('Y-m-d H:i:s'));
if($stmt2->execute()){

    http_response_code(200);
    echo json_encode(array("message" => "insert successfully."));
}
}
else{
    http_response_code(400);

    echo json_encode(array("message" => "loopback is already exist.")); 
}
exit();

?>


