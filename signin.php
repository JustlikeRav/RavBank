<HTML>
<HEAD>

<?php
session_start();
$conn = mysqli_connect("localhost", "testuser", "password", "RavBank");

if(!$conn){
	echo "Error. Couldn't connect to database";
	exit;
}
if ((isset($_POST['password']))&&(isset($_POST['fname']))&&(isset($_POST['lname']))){

	$UID=$_POST['uid'];
	$FirstName=$_POST['fname'];
	$LastName=$_POST['lname'];
	$Password=$_POST['password'];

	$_SESSION['userid']=$UID;
	$_SESSION['fname']=$FirstName;
	$_SESSION['lname']=$LastName;
	$_SESSION['pass']=$Password;

	$query = "SELECT * FROM users";
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	$result = mysqli_query($conn,$query);

	while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
	//echo "$row[1]";
	//echo "$row[2]";
	//echo "$row[3]";
	if(($UID===$row[0])&&($FirstName===$row[1])&&($LastName===$row[2])&&($Password===$row[3])){
			
			$query = "SELECT * FROM InteractAccount where UserID=".$UID;
			$result = mysqli_query($conn,$query);
			$row=mysqli_fetch_array($result,MYSQLI_NUM);
			$_SESSION['balance']=$row[2];
			$query = "SELECT * FROM VisaAccount where UserID=".$UID;
			$result = mysqli_query($conn,$query);
			$row=mysqli_fetch_array($result,MYSQLI_NUM);
			$_SESSION['debt']=$row[2];
			header('Location: profile.php');			
		}
	}
	
	echo "Wrong credentials entered";
	//header('Location: login.html');
	exit;

}	

else {echo "Some error occured";}
	
mysqli_close($conn);

?>

</HTML>
</HEAD>

