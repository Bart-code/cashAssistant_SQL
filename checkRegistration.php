<?php
	session_start();
	$registrationOK=true;
	$userLogin=$_POST['userName'];
	
	//check login
	if(isset($_POST['userName']))
	{
		if(strlen($userLogin) <6 || strlen($userLogin) >20)
		{
			$_SESSION['error_login']="User-name must be (6-20)";
			$registrationOK=false;
		}
	}
	else
	{
		$_SESSION['error_login']="User-name field is empty";
		$registrationOK=false;
	}
	
	if(!$registrationOK)
	{
		header('Location: registrationSite.php');
		exit();
	}
	
	//check passwords
	
	//check email
	
	
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
		<div class=" mainPanel col-sm-8 col-md-6 p-4 mt-4">
			<div> 
				Registration succesfull !
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