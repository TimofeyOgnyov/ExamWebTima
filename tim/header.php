<header>
	<div class="mobile_icon">
		<img src="./images/free-icon-menu-bar-8107138.png" alt="">
	</div>
	<div class="popup">
		<a href="./index.php">Какая-то тема</a>
		<?php if ($user_id): ?>
			<a id="show_add_photo" href="#">Добавить фото</a>
		<?php endif; ?>
		<?php if (!$user_id): ?>
			<a href="./user.php">Войти</a>
		<?php endif; ?>
		<?php if ($user_id): ?>
			<a href="./user.php">Ваши фотографии</a>
		<?php endif; ?>
		<?php if ($user_id): ?>
			<a href="./logout.php">Выйти</a>
		<?php endif; ?>

	</div>
</header>