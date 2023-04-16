<div class="pagetitle">
    <h1><?= $titleHeadContent; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item">Administraci&oacute;n Sistema</li>
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

                        <button type="button" id="btn-new-convenio" class="btn btn-outline-primary btn-new-convenio">
                            <i class="ri-community-line"></i> Nuevo Convenio
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
                    <table class="table datatable" id="dt_enlaces" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>

                            <th scope="col">ORDEN</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">URL ENLACE</th>
                            <th scope="col">URL PAGINA</th>
                            <th scope="col">TIPO</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">FAX</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ACCIONES</th>
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
<div class="modal fade draggable-modal" id="modal_convenio" tabindex="-1" role="dialog">
    <div id="modal_convenio-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-jf">
                <h5 id="modal_convenio-title" class="modal_convenio-title modal-title">Titulo Modal</h5>
                <button id="modal_convenio-close" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div id="modal_convenio-body" class="modal_convenio-body modal-body">
                <!-- dinamic content -->
            </div>
            <div id="modal_convenio-footer" class="modal-footer">
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
