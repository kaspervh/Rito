<?php
  require('config/routes.php');
  require('config/queries.php');
  require('styles/header.php');

  $id = $_GET['products_id'];

  $product = getProduct($id);

  $params = getProductDescription($id);

  if(isset($_POST['submit'])){
    update_or_create_products_and_descriptions($_POST);
  }
  
?>

<?php require('styles/form.php'); ?>

<?php require('styles/footer.php'); ?>