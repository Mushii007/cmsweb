<?php
///session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
$user = new Users();
	
if($user->is_loggedin())
{
	$user->signout();
	$user->redirect('/cmsweb');
}
