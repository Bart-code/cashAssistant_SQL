<?php
	
	session_start();
	require_once "connect.php";
	$dataBaseConnect = new mysqli($host,$db_user,$db_password,$db_name);
	if($dataBaseConnect->connect_errno!=0)
	{
		$_SESSION['dbError']=$dataBaseConnect->connect_errno;
	}
	else
	{
		$LoggingOK=true;
		
		//check login
		$userLogin=$_POST['userLogin'];
		
		if(strlen($userLogin) <6 || strlen($userLogin) >20)
		{
			$_SESSION['error_login']="Login must be (6-20)";
			$LoggingOK=false;
		}
		else
		{
			$sqlRequest="SELECT users.id FROM users WHERE users.login='$userLogin'";
			$result = $dataBaseConnect->query($sqlRequest);
			$usersCount = $result->num_rows;
			if(  $usersCount > 0)
			{
				//check password
				$sqlRequest="SELECT users.password FROM users WHERE users.login='$userLogin'";
				$result->free_result();
				$result = $dataBaseConnect->query($sqlRequest);
				$row = $result->fetch_assoc();
				$result->free_result();
				$inputPassword=password_hash( $_POST['userPassword'] , PASSWORD_DEFAULT );
				if(!password_verify( $inputPassword , $row['password'] ))
				{
					$_SESSION['error_password']="Password is incorrect";
					$LoggingOK=false;
				}
			}
			else
			{
				$_SESSION['error_login']="No users with that login";
				$LoggingOK=false;
			}
		}
		
		//remember informations
		$_SESSION['remember_login']=$userLogin;
		
		if(!$LoggingOK)
		{
			header('Location: index.php');
			exit();
		}
		else
		{
			unset($_SESSION['remember_login']);
			header('Location: mainSite.html');
			exit();
		}
	}
	$dataBaseConnect->close();
?> 
