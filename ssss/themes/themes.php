<?php
if ($_POST) {
    $mysqli->query("
    UPDATE users SET themes_id=".$_POST['theme']."
    WHERE id=".$_SESSION['user_id']
    );
}

$res = $mysqli->query("SELECT * FROM themes");
?>

<h2>Выбор темы</h2>
<form method="post">
<select name="theme">
<?php while ($t = $res->fetch_assoc()): ?>
<option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>
<?php endwhile ?>
</select>
<button>Сохранить</button>
</form>
