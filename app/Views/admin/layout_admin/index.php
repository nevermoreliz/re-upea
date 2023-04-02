<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- <title>Dashboard - NiceAdmin Bootstrap Template</title> -->
    <title>Admin RI | Panel Principal</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url(); ?>assets/img-global/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img-global/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img-global/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img-global/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img-global/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img-global/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>assets/img-global/favicon/mstile-144x144.png" />
    <!-- Favicon Tags End -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- ToastJs CSS File -->
    <link href="<?= base_url(); ?>assets/css/toast.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>dashboard/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?= $header; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?= $sidebar; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <?= $content; ?>
    </main>

    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <?= $footer; ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- JQueary File -->
    <script src="<?= base_url(); ?>dashboard/assets/js/jquery-3.6.4.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>dashboard/assets/vendor/php-email-form/validate.js"></script>

    

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>dashboard/assets/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/js/base.js"></script>

    <!-- ToastJs JS File -->
    <script src="<?= base_url(); ?>assets/js/toast.min.js"></script>


</body>

</html>