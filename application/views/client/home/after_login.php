<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
</head>
<body>
    <?php $this->load->view('partial/client/header2');?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('partial/client/slide');?>
                        <h3 class="text-dark">Produk Kami</h3><hr>
                    <?php $this->load->view('partial/client/produk');?>
                </div>
            </div>
        </div>

    <!-- FOOTER -->
            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    
</body>
</html>