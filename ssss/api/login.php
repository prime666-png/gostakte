<?php
require_once "../../db.php";
header("Content-Type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $mysqli->prepare("SELECT id,password_hash FROM users WHERE email=?");
$stmt->bind_param("s", $data['email']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

echo json_encode(
$user && password_verify($data['password'], $user['password_hash'])
? ["status"=>"ok","user_id"=>$user['id']]
: ["status"=>"error"]
);
