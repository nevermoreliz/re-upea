<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>dashboard/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>dashboard/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>dashboard/assets/css/style.css" rel="stylesheet">

  <style>
    .btn-jf-login{
      background-color: #003061;
    }
    .btn-jf-login:hover{
      background-color: #fff;
      color: #003061;
    }
  </style>
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-color: #003061;">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <!-- <img src="<?= base_url(); ?>dashboard/assets/img/logo.png" alt=""> -->
                  <img src="<?= base_url(); ?>assets/img-global/logo/logo-ri-sidebar-white.png" alt="Logo de Inisiar Sesion">
                  <span class="d-none d-lg-block text-white">DRIN-UPEA</span>

                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <?php if (session('msg')) :; ?>
                      <div class="alert alert-danger fade show" role="alert" style="margin: 0px;">
                        <h6 style="margin: auto;"><?= session('msg.body'); ?></h6>
                      </div>
                    <?php endif; ?>

                    <h5 class="card-title text-center pb-0 fs-4">Ingrese a su cuenta</h5>
                    <p class="text-center small">Ingrese su nombre de usuario y contraseña para iniciar sesión
                    </p>
                  </div>

                  <form action="<?= base_url(route_to('signin')); ?>" method="POST" class="row g-3 " novalidate autocomplete="off">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombre De Usuario:</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?= old('username'); ?>" required>
                        <div class="invalid-feedback- text-danger"><?= session('errors.username'); ?></div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="contrasenia" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback- text-danger"><?= session('errors.contrasenia'); ?></div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <!-- <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Recordar</label> -->
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100 btn-jf-login" type="submit">Ingresar</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">Regresar a la  <a href="<?= base_url(route_to('/')) ;?>">Pagina Principal.</a></p>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Elaborado por <a href="https://bootstrapmade.com/">JFlores</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="<?= base_url(); ?>dashboard/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>dashboard/assets/js/main.js"></script>

</body>

</html>