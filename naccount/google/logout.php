<?php

########## Google Settings.. Client ID, Client Secret from https://cloud.google.com/console #############
$google_client_id 		= '333535266543-gkstt2e1oai1sgpi2u8v6gueucgmk7tf.apps.googleusercontent.com';
$google_client_secret 	= 'ff_uRSYgTBboP-wVLMKV3tY6';
$google_redirect_url 	= 'http://localhost/ncrawler/new/naccount/google/index.php'; //path to your script
$google_developer_key 	= 'AIzaSyBBw7kXcdaj1tCYIKTmMzmAHgAZDZBnca8';

########## MySql details (Replace with yours) #############
$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 'crawler'; //Database Name
###################################################################

//include google api files
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';

//start session
session_start();

$gClient = new Google_Client();
//$gClient->setApplicationName('Login to Sanwebe.com');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
  unset($_SESSION['token']);
  $gClient->revokeToken();
//  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
	header('Location: '.filter_var("../../loginac.php",FILTER_SANITIZE_URL));

    unset($_SESSION['id']);
    unset($_SESSION['uname']);
    unset($_SESSION['uimg']);
    session_destroy();

?>