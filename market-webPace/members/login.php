<!DOCTYPE html>
<?php 
//starting the session
session_start();
?>
<html lang="en">
	<head>
		
	</head>
<body>
	
	
	<div class="col-md-6 well">
		
		
		
		<div class="signupFrm">
			<!-- Login Form Starts -->
			<form method="POST" action="login_query.php" class="form">	
				<div class="title">Login</div>
				<a href="index.php" class="a">Not a member yet? Register here...</a>
				<div class="form-group">
					
					<input type="text" name="username" class="form-control" required="required"/>
					<label for="" class="label">username</label>
				</div>
				<div class="form-group">
					
					<input type="password" name="password" class="form-control" required="required"/>
					<label for="" class="label">password</label>
				</div>
				<?php
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					if(ISSET($_SESSION['error'])){
				?>
				<!-- Display Login Error message -->
					<div class="alert alert-danger" role="alert"><?php echo $_SESSION['error']?></div>
					<?php
					//Unsetting the 'error' session after displaying the message. 
					unset($_SESSION['error']);
					}
				?>
				<button class="btn btn-primary btn-block" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>	
			<!-- Login Form Ends -->
		</div>
	</div>
</body>
<footer>
  <p style="text-align: center;">Creater by Mahir Berker Üveyik</p>
  <p style="text-align: center;">190218500</p>
</footer>
</html>

<style>
 body {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  background-color: white;
  font-family: "lato", sans-serif;
}
.signupFrm {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.form {
  background-color: white;
  width: 400px;
  border-radius: 8px;
  padding: 20px 40px;
  box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
}

.title {
  font-size: 50px;
  margin-bottom: 50px;
}
.form-group {
  position: relative;
  height: 45px;
  width: 90%;
  margin-bottom: 17px;
}
.form-control {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 1px solid #DADCE0;
  border-radius: 7px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}

/* Hide the placeholder texts (a) */

::placeholder {
  color: transparent;
}
.label {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0 4px;
  background-color: white;
  color: #DADCE0;
  font-size: 16px;
  transition: 0.5s;
  z-index: 0;
}
.btn {
  display: block;
  margin-left: auto;
  padding: 15px 30px;
  border: none;
  background-color: rgb(252, 166, 7);
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 30px;
}

.btn:hover {
  background-color: #f3a006;
  transform: translateY(-2px);
}
.form-control:focus + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
  color: rgb(255, 166, 0);
}
.form-control:focus {
  border: 2px solid rgb(255, 153, 0);
}
.form-control:not(:placeholder-shown)+ .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
}

.a{
  display: block;
  margin-left: auto;
  padding: 10px 70px;
  border: none;
  background-color: rgb(252, 166, 7);
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  text-decoration: none;
  margin-bottom: 50px;
}
.a:focus {
  border: 2px solid rgb(255, 153, 0);
}



.alert {
  width: 93%;
  padding: 12px 16px;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  margin-bottom: 12px;
  font-size: 16px;
}

.alert.alert-danger {
  background-color: rgba(248, 215, 218, 1);
  border-color: rgba(220, 53, 69, 1);
  color: rgba(114, 28, 36,1);
}
</style>