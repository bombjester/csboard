<?php
	
	foreach($teamname as $array){
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $array['team_name']?> HQ</title>
		<meta charset ="utf-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		
  		<script type="text/javascript">

  		$(document).ready(function(){
  			
 			$(function(){
    			$( ".ct" ).draggable({
    				drag: function(){
				        var offset = $(this).offset();
				        window.xPos = Math.abs(offset.left);
				        window.yPos = Math.abs(offset.top);
				        $('#posX').text('x: ' + xPos);
				        $('#posY').text('y: ' + yPos);
				        return xPos
			    	}
		   		 });
    			$(function(){
 					$( ".t" ).draggable();
 				});
 			});


    	 		$("#button").click(function(){
    				alert(xPos);
					// $.ajax({   
					// 	type: 'POST', 
					//     url: "localhost:8888",
					//     data: xPos,
					//     success: function() {
					//     	alert("success")
					//     }
					// 	return false;	
    	//  			});
    			
    			});
    			
 			

 	 		});
 		</script>

	</head>
	<body>

		<div id="header">
			<h1 id="one">Welcome to <?php echo $array['team_name']?>'s Team Page!</h1>
			
				<p class='logout'>Go back to your profile <a href="/login_controller/profile">Here!</a></p>
				<p class='logout'>Click <a href='/login_controller/logout'>Here</a> to Logout. </p>
			
		</div>
		
	
		<div id="sidebar">
			<p>Drag a Counter-Terrorist!</p>
				<img id="a" class="ct" src="/assets/ct.png" width="40" height="40">
				<img id="b" class="ct" src="/assets/ct.png" width="40" height="40">
				<img id="c" class="ct" src="/assets/ct.png" width="40" height="40">
				<img id="d" class="ct" src="/assets/ct.png" width="40" height="40">
				<img id="e" class="ct" src="/assets/ct.png" width="40" height="40">
			<p>Drag a Terrorist!</p>
				<img id="f" class="t" src="/assets/t.png" width="30" height="30">
				<img id="g" class="t" src="/assets/t.png" width="30" height="30">
				<img id="h" class="t" src="/assets/t.png" width="30" height="30">
				<img id="i" class="t" src="/assets/t.png" width="30" height="30">
				<img id="j" class="t" src="/assets/t.png" width="30" height="30">
			
				<p> Current Roster:</p>
				<button id="button"> Save!</button>
				<ul>
					<?php foreach($roster as $arrayz){
						echo "<li>" .$arrayz['first_name'] . "</li>";
					}
					?>
				</ul>
		</div>
		<img src='/assets/de_dust2.png' height='900' width='900'>
		<img class="left" src='/assets/de_inferno.png' height='900' width='900'>
		<img class="left" src='/assets/de_mirage.png' height='900' width='900'>
		<img class="left" src='/assets/de_train.png' height='900' width='900'>
	</body>
</html>