<?php
	session_start();
	if( ! isset($_SESSION['loggingSuccesfull']) || $_SESSION['loggingSuccesfull'] != true )
	{
		header('Location: index.php');
		exit();
	}
	
	if( isset($_POST('incomeAmount')) )
	{
		
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
	<script>
	
	function setTimeToField() {
		var now = new Date();
		var month = (now.getMonth() + 1);               
		var day = now.getDate();
		if (month < 10) 
			month = "0" + month;
		if (day < 10) 
			day = "0" + day;
		var today = now.getFullYear() + '-' + month + '-' + day;
		document.getElementById("dateField").value = today;
	}
	</script>
	
</head>

<body onload="setTimeToField()">
	<header class="mt-4">
		<h1 > Cash Assistant </h1>
	</header>
	<div class="container bg-container">
		<div class=" mainPanel col-md-10 col-lg-8 p-4 mt-4">
			<form method="post">
				<div class="row">	
					<div class="col-md-5 col-sm-10 mx-auto">
						<div class="row pb-1">
							Amount:
						</div>
						<div class="row pb-2">
							<input type="number" class="textField" name="incomeAmount" placeholder="Income amount" aria-label="Income">
						</div>
						<div class="row pb-1">
							Date:
						</div>
						<div class="row pb-2">
							<input type="date" class="textField" name="incomeDate"  id="dateField" aria-label="Date">
						</div>
						<div class="row pb-1">
							Item:
						</div>
						<div class="row pb-2">
							<select id="Item" class="textField" name="incomeItem" >
								<option> Graduate </option>
								<option> Bank</option>
								<option> Allegro sale </option>
								<option> Other </option>
							</select>
						</div>
					</div>
					<div class="col-md-5 col-sm-10 mx-auto">
						<div class="row pb-1">
							Comment:
						</div>
						<div class="row">
							<textarea class="textField textarea" name="incomeComment" > </textarea>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-sm">
						<a class="btn buttonsStyle" href="index.html" role="button">
							<i class="icon-left-big"></i> Back
						</a>
					</div>
					<div class="col-sm ">
						<input class="btn buttonsStyle" type="submit" value="submit"/>
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