<?php var_dump($pemesanan[0]->status_id); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
</head>
<body class="d-flex flex-column">
<div id="page-content">
    <?php $this->load->view('partial/client/header2');?>

        <div class="container my-3">
            <div class="row my-2 py-3 border-bottom">
                <div class="col-md-12">
                	<div id="keterangan">
                		<h4 class="text-dark"><b>Pemesanan</b></h4>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('empty'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div id="filter">
                <?php foreach ($pemesanan as $order) :?>
                    <?php if($order->status_id == 2) :?>
                        <?php $this->load->view('client/kategori/menunggu-pembayaran') ?>
                    <?php endif; ?>
                    <?php if($order->status_id == 3) :?>
                        <?php $this->load->view('client/kategori/konfirmasi') ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>		        
        </div>
    <!-- FOOTER -->
</div>

            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    <script type="text/javascript">
    	
    	
    </script>
    
</body>
</html>