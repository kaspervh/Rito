<?php
  require('config/db.php');

  $query = "SELECT products.products_id, products.products_reference, products.products_price, products_description.products_description_name FROM products INNER JOIN products_description WHERE products.products_id = products_description.products_id AND products_description.languages_id = 1";

  $result = mysqli_query($con, $query);

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  mysqli_close($con); 
?>

<?php require('styles/header.php'); ?>
  <div class="container">
    <table class="table">
      <thead>
        <th>Id</th>
        <th>Varenummer</th>
        <th>Varenavn</th>
        <th>Pris</th>
        <th>Rediger</th>
        <th>Slet</th>
      </thead>
      <?php foreach ($products as $product): ?>
        <tr>
          <td><?php echo $product['products_id'] ?></td>
          <td><?php echo $product['products_reference'] ?></td>
          <td><?php echo $product['products_description_name'] ?></td>
          <td><?php echo $product['products_price'] ?></td>
          <td><a href="edit.php" class='btn btn-primary'>Rediger</a></td>
          <td><a href="#" class='btn btn-danger'>Slet</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <a href="new.php" class='btn btn-primary'>Nyt produkt</a>
  </div>
<?php require('/styles/footer.php'); ?>