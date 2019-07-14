<?php
  require('config/routes.php');
  require('config/queries.php'); 

  $id = $_GET['products_id'];

  $product = getProduct($id);

  $productDescriptions = getProductDescription($id);

  if(isset($_POST['submit'])){

  }

  $arrays = []; 
  foreach (getLanguages() as $language) {
    $arr = ['languages_id' => $language['languages_id'], 'products_id' => $_POST['products_id']];
    foreach ($_POST as $post_name => $post) {
      if(strstr($post_name, '_', true) === $language['languages_name']){
        $arr += [$post_name=> $post];
      }
    }
    var_dump($arr);
  }
  
?>


<?php require('styles/header.php'); ?>

  <a href="<?php echo root_path; ?>" class="btn btn-primary" style="margin: 15px"> <-- Tilbage</a>
    
    <span >
      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="margin: 15px;">
        <label>Varenummer</label>
        <br>
        <input type="text" name="products_reference" value="<?php echo $product['products_reference']; ?>">
        <br>
        <label>Pris</label>
        <br>
        <input type="string" name="products_price" value="<?php echo $product['products_price']; ?>">
        <br>
        <br>
        
        <div class="d-md-inline-flex">
          <?php foreach ($productDescriptions as $productDescription): ?>
            <div class="card" style="margin: 5px;">
              <?php echo $productDescription['languages_id'] ?>
              <strong>Sprog: <?php echo $productDescription['languages_name'] ?></strong>
              <br>
              <div class="d-flex p-2 ">
                <input name="products_id" value="<?php echo $product['products_id']; ?>" style="display: none;">
                <input name="languages_name" value="<?php echo $productDescription['languages_name']; ?>" style="display: none;" >
                
                <label>Varenavn</label>
                <input type="string" name="<?php echo "{$productDescription['languages_name']} products_description_name"; ?>" value="<?php echo $productDescription['products_description_name']; ?>">
              </div>

              <label>Korttekst</label>
              <textarea name="<?php echo "{$productDescription['languages_name']} products_short_description"; ?>" rows="5"><?php echo $productDescription['products_description_short_description']; ?></textarea>

              <label>Langtekst</label>
              <textarea name="<?php echo "{$productDescription['languages_name']} products_description_description"; ?>" cols="30" rows="10"><?php echo $productDescription['products_description_description']; ?></textarea>
            </div>

            
          <?php endforeach; ?>
      </div>
        <input type="submit" name="submit"  class="btn-primary" style="float: right; margin-right: 75px; margin-bottom: 50px">
      </form>
    </span>

    
<script>
  CKEDITOR.replaceAll();
</script>
<?php require('styles/footer.php'); ?>