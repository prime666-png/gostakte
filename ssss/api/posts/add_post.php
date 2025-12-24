<?php
if ($_POST) {
    $stmt = $mysqli->prepare("
      INSERT INTO posts (user_id,content,created_at)
      VALUES (?,?,NOW())
    ");
    $stmt->bind_param("is", $_SESSION['user_id'], $_POST['content']);
    $stmt->execute();
    header("Location: index.php?page=posts");
}
?>
<h2>Новый пост</h2>
<form method="post">
<textarea name="content" required></textarea>
<button>Опубликовать</button>
</form>
