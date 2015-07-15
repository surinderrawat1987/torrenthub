<?php
session_start();

require 'facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '450828851763866',
  'secret' => 'c68061e3678912382513d16a1027468d',
));
$logoutUrl = $facebook->getLogoutUrl();

$facebook->destroySession();
session_destroy();

header('Location:../../loginac.php');
 
//on logout page

?>