<?php


$conn = mysqli_connect('localhost', 'root', '', 'loginsystem');

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
		$id = $row['user_id'];
		$sqlafisare = "SELECT * FROM users WHERE user_id='$id' ";
		$resultafisare = mysqli_query($conn, $sqlafisare);
		
		if ($rowafisare = mysqli_fetch_assoc($resultafisare)){
			echo "<div style='color:#000000;width:550px;padding:20px;margin-bottom:4px;background-color:#fff;border-radius:4px;position:relative;'><p style='font-size:14px;line-height:16px;'>";
			echo $rowafisare['user_uname']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message']); /*transformam pentru a afisa linii goale*/
			echo "</p>
				<form style='position:absolute;top:10px;right:20px;' method='POST' action='editcomm.php'>
					<input type='hidden' name='commid' value='".$row['commid']."'>
					<input type='hidden' name='user_id' value='".$row['user_id']."'>
					<input type='hidden' name='date' value='".$row['date']."'>
					<input type='hidden' name='message' value='".$row['message']."'>
					<button style='width:100px;height:30px;text-align:center;line-height:20px;color:#fff;background-color:#000;'>Editare</button>
				</form>
			</div>";
		}
	}
}

function editeazaComentarii($conn) {
	if (isset($_POST['commSubmit'])) {
		$commid = $_POST['commid'];
		$user_id = $_POST['user_id'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "UPDATE comm SET message='$message' WHERE commid='$commid'";
		
		$result = mysqli_query($conn, $sql);
		
		header("Location: index.php");
	}
}

function stergeComm($conn) {
				echo "<br></p>
				<form style='position:absolute;top:10px;right:130px;' method='POST' action='".stergeComm($conn)."'>
					<input type='hidden' name='commid' value='".$row['commid']."'>
					<input type='hidden' name='user_id' value='".$row['user_id']."'>
					<input type='hidden' name='date' value='".$row['date']."'>
					<input type='hidden' name='message' value='".$row['message']."'>
					<button style='width:100px;height:30px;text-align:center;line-height:20px;color:#fff;background-color:#000;' type='submit' name='stergeSubmit'>Stergere</button>
				</form>
			</div>";
	if (isset($_POST['stergeSubmit'])){
		$commid = $_POST['commid'];
		$user_id = $_POST['user_id'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "DELETE FROM comm WHERE commid='$commid'";
		
		$result = mysqli_query($conn, $sql);
		
		header("Location: index.php");
	}
}