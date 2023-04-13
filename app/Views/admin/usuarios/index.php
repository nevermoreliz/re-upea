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

                        <button type="button" id="btn-new-user" class="btn btn-outline-primary btn-new-user">
                            <i class="bi bi-person-bounding-box"></i> Nuevo Usuario
                        </button>

                        <button type="button" id="btn-new-person" class="btn btn-outline-primary btn-new-person">
                            <i class="bi bi-people"></i> Registrar Persona
                        </button>

                    </div>

                    <!-- alerta o mensaje -->
                    <?php if (session('msg')) : ?>
                        <div class="alert alert-<?= session('msg.type'); ?> fade show" role="alert" style="margin: 0px;">
                            <h6 style="margin: auto;"><?= session('msg.body'); ?></h6>
                        </div>
                    <?php endif; ?>


                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="dt_usuarios" style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">PERSONA</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">CONTRASEÑA</th>
                                <th scope="col">FECHA REGISTRO</th>
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
<div class="modal fade draggable-modal" id="modal_usuario" tabindex="-1" role="dialog">
    <div id="modal_usuario-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-jf">
                <h5 id="modal_usuario-title" class="modal_usuario-title modal-title">Vertically Centered</h5>
                <button id="modal_usuario-close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal_usuario-body" class="modal_usuario-body modal-body">
                <!-- dinamic content -->
            </div>
            <div id="modal_usuario-footer" class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-backspace me-1"></i> Cancelar
                </button>
                <button type="button" id="btn-action" class="btn btn-outline-primary btn-sm btn-action"><i class="bi bi-check-square me-1"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Vertically centered Modal-->