<?php
	
	define('Log', 'https://localhost/Todos/login.php');

	$conn = mysqli_connect('localhost' , 'root' , '' , 'information');


    if (isset($_GET['Submit'])) {
    	$fname = mysqli_real_escape_string($conn , $_GET['fname']);
    	$lname = mysqli_real_escape_string($conn , $_GET['lname']);
    	$email = mysqli_real_escape_string($conn , $_GET['Email']);
    	$pass = mysqli_real_escape_string($conn , $_GET['pass']);

    	$query = " INSERT INTO info(fname , lname , email , pass) VALUES ('$fname' , '$lname', '$email' , '$pass') " ;
    	$query2 = 'SELECT id FROM info  ' ;
    	if(mysqli_query($conn, $query2)){
    		$id = $_GET['id'];
    		echo $id;
			
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
    	if(mysqli_query($conn, $query)){
			header('Location: '.Log.'');
			
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
    }

    $query = 'SELECT * FROM info  ' ;

    $result = mysqli_query($conn , $query);

    $info = mysqli_fetch_all($result , MYSQLI_ASSOC);
    
    

?>

<?php  require 'helper.php';  ?>
 <?php  render("header" , ["title" => "Sign Up"])  ?>

 <nav class="navbar navbar-default bg-success text-white">
 	<div class="container">
 		<h1>
 			Sign Up
 		</h1>
 	</div>
 </nav>
 <br>
 <div class="container col-md-8">
 	<form method="GET" action="login.php">
 		
 		<div class="form-group">
 			<label>First Name</label>
 			<input type="input" name="fname" class="form-control">
 		</div>
 		<div class="form-group">
 			<label>last Name</label>
 			<input type="input" name="lname" class="form-control">
 		</div>
 		<div class="form-group">
 			<label>Email</label>
 			<input type="email" name="Email" class="form-control">
 		</div>
 		<div class="form-group">
 			<label>Password</label>
 			<input type="password" name="pass" class="form-control">
 		</div>
 			<div class="form-group">
 			
 			<input type="submit" name="Submit" class="form-control btn btn-success">
 		</div>
 	</form>
 	
 </div>

 <?php  require 'footer.php';  ?>