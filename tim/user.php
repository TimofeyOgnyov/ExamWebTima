<?php
session_start();
$user_id = $_SESSION["user_id"] ?? false;
if ($user_id) {
	require "vendor/autoload.php";
	$db = new Photos\DB();
	$data = $db->get_user_photos($user_id);
}
if (isset($_GET["error"])) {
	$error = "Неверный логин или пароль!";
}
if (isset($_GET["sing_error"])) {
	$sing_error = "Такой логин занят!";
}
if (isset($_GET["sing_success"])) {
	$sing_success = "Вы успешно зарегистрировались!";
}
if (isset($_GET["error_add_photo"])) {
	echo "<script> alert('Заполните данные') </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if($user_id):	?>
		<title>Ваши фотографии</title>
	<?php else: ?>
		<title>Авторизация</title>
	<?php endif ?>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/media.css">
	<script src="./script.js" defer></script>
</head>

<body>

	<?php include "header.php" ?>

	<?php if ($user_id): ?>

		<h1 id="Galery">Ваши фотографии</h1>
		<div class="cards">

			<?php foreach ($data as $item): ?>
				<?= (new Photos\Photo($item['Id'], $item["Image"], $item["Text"]))->get_html() ?>
			<?php endforeach; ?>

		</div>

		<?php include "add_form.php" ?>

		<div id="popup_photo">
			<img src="" alt="">
		</div>

	<?php else: ?>

		<form class="form" action="login.php" method="post">
			<h1>Авторизация</h1>
			<input type="text" name="login" placeholder="Логин">
			<input type="password" name="password" placeholder="Пароль">
			<button>Вход</button>

			<?php if (isset($_GET["error"])): ?>
				<p class="error">
					<?= $error ?>
				</p>
			<?php endif ?>
		</form>
		<form class="form" action="singup.php" method="post">
			<h1>Регистрация</h1>
			<input type="text" name="nickname" placeholder="Имя">
			<input type="text" name="login" placeholder="Логин">
			<input type="password" name="password" placeholder="Пароль">
			<button>Зарегистрироваться</button>
			<?php if (isset($_GET["sing_error"])): ?>
				<p class="error">
					<?= $sing_error ?>
				</p>
			<?php endif ?>

			<?php if (isset($_GET["sing_success"])): ?>
				<p class="success">
					<?= $sing_success ?>
				</p>
			<?php endif ?>

		</form>

	<?php endif ?>
</body>

</html>