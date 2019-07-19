<?php
  require('config/queries.php');
  require('config/routes.php');
  require('styles/header.php'); 

  $params = getLanguages();

  if(isset($_POST['submit'])){
    update_or_create_products_and_descriptions($_POST);
  }
?>

<?php require('styles/form.php'); ?>


<?php require('styles/footer.php') ?>