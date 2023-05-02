<div class="pagetitle">
    <h1><?= $titleHeadContent; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item">Convenios</li>
            <li class="breadcrumb-item active"><?= $titleHeadContent ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">

                        <button type="button" id="btn-new-convenio-national"
                                class="btn btn-outline-primary btn-new-convenio-nacional">
                            <i class="ri-community-line"></i> Nuevo Convenio Nacional
                        </button>

                    </div>

                    <!-- alerta o mensaje -->
                    <?php if (session('msg')) : ?>
                        <div class="alert alert-<?= session('msg.type'); ?> fade show" role="alert"
                             style="margin: 0px;">
                            <h6 style="margin: auto;"><?= session('msg.body'); ?></h6>
                        </div>
                    <?php endif; ?>


                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="dt_convenio_nacional" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ids_convenio</th>
                            <th scope="col">Institución</th>
                            <th scope="col">Titulo Convenio</th>
                            <th scope="col">Duracion</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Vertically centered Modal -->
<div class="modal fade draggable-modal" id="modal_convenio_nacional" tabindex="-1" role="dialog">
    <div id="modal_convenio_nacional-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-jf">
                <h5 id="modal_convenio_nacional-title" class="modal_convenio_nacional-title modal-title">Titulo
                    Modal</h5>
                <button id="modal_convenio_nacional-close" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div id="modal_convenio_nacional-body" class="modal_convenio_nacional-body modal-body">
                <!-- dinamic content -->
            </div>
            <div id="modal_convenio_nacional-footer" class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i
                            class="bi bi-backspace me-1"></i> Cancelar
                </button>
                <button type="button" id="btn-action" class="btn btn-outline-primary btn-sm btn-action"><i
                            class="bi bi-check-square me-1"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Vertically centered Modal-->

<!-- centered Modal Info -->
<div class="modal fade draggable-modal" id="modal_convenio_info" tabindex="-1" role="dialog">
    <div id="modal_convenio_info-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-jf">
                <h5 id="modal_convenio_info-title" class="modal_convenio_info-title modal-title">Titulo Modal</h5>
                <button id="modal_convenio_info-close" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div id="modal_convenio_info-body" class="modal_convenio_info-body modal-body">
                <!-- dinamic content -->
            </div>
            <div id="modal_convenio_info-footer" class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i
                            class="bi bi-backspace me-1"></i> Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End centered Modal Info-->
