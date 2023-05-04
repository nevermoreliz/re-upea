<div class="pagetitle">
    <h1><?= $titleHeadContent; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item">Publicaci&oacute;nes</li>
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
                        <input type="hidden" name="param" id="param" value="<?= $param ?>" style="display: none">
                        <button type="button" class="btn btn-outline-primary btn-back">
                            <i class="bi bi-backspace"></i> Volver
                        </button>

                        <button type="button" id="btn-new-publicacion"
                                class="btn btn-outline-primary btn-new-publicacion">
                            <i class="ri-community-line"></i> Nueva <?= $param ?>
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
                    <table class="table datatable" id="dt_publicaciones" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
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
<div class="modal fade draggable-modal" id="modal_publicacion" tabindex="-1" role="dialog">
    <div id="modal_publicacion-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-jf">
                <h5 id="modal_publicacion-title" class="modal_publicacion-title modal-title">Titulo Modal</h5>
                <button id="modal_publicacion-close" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div id="modal_publicacion-body" class="modal_publicacion-body modal-body">
                <!-- dinamic content -->
            </div>
            <div id="modal_publicacion-footer" class="modal-footer">
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
<div class="modal fade draggable-modal" id="modal_publicaion_info" tabindex="-1" role="dialog">
    <div id="modal_publicaion_info-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-jf">
                <h5 id="modal_publicaion_info-title" class="modal_publicaion_info-title modal-title">Titulo Modal</h5>
                <button id="modal_publicaion_info-close" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div id="modal_publicaion_info-body" class="modal_publicaion_info-body modal-body">
                <!-- dinamic content -->
            </div>
            <div id="modal_publicaion_info-footer" class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i
                            class="bi bi-backspace me-1"></i> Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End centered Modal Info-->


