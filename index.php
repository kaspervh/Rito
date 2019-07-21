<?php
  require('shared/header.php');
  require('config/routes.php');
  require('config/queries.php');
  $products = getProductInfo();

  if (isset($_POST)) {
    deleteProductAndDescriptions($_POST);
  }
?>

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
          <td><a href="edit.php?products_id=<?php echo $product['products_id'] ?>" class='btn btn-primary' onclick=";">Rediger</a></td>
          <td>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
              <input type="hidden" name="products_id" value="<?php echo $product['products_id']; ?>">
              <input type="submit" name="submit" value="Slet" class="btn btn-danger" onClick="return confirm('Er du sikker på at du vil slette produktet og dets beskrivelser?')" >
            </form>
            
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <a href="<?php echo new_product_path; ?>" class='btn btn-primary'>Nyt produkt</a>
  </div>

<?php require('shared/footer.php'); ?>