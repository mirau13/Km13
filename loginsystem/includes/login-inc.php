<?php

session_start();

//daca se apasa submit
if (isset($_POST['submit'])){
	
	include 'dbh.inc.php';
	
	//pt securitate folosim escape
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	
	//Error handlers
	//Verifica daca exista campuri goale
	
	if (empty($uname) || empty($pass)){
			header("Location: ../index.php?login=empty");
			exit();
	} else {
		//Verificam daca exista in baza de date
		$sql = "SELECT * FROM users WHERE user_uname='$uname' OR user_email='$uname'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1){
				header("Location: ../index.php?login=error");
				exit();
		} else {
			//punem info din bd in sirul row
			if ($row = mysqli_fetch_assoc($result)) {
				//verificam daca este parola corecta prin de-hashing
				$hashedPassCheck = password_verify($pass, $row['user_pass']);
				if ($hashedPassCheck == false){
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPassCheck == true){
					//Logare utilizator
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uname'] = $row['user_uname'];
					header("Location: ../index.php?login=success");
					exit();
					
				}
				
			}
		}
	}
}else{
	header("Location: ../index.php?login=error");
	exit();
}