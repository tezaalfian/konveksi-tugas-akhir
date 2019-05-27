    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url(); ?>vendor_assets/js/main.js"></script>


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

        // $(".navbar .navbar-nav li a").click(function() {
        //   $(".navbar .navbar-nav li").removeClass('active');
        //     $(this).parent().addClass('active');
        // });

        // $(document).ready(function(){
        //     if($(".navbar .navbar-nav li  a").attr("href")==window.location.href){
        //         $(this).parent().addClass('active').siblings().removeClass('active');
        //     }
        //    else{
        //       $(".navbar .navbar-nav li").attr("class","");
        //      }
        // });

        jQuery(function ($) {
            $(".navbar .navbar-nav li  a")
                .click(function(e) {
                    var link = $(this);

                    var item = link.parent("li");
                    
                    if (item.hasClass("active")) {
                        item.removeClass("active").children("a").removeClass("active");
                    } else {
                        item.addClass("active").children("a").addClass("active");
                    }

                    if (item.children("ul").length > 0) {
                        var href = link.attr("href");
                        link.attr("href", "#");
                        setTimeout(function () { 
                            link.attr("href", href);
                        }, 300);
                        e.preventDefault();
                    }
                })
                .each(function() {
                    var link = $(this);
                    if (link.get(0).href === location.href) {
                        link.addClass("active").parents("li").addClass("active");
                        return false;
                    }
                });
        });
    </script>