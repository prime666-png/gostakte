<?php
$id = $_SESSION['user_id'];

echo "<nav>
<a href='index.php?page=posts'>Посты</a> |
<a href='index.php?page=messages'>Сообщения</a> |
<a href='index.php?page=themes'>Тема</a> |
<a href='index.php?page=logout'>Выход</a>
</nav>";

$res = $mysqli->query("SELECT content FROM posts WHERE user_id=$id");

echo "<h2>Мои посты</h2>";
echo "<a href='index.php?page=add_post'>Добавить пост</a>";

while ($p = $res->fetch_assoc()) {
    echo "<p>".$p['content']."</p>";
}
