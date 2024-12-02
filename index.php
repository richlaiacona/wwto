<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<?php
        require 'includes/links.inc.php';
        ?>
		 
	</head>
	<body class="index">
		<nav>
			<ul>
			  <li><a class="active" href="#home">Home</a></li>
			  <li><a href="#contact">Contact</a></li>
			  <li><a href="#about">About</a></li>
			</ul>
			<div>
				<?php 
					 	if(isset($_SESSION["userId"])){
					 		echo '<form class="" action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">Log Out</button>
				</form>';
					 	}else{
					 		require 'login.php';
					 	}	 

				?>
				
				
				
			</div>
		</nav>
	</body>
			


</html>
<?php 
 require 'footer.php'; 
 ?>
