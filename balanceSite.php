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
		var maxDay;
		var year;
		
		function setTimeBorders()
		{
			var selectorValue = document.getElementById("timeBordersSelector").value;
			var now = new Date();
			var downBorder='2000-01-01';
			var topBorder='2000-01-01';
			var month = (now.getMonth() + 1);
			year= now.getFullYear();
			
			switch(selectorValue)
			{
				case "Current month":
					document.getElementById("topDateBorder").disabled = true;
					document.getElementById("downDateBorder").disabled = true;
					setMaxDay( month );
					if (month < 10) month = '0' + month;
					downBorder= year+'-'+month+'-01';
					topBorder= year+'-'+month+'-'+maxDay;
					break;
				case "Previous month":
					document.getElementById("topDateBorder").disabled = true;
					document.getElementById("downDateBorder").disabled = true;
					if( month != 1) month--;
					else
					{
						month=12;
						year--;
					}
					setMaxDay( month );
					if (month < 10) month = '0' + month;
					downBorder= year+'-'+month+'-01';
					topBorder= year+'-'+month+'-'+maxDay;
					break;
				case "Current year":
					document.getElementById("topDateBorder").disabled = true;
					document.getElementById("downDateBorder").disabled = true;
					downBorder=year + '-01-01';
					topBorder=year + '-12-31';
					break;
				case "Custom":
					document.getElementById("topDateBorder").disabled = false;
					document.getElementById("downDateBorder").disabled = false;
					break;
			}
			
			document.getElementById("downDateBorder").value = downBorder;
			document.getElementById("topDateBorder").value = topBorder;
			document.getElementById("tables").style.display='none';
		}
		
		function setMaxDay( month )
		{
			if( month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12)
			{
				maxDay = 31;
			}
			else if( month  == 2 )
			{
				if(year%4 ==0) maxDay = 29;
				else maxDay = 28;
			}
			else maxDay = 30;
		}
		
		function showTables()
		{
			document.getElementById("tables").style.display='flex';
		}
	</script>

</head>

	
<body onload="setTimeBorders()">
	
	<header class="mt-4">
		<h1 > Cash Assistant </h1>
	</header>
	
	<div class="container bg-container">
		<div class=" mainPanel col-md-10 col-lg-8 p-4 mt-4">
			<div class="row">
					<div class="col-md-5 col-sm-10 mx-auto">			
						<div class="row pb-1">
							Time borders:
						</div>
						<div class="row pb-2">
							<select class="textField" id="timeBordersSelector" onchange="setTimeBorders()">
								<option>Current month</option>
								<option>Previous month</option>
								<option>Current year</option>
								<option>Custom </option>
							</select>
						</div>
					</div>
					<div class="col-md-5 col-sm-10 mx-auto">
					</div>
					<div class="row pb-1">
						<div class="col-md-5 col-sm-10 mx-auto">
							<div class="row pb-1">
								Down border: 
							</div>
							<div class="row pb-2">
								<input type="date" class="textField timeBorders" id="downDateBorder" />
							</div>
						</div>
						<div class="col-md-5 col-sm-10 mx-auto">
							<div class="row pb-1">
								Top border: 
							</div>
							<div class="row pb-2">
								<input type="date" class="textField timeBorders" id="topDateBorder" />
							</div>
						</div>
					</div>
					<div class="row pb-1 mt-3 ">
							<div class="w-50px">
								<button type="button" class= "btn buttonsStyle" onclick="showTables()">
									Show balance
								</button>
							</div>
					</div>
			</div>
		
			<div class="row mt-4"  id="tables">
				<div class="col-md-5 col-sm-10 mx-auto">
					<div class="row">
						Incomes:
					</div>
					<div class="row">
						<table>
							<thead>
								<tr>
									<th>Category</th>
									<th>Sum amount zł</th>
								</tr>
							</thead>
							<tr> 
								<td>Category1</td> <td>10</td>
							</tr>
							<tr> 
								<td>Category2</td> <td>100</td>
							</tr>
							<tr> 
								<td>Category3</td> <td>1000</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-5 col-sm-10 mx-auto">
					<div class="row">
						Expenses:
					</div>
					<div class="row">
							<table>
									<thead>
										<tr>
											<th>Category</th>
											<th>Sum amount zł</th>
										</tr>
									</thead>
								<tr> 
									<td>Category1</td> <td>10</td>
								</tr>
								<tr> 
									<td>Category2</td> <td>100</td>
								</tr>
								<tr> 
									<td>Category3</td> <td>1000</td>
								</tr>
							</table>
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
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>