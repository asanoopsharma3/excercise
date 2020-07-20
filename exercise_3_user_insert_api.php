<?php

/*
 * db structure
 * 
 * CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jwt_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 * 
 */
include './libraries/database.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$firstName = 'Anoop';
$lastName = 'Kumar';
$email = 'asanoopsharma03@gmail.com';
$password = 'anoop@123';
$conn = null;

$databaseService = new DatabaseService();
$conn = $databaseService->getConnection();
//
//$data = json_decode(file_get_contents("php://input"));
//
//$firstName = $data->first_name;
//$lastName = $data->last_name;
//$email = $data->email;
//$password = $data->password;

$table_name = 'Users';

$query = "INSERT INTO " . $table_name . "
                SET first_name = :firstname,
                    last_name = :lastname,
                    email = :email,
                    password = :password";

$stmt = $conn->prepare($query);

$stmt->bindParam(':firstname', $firstName);
$stmt->bindParam(':lastname', $lastName);
$stmt->bindParam(':email', $email);

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$stmt->bindParam(':password', $password_hash);


if($stmt->execute()){

    http_response_code(200);
    echo json_encode(array("message" => "User was successfully registered."));
}
else{
    http_response_code(400);

    echo json_encode(array("message" => "Unable to register the user."));
}
?>


