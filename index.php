<?php
	session_start();
	if( isset($_SESSION['loggingSuccesfull']) && $_SESSION['loggingSuccesfull'] == true )
	{
		header('Location: mainSite.php');
		exit();
	}
?>

<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cash Assistant</title>
	<meta name="description" content="Zapanuj nad finansami" />
	<meta name="keywords" content="finanse, pieniądze, budżet" />
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
		<div class=" mainPanel col-sm-8 col-md-6 p-4 mt-4" >
			<form action="checkLogin.php" method="post">
				<div class="row ">
					Login:
				</div>
				<div class="row ">
					<input type="text" name="userLogin" class="form-control" placeholder="User - login" aria-label="Username"
					<?php
					if(isset($_SESSION['remember_login']))
					{
						echo "value='".$_SESSION['remember_login']."'";
						unset ($_SESSION['remember_login']);
					}
					echo "/>"
					?>
					<?php
						if(isset($_SESSION['error_login']))
						{
							echo '<span class="errorStyle mb-0">'.$_SESSION['error_login'].'</span>';
							unset($_SESSION['error_login']);
						}
					?>
				</div>
				<div class="row rowMargin">
					Password
				</div>
				<div class="row ">
					<input type="text" name="userPassword" class="form-control" placeholder="User - password" aria-label="Username">
					<?php
						if(isset($_SESSION['error_password']))
						{
							echo '<span class="errorStyle mb-0">'.$_SESSION['error_password'].'</span>';
							unset($_SESSION['error_password']);
						}
					?>
				</div>
				<div class="row rowMargin">
					<div class="col-sm ">
						<a class="btn buttonsStyle" href="registrationSite.php" role="button">Registration</a>
					</div>
					<div class="col-sm ">
						<input type="submit" class="btn buttonsStyle" value="Login"/>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>