<?php
  require('config/routes.php');
  require('config/queries.php'); 

  $id = $_GET['products_id'];

  $product = getProduct($id);

  $productDescriptions = getProductDescription($id);

  $languages = getLanguages();

  #var_dump($productDescriptions)
?>


<?php require('styles/header.php'); ?>

  <a href="<?php echo root_path; ?>" class="btn btn-primary" style="margin: 15px"> <-- Tilbage</a>
    
    <span >
      <form action="POST" style="margin: 15px;">
        <label>Varenummer</label>
        <br>
        <input type="text" value="<?php echo $product['products_reference']; ?>">
        <br>
        <label>Pris</label>
        <br>
        <input type="string" value="<?php echo $product['products_price'] ?>">
        <br>
        <br>
        
        <?php foreach ($productDescriptions as $productDescription): ?>
          <div class="d-md-inline-flex">
            <div class="card" style="margin: 5px;">
              
              <strong>Sprog: <?php echo $productDescription['languages_name'] ?></strong>
              <br>
              <div class="d-flex p-2 ">
                <input type="hidden" id='products_id' value="<?php echo $product['products_id'] ?>">
                <input type="hidden" id="languages_id" value="<?php echo $productDescription['languages_id'] ?>">
                
                <label>Varenavn</label>
                <input type="string" value="<?php echo $productDescription['products_description_name'] ?>">
              </div>

              <label>Korttekst</label>
              <textarea name="billy" id="1" rows="5"><?php echo $productDescription['products_description_short_description']; ?></textarea>

              <label>Langtekst</label>
              <textarea name="Billy" id="1" cols="30" rows="10"><?php ECHO $productDescription['products_description_description'] ?></textarea>
            </div>

            
          <?php endforeach; ?>
        </div>
      </form>
    </span>

    
<script>
  CKEDITOR.replaceAll();
</script>
<?php require('styles/footer.php'); ?>