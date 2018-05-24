<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Welcome to RavBank</title>
  <link rel="stylesheet" href="css/transfer.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700'>
</head>

<body>


<?php
session_start();

$conn =mysqli_connect("localhost","testuser","password","RavBank");
if(!$conn) {echo "Sorry Couldn't connect";}
$PayeeID = $_SESSION['userid'];
$query = "select * from Transaction where payee = $PayeeID";
$result = mysqli_query($conn,$query);
?>
	<header>
	<div class="container">
	<div class="logo">
		<img src="logoravbank.png" width="200" alt="" title="">
	</div>

<nav>
  <a href="profile.php">Profile</a>
  <a>History</a>
  <a href="transfer.html">Transfer</a>
  <a href="Home.html">Log out</a>
  <a href="Logincontactus.html">Contact us</a>
</nav>
 	</div>
	</header>

	<div class="container">
		<div class="content">
			<h2><?php echo $_SESSION['fname']." ".$_SESSION['lname']."'s Transfer History"; ?></h2>

<?php	
echo "
	<table>
  <tr>
    <th>TransID</th>
    <th>RecieverID</th>
    <th>Time</th>
    <th>Amount</th>
    <th>Your Account type</th>
    <th>Reciever Account type</th>
  </tr>";
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
echo "
  <tr>
    <td>".$row['TransID']."</td>
    <td>".$row['reciever']."</td>
    <td>".$row['date']."</td>
    <td>".$row['amount']."</td>
    <td>".$row['AccTypeP']."</td>
    <td>".$row['AccTypeR']."</td>
  </tr>
";
  }

?>

<div class="container">
		<div class="content">

	<h3>Delete History</h3>
	<form action="delete.php" method="post">
	Enter the transaction ID you want to delete<input type="text" name="TransactionID" id="delete" value="">
	<input type="submit" name="submit" class="button" id="submit_btn" value="Delete transaction" />
	<br><br>
	</form>
	</div>

		</div>
	</div>
</body>

</html>
