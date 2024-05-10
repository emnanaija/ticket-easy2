<?php

include '../controller/PaymentC.php';
$idOrder = $_GET['idOrder'];
$priceTotal = $_GET['priceTotal'];

$error = "";

session_start();

$name=$_SESSION['firstName'] ;

$productC = new PaymentC();

$product = null;

//var_dump($_POST["card_type"]);
if (
	isset($priceTotal) &&
	isset($_POST["card_type"]) &&
	isset($_POST["cardNumber"]) &&
	isset($_POST["CVC"]) &&
	isset($idOrder)


) {


	if ($error == "")


		if (
			!empty($priceTotal) &&
			!empty($_POST["card_type"]) &&
			!empty($_POST["cardNumber"]) &&
			!empty($_POST["CVC"]) &&
			!empty($idOrder)


		) {
			$product = new Payment(
				null,
				$priceTotal,
				$_POST['card_type'],
				$_POST['cardNumber'],
				$_POST['CVC'],
				$idOrder
			);
			$productC->addPayment($product);
			header('Location:updatepayment.php');
		} else
			$error = "Missing information";
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Payment</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="front\view\style1.css">


</head>
<style>
	.payment-form {
		padding-bottom: 50px;
		font-family: 'Montserr qat', sans-serif;
	}

	.payment-form.dark {
		background-color: #100f0f;
	}

	.payment-form .content {
		box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
		background-color: white;
	}

	.payment-form .block-heading {
		padding-top: 50px;
		margin-bottom: 40px;
		text-align: center;
	}

	.payment-form .block-heading p {
		text-align: center;
		max-width: 420px;
		margin: auto;
		opacity: 0.7;
		color: rgb(190, 37, 37);
	}

	.payment-form.dark .block-heading p {
		opacity: 0.8;
	}

	.payment-form .block-heading h1,
	.payment-form .block-heading h2,
	.payment-form .block-heading h3 {
		margin-bottom: 1.2rem;
		color: rgb(190, 37, 37);
	}

	.payment-form form {
		border-top: 2px solid rgb(190, 37, 37);
		box-shadow: 0px 2px 10px white;
		background-color: rgb(190, 37, 37);
		;
		padding: 0;
		max-width: 600px;
		margin: auto;
	}

	.payment-form .title {
		font-size: 1em;
		border-bottom: 1px solid white;
		margin-bottom: 0.8em;
		font-weight: 600;
		padding-bottom: 8px;
	}

	.payment-form .products {
		background-color: rgb(190, 37, 37);
		padding: 25px;
	}

	.payment-form .products .item {
		margin-bottom: 1em;
	}

	.payment-form .products .item-name {
		font-weight: 600;
		font-size: 0.9em;
	}

	.payment-form .products .item-description {
		font-size: 0.8em;
		opacity: 0.6;
	}

	.payment-form .products .item p {
		margin-bottom: 0.2em;
	}

	.payment-form .products .price {
		float: right;
		font-weight: 600;
		font-size: 0.9em;
	}

	.payment-form .products .total {
		border-top: 1px solid white;
		margin-top: 10px;
		padding-top: 19px;
		font-weight: 600;
		line-height: 1;
	}

	.payment-form .card-details {
		padding: 25px 25px 15px;
	}

	.payment-form .card-details label {
		font-size: 12px;
		font-weight: 600;
		margin-bottom: 15px;
		color: white;
		text-transform: uppercase;
	}

	.payment-form .card-details button {
		margin-top: 0.6em;
		padding: 12px 0;
		font-weight: 600;
		color: white;
	}

	.payment-form .date-separator {
		margin-left: 10px;
		margin-right: 10px;
		margin-top: 5px;

	}

	@media (min-width: 576px) {
		.payment-form .title {
			font-size: 1.2em;


		}

		.payment-form .products {
			padding: 40px;
			color: white;
		}

		.payment-form .products .item-name {
			font-size: 1em;
		}

		.payment-form .products .price {
			font-size: 1em;
		}

		.payment-form .card-details {
			padding: 40px 40px 30px;
			color: white;
		}

		.payment-form .card-details button {
			margin-top: 2em;
			background-color: rgb(190, 37, 37);
			color: white;
		}

		.btn-primary {
			color: #100f0f;
			background-color: black;
			border-color: black;
		}

		/*.btn-primary:active {
		color:white;
		background-color: white;
		border-color: white;
	  }*/
		.btn {
			background-color: #fff;
			/* Set the initial background color of the button */
			color: #000;
			/* Set the initial text color of the button */
			cursor: pointer;
		}

		.btn.clicked {
			background-color: #000;
			/* Set the background color of the button when clicked */
			color: #fff;
			/* Set the text color of the button when clicked */
		}

		.section-p1 {
			padding: 40px 80px;
		}

		footer {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		label img {
			width: 50px;
			height: 30px;
		}
	}
</style>

<body>
	<main class="page payment-page">
		<section class="payment-form dark">
			<div class="container">
				<div class="block-heading">
					<h2>Payment</h2>
					<p> Here is your receipts</p>
				</div>
				<form action="" id="OrderForm" method="POST">
					<div class="products">
						<h3 class="title">Checkout</h3>
						<div class="item">



						</div>
						<div class="item">


						</div>
						<div class="total">Total Price <span class="price" name="priceTotal"><?php echo $priceTotal ?></span></div>
					</div>
					<div class="card-details">
						<h3 class="title">Credit Card Details</h3>
						<div class="row">
							<div class="form-group col-sm-7">
								<label for="card-type">card-type </label><br>
								<input id="bank-card" type="radio" name="card_type" value="bank-card">
								<img src="Images/pay/visaMasterCard.png" alt="" style="width:70px; height:30px;">
								<label for="bank-card"></label><br>
								<br>
								<input id="edinar-card" type="radio" name="card_type" value="edinar-card">
								<img src="Images/pay/carte_e-Dinar_jeune.png" alt="" style="width:70px; height:30px;">
								<label for="edinar-card"></label><br>
								<br>
								<input id="phone-card" type="radio" name="card_type" value="phone-card">
								<img src="Images/pay/téléchargement.png" alt="" style="width:70px; height:30px;">
								<label for="phone-card"></label>
								<br>
							</div>


							<div class="form-group col-sm-8">
								<label for="card-number">Card Number</label>
								<input id="card-number" type="number" class="form-control" placeholder="Card Number" min=1 name="cardNumber" id="cardNumber" aria-label="Card Holder" aria-describedby="basic-addon1">
							</div>
							<div class="form-group col-sm-4">
								<label for="cvc">CVC</label>
								<input id="cvc" type="number" class="form-control" placeholder="CVC" name="CVC" id="CVC" min=1 aria-label="Card Holder" aria-describedby="basic-addon1">
							</div>
							<div class="form-group col-sm-12">
								<button type="submit" name="proceed" class="btn btn-primary btn-block">Proceed</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
		<footer class="section-p1">
			<div class="row">
				<img src="Images/pay/app.jpg" alt="">
				<img src="Images/pay/play.jpg" alt="">
			</div>
			<p>Secured Payment Gatways</p>
			<img src="Images/pay/pay.png" alt="">
			<div>
				<p>
					© 2023-Website ticketeasy
				</p>
			</div>


			</div>
		</footer>
	</main>


	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	<script>/*
  // When the form is submitted
  document.getElementById("OrderForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get the values from the form
    const cardNumber = document.getElementById("cardNumber").value.trim();
    const cvc = document.getElementById("CVC").value.trim();
    const cardType = document.querySelector('input[name="card_type"]:checked').value;

    // Validate the card number
    if (ardNumber.value === '' || isNaN(cardNumber.value) || cardNumber.value <= 0) {
      swal("Error", "Please enter a valid card number", "error");
      isValid = false;
    }

    // Validate the CVC
    if (CVC.value === '' || isNaN(CVC.value) || CVC.value <= 0) {
      swal("Error", "Please enter a valid CVC", "error");
      isValid = false;
    }

    // Validate the card type
    if (cardType === "") {
      swal("Error", "Please select a card type", "error");
      isValid = false;
    }

    // If all the validations pass, submit the 
	if (isValid) {
				Swal.fire({
					icon: 'success',
					title: 'CONGRATS...',
					text: 'All the fields are valid',
				});
				form.submit(); // submit form if all fields are valid
			}
  });*/
</script>

</body>

</html>