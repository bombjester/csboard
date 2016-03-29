<!DOCTYPE html>
<html>
	<head>
 		<title>Login</title>
 		<link rel="stylesheet" type="text/css" href="/assets/style.css">
	</head>
	<body>

 		<h1 style="color: orange; text-align: center;">Welcome to CS:GO Board!</h1>

<!-- //  if(-sign from-rainbow">$this->session->flashdata("login_error")){
//   echo $this->session->flashdata("login_error");
//  --> 
		


 		<div id='box'>
 		<p class="bold">Not a Member? Register here!</p>
 		<form action="/login_controller/register" method="post">
 			<p>First Name: <input type="text" name="first_name"></p>
 			<p>Last Name: <input type="text" name="last_name"></p>
 			<p>Email Address: <input type="text" name="email"></p>
 			<p>Password: <input type="password" name="password"></p>
 			<p class='italics'>Password should be at least 8 characters</p>
 			<p>Confirm Password: <input type="password" name="confirm"></p>
 			
 			<input type="submit" value="Register" class='login'>
 		</form>
 		<?php 
 		if(isset($input)){
 				echo $input;
 			}
 		echo "</div>";
 		 
 			if(isset($lol)){	
 				echo "<div id='works'>Thanks for registering!

 				</div>";

 			}
 			
 		?>
 		<div id='box1'>
		<p class="bold">Login Page!</p>
 		<form action="/login_controller/login" method="post">
  			<p>Email Address: <input type="text" name="email"></p>
  			<p>Enter Your Password: <input type="password" name="password"></p>
 			<input type="submit" value="Login" class='login'>
 		</form>

 		<?php if($this->session->flashdata('login_error')){
 			echo $this->session->flashdata('login_error');
 		}
 			?>
 		
 		</div>
 		</body>
</html>