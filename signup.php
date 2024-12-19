<!DOCTYPE html>
<html>
<head>
	<title>SignUp Page</title>
	<?php
    require 'includes/links.inc.php';
    ?>
	 
</head>
<body class="signup">
	<main>
		<div class="container">
		<?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
                echo '<p>Fill in all the fields</p>';
            } else if ($_GET["error"] == "invalidmailuid") {
                echo '<p>Invalid user name and e-mail</p>';
            } else if ($_GET["error"] == "invalidmail") {
                echo '<p>Invalid e-mail</p>';
            } else if ($_GET["error"] == "invaliduid") {
                echo '<p>Invalid user name</p>';
            } else if ($_GET["error"] == "passwordcheck") {
                echo '<p>Your Password do not match</p>';
            } else if ($_GET["error"] == "usertaken") {
                echo '<p>User is already taken</p>';
            }
        }

        ?>
	 	<ul>
	 	  <li><a class="active" href="#home">Home</a></li>
	 	  <li><a href="#contact">Contact</a></li>
	 	  <li><a href="#about">About</a></li>
	 	</ul>
	 	<form action="includes/signup.inc.php" method="post">
	 		<br><center><label><h2>SignUp page</h2></h2></label></center>
	 		<label for="name">User name</label>
	 		<input type="text" class="form-control" id="exampleInputEmail1" name="uid" placeholder="Username"><br>
	 		<label for="mail">Email Address</label>
	 		<input type="text" class="form-control" id="exampleInputEmail1" name="mail" placeholder="E-mail"><br>
	 		<label for="exampleInputPassword1">Password</label>
	 		<input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password"><br>
	 		<label for="exampleInputPassword1">ReEnter Password</label>
	 		<input type="password" class="form-control" id="exampleInputPassword1" name="pwd-repeat" placeholder="Repeat Password"><br>
	 		<button type="submit" class="btn btn-primary" name="signup-submit">Sign up</button>
	 	</form>
	 	<center><br><big><a href="index.php">Login</a></big></center>

		</div>
	 </main>
</body>
</html>




 <?php 
 require 'footer.php'; 
 ?>