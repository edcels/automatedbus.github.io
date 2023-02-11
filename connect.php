<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$selection = $_POST['selection'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$conn = new mysqli('localhost','root','','automated');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, selection, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $selection, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "YOU ARE NOW REGISTERED";
		$stmt->close();
		$conn->close();
	}
?>