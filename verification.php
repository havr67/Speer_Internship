<?php

if(isset($_GET['vkey']) && isset($_GET['username'])) {
	$vkey = $_GET['vkey'];
	$username = $_GET['username'];
	$sql =  new mysqli("localhost", "root", "", "");
	     	    	if($sql->connect_error) {
			die("connetion failed: " . $sql->connect_error);
	       }
	$q = "SELECT username, confirmed, vkey FROM users WHERE username='$username' AND confirmed = 0 AND vkey = '$vkey';";
	$result = $sql->query($q);
	if($row = $result->fetch_assoc()) {
	$q = "UPDATE users SET confirmed = 1 WHERE username='$username' AND vkey = '$vkey';";
	$update = $sql->query($q);
	echo "Your account has been varified";
	} else {
	echo "this account haven't been verified or does not existing ";
	echo "Check your email, or ";
	echo '<a href="https://khavronin.ursse.org/signup.php">Sign Up</a>';
	}
} else {
die("something went wrong");
}

?>


<html>
<head>

</head>
<body>


</body>

</html>
