<?php
session_start();
$user_id = $_SESSION["user_id"] ?? false;
require "vendor/autoload.php";
$db = new Photos\DB();
$data = $db->get_all_photos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Какая-то тема</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/media.css">
	<script src="./script.js" defer></script>
</head>

<body>

	<?php include "header.php" ?>

	<h1 id="Galery">Какая-то тема</h1>
	<div class="cards">
		<?php foreach ($data as $item): ?>
			<?= (new Photos\Photo($item['Id'],$item["Image"], $item["Text"]))->get_html() ?>
		<?php endforeach; ?>
	</div>

	<?php include "add_form.php" ?>

</body>

</html>