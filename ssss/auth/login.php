<?php
if ($_POST) {
    $stmt = $mysqli->prepare("SELECT id,password_hash FROM users WHERE email=?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php?page=posts");
        exit;
    }
    $error = "Неверный логин или пароль";
}
?>
<h2>Вход</h2>
<form method="post">
<input name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Пароль" required>
<button>Войти</button>
</form>
<p><?= $error ?? '' ?></p>
<a href="index.php?page=register">Регистрация</a>
