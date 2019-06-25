    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= SITE_NAME .": ".ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor_assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor_assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor_assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor_assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style type="text/css">
        
        footer.footer {
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          right: 0;
          bottom: 0;
          position: absolute;
          width: calc(100% - 90px);
          line-height: 60px; /* Vertically center the text there */
        }

        .hidden {
          display: none!important;
          visibility:hidden;
          color: white!important;
          background-color: white!important;
        }
        .thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
      }
      .image {
          position: relative;
          height: 0;
          padding-bottom: 100%;
        }

        .image-fit {
          position: absolute;
          left: 0;
          top: 0;
          height: 100%;
          width: 100%;
          object-fit: cover;
          object-position: center center;
        }
    </style>