<div class="row">
  <?php foreach ($produk as $product): ?>
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="<?= base_url('upload/produk/'.$product->foto) ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#" class="text-info"><?php echo $product->nama ?></a>
            </h4>
            <h5>Rp.&nbsp;<?php echo $product->harga ?></h5>
            <p class="card-text"><?php echo $product->deskripsi ?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
</div>