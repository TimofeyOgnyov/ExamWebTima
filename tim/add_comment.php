<?php
  session_start();
  if (isset($_POST["photo_id"], $_POST["text"], $_SESSION["user_id"])) {
    require "vendor/autoload.php";
    $db = new \Photos\DB();
    $inserted_comment = $db->add_comment($_POST["photo_id"], $_SESSION["user_id"], $_POST["text"]);
    echo json_encode($inserted_comment);
  }