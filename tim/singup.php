<?php
if (isset($_POST["login"], $_POST["password"])) {
	require "vendor/autoload.php";
	$db = new Photos\DB();
	$login_exist = $db->check_login($_POST["login"]);
	if ($login_exist) {
		header("Location: user.php?sing_error=login");
	} else {
		$db->new_user($_POST["nickname"], $_POST["login"], $_POST["password"]);
		header("Location: user.php?sing_success=ok");
	}
}