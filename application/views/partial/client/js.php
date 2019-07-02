    <script src="<?= base_url('vendor_assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/sb-admin-2.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   

    <script type="text/javascript">
        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        });

        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $(document).ready(function(){
            var order = "";
            var string = "";
            url_get = "<?= base_url('notifikasi/order/') ?>";
            var foto = "<?= base_url('upload/pemesanan/');?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    order = result;
                    if (order.length > 0) {
                        for (var i = order.length - 1; i >= 0; i--) {
                            string += "<a class='dropdown-item d-flex align-items-center' href='<?=base_url('pemesanan/list') ?>'>"+
                                "<div class='dropdown-list-image mr-3'>"+
                                    "<img class='rounded-circle' id='cover2' src='"+foto+order[i].desain+"'>"+
                                "</div>"+
                                "<div>"+
                                    "<div class='small text-gray-500'>"+order[i].tanggal_pemesanan+"</div>"+
                                    "<span class='font-weight-bold'>"+order[i].nama+" | "+order[i].deskripsi+"</span>"+
                                "</div>"+
                            "</a>";
                        }
                        $('.count_order').html(order.length);
                    }else {
                        string += "<a class='dropdown-item d-flex align-items-center' href='<?=base_url('pemesanan/list') ?>'>"+
                                "<div class='mr-3'>"+
                                "</div>"+
                                "<div>"+
                                    "<span class='font-weight-bold'>Anda belum memiliki pesanan</span>"+
                                "</div>"+
                            "</a>";
                    }
                    $('.order').html(string);
                }
            });
        });

        $(document).ready(function(){
            var order = "";
            var string = "";
            url_get = "<?= base_url('notifikasi/keranjang/') ?>";
            var foto = "<?= base_url('upload/pemesanan/');?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    order = result;
                    if (order.length > 0) {
                        for (var i = order.length - 1; i >= 0; i--) {
                            string += "<a class='dropdown-item d-flex align-items-center' href='<?= base_url('home/chart'); ?>'>"+
                                "<div class='dropdown-list-image mr-3'>"+
                                    "<img class='rounded-circle' id='cover2' src='"+foto+order[i].desain+"'>"+
                                "</div>"+
                                "<div>"+
                                    "<div class='small text-gray-500'>"+order[i].tanggal_pemesanan+"</div>"+
                                    "<span class='font-weight-bold'>"+order[i].nama+" | "+order[i].deskripsi+"</span>"+
                                "</div>"+
                            "</a>";
                        }
                        $('.count_cart').html(order.length);
                    }else {
                        string += "<a class='dropdown-item d-flex align-items-center' href='<?= base_url('home/chart'); ?>'>"+
                                "<div class='mr-3'>"+
                                "</div>"+
                                "<div>"+
                                    "<span class='font-weight-bold'>Keranjang anda kosong!</span>"+
                                "</div>"+
                            "</a>";
                    }
                    $('.keranjang').html(string);
                }
            });
        });
    </script>

    

    