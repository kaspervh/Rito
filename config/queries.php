<?php
  # gets product info from all products.
  function getProductInfo(){
    require('db.php');

    $query = "SELECT products.products_id, products.products_reference, products.products_price, products_description.products_description_name FROM products INNER JOIN products_description WHERE products.products_id = products_description.products_id AND products_description.languages_id = 1";

    $result = mysqli_query($con, $query);

    $productInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($con);

    return $productInfo;
  }

  #get languages for the form
  function getLanguages(){
    require('db.php');

    $query = "SELECT * FROM languages";

    $result = mysqli_query($con, $query);

    $languages = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($con);

    return $languages;
  }

  # gets values from a single product
  function getProduct($id){
    require('db.php');
    
    $query = "SELECT products_id, products_reference, products_price FROM products WHERE products_id = ".$id;

    $result = mysqli_query($con, $query);

    $product = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($con);

    return $product;
  }

  # get values form product_description
  function getProductDescription($id){
    require('db.php');

    $query = "SELECT * FROM languages LEFT JOIN products_description ON languages.languages_id = products_description.languages_id AND products_description.products_id = {$id} ";

    $result = mysqli_query($con, $query);

    $productDescription = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($con);

    return $productDescription;
  }

  # creates a new language
  function createLanguage(){
    require('db.php');
  }

?>