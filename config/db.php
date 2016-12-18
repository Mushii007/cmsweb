<?php
session_start();
$dbname='cmsdb';
$dbhost='localhost';
$dbuser='root';
$dbpass='';



try{

$DB_con = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){

$e->getMessages();

}


define("BASE_URL", "http://localhost/cmsweb/");
define("PRODUCT_IMG", "http://localhost/cmsweb/upload/");

include_once($_SERVER['DOCUMENT_ROOT']."/cmsweb/includes/post.class.php");
$post = new Post($DB_con);
include_once($_SERVER['DOCUMENT_ROOT']."/cmsweb/includes/product.class.php");
$prod = new Product($DB_con);
include_once($_SERVER['DOCUMENT_ROOT']."/cmsweb/admin/users.class.php");
$user = new Users($DB_con);

// facebook login

require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1800734510169991',
  'app_secret' => '98f546fa55761e8975e65368ec1d7732',
  'default_graph_version' => 'v2.5',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	//if (isset($_GET['code'])) {
	//	header('Location: ./');
	//}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$userNode = $profile_request->getGraphUser();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
// 	print_r($userNode);
// echo "Welcome !<br><br>";
// 		echo 'Name: ' . $userNode->getName().'<br>';
// 		echo 'User ID: ' . $userNode->getId().'<br>';
// 		echo 'Email: ' . $userNode->getProperty('email').'<br><br>';

// 		$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
// 		echo "Picture<br>";
// 		echo "<img src='$image' /><br><br>";

// 		$logoutUrl = $helper->getLogoutUrl($accessToken, 'http://localhost/cmsweb/user/login.php');
// 		echo '<a href="slogout.php">Logout of Facebook!</a>';

  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
$loginUrl = $helper->getLoginUrl('http://localhost/cmsweb/', $permissions);
}