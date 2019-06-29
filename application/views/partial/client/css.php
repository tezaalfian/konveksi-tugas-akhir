    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= SITE_NAME .": ".ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

    <link href="<?= base_url('vendor_assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('vendor_assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
      }

       html,
      body {
        height: 100%;
      }

      #page-content {
        flex: 1 0 auto;
      }

      #sticky-footer {
        flex-shrink: none;
      }
      #tengah {
        vertical-align: middle;
      }

      .masthead {
        min-height: 500px;
        min-width: 500px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 10px;
      }

      #thumbnail {
        width: 150px;
        height: 130px;
        object-fit: cover;
      }
      #img-cart {
        width: 120px;
        height: 100px;
        object-fit: cover;
      }

      #cover {
        width: 70px;
        height: 70px;
        object-fit: cover;
      }

      #cover2 {
        width: 40px;
        height: 40px;
        object-fit: cover;
      }

      .radius {
        border-radius: 100px;
      }

      #img-card {
        width: 100%;
        height: 200px;
        object-fit: cover;
      }

      .image {
          position: relative;
          height: 0;
          padding-bottom: 70%;
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