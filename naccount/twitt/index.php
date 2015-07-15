<?php
//start session
session_start();

//just simple session reset on logout click
if($_GET["reset"]==1)
{
	session_destroy();
	header('Location: ../../loginac.php');
}



// Include config file and twitter PHP Library by Abraham Williams (abraham@abrah.am)
include_once("config.php");
include_once("inc/twitteroauth.php");

if(isset($_SESSION['status']) && $_SESSION['status']=='verified') 
{	//Success, redirected back from process.php with varified status.
	//retrive variables
	$screenname 		= $_SESSION['request_vars']['screen_name'];
	$twitterid 			= $_SESSION['request_vars']['user_id'];
	$oauth_token 		= $_SESSION['request_vars']['oauth_token'];
	$oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];

	//Show welcome message
	
 $_SESSION['uimg']="https://twitter.com/".$screenname."/profile_image?size=normal";
  $_SESSION['uname']=$screenname;
	   $_SESSION['id']=$twitterid;
	   $_SESSION['provider']="twitter";
		header('Location: ../../loginac.php');

}
else{
	header('Location: process.php');

}

?>
