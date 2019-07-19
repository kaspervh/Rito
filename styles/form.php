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
          <?php foreach ($params as $param): ?>
            <div class="card" style="margin: 5px;">
              <strong>Sprog: <?php echo $param['languages_name'] ?></strong>
              <br>
              <div class="d-flex p-2 ">
                <input type="hidden" name="products_id" value="<?php echo $product['products_id']; ?>">
                <input type="hidden" name="languages_name" value="<?php echo $param['languages_name']; ?>">
                
                <label>Varenavn</label>
                <input type="string" name="<?php echo "{$param['languages_name']} products_description_name"; ?>" value="<?php echo $param['products_description_name']; ?>">
              </div>

              <label>Korttekst</label>
              <textarea name="<?php echo "{$param['languages_name']} products_description_short_description"; ?>" rows="5"><?php echo $param['products_description_short_description']; ?></textarea>

              <label>Langtekst</label>
              <textarea name="<?php echo "{$param['languages_name']} products_description_description"; ?>" cols="30" rows="10"><?php echo $param['products_description_description']; ?></textarea>
            </div>

            
          <?php endforeach; ?>
      </div>
        <input type="submit" name="submit"  class="btn-primary" style="float: right; margin-right: 75px; margin-bottom: 50px">
      </form>
    </span>

    
<script>
  CKEDITOR.replaceAll();
</script>