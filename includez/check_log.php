
<?php

session_start();
include_once('connection.php');
if(isset($_SESSION['member_id']) && isset($_SESSION['member_email']) && isset($_SESSION['member_password'])){

//Re-Screen session for harmful manipulation by Babylonians
$member_id = mysqli_real_escape_string($dbConx,$_SESSION['member_id']);	
$member_email = mysqli_real_escape_string($dbConx,$_SESSION['member_email']);	
$member_password = mysqli_real_escape_string($dbConx,$_SESSION['member_password']);	

$sql = "SELECT fullname FROM members WHERE email='$member_email' AND password='$member_password' AND id='$member_id' LIMIT 1";
		$query = mysqli_query($dbConx,$sql);	
		if(mysqli_num_rows($query)<1){header('location: login.php'); exit();}
		else{
			while($row = mysqli_fetch_array($query)){
				$memberFullname = $row[0];
		}
	
}
}
else{
	header('location: login.php'); exit();
}

?>