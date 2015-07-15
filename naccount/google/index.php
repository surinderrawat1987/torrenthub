<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
echo "fds1";

$google_client_id 		= '333535266543-gkstt2e1oai1sgpi2u8v6gueucgmk7tf.apps.googleusercontent.com';
$google_client_secret 	= 'eR3MhyctK9DetrlCiK-ADz6d';
$google_redirect_url 	= 'http://ns1.torrenthub.in/demo/naccount/google/index.php'; //path to your script
$google_developer_key 	= 'AIzaSyBBw7kXcdaj1tCYIKTmMzmAHgAZDZBnca8';

$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 'crawler'; //Database Name

//include google api files
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';

//start session
session_start();
echo "fds";

$gClient = new Google_Client();
//$gClient->setApplicationName('Login to Sanwebe.com');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
	$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //For logged in user, get details from google using access token
	  $user 				= $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
	  $_SESSION['token'] 	= $gClient->getAccessToken();
		$_SESSION[uname]=$user_name;
		$_SESSION[uimg]=$profile_image_url;
		$_SESSION[email]=$email;
		$_SESSION[id]=$user_id;
	$_SESSION['provider']="google";



}
else 
{
	//For Guest user, get google login url
	echo $authUrl = $gClient->createAuthUrl();
}
if(isset($authUrl)) //user is not logged in, show login button
{
	echo "Fds";
		header("Location:".$authUrl);
} 
else // user logged in 
{
         header("Location: ../../loginac.php");

}
/*
//HTML page start
echo '<!DOCTYPE HTML><html>';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<title>Login with Google</title>';
echo '</head>';
echo '<body>';
echo '<h1>Login with Google</h1>';

if(isset($authUrl)) //user is not logged in, show login button
{
	echo '<a class="login" href="'.$authUrl.'"><img src="images/google-login-button.png" /></a>';
} 
else // user logged in 
{
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	//compare user id in our database
	$user_exist = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user_id")->fetch_object()->usercount; 
	if($user_exist)
	{
		echo 'Welcome back '.$user_name.'!';
	}else{ 
		//user is new
		echo 'Hi '.$user_name.', Thanks for Registering!';
		$mysqli->query("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) 
		VALUES ($user_id, '$user_name','$email','$profile_url','$profile_image_url')");
	}

	
	echo '<br /><a href="'.$profile_url.'" target="_blank"><img src="'.$profile_image_url.'?sz=100" /></a>';
	echo '<br /><a class="logout" href="?reset=1">Logout</a>';
	
	//list all user details
	echo '<pre>'; 
	print_r($user);
	echo '</pre>';	
}
 
echo '</body></html>';

*/
?>

