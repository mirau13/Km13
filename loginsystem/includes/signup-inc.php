<?php

/*Verific daca a apasat butonul de signup (numit submit)*/
if (isset($_POST['submit'])){
	//Includem baza de date
	include_once 'dbh-inc.php';
	
	$first = mysqli_real_escape_string($conn, $_POST['first']); //primul input din signup form, functia myswli pt securitate
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	
	//Create error handlers
	//Verifica daca sunt campuri goale
	if(empty($first) || empty($last) || empty($email) || empty($uname) || empty($pass)){
		header("Location: ../signup.php?signup=empty"); //daca nu a apasat il trimitem inapoi la pagina de signup
		exit();
	}else{
		//Verifica daca datele introduse sunt valide
		if( (!preg_match("/^[a-zA-Z]*$/", $first)) || (!preg_match("/^[a-zA-Z]*$/", $last))){
			header("Location: ../signup.php?signup=invalid"); //daca nu a apasat il trimitem inapoi la pagina de signup
			exit();
		}else{
			//Verifica daca emailul e valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=email"); //daca nu a apasat il trimitem inapoi la pagina de signup
				exit();
			}else{
				//Verifica daca mai exista username-ul in baza de date
				$sql = "SELECT * FROM users WHERE user_uname='$uname'";
				$result = mysqli_query($conn, $sql);
				
				if(!result){
					echo "Error: " . mysqli_error($conn);
					}
				else{
					echo "Success";
				}
				
				$resultCheck = mysqli_num_rows($result);
				//Daca avem mai multi useri cu acelasi username
				if($resultCheck > 0){
					header("Location: ../signup.php?signup=usertaken"); //daca nu a apasat il trimitem inapoi la pagina de signup
					exit();
				}else{
					//Facem parola irecognoscibila-hashing password
					$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
					//Adaugam user-ul in baza de date
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uname, user_pass) VALUES ('$first', '$last', '$email', '$uname', '$hashedPass')";
					$result = mysqli_query($conn, $sql); //run code into db
					if(!result){
						echo "Error: " . mysqli_error($conn);
					}
					else{
						echo "Success";
					}
					
					header("Location: ../signup.php?signup=Succes"); //daca nu a apasat il trimitem inapoi la pagina de signup
					exit();
				}
			}
		}
	}
	
}else{
	header("Location: ../signup.php"); //daca nu a apasat il trimitem inapoi la pagina de signup
	exit();
}