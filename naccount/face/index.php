<?php
require 'facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '458656457529311',
  'secret' => 'e1754b3903f7dec27fd5b1a1b9ff2cc3',
));

// Get User ID
$user = $facebook->getUser();
if($user==0){
$login=$facebook->getLoginUrl( array('scope' => 'email,read_stream'));

        header("Location: ".$login);

}
else{
	 $user_profile = $facebook->api('/me');

	$_SESSION['uname']=$user_profile['name'];
	$_SESSION['id']=$user_profile['id'];
	$_SESSION['email']=$user_profile['email'];
	$_SESSION['provider']="facebook";
	$_SESSION['uimg']="https://graph.facebook.com/".$user_profile['id']."/picture?type=large";
        header("Location: ../../loginac.php");

}
?>
