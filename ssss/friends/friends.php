<?php
$id = $_SESSION['user_id'];

$res = $mysqli->query("
SELECT u.username
FROM friends f
JOIN users u ON u.id=f.friend_id
WHERE f.user_id=$id AND f.status='accepted'
");

echo "<h2>Друзья</h2>";
while ($f = $res->fetch_assoc()) {
    echo "<p>".$f['username']."</p>";
}
