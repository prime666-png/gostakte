<?php
if ($_POST) {
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("
      INSERT INTO users (username,email,password_hash,created_at)
      VALUES (?,?,?,NOW())
    ");
    $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $hash);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        header("Location: index.php?page=posts");
        exit;
    }
}
?>
<h2>Регистрация</h2>
<form method="post">
<input name="username" placeholder="Имя" required>
<input name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Пароль" required>
<button>Создать</button>
</form>
