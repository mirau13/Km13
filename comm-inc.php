<?php

$conn = mysqli_connect('localhost', 'root', '', 'commentsdb');

if ($conn->connect_errno) {
	printf("Connection failed: %s\n", $conn->connect_error);
	die();
}

function introComentarii($conn) {
	if (isset($_POST['commSubmit'])) {
		$user_id = $_POST['user_id'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "INSERT into comm (user_id, date, message) VALUES ('$user_id', '$date', '$message')";
		
		$result = mysqli_query($conn, $sql);
	}
}

function preiaComentarii($conn) {
	$sql = "SELECT * FROM comm";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		echo "<div style='color:#000000;width:500px;padding:20px;margin-bottom:4px;background-color:#fff;border-radius:4px'><p style='font-size:14px;line-height:16px;'>";
			echo 'name'."<br>";
			//echo $row['user_id']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message']); /*transformam pentru a afisa linii goale*/
		echo "</p></div>";
	}
}