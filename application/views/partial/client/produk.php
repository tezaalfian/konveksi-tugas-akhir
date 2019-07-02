<div class="row">
  <?php foreach ($produk as $product): ?>
    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="<?= base_url('home/pemesanan/'.$product->id); ?>">
            <img id="img-card" class="card-img-top" src="<?= base_url('upload/produk/'.$product->foto) ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="<?= base_url('home/pemesanan/'.$product->id); ?>" class="text-info"><?php echo $product->nama ?></a>
            </h4>
            <h5>Rp.&nbsp;<?php echo number_format($product->harga); ?></h5>
            <p class="card-text"><?php echo $product->deskripsi ?></p>
          </div>
          <div class="card-footer bg-dark">
            <small class="text-muted"></small>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
</div>