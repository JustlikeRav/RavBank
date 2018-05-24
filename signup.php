<html>
<body>
</html>
</body>
<?php

$conn = mysqli_connect("localhost", "testuser", "password", "RavBank");

if(!$conn){
	echo "Error. Couldn't connect to database";
	exit;
}

if ((isset($_POST['password']))&&(isset($_POST['fname']))&&(isset($_POST['lname']))){
	
	$FirstName=test_input($_POST['fname']);
	$LastName=test_input($_POST['lname']);
	$Password=test_input($_POST['password']);

	$FirstName=CheckFname($FirstName);
	$LastName=CheckLname($LastName);
	$Password=Checkpass($Password);

	$query = "INSERT INTO users (fname,lname,password)
	VALUES ('$FirstName','$LastName','$Password')";
	if(mysqli_query($conn,$query)){
		$last_id = mysqli_insert_id($conn);
		echo "New record added, you may now login. Your User ID is: ".$last_id."<br><br>";
	}

	else{
		echo "Error".$sql."<br>".mysqli_error($conn)."<br><br>";
	}

	$query = "INSERT INTO InteractAccount (UserID,balance)
	VALUES ('$last_id','1000.0123')";
	if(mysqli_query($conn,$query)){
		echo "Your interact account created <br><br>";
	}

	else{
		echo "Error".$sql."<br>".mysqli_error($conn)."<br><br>";
	}

	$query = "INSERT INTO VisaAccount (UserID,debt)
	VALUES ('$last_id','1000.0123')";
	if(mysqli_query($conn,$query)){
		echo "Your visa account created <br><br>";
	}

	else{
		echo "Error".$sql."<br>".mysqli_error($conn)."<br><br>";
	}

echo "
	<a href='login.html'>Click here to go to login page<br></a>
	<a href='signup.html'>Click here to go to signup page</a>
";

	
}

else {echo "Some error occured";}

function test_input($data){
		$data=trim ($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

function CheckFname($fname){
	if($fname==""){
		echo "No first name entered";
		echo "
	<a href='login.html'>Click here to go to login page<br></a>
	<a href='signup.html'>Click here to go to signup page</a>
";
		exit();
	}

	$CA = str_split($fname);
	for($i=0;$i<strlen($fname);$i++){
		if(($CA[$i]>='a'&&$CA[$i]<'z')||($CA[$i]>='A'&&$CA[$i]<'Z')){}
		else {
			echo "Invalid First Name";
			echo "
		<a href='login.html'>Click here to go to login page<br></a>
		<a href='signup.html'>Click here to go to signup page</a>
	";
		exit();
		}
	}
		return $fname;

}

function CheckLname($lname){
	if($lname==""){
		echo "<br>No last name entered<br>";
		echo "
	<br><a href='login.html'>Click here to go to login page<br></a>
	<br><a href='signup.html'>Click here to go to signup page</a><br>
";
		exit();
	}

	$CA = str_split($lname);
	for($i=0;$i<strlen($lname);$i++){
		if(($CA[$i]>='a'&&$CA[$i]<'z')||($CA[$i]>='A'&&$CA[$i]<'Z')){}
		else {
			echo "<br>Invalid Last Name<br>";
			echo "
		<br><a href='login.html'>Click here to go to login page<br></a><br>
		<br><a href='signup.html'>Click here to go to signup page</a><br>
	";
		exit();
		}
	}
		return $lname;

}

function Checkpass($pass){
	if(strlen($pass)<8){
		echo "<br>password should be atleast 8 characters long<br>";
		echo "
	<br><a href='login.html'>Click here to go to login page<br></a><br>
	<br><a href='signup.html'>Click here to go to signup page</a><br>
";
		exit();
	}

	$CA = str_split($pass);
	for($i=0;$i<strlen($pass);$i++){
		if(($CA[$i]>='a'&&$CA[$i]<='z')||($CA[$i]>='A'&&$CA[$i]<='Z')||($CA[$i]>='0'&&$CA[$i]<='9')){}
		else {
			echo "<br>Invalid password<br>";
			echo "
		<br><a href='login.html'>Click here to go to login page<br></a><br>
		<br><a href='signup.html'>Click here to go to signup page</a><br>
	";
		exit();
		}
	}
		return $pass;

}

mysqli_close($conn);

?>
