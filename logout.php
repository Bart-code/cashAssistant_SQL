<?php
	session_start();
	unset( $_SESSION['loggingSuccesfull'] );
	header('Location: index.php');
	exit();
?>