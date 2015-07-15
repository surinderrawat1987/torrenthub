<?php
session_start();
if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'google') {
        header("Location: naccount/google/index.php");
    } else if ($oauth_provider == 'facebook') {
        header("Location: naccount/face/index.php");
    }
	 else if ($oauth_provider == 'twitter') {
        header("Location: naccount/twitt/index.php");
    }
}
if (array_key_exists("logout", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'google') {
        header("Location: naccount/google/logout.php");
    } else if ($oauth_provider == 'facebook') {
        header("Location: naccount/face/logout.php");
    }else if ($oauth_provider == 'twitter') {
        header("Location: naccount/twitt/index.php?reset=1");
    }
	else if ($oauth_provider == 'thub') {
        header("Location: logout.php");
    }
}

if($_POST[submit]=="Submit"){

$_SESSION[uname]=$_POST[uname];
$_SESSION[email]=$_POST[uemail];
$_SESSION[provider]="thub";
	 header("Location: loginac.php");

}


if (!isset($_SESSION['uname'])) {
?>

<table border="1" width="50%">
<tr>
<td>  <a href="?login&oauth_provider=facebook"><img src="images/signup_facebook.jpg" width="150px"></td>
<td>  <a href="?login&oauth_provider=twitter"><img src="images/signup_twitter.jpg" width="150px"></td>
<td>  <a href="?login&oauth_provider=google"><img src="images/signup_google.jpg" width="150px"></td>
<td>  
<form action="" method="POST">
<table border="1" width="100%">
<tr>
<td>Name:-</td><td><input type="text" name="uname"></td>
<td>email:-</td><td><input type="text" name="uemail"></td>
<td colspan="2"><input type="submit" name="submit" value="Submit" onclick="javascript:history.go(0)"></td>

</tr>
</table>
</form>
</td>
</tr>
</table>
<?php

}
else{

	 $date=date("d-m-y H:i");
 $dbhost = 'localhost';
	$dbname = 'torrents';

	// Connect to test database
	$m = new Mongo("mongodb://$dbhost");
	$db = $m->$dbname;

	// Get the users collection
//datebase:- uid,provider,uname,uemail,datetime

	$c_users = $db->users;
	if($_SESSION[provider]=="thub"){
		$user = $c_users->find(array('uemail'=> $_SESSION[email]));

	}
	else{
$user = $c_users->find(array('uid'=> $_SESSION[id],'provider'=>$_SESSION[provider]));
	}
$length = $user->count();
if($length==0){
$document = array( 
      "uid" => $_SESSION[id], 
      "provider" => $_SESSION[provider], 
      "uname" => $_SESSION[uname],
      "uemail" => $_SESSION[email],
      "datetime"=> $date
   );
   $c_users->insert($document);
   $_SESSION[uid]=(string)$document['_id'];
}
else{
	foreach ($user as $obj){
 $_SESSION[uid]=(string)$obj['_id'];
}}


echo "<br /><a class='logout' href='?logout&oauth_provider=$_SESSION[provider]'>Logout</a>";
	 
	 //header("Location: ".$_SERVER['HTTP_REFERER']);
}



?>