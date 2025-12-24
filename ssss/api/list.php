<?php
require_once "../../db.php";
header("Content-Type: application/json; charset=UTF-8");

$res = $mysqli->query("
SELECT p.content,u.username
FROM posts p
JOIN users u ON u.id=p.user_id
");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
