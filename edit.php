<?php
  require('config/routes.php');
  require('config/queries.php');
  require('shared/header.php');

  $id = $_GET['products_id'];

  $product = getProduct($id);

  $params = getProductDescription($id);

  if(isset($_POST['submit'])){
    updateOrCreateProductsAndDescriptions($_POST);
  }
  
?>

<?php require('shared/form.php'); ?>

<?php require('shared/footer.php'); ?>