<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<?php
    require 'includes/links.inc.php';
    ?>
</head>

<body class="home">
	<center>
		<h1>Welcome to our website</h1>
		
		<div class="container">
			<div class="row">
				<div class="col">
				   
				</div>
				<div class="col">
				  <h2>Character List</h2>
					<p><a href='#' class='btn btn-primary'>Add new character</a></p>
					<ul>
						<li><a href='#' class='btn btn-primary'>Character One</a></li>
						<li><a href='#' class='btn btn-primary'>Character Two</a></li>
					</ul>
				</div>
				<div class="col">
				   
				</div>
			  </div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col">
					<form action='includes/logout.inc.php' method='post'>
						<button type='submit' class='btn btn-primary' name='logout-submit'>Log Out</button>
					</form>
				</div>
			</div>
		</div>
	</center>
</body>
</html>