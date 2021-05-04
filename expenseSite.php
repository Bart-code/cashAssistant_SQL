<!DOCTYPE HTML>
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
			<div class="row">	
				<div class="col-md-5 col-sm-10 mx-auto">
					<div class="row pb-1">
						Amount:
					</div>
					<div class="row pb-2">
						<input type="number" class="textField" placeholder="Expense amount (zł)" aria-label="Income">
					</div>
					<div class="row pb-1">
						Date:
					</div>
					<div class="row pb-2">
						<input type="date" class="textField" id="dateField" aria-label="Date">
					</div>
					<div class="row pb-1">
						Payment type:
					</div>
					<div class="row pb-2">
						<select  class="textField">
							<option> Cash </option>
							<option> Debit card</option>
							<option> Credit card</option>
						</select>
					</div>
					<div class="row pb-1">
						Item:
					</div>
					<div class="row pb-2">
						<select id="Item" class="textField">
							<option> Food </option>
							<option> Flat </option>
							<option> Transport </option>
							<option> Telecommunication </option>
							<option> Healthcare </option>
							<option> Clothes </option>
							<option> Hygiene </option>
							<option> Children </option>
							<option> Entertainment </option>
							<option> Trip </option>
							<option> Course </option>
							<option> Books/movies </option>
							<option> Savings </option>
							<option> Pension - gold spring </option>
							<option> Pay dept </option>
							<option> Donation </option>
							<option> Other </option>
						</select>
					</div>
				</div>
				<div class="col-md-5 col-sm-10 mx-auto">
					<div class="row pb-1">
						Comment:
					</div>
					<div class="row">
						<textarea class="textField textarea" > </textarea>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-sm">
					<a class="btn buttonsStyle" href="mainSite.html" role="button">
						<i class="icon-left-big"></i> Back
					</a>
				</div>
				<div class="col-sm ">
					<!-- Button trigger modal -->
					<button type="button"  class="btn buttonsStyle"   data-toggle="modal" data-target="#exampleModalCenter">
						Add expense
					</button>	
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>