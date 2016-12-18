<?php



include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
$prodlist="SELECT * FROM users";

$user->userlist($prodlist);


?>