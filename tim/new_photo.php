<?php

if (isset($_POST["image"], $_POST["text"])) {
	$image = $_POST["image"]; 
	$text = $_POST["text"];
	if($image and $text ?? false){
		require "vendor/autoload.php";
		$db = new Photos\DB();
		session_start();
		$user_id = $_SESSION["user_id"];
		$db->new_photo($user_id, $_POST["image"], $_POST["text"]);
		header("Location: user.php");
	}
	else { 
		header("Location: user.php?error_add_photo");
	}
}