<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	session_start();
		
	$first = "";
	$last = "";
	$email = "";
	$uname = "";
	$errors = array();
		
	/*Connection to database using xampp*/
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "loginsystem";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	if ($conn->connect_errno) {
		printf("Connection failed: %s\n", $conn->connect_error);
		die();
	}

/*Verific daca a apasat butonul de inregistrare (numit submit)*/
if (isset($_POST['submit'])){
	//Includem baza de date
	
	$first = mysqli_real_escape_string($conn, $_POST['first']); //primul input din signup form, functia myswli pt securitate
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	
	//Create error handlers
	//Verifica daca sunt campuri goale
	if(empty($first) || empty($last) || empty($email) || empty($uname) || empty($pass)){
		array_push($errors, "Campuri goale"); //adauga eroare in tabloul errors
	}
	//Verifica daca datele introduse sunt valide
	if( (!preg_match("/^[a-zA-Z]*$/", $first)) || (!preg_match("/^[a-zA-Z]*$/", $last))){
			array_push($errors, "Date invalide");
	}
	//Verifica daca emailul e valid
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		array_push($errors, "Problema email");
	}
	//Verifica daca mai exista username-ul in baza de date
	$sql = "SELECT * FROM users WHERE user_uname='$uname'";
	$result = mysqli_query($conn, $sql);
				
/*	if(!result){
		echo "Error: " . mysqli_error($conn);
	}
	else{
		echo "Success";
	}*/				
	$resultCheck = mysqli_num_rows($result);
	//Daca avem mai multi useri cu acelasi username
	if($resultCheck > 0){
		array_push($errors, "Nume utilizator indisponibil");
	}
	if( count($errors) == 0){
		//Facem parola irecognoscibila-hashing password
		$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
		//Adaugam user-ul in baza de date
		$sql = "INSERT INTO users (user_first, user_last, user_email, user_uname, user_pass) VALUES ('$first', '$last', '$email', '$uname', '$hashedPass')";
		mysqli_query($conn, $sql); //run code into db
		$_SESSION['uname'] = $uname;
		$_SESSION['success'] = "Acum sunteți logat";
		header('location: index.php'); //redirectionare pe home page
	}	
}

	//log user in from login page
	if (isset ($_POST['login'])) {
		$uname = mysqli_real_escape_string($conn, $_POST['uname']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);
		
		//verificam ca nu raman campuri goale
		if (empty($uname)) {
			array_push($errors, "Lipseste nume de utilizator");
		}
		if (empty($pass)) {
			array_push($errors, "Lipseste parola");
		}
		
		if (count($errors) == 0) {
			$sql = "SELECT * FROM users WHERE user_uname='$uname'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1){
					array_push($errors, "Combinatie parola/nume utilizator gresite");
					header('location: login.php');
			} else {
				//punem info din bd in sirul row
				if ($row = mysqli_fetch_assoc($result)) {
					//verificam daca este parola corecta prin de-hashing
					$hashedPassCheck = password_verify($pass, $row['user_pass']);
					if ($hashedPassCheck == false){
						array_push($errors, "Combinatie parola/nume utilizator gresite");
						header('location: login.php');
					} elseif ($hashedPassCheck == true){
						//Logare utilizator
						$_SESSION['uname'] = $uname;
						$_SESSION['success'] = "Sunteți logat";
						header('location: index.php');
					}
				}
			}
		}
	}

	//logout
	if (isset ($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['uname']);
		header('location: index.php');
	}
