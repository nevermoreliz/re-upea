<div class="pagetitle">
    <h1><?= ucwords('informac&oacute;n completa del convenio') ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item">Administraci&oacute;n Sistema</li>
            <li class="breadcrumb-item">Convenio</li>
            <li class="breadcrumb-item active"><?= ucwords(strtolower($registro->nombre_enlace)) ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">

                        <button type="button" id="btn-back" class="btn btn-outline-primary btn-back">
                            <i class="bi bi-backspace"></i> Volver
                        </button>

                    </div>

                    <div class="row align-items-top">

                        <div class="col-lg-12">

                            <!-- Card with an image on left -->
                            <div class="card mb-3">
                                <div class="row g-0"
                                     style="border: 1px solid #637BA7;border-bottom-right-radius: 5px;border-top-right-radius: 5px; ">

                                    <div class="col-md-4"
                                         style=" border-bottom-right-radius: 15px; border-top-right-radius: 15px; padding: 15px; background: #637BA7; display: flex; justify-content: center; align-items: center; ">

                                        <div style="display: flex;width: 100%;justify-content: space-around;flex-wrap: wrap;max-width: 1000px;margin: auto">
                                            <img id="img-preview"
                                                 src="<?= base_url() ?>uploads/<?= $registro->url_enlace ?>"
                                                 class="img-fluid rounded-start"
                                                 style="max-width: 100%; cursor: pointer" alt="...">
                                        </div>

                                        <div class="modal fade" id="previewImage">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Agrega un elemento img con la clase img-fluid y un ID único -->
                                                    <img src="<?= base_url() ?>uploads/<?= $registro->url_enlace ?>"
                                                         class="img-fluid" id="modal-image">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= strtoupper($registro->nombre_enlace) ?></h5>

                                            <div class="alert border-primary alert-dismissible fade show" role="alert">

                                                <a href="<?= $registro->links_enlace ?>"
                                                   target="_blank">
                                                    <h6 class="card-title"
                                                        style="padding-top: 0px; padding-bottom: 0px;font-size: 12px">
                                                        <i class="ri-global-line"></i> Pagina Web del Convenio
                                                    </h6>
                                                </a>

                                                <?= $registro->links_enlace ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Card with an image on left -->

                        </div>

                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

            <div class="card">

                <div class="card-body" style="padding-top: 20px">

                    <div class="row">
                        <div class="col-md-6" style="padding-bottom: 20px">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                 role="tabpanel">

                                <h5 class="card-title">M&aacute;s Informaci&oacute;n</h5>

                                <div class="row" style="padding-bottom: 10px">
                                    <div class="col-lg-5 col-md-4 col-sm-4 label "><b>Tipo Enlace: </b></div>
                                    <div class="col-lg-7 col-md-8 col-sm-8"><?= (is_null($registro->nombre_tipo_enlace)) ? $registro->tipo_enlace : $registro->nombre_tipo_enlace ?></div>
                                </div>

                                <div class="row" style="padding-bottom: 10px">
                                    <div class="col-lg-5 col-md-4 col-sm-4 label"><strong>Telefono: </strong></div>
                                    <div class="col-lg-7 col-md-8 col-sm-8"><?= $registro->telefono ?></div>
                                </div>

                                <div class="row" style="padding-bottom: 10px">
                                    <div class="col-lg-5 col-md-4 col-sm-4 label"><b>Fax: </b></div>
                                    <div class="col-lg-7 col-md-8 col-sm-8"><?= $registro->fax ?></div>
                                </div>

                                <div class="row" style="padding-bottom: 10px">
                                    <div class="col-lg-5 col-md-4 col-sm-4 label"><b>Fecha de Registro: </b></div>
                                    <div class="col-lg-7 col-md-8 col-sm-8"><?= $registro->fecha ?></div>
                                </div>

                                <div class="row" style="padding-bottom: 10px">
                                    <div class="col-lg-5 col-md-4 col-sm-4 label"><b>Prioridad de Convenio: </b></div>
                                    <div class="col-lg-7 col-md-8 col-sm-8"><?= $registro->orden ?></div>
                                </div>

                                <div class="row" style="padding-bottom: 10px">
                                    <div class="col-lg-5 col-md-4 col-sm-4 label"><b>Estado de Vigencia: </b></div>
                                    <div class="col-lg-7 col-md-8 col-sm-8"><?= ($registro->estado == 1) ? 'Activo' : 'Inhabilitado' ?></div>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class=" alert border-primary alert-dismissible fade show" role="alert">

                                <a href="javascript:void(0)">
                                    <h5 class="card-title" style="padding: 0px">Correo de la Instituci&oacute;n</h5>
                                </a>

                                <?= $registro->correo ?>
                            </div>

                            <div class="row tab-pane fade show active profile-overview" id="profile-overview"
                                 role="tabpanel">
                                <div class="col-lg-2 col-md-2">
                                    <div class="label" style="padding-top: 0px"><b>Pais: </b></div>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <p class="small fst-italic"><?= $registro->pais ?></p>
                                </div>
                            </div>

                            <div class="row tab-pane fade show active profile-overview" id="profile-overview"
                                 role="tabpanel">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="label" style="padding-top: 0px"><b>Ciudad o Estado: </b></div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <p class="small fst-italic"><?= $registro->ciudad ?></p>
                                </div>
                            </div>

                            <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                 role="tabpanel">
                                <div class="label" style="padding-bottom: 5px"><b>Direcci&oacute;n </b></div>
                                <p class="small fst-italic"><?= $registro->direccion ?></p>
                            </div>
                        </div>
                    </div>

                    <div class=" alert border-primary alert-dismissible fade show" role="alert">

                        <?php
                        $fecha2 = new DateTime($registro->fin_convenio_enlace);
                        $hoy = new DateTime(); // fecha actual
                        $diferencia = $hoy->diff($fecha2); // diferencia entre las dos fechas
                        ?>

                        <a href="javascript:void(0)">
                            <h5 class="card-title" style="padding: 0px">Estado Del Convenio: </h5>
                        </a>

                        <button type="button" class="btn btn-light btn-sm mb-3">
                            Fecha Inicio Del Convenio:
                            <span class="badge bg-secondary text-light"> <?= $registro->inicio_convenio_enlace ?></span>
                        </button>

                        <button type="button" class="btn btn-warning btn-sm mb-3">
                            Fecha Finalizaci&oacute;n Del Convenio:
                            <span class="badge bg-white text-dark"> <?= $registro->fin_convenio_enlace ?></span>
                        </button>

                        <?php if ($registro->fin_convenio_enlace < Date('Y-m-d')): ?>
                            <button type="button" class="btn btn-danger btn-sm mb-3">
                                Termino El Convenio
                            </button>
                        <?php elseif ($diferencia->y == 0 && $diferencia->m == 0 && $diferencia->d <= 20): ?>
                            <button type="button" class="btn btn-danger btn-sm mb-3">
                                Termina en:
                                <span class="badge bg-white text-danger"> <?= $diferencia->y ?> años</span>
                                <span class="badge bg-white text-danger"> <?= $diferencia->m ?> meses</span>
                                <span class="badge bg-white text-danger"> <?= $diferencia->d + 1 ?> dias</span>
                            </button>

                        <?php else : ?>
                            <button type="button" class="btn btn-primary btn-sm mb-3">
                                Termina en:
                                <span class="badge bg-white text-primary"> <?= $diferencia->y ?> años</span>
                                <span class="badge bg-white text-primary"> <?= $diferencia->m ?> meses</span>
                                <span class="badge bg-white text-primary"> <?= $diferencia->d ?> dias</span>
                            </button>
                        <?php endif; ?>

                    </div>

                    <!-- End Table with stripped rows -->

                </div>

            </div>


        </div>
    </div>


</section>


