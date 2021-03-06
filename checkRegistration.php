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
		$registrationOK=true;
		$userName=$_POST['userName'];
		$userLastName=$_POST['userLastName'];
		$userLogin=$_POST['userLogin'];
		$userEmail=$_POST['userEmail'];
		$userPassword1=$_POST['userPassword1'];
		$userPassword2=$_POST['userPassword2'];
		
		//check name
		if(strlen($userName) <6 || strlen($userName) >20)
		{
			$_SESSION['error_name']="User-name must be (6-20)";
			$registrationOK=false;
		}
		
		//check last name
		if(strlen($userLastName) <6 || strlen($userLastName) >20)
		{
			$_SESSION['error_lastname']="User-lastname must be (6-20)";
			$registrationOK=false;
		}
		
		//check email
		
		$userEmailAfterSanitize = filter_var($userEmail, FILTER_SANITIZE_EMAIL);
		if(   (filter_var( $userEmailAfterSanitize,   FILTER_VALIDATE_EMAIL )  == false )  ||   
		 ($userEmailAfterSanitize !=  $userEmail)  )
		{
			$_SESSION['error_email']="Email is incorrect";
			$registrationOK=false;
		}
		
		//check login
		
		if(strlen($userLogin) <6 || strlen($userLogin) >20)
		{
			$_SESSION['error_login']="Login must be (6-20)";
			$registrationOK=false;
		}
		else
		{
			$result = @$dataBaseConnect->query(
			sprintf("SELECT users.id FROM users WHERE users.login='%s'",
			mysqli_real_escape_string($dataBaseConnect,$userLogin)));
			if($dataBaseConnect->connect_errno!=0)
			{
				$_SESSION['dbError']=$dataBaseConnect->connect_errno;
			}
			elseif($result)
			{
				$usersCount = $result->num_rows;
				if(  $usersCount > 0)
				{
					$_SESSION['error_login']="This login already exist";
					$registrationOK=false;
				}
				$result->free_result();
			}
		}
	
		//check passwords
		if(strlen($userPassword1) <6 || strlen($userPassword1) >20)
		{
			$_SESSION['error_password']="Password must be (6-20)";
			$registrationOK=false;
		}
		else if($userPassword1 != $userPassword2)
		{
			$_SESSION['error_password']="Passwords are different";
			$registrationOK=false;
		}
		
		//remember informations
		
		$_SESSION['remember_name']=$userName;
		$_SESSION['remember_lastName']=$userLastName;
		$_SESSION['remember_email']=$userEmail;
		$_SESSION['remember_login']=$userLogin;
		
		if(!$registrationOK)
		{
			header('Location: registrationSite.php');
			exit();
		}
		elseif(!isset($_SESSION['dbError']))
		{
			$passwordHash = password_hash($userPassword1, PASSWORD_DEFAULT);
			$sqlRequest="INSERT INTO users VALUES (NULL, '$userName', '$userLastName', '$userEmail', '$userLogin', '$passwordHash')";
			//copy categories from default
			$dataBaseConnect->query($sqlRequest);
			$sqlRequest="SELECT users.id FROM users WHERE users.login='$userLogin'";
			$result=$dataBaseConnect->query($sqlRequest);
			$row=$result->fetch_assoc();
			$userId=$row['id'];
			$result->free_result();
			$sqlRequest="INSERT INTO incomes_category_assigned_to_users(`id`, `user_Id`, `name`) SELECT NULL,'$userId', incomes_category_default.name FROM incomes_category_default";
			$dataBaseConnect->query($sqlRequest);$sqlRequest="INSERT INTO expenses_category_assigned_to_users(`id`, `user_Id`, `name`) SELECT NULL,'$userId', expenses_category_default.name FROM expenses_category_default";
			$dataBaseConnect->query($sqlRequest);
			$dataBaseConnect->query($sqlRequest);$sqlRequest="INSERT INTO payment_methods_assigned_to_users(`id`, `user_Id`, `name`) SELECT NULL,'$userId', payment_methods_default.name FROM payment_methods_default";
			$dataBaseConnect->query($sqlRequest);
			unset($_SESSION['remember_name']);
			unset($_SESSION['remember_lastName']);
			unset($_SESSION['remember_email']);
			unset($_SESSION['remember_login']);
		}
	}
	if(!isset($_SESSION['dbError']))
	{
		$dataBaseConnect->close();
	}
?> 


<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cash Assistant</title>
	<meta name="description" content="Zapanuj nad finansami" />
	<meta name="keywords" content="finanse, pieni??dze, bud??et" />
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>

<body>
	<header class="mt-4">
		<h1 > Cash Assistant </h1>
		<h2 > Make life easier </h2>
	</header>
	<div class="container bg-container">
		<div class=" mainPanel col-sm-8 col-md-6 p-4 mt-4">
			<div> 	
				<?php
					if(isset($_SESSION['dbError']))
					{
						echo "Registration failed...! </br> 
							Error code: ".$_SESSION['dbError'];
					}
					else
 					{
						echo "Registration succesfull !";
					}
				?>
			</div>
			<div class="col-sm mt-4">
				<a class="btn buttonsStyle" href="index.php" role="button">
					Continue
				</a>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>