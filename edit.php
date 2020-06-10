<?php
    
      require 'db.php';

     
      if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $query = 'SELECT * FROM todo WHERE id = '. $id ;

        $result = mysqli_query($conn , $query);

        $todo = mysqli_fetch_assoc($result);
      }
      
      if(isset($_GET['work'])) {
        $work = $_GET['work'];
        $query = 'UPDATE todo set work = "' . $work . '" WHERE id = ' . $_GET["id"]; 

        if (mysqli_query($conn , $query)) {
          header('Location: ' .Home.'');
          }
         else
          exit(mysqli_error($conn));
      }

      
?>

  <?php  require 'helper.php';  ?>
  <?php  render("header" , ["title" => "Home"])  ?>
    <nav class="navbar navbar-default bg-success text-white">
      <div class="container">
        <h1>Edit</h1>
        <a href="<?php echo Home; ?>" class="btn btn-info">Home</a>
      </div>
    </nav>
    <br>
      <div class="container col-md-8">
        <form class="input-group" method="GET" action="edit.php">
          <input type="hidden" name="id" value="<?= $_GET['edit'] ?>">
          <textarea class="input-group" name="work"><?= $todo['work']; ?></textarea>
           <input  class="btn btn-success" type="submit">
        </form>
      </div>

   <?php  require 'footer.php';  ?>