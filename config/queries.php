<?php
  // gets product info from all products.
  function getProductInfo(){
    require('db.php');

    $query = "SELECT products.products_id, products.products_price, products.products_reference, products_description.products_description_name FROM products LEFT JOIN products_description ON products.products_id = products_description.products_id AND products_description.languages_id = 1";

    $result = mysqli_query($con, $query);

    $productInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($con);

    return $productInfo;
  }

  //get languages for the form and create/update function
  function getLanguages(){
    require('db.php');

    $query = "SELECT * FROM languages";

    $result = mysqli_query($con, $query);

    $languages = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($con);

    return $languages;
  }

  // gets values from a single product
  function getProduct($id){
    require('db.php');
    
    $query = "SELECT products_id, products_reference, products_price FROM products WHERE products_id = ".$id;

    $result = mysqli_query($con, $query);

    $product = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($con);

    return $product;
  }

  // get values form product_description
  function getProductDescription($id){
    require('db.php');

    $query = "SELECT * FROM languages LEFT JOIN products_description ON languages.languages_id = products_description.languages_id AND products_description.products_id = {$id} ";

    $result = mysqli_query($con, $query);

    $productDescription = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($con);

    return $productDescription;
  }

  // creates a new language
  function createLanguage(){
    require('db.php');
  }

  /* 
  will check if products exists or not if if it does it will create a new product
  then it will loop throug all submitted product descriptions based on language and add values to an array
  then it will check if the product has a description with the language
  if it does the description will be updated
  if not it will create new description with the language_id and product_id
  */
  function update_or_create_products_and_descriptions($params){
    require('db.php');
    require('routes.php');

    // will get the products id from new product
    $products_id = '';
    $query = '';

    /*
    checks if params has a products_id
    if it does the code will generate an update string
    if not it will generate a create string
    */ 
    if ($params['products_id']) {
      $query = "UPDATE products SET products_reference = {$params['products_reference']}, products_price = {$params['products_price']} WHERE products_id = {$params['products_id']}";
    }else{
      $query = "INSERT INTO products (products_reference, products_price) VALUES ({$params['products_reference']}, {$params['products_price']})";
    }

    if(mysqli_query($con, $query)){
      #nothing
    }else{
      echo mysqli_error($con);
    }

    //will assign value to product id vriable
    if($params['products_id']){
      $products_id = $params['products_id'];
    }else{
      $id_query = 'SELECT MAX(products_id) FROM products';
      $result = mysqli_query($con, $id_query);
      $data = mysqli_fetch_assoc($result);
      $products_id = $data['MAX(products_id)'];
      mysqli_free_result($result);
    }

    /* 
    loos through languages
    set up arr vaiable with values languages_id and products_id
    */
    foreach (getLanguages() as $language) {
      $arr = ['languages_id' => $language['languages_id'], 'products_id' => $products_id];

      /*
      loops through parsed values
      checks if the first word in the key name matches language name
      if it does the key will be changed  and will add key and value to arr
      */
      foreach ($params as $post_name => $post) {
        if(strstr($post_name, '_', true) === $language['languages_name']){
          $post_name = strstr($post_name, '_');
          $post_name = substr($post_name, 1);
          $arr += [$post_name => $post];
        }
      }

      /*
      checks if the product description exists
      if it does the code will update the existing product description
      if it does not the code will create a new product description
      */
      if(false){
        $query = "UPDATE products_description SET products_description_name = '{$arr['products_description_name']}', products_description_short_description = '{$arr['products_description_short_description']}', products_description_description = '{$arr['products_description_description']}' WHERE languages_id = {$arr['languages_id']} AND products_id = {$arr['products_id']}";
      }else{
        $query = "INSERT INTO products_description (products_id, languages_id, products_description_name, products_description_short_description, products_description_description) VALUES ('{$arr['products_id']}', '{$arr['languages_id']}', '{$arr['products_description_name']}', '{$arr['products_description_short_description']}', '{$arr['products_description_description']}' )";
      }

      if(mysqli_query($con, $query)){
        #nothing
      }else{
        echo mysqli_error($con);
      }
    } 

    mysqli_close($con);

    header("Location: index.php");
  }

?>