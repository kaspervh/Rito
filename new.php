<?php
  require('config/queries.php');
  require('config/routes.php');
  require('shared/header.php'); 

  $params = getLanguages();

  if(isset($_POST['submit'])){
    updateOrCreateProductsAndDescriptions($_POST);
  }
?>

<?php require('shared/form.php'); ?>


<?php require('shared/footer.php') ?>