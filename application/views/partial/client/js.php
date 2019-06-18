    <script src="<?= base_url('vendor_assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/jquery.easing.min.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>