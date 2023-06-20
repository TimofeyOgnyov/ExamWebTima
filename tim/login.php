<?php
if (isset($_POST["login"], $_POST["password"])) {
	require "vendor/autoload.php";
	$db = new Photos\DB();
	$user_id = $db->check_user($_POST["login"], $_POST["password"]);
	if ($user_id) {
		session_start();
		$_SESSION["user_id"] = $user_id;
		header("Location: user.php");
	} else {
		header("Location: user.php?error=login");
	}
}