<?php
$id = $_SESSION['user_id'];

echo "<nav>
<a href='index.php?page=posts'>Мои посты</a> |
<a href='index.php?page=users_posts'>Посты пользователей</a> |
<a href='index.php?page=messages'>Сообщения</a> |
<a href='index.php?page=logout'>Выход</a>
</nav>";

if (isset($_GET['like'])) {
    $post_id = (int)$_GET['like'];
    $mysqli->query("
      INSERT IGNORE INTO likes (user_id,post_id,created_at)
      VALUES ($id,$post_id,NOW())
    ");
}

$res = $mysqli->query("
SELECT p.id,p.content,u.email,
(SELECT COUNT(*) FROM likes l WHERE l.post_id=p.id) AS likes
FROM posts p
JOIN users u ON u.id=p.user_id
WHERE p.user_id != $id
");

echo "<h2>Посты пользователей</h2>";

while ($p = $res->fetch_assoc()) {
    echo "
    <div>
      <p><b>{$p['email']}</b></p>
      <p>{$p['content']}</p>
      <p>❤️ {$p['likes']}
         <a href='index.php?page=users_posts&like={$p['id']}'>Лайк</a>
      </p>
    </div><hr>";
}
