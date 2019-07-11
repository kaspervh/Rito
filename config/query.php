<?php 
  require 'db.php'

  function getProducts(){

    $query = 'SELECT * FROM products';

    $result = mysqli_query($connection, $query);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($connection);

    return $products;

  }
?>