<?php
	session_start();
	if( ! isset($_SESSION['loggingSuccesfull']) || $_SESSION['loggingSuccesfull'] != true )
	{
		header('Location: index.php');
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
	<link rel="stylesheet" href="fontello/css/fontello.css" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	
</head>

<body>
	<header class="mt-4">
		<h1 > Cash Assistant </h1>
	</header>
	<div class="container bg-container">
		<div class=" mainPanel col-sm-8 col-md-6 p-4 mt-4">
			<div class="row mt-3 mb-3 col-lg-6 col-md-8 col-sm-10 mx-auto">
				<a class="btn buttonsStyle" href="incomeSite.html" role="button">
					Add income
				</a>
			</div>
			<div class="row mt-3 mb-3 col-lg-6 col-md-8 col-sm-10 mx-auto">
				<a class="btn buttonsStyle" href="#" role="button">
					Add expense
				</a>
			</div>
			<div class="row mt-3 mb-3 col-lg-6 col-md-8 col-sm-10 mx-auto">
				<a class="btn buttonsStyle" href="#" role="button">
					Show balance
				</a>
			</div>
			<div class="row mt-3 mb-3 col-lg-6 col-md-8 col-sm-10 mx-auto">
				<a class="btn buttonsStyle" href="#" role="button">
					Settings
				</a>
			</div>
			<div class="row mt-3 mb-3 col-lg-6 col-md-8 col-sm-10 mx-auto">
				<a class="btn buttonsStyle" href="index.html" role="button">
					Logout
				</a>
			</div>
			
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>