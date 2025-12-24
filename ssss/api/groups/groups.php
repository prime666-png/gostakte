<?php
$res = $mysqli->query("SELECT name FROM groups");

echo "<h2>Группы</h2>";
while ($g = $res->fetch_assoc()) {
    echo "<p>".$g['name']."</p>";
}
