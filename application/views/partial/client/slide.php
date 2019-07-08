      
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php for ($i=1; $i < count($slide); $i++) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>"></li>
                <?php endfor; ?>
              </ol>
              <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?= base_url('upload/slide/'.$slide[0]->slide) ?>" class="d-block w-100" alt="...">
                  </div>
                  <?php for ($i=1; $i < count($slide); $i++) : ?>
                  <div class="carousel-item">
                    <img src="<?= base_url('upload/slide/'.$slide[$i]->slide) ?>" class="d-block w-100" alt="...">
                  </div>
                  <?php endfor; ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>