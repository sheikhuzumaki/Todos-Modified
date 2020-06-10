<?php 
    
     
      require 'db.php';


      $query = 'SELECT * FROM todo  ' ;

      $result = mysqli_query($conn , $query);

      $todos = mysqli_fetch_all($result , MYSQLI_ASSOC); 

      if (isset($_GET['Submit'])) {
        $work = mysqli_real_escape_string($conn , $_GET['work']);
        $query =" INSERT INTO todo(work) VALUES ('$work') ";

        if (mysqli_query($conn , $query)) {
          header('Location: ' .Home.'');
        }
         else
          echo mysqli_error();;
      } 

      


      if (isset($_GET['delete'])) {
        //echo "delete detected";
        //$delete_id = mysqli_real_escape_string($conn ,$_GET['id']);
        $query = "DELETE FROM todo WHERE id = " .$_GET['delete'];

        if(mysqli_query($conn, $query)){
      header('Location: '.Home.'');
          echo "string";
           } else {
      echo 'ERROR: '. mysqli_error($conn);
         }
      }

     

 ?>


<?php  require 'helper.php';  ?>
 <?php  render("header" , ["title" => "Home"])  ?>
    <nav class="navbar navbar-default bg-success text-white">
      <div class="container">
        <h1>Todo's</h1>
        <form method="GET" action="login.php">
        <input type="Submit" name="logout" value="Log Out" class="btn btn-info">
        </form>
      </div>
    </nav>
    <br>
    <div class="container col-md-8">
  
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="input-group">
                    <input type="text" name="work" class="form-control">
                    <input  class="btn btn-success" type="submit" name="Submit">
                </div>
                </form>
                <br> 
                
                <div class="input-group ">
                  <?php foreach($todos as $todo): ?>
                 <table class="table table-bordered table-striped">

                   <th><?php echo $todo['work']; ?>
                     <form method="GET" action="<?= $_SERVER['PHP_SELF']; ?>" >
                       <input type="hidden" name="delete" value="<?= $todo['id'] ?>">
                       <button class="btn btn-danger float-right">Delete</button>
                     </form>
                     <form method="GET" action="edit.php" >
                       <input type="hidden" name="edit" value="<?= $todo['id'] ?>">
                       <button class="btn btn-success float-right">Edit</button>
                     </form>
                   </th>
                   <?php endforeach; ?>
                 </table>
                </div>        
               </div>
       
    <?php  require 'footer.php';  ?>