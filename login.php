<?php

	 define('Home', 'https://localhost/Todos/index.php' );

	$conn = mysqli_connect('localhost' , 'root' , '' , 'information');
	

	if (isset($_GET['Submit'])) {
		$email = $_GET['Email'];
		$pass = $_GET['pass'];
		$query = " SELECT email , pass FROM info WHERE (email =  '$email' AND pass = {$pass})  " ;
		if(mysqli_query($conn, $query)){
			header('Location: '.Home.'');
		} else {
			echo "<script type='text/javascript'>alert('Invalid Passwod or Email');</script>";
		} 
	}

?>


<?php  require 'helper.php';  ?>
 <?php  render("header" , ["title" => "Log in"])  ?>
 <nav class="navbar navbar-default bg-success text-white">
 	<div class="container">
 		<h1>
 			Log In
 		</h1>
 		<form method="GET" action="register.php">
 			<input type="submit" name="signup" value="Sign Up" class="btn btn-info">
 		</form>
 	</div>
 </nav>
 <br>
 <div class="container col-md-8">
 	<form method="GET" >
 	<div class="form-group">
 		<label>Email</label>
 		<input type="email" name="Email" class="form-control">
 	</div>
 	<div class="form-group">
 		<label>Passwod</label>
 		<input type="password" name="pass" class="form-control">
 	</div>
 	<div class="form-group">
 		<input type="hidden" name="id" value="<?= $info['fname'] ?>">
 		<input type="submit" name="Submit" class="form-control btn btn-success">
 	</div>
 </form>
 </div>

 <?php  require 'footer.php';  ?>