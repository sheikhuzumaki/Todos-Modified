<?php 

	  define('Home', 'https://localhost/Todos/index.php' );
      define('Edit', 'https://localhost/Todos/edit.php');
      define('Log', 'https://localhost/Todos/login.php');

      $conn = mysqli_connect('localhost' , 'root' , '' , 'todoblog');
      if(mysqli_connect_errno()){
    // Connection Failed
    echo 'Failed to connect to MySQL '. mysqli_connect_errno();
  }
     

     

     

