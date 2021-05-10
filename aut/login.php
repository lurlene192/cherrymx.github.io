<?php
define('ROOT' , $_SERVER['DOCUMENT_ROOT']);
include ROOT.'/core/zefox.php';


	$login = check($_POST['login']);
	$pass = check($_POST['pass']);
   $pass2 = md5($pass);

$query = mysql_query("SELECT `login` FROM `admins` WHERE `login` = '$login' and `pass` = '$pass2' LIMIT 1");
if (mysql_num_rows($query)) {			

	setcookie('userlogin', $login, time()+86400*365, '/');
	setcookie('userpass', $pass2, time()+86400*365, '/');
			

	header('location: /admin');
} else {

	header('location: index.php');
}

?>