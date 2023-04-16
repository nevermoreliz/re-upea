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

                                                <a href="https://www.facebook.com/Ministerio.SuPresencia"
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
                        <div class="col-md-6">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                 role="tabpanel">

                                <h5 class="card-title" style="padding-top: 0px">M&aacute;s Informaci&oacute;n</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tipo Enlace</div>
                                    <div class="col-lg-9 col-md-8"><?= $registro->tipo_enlace ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefono</div>
                                    <div class="col-lg-9 col-md-8"><?= $registro->telefono ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fax</div>
                                    <div class="col-lg-9 col-md-8"><?= $registro->fax ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fecha de Convenio</div>
                                    <div class="col-lg-9 col-md-8"><?= $registro->fecha ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Orden</div>
                                    <div class="col-lg-9 col-md-8"><?= $registro->orden ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Estado</div>
                                    <div class="col-lg-9 col-md-8"><?= ($registro->estado == 1) ? 'Activo' : 'Inhabilitado' ?></div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                 role="tabpanel">
                                <h5 class="card-title" style="padding-top: 0px">Direcci&oacute;n</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores
                                    cumque
                                    temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum
                                    quae
                                    quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                            </div>
                        </div>
                    </div>


                    <!-- End Table with stripped rows -->

                </div>

            </div>


        </div>
    </div>


</section>


