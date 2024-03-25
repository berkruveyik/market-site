<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM `member` WHERE `username` = :username AND `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();
	

		
		if(is_array($row) && !empty($row)){
			$_SESSION['users'] = $row;
			header('location:home.php');
		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
	}
?>