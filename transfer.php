<html>
<body>
<?php
	
	session_start();
	
	$conn = mysqli_connect("localhost","testuser","password","RavBank");
	
	if(!$conn) die("connection failed: ".mysqli_connect_error());
	
	//variable declaration
	$AccTypeP = test_input($_POST["AccountTypePayee"]);
	$AccTypeR = test_input($_POST["AccountTypeReciever"]);
	$RecieverID = test_input($_POST["recieverID"]);
	$amount = test_input($_POST["Amount"]);
	$CharRecieverID = str_split('RecieverID');
	$CharAmount = str_split('$amount');
	$i =0;
	$PayeeID=$_SESSION["userid"];

	//querys start here

	$query = "select balance from InteractAccount where UserID=$RecieverID";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$RecieverBalance = $row['balance'];
	
	$query = "select debt from VisaAccount where UserID=$RecieverID";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$RecieverDebt = $row['debt'];
	//Interact
	if($AccTypeP=="Interact"){
	$query = "select balance from InteractAccount where UserID=$PayeeID";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$PayeeBalance = $row['balance'];
	if($PayeeBalance<$amount) {
		echo "Not enough balance available<br>";
		echo "
		<br><br><a href='transfer.html'>Return to make a different transfer</a>
		<br><br><a href='profile.php'>Return to profile</a>
		";
		exit;
	}
	
		if($AccTypeR=="Interact"){
			$sql = "UPDATE InteractAccount SET balance=$PayeeBalance -$amount WHERE UserID=$PayeeID";
			if (mysqli_query($conn, $sql)) {
			    echo "Interact Record of Payee updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}			
			
			$sql = "UPDATE InteractAccount SET balance=$RecieverBalance+$amount WHERE UserID=$RecieverID";
			if (mysqli_query($conn, $sql)) {
			    echo "Interact Record of Reciever updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		}

		else if($AccTypeR=="Visa"){
			$sql = "UPDATE InteractAccount SET Balance=$PayeeBalance-$amount WHERE UserID=$PayeeID";

			if (mysqli_query($conn, $sql)) {
			    echo "Interact Record of Payee updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}

			$sql = "UPDATE VisaAccount SET debt=$RecieverDebt+$amount WHERE UserID=$RecieverID";
			if (mysqli_query($conn, $sql)) {
			    echo "Visa Record of Reciever updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		}
	}
	//Visa
	else if($AccTypeP=="Visa"){
	$query = "select debt from VisaAccount where UserID=$PayeeID";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$PayeeDebt = $row['debt'];

		if($AccTypeR=="Interact"){
			$sql = "UPDATE VisaAccount SET debt=$PayeeDebt-$amount WHERE UserID=$PayeeID";
			if (mysqli_query($conn, $sql)) {
			    echo "Visa Record of Payee updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
			$sql = "UPDATE InteractAccount SET balance=$RecieverBalance + $amount WHERE UserID=$RecieverID";
			if (mysqli_query($conn, $sql)) {
			    echo "Interact Record of Reciever updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}

			}
		else if($AccTypeR=="Visa"){
			$sql = "UPDATE VisaAccount SET debt=$PayeeDebt-$amount WHERE UserID=$PayeeID";
			if (mysqli_query($conn, $sql)) {
			    echo "Visa Record of Payee updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
			$sql = "UPDATE VisaAccount SET debt=$RecieverDebt+$amount WHERE UserID=$RecieverID";
			if (mysqli_query($conn, $sql)) {
			    echo "Visa Record of Reciever updated successfully<br>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
			}
	}

	
		$query ="INSERT INTO Transaction (payee,reciever,amount,AccTypeP,AccTypeR)
	VALUES ('$PayeeID','$RecieverID','$amount','$AccTypeP','$AccTypeR')";

		if (mysqli_query($conn, $query)) {
		    echo "Transaction Record updated successfully<br>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

	$query = "select balance from InteractAccount where UserID=$PayeeID";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$_SESSION['balance'] = $row['balance'];	
	$lol = $_SESSION['balance'];
	$query = "select debt from VisaAccount where UserID=$PayeeID";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$_SESSION['debt'] = $row['debt'];

echo "
<br><br><a href='transfer.html'>Return to make a different transfer</a>
<br><br><a href='profile.php'>Return to profile</a>
";

/*This is different and dont come here!*/

function test_input($data){
		$data=trim ($data); // gets rid of extra spaces befor and after
		$data=stripslashes($data); //gets rid of any slashes
		$data=htmlspecialchars($data); //converts any symbols usch as < and > to special characters
		return $data;
	}
?>

</html></body>
