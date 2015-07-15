<?php
session_start();
session_destroy();

 
	unset($_SESSION['id']);
    unset($_SESSION['uname']);
    unset($_SESSION['uimg']);
	unset($_SESSION['email']);

header('Location:loginac.php');

?>