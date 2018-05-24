<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Welcome to RavBank</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700'>
</head>

<body>


<?php
session_start();

?>
	<header>
	<div class="container">
	<div class="logo">
		<img src="logoravbank.png" width="200" alt="" title="">
	</div>

<nav>
  <a>Profile</a>
  <a href="history.php">History</a>
  <a href="transfer.html">Transfer</a>
  <a href="Home.html">Log out</a>
  <a href="Logincontactus.html">Contact us</a>
</nav>
 	</div>
	</header>

	<div class="container">
		<div class="content">
			<h2><?php echo "Welcome ".$_SESSION['fname']." ".$_SESSION['lname']; ?></h2>

	<h3>Account Details: </h3><br>
	<h4><?php echo "UserID: ".$_SESSION['userid']."<br>"; ?></h4>
	<h4><?php echo "Current Balance: ".$_SESSION['balance']."<br>"; ?></h4>
	<h4><?php echo "Borrowing available: ".$_SESSION['debt']."<br><br>"; ?></h4>
	<form action="transfer.html" method="post">

	<input type="submit" name="submit" class="button" id="submit_btn" value="Make a transfer" />
	</form>
	</div>



		</div>
	</div>
</body>

</html>
