<html>

	<head>
 		<title>Your homebase!</title>
 		<link rel="stylesheet" type="text/css" href="/assets/style.css">
 		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		
  		<script type="text/javascript">

  	
  		$(document).ready(function(){
  			
 			$(function(){
    			$( ".ct" ).draggable();
    		});

 			$(function(){
 				$( ".t" ).draggable();
 			});

 			$("#dust2").click(function(){
 				
					$("#container").html("<img src='/assets/de_dust2.png' height='900' width='900'>");
				});
 			$("#inferno").click(function(){
 				
					$("#container").html("<img src='/assets/de_inferno.png' height='900' width='900'>");
				});
 			$("#mirage").click(function(){
 				
					$("#container").html("<img src='/assets/de_mirage.png' height='900' width='900'>");
				});
 			$("#train").click(function(){
 				
					$("#container").html("<img src='/assets/de_train.png' height='900' width='900'>");
				});

 			

 		});

  </script>

	</head>
	<body>
		<?php
				
				
			foreach($input as $array){
				foreach($array as$key=>$value){

				}
			}
						
					
				
			
		?>
		<div id="header">
			<h1 id="one">You are now logged in <?php echo $this->session->userdata('user_name');?></h1>
				<p>Current Team: <?php echo $value;?></p>

				<form action="/inside/createteam" method="post">
					<p>Create a Team: <input type="text" name="team_name"></p>
					<p>Create a Team Password:<input type="password" name="team_password"></p>
					<input type="submit" value="Create a team!">
				</form>
				<?php 
					if($this->session->flashdata('team_error')){
 							echo $this->session->flashdata('team_error');
 						}
 					if($this->session->flashdata("team_success")){
 						echo $this->session->flashdata("team_success");
 					}
 				?>
				
				
				<form action="/inside/jointeam" method="post">
				<p>Not in a team? Enter team name: <input type="text" name="team_name"> and password! <input type="password" name="team_password"></p>
				<input type="submit" value="Join Team!">
				</form>
				<?php 
				if($this->session->flashdata("addteam_success")){
 						echo $this->session->flashdata("addteam_success");
 					}
				if($this->session->flashdata("addteam_error")){
 						echo $this->session->flashdata("addteam_error");
 					}
				?>
				<p class='logout'>Check Your CS:GO Stats <a href="http://www.csgo-stats.com">Here!</a></p>
				<p class='logout'>Go to Your Team Page <a href="/inside/team">Here!</a></p>
				<p class='logout'>Click <a href='/login_controller/logout'>Here</a> to Logout. </p>
			
		</div>
		
	
		 
		
		<h1 id="first">Design a Play! </h1>
		
		
		

		<div id="sidebar">
			<p>Choose a map: </p>
			<button id ="dust2" class="choosemap" type="button">Dust2</button>
			<button id ="inferno" class="choosemap" type="button">Inferno</button>
			<button id ="mirage" class="choosemap" type="button">Mirage</button>
			<button id ="train" class="choosemap" type="button">Train</button>
			<div = "show">
				<p>Drag a Counter-Terrorist!</p>
				<img class="ct" src="/assets/ct.png" width="40" height="40">
				<img class="ct" src="/assets/ct.png" width="40" height="40">
				<img class="ct" src="/assets/ct.png" width="40" height="40">
				<img class="ct" src="/assets/ct.png" width="40" height="40">
				<img class="ct" src="/assets/ct.png" width="40" height="40">
				<p>Drag a Terrorist!</p>
				<img class="t" src="/assets/t.png" width="30" height="30">
				<img class="t" src="/assets/t.png" width="30" height="30">
				<img class="t" src="/assets/t.png" width="30" height="30">
				<img class="t" src="/assets/t.png" width="30" height="30">
				<img class="t" src="/assets/t.png" width="30" height="30">
			</div>
			
		</div>
		<div id="container">
			
			
		</div>
		
		
		
	</body>
	</html>