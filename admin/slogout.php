<?php 
session_start();            //start session
$_SESSION = array();    //clear session array
session_destroy();  
header('Location: http://localhost/cmsweb/');    //destroy session
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log Out</title>
</head>

<body>
<p>You have successfully logged out!</p>
<p>Return to the <a href="index.php">Home</a> page</p>

</body>
</html>
