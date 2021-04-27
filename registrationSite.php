<?php
	session_start();
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
		<form class="mainPanel col-sm-8 col-md-6 p-4 mt-4"
			action="checkRegistration.php" method="post">
			<div class="row ">
				Name:
			</div>
			<div class="row" >
				<input type="text" class="form-control" placeholder="User - name" aria-label="UserName" name="userName"/>
				<?php
					if(isset($_SESSION['error_login']))
					{
						echo '<span class="error">'.$_SESSION['error_login'].'</span>';
						unset($_SESSION['error_login']);
					}
				?>
			</div>
			<div class="row rowMargin">
				Last name:
			</div>
			<div class="row " >
				<input type="text" class="form-control" placeholder="User - last name" aria-label="UserLastName" name="userLastName" />
			</div>
			<div class="row rowMargin">
				E-mail address:
			</div>
			<div class="row " >
				<input type="text" class="form-control" placeholder="User - name" aria-label="UserEmail" name="userEmail"/>
			</div>
			<div class="row rowMargin">
				Login:
			</div>
			<div class="row" >
				<input type="text" class="form-control" placeholder="User - login" aria-label="UserLogin" name="userLogin"/>
			</div>
			<div class="row rowMargin">
				Password
			</div>
			<div class="row" >
				<input type="password" class="form-control" placeholder="User - password" aria-label="UserP" name="userPassword1"/>
			</div>
			<div class="row mt-2">
				<input type="password" class="form-control" placeholder="Repeat user - password" aria-label="UserP" name="userPassword2"/>
			</div>
			<div class="row mt-5">
				<div class="col-sm ">
					<a class="btn buttonsStyle" href="index.html" role="button">
						<i class="icon-left-big"></i> Back
					</a>
				</div>
				<div class="col-sm ">
					<input type="submit" class="btn buttonsStyle" value="Submit"</a>
				</div>
			</div>
		</form>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>