<?php
	session_start();
	unset($_SESSION['categoryError']);
	// unlogged
	if( ! isset($_SESSION['loggingSuccesfull']) || $_SESSION['loggingSuccesfull'] != true )
	{
		header('Location: index.php');
		exit();
	}
	
	else
	{
		$userId=$_SESSION['loggedUserId'];
		require_once "connect.php";
		$dataBaseConnect = new mysqli($host,$db_user,$db_password,$db_name);
		
		//fill expense category
		$sqlRequest="SELECT expenses_category_assigned_to_users.name
		FROM expenses_category_assigned_to_users
		WHERE expenses_category_assigned_to_users.user_id='$userId'";
		if( $result=mysqli_query($dataBaseConnect,$sqlRequest))
		{
			if($result->num_rows)
			{
				$rowsCount=$result->num_rows;
				for($i=0;$i<$rowsCount;$i++)
				{
					$row = $result->fetch_assoc();
					$categoryMatrix[$i] = $row['name'];
				}
			}
			else $_SESSION['categoryError']="Something gone wrong";
		}
		else $_SESSION['categoryError']="Something gone wrong";
		
		//fill payment method
		$sqlRequest="SELECT payment_methods_assigned_to_users.name
		FROM payment_methods_assigned_to_users
		WHERE payment_methods_assigned_to_users.user_id='$userId'";
		if( $result=mysqli_query($dataBaseConnect,$sqlRequest))
		{
			if($result->num_rows)
			{
				$rowsPaymentCount=$result->num_rows;
				for($i=0;$i<$rowsPaymentCount;$i++)
				{
					$row = $result->fetch_assoc();
					$paymentMatrix[$i] = $row['name'];
				}
			}
			else $_SESSION['categoryError']="Something gone wrong";
			
		}
		else $_SESSION['categoryError']="Something gone wrong";
		
		//after submit
		if( isset($_POST['expenseAmount']))
		{
			if($_POST['expenseAmount']>0)
			{
				$expenseItem=$_POST['expenseItem'];
				$sqlRequest="SELECT expenses_category_assigned_to_users.id
				FROM expenses_category_assigned_to_users
				WHERE expenses_category_assigned_to_users.user_id='$userId' 
				AND expenses_category_assigned_to_users.name='$expenseItem'";
				if( $result=mysqli_query($dataBaseConnect,$sqlRequest))
				{
					$row=$result->fetch_assoc();
					$categoryId=$row['id'];
					$expenseAmount=$_POST['expenseAmount'];
					$expenseDate=$_POST['expenseDate'];
					$expenseComment=$_POST['expenseComment'];
					$sqlRequest="INSERT INTO expenses VALUES ( NULL, '$userId', '$categoryId', 1, '$expenseAmount', '$expenseDate', '$expenseComment' )";
					mysqli_query($dataBaseConnect,$sqlRequest);
					$_SESSION['showModal']=true;
				}
				else echo "WRONG !";
			}
			else
			{
				$_SESSION['amountError']="Please enter correct value!";
			}
		}
		$result->close();
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
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 
	<?php if (isset($_SESSION['showModal']) && $_SESSION['showModal']==true) { ?>
		<script type='text/javascript'>
			$(document).ready(function(){
			$('#expenseModal').modal('show');
			});
		</script>
	<?php } ?>

</head>

	
<body onload="setTimeToField()">
	
	<header class="mt-4">
		<h1 > Cash Assistant </h1>
	</header>
	
	<div class="container bg-container">
		<!-- Modal -->
			<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modalStyle">
				  <div class="modalStyle">
					Expense add succesfull !
				  </div>
				  <div class="modal-footer">
					<div class="mx-auto">
						<a class="btn buttonsStyle" href="mainSite.php" role="button">
							OK
						</a>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		<div class=" mainPanel col-md-10 col-lg-8 p-4 mt-4">
			<form method="post">
				<div class="row">	
					<div class="col-md-5 col-sm-10 mx-auto">
						<div class="row pb-1">
							Amount:
						</div>
						<div class="row pb-2">
							<input type="number" class="textField" name="expenseAmount" placeholder="Expense amount (z??)" aria-label="Expensse">
							<?php
								if(isset($_SESSION['amountError']))
								{
									echo '<span class="errorStyle mb-0">'.$_SESSION['amountError'].'</span>';
									unset($_SESSION['amountError']);
								}
							?>
						</div>
						<div class="row pb-1">
							Date:
						</div>
						<div class="row pb-2">
							<input type="date" name="expenseDate" class="textField" id="dateField" aria-label="Date">
						</div>
						<div class="row pb-1">
							Payment type:
						</div>
						<div class="row pb-2" >
							<select  class="textField" name="expensePayment">
								<?php
									if(isset( $_SESSION['paymentError']) ) echo "<option>". $_SESSION['paymentError']."</option>";
									else
									{
										for($i=0;$i<$rowsPaymentCount;$i++)
										{
											echo "<option>".$paymentMatrix[$i]."</option>";
										}
									}
								?>
							</select>
						</div>
						<div class="row pb-1">
							Item:
						</div>
						<div class="row pb-2">
							<select id="Item" class="textField" name="expenseItem">
								<?php
									if(isset( $_SESSION['categoryError']) ) echo "<option>". $_SESSION['categoryError']."</option>";
									else
									{
										for($i=0;$i<$rowsCount;$i++)
										{
											echo "<option>".$categoryMatrix[$i]."</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-5 col-sm-10 mx-auto">
						<div class="row pb-1">
							Comment:
						</div>
						<div class="row">
							<textarea class="textField textarea" name="expenseComment"> </textarea>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-sm">
						<a class="btn buttonsStyle" href="mainSite.php" role="button">
							<i class="icon-left-big"></i> Back
						</a>
					</div>
					<div class="col-sm ">
						<input class="btn buttonsStyle" type="submit" value="Submit" />
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>