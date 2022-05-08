<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$number = $_POST['number'];
	$houseAddress = $_POST['houseAddress'];


	// Database connection
	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number,houseAddress) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssis", $firstName, $lastName, $gender, $email, $password, $number, $houseAddress);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
