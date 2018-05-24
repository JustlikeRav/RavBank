<html><body></body>
</html>
<?php

$conn = mysqli_connect("localhost","testuser","password","RavBank");
if(!$conn) {echo "nope! coundlt connect"; exit();}

if(isset($_POST['TransactionID'])){

	$DeleteMe = $_POST['TransactionID'];

	$query = "DELETE FROM Transaction WHERE TransID = $DeleteMe";

	$result = mysqli_query($conn,$query);

	if(!$result) {echo "Sorry, couldnt delete"; echo '<a href="history.php">Try Again</a>';}
	else {
		echo "History deleted";
		echo '<br><br><br><a href="history.php">Go to history<br></a>';
		echo '<a href="profile.php">Go to profile<br></a>';
		echo '<a href="Home.html">Logout!<br></a>';
	}

}

?>
