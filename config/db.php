<?php
  // create connection to db
  $con = mysqli_connect('localhost', 'root', 'tvebakk1', 'products');

  // check conection
  if(mysqli_connect_errno()){
    echo 'failed to connect '. mysqli_connect_errno();
  }
?>