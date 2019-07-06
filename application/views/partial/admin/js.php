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

        function order() {
            url_get = "<?= base_url('notifikasi/allOrder/') ?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    order = result;
                    $('.count_order').html(order.length);
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

        user();
        payment();
        order();
        setInterval(order, 2000);
        setInterval(payment, 2000);
    </script>