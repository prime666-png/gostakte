<?php
$id = $_SESSION['user_id'];

echo "<nav>
<a href='index.php?page=posts'>Мои посты</a> |
<a href='index.php?page=users_posts'>Посты пользователей</a> |
<a href='index.php?page=messages'>Сообщения</a> |
<a href='index.php?page=logout'>Выход</a>
</nav>";

if ($_POST) {
    $email = $_POST['email'];
    $text = $_POST['text'];

    $u = $mysqli->query("SELECT id FROM users WHERE email='$email'")->fetch_assoc();
    if ($u) {
        $stmt = $mysqli->prepare("
          INSERT INTO messages (sender_id,receiver_id,text,sent_at)
          VALUES (?,?,?,NOW())
        ");
        $stmt->bind_param("iis", $id, $u['id'], $text);
        $stmt->execute();
        echo "<p>Сообщение отправлено</p>";
    } else {
        echo "<p>Пользователь не найден</p>";
    }
}
?>

<h2>Отправить сообщение</h2>
<form method="post">
<input name="email" placeholder="Email получателя" required>
<textarea name="text" placeholder="Текст сообщения" required></textarea>
<button>Отправить</button>
</form>

<h2>Входящие</h2>
<?php
$res = $mysqli->query("
SELECT m.text,u.email
FROM messages m
JOIN users u ON u.id=m.sender_id
WHERE m.receiver_id=$id
");

while ($m = $res->fetch_assoc()) {
    echo "<p><b>{$m['email']}:</b> {$m['text']}</p>";
}
