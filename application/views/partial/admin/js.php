    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    
    <script src="<?= base_url(); ?>vendor_assets/js/main.js"></script>

    <!-- <script src="<?= base_url(); ?>vendor_assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/bootstrap.min.js"></script> -->
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        var order = "";
        function count_order() {
            url_get = "<?= base_url('notifikasi/allOrder/') ?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    order = result;
                    $('.count_order').html(result.length);
                }
            });
        }

        function notifOrder() {
            var string = "";
            url_get = "<?= base_url('notifikasi/allOrder2/') ?>";
            var foto = "<?= base_url('upload/pemesanan/') ?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    order = result;
                    $('.count-order2').html(result.length);
                    if (order.length > 0) {
                        for (var i = order.length - 1; i >= 0; i--) {
                            string += "<a class='dropdown-item media' href=''>"+
                            "<span class=''></span>"+
                                        "<div class='message media-body'>"+
                                            "<span class='name float-left text-info'><b>"+order[i].tanggal_pemesanan+"</b></span>"+
                                            "<span class='time float-right text-danger'>"+"Status : "+order[i].status+"</span>"+
                                            "<p class='text-dark'>"+order[i].nama+" | "+order[i].deskripsi+"</p>"+
                                        "</div></a>";
                        }
                        $('.count_order').html(result.length);
                        $('#order').html(string);
                    }else {
                        string += "<a class='dropdown-item d-flex align-items-center' href='<?=base_url('pemesanan/list') ?>'>"+
                                "<div class='mr-3'>"+
                                "</div>"+
                                "<div>"+
                                    "<span class='font-weight-bold'>Anda belum memiliki pesanan</span>"+
                                "</div>"+
                            "</a>";
                    }
                }
            });
        }

        function user() {
            url_get = "<?= base_url('notifikasi/allUser/') ?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    $('.count-user').html(result.length);
                }
            });
        }

        function payment() {
            url_get = "<?= base_url('notifikasi/allPay/') ?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    total = 0;
                    for (var i = result.length - 1; i >= 0; i--) {
                        total += parseInt(result[i].nominal);
                    }
                    $('.count-pay').html("Rp. "+Number(total));
                }
            });
        }

        notifOrder();
        user();
        payment();
        count_order();
        setInterval(count_order, 2000);
        setInterval(notifOrder, 2000);
        setInterval(user, 2000);
        setInterval(payment, 2000);
    </script>