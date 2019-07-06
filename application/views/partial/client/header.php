
    <div class=" bg-info">
        <div class="container">
          <?php foreach ($medsos as $key) : ?>
            <a target="_blank" href="<?= $key->link ?>"><small class="text-white px-2"><i class="<?= $key->kode ?>"></i></small></a>
          <?php endforeach; ?>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand " href="<?= base_url(); ?>">
                <img src="<?= base_url('vendor_assets/img/logo.png'); ?>" height="40" class="d-inline-block align-top" alt="" align="center">
            </a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> -->
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a href="<?= base_url('login'); ?>"><button type="button" class="btn btn-link text-white">Masuk</button></a>
              <a href="<?= base_url('register'); ?>"><button class="btn btn-outline-info my-2 my-sm-0">Daftar</button></a>
            </div>
          </div>
        </div>
    </nav>
