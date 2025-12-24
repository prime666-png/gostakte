<?php
$id = $_SESSION['user_id'];

$count = $mysqli->query("
SELECT COUNT(*) c FROM messages WHERE receiver_id=$id
")->fetch_assoc()['c'];

echo "<h2>Сообщения ($count)</h2>";

$res = $mysqli->query("
SELECT text FROM messages WHERE receiver_id=$id
");

while ($m = $res->fetch_assoc()) {
    echo "<p>".$m['text']."</p>";
}
