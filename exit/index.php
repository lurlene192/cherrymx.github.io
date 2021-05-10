<?php
		setcookie('userlogin', '', time() - 86400*31);
		setcookie('userpassword', '', time() - 86400*31);
		header('location: /');
?>