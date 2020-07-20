<?php
include './libraries/database.php';
require './php-jwt/src/JWT.php';

use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$databaseService = new DatabaseService();
$conn = $databaseService->getConnection();



$data = json_decode(file_get_contents("php://input"));
$loopback = $data->loopback;
$host_name = $data->host_name;
if($loopback != '' && $host_name != '')
{

    $query1 = "update " . $updateTable . " SET loopback =".$loopback.",hostname=".$host_name." WHERE loopback = ? AND hostname=?";
    $stmt = $conn->prepare( $query1 );
    $stmt->bindParam("loopback", $loopback);
    $stmt->bindParam("hostname", $host_name);
    $stmt->execute();
    http_response_code(200);
    echo json_encode(array("message" => "update successfully"));       
    
}
else{
    http_response_code(401);
    echo json_encode(array("message" => "Api not correct"));
}

