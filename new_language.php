<?php 
  require('styles/header.php'); 
  require('config/routes.php');
  require('config/queries.php');

  //check for submit
  if(isset($_POST['submit'])){
    if(empty($_POST['name']) && $_POST['name'] == ''){
      set_error_handler($error = 'Please write a name');
      echo $error;
    }else{
      var_dump($_POST);
    }
  }
  
?>

<h1>Tilføj nyt sprog</h1>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <label>Navn:</label>
  <input type="text" name="name">
  <br>
  <input type="submit" name="submit" value="Gem" class="btn btn-primary">
</form>

<?php require('styles/footer.php'); ?>