<?php 
  require('config/routes.php');
  require('config/queries.php');
  $products = getProductInfo();
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
          <td><a href="edit.php?products_id=<?php echo $product['products_id'] ?>" class='btn btn-primary'>Rediger</a></td>
          <td><a href="#" class='btn btn-danger'>Slet</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <a href="<?php echo new_product_path; ?>" class='btn btn-primary'>Nyt produkt</a>
  </div>
<?php require('/styles/footer.php'); ?>