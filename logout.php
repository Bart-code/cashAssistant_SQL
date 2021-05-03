<?php
	session_start();
	unset( $_SESSION['error_login'] );
	header('Location: index.php');
	exit();
?>