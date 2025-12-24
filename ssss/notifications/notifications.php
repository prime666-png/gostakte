<?php
$id = $_SESSION['user_id'];
$res = $mysqli->query("
SELECT content FROM notifications WHERE user_id=$id
");

echo "<h2>Уведомления</h2>";
while ($n = $res->fetch_assoc()) {
    echo "<p>".$n['content']."</p>";
}
