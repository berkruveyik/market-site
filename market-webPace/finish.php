<!DOCTYPE html>
<html lang="en">
	<head>
		
	</head>
<body>
	
	
	<div class="signupFrm">
		<div class="form">
		<hr style="border-top:1px dotted #ccc;"/>
		
		<h1 class="title">your shopping is complete</h1>
		
		<p id="result"></p>
		</div>
		
		
	</div>
</body>
<footer>
  <p style="text-align: center;">Creater by Mahir Berker Üveyik</p>
  <p style="text-align: center;">190218500</p>
</footer>
</html>
<?php session_start();
 ?>

<script>
    go("#result", "http://localhost/190218500/alibaba.php",5);
     function go (ID, Address, second){
        if(second===0){
           window. location.href=Address;
          }
        document. querySelector (ID).textContent= " You will be redirected after "+ second+" seconds";;
        second--;
        setTimeout(function (){
             go (ID, Address, second)
        },1000);
     }
</script>


<style>
 body {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  background-color: white;
  font-family: "lato", sans-serif;
}
.form {
  background-color: white;
  width: 400px;
  border-radius: 8px;
  padding: 20px 40px;
  box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
}
.signupFrm {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.a{
  display: block;
  margin-left: auto;
  padding: 10px 70px;
  border: none;
  background-color: orange;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  text-decoration: none;
  margin-bottom: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.title {
  font-size: 50px;
  margin-bottom: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.b{
	text-decoration: none;
	cursor: pointer;
	color: black;
}