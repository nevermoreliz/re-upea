<div class="pagetitle">
    <h1><?= ucwords($titleHeadContent) ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item">Publicaciones</li>
            <?php $sacarTitleSec = explode(" ", $titleHeadContent) ?>
            <li class="breadcrumb-item">Lista de <?= end($sacarTitleSec) ?></li>
            <li class="breadcrumb-item active"><?= $titleHeadContent ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row align-items-top d-flex">
        <div class="col-lg-9 flex-fill">

            <!-- Default Card -->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <button type="button" id="btn-back" class="btn btn-outline-primary btn-sm btn-back">
                            <i class="bi bi-backspace"></i> Volver
                        </button>
                    </div>

                    <!-- Custom Styled Validation -->

                    <!-- <form class="row g-3 needs-validation" novalidate autocomplete="off"> -->
                    <?php $attributes = [
                        'id' => 'formPublicacion',
                        'enctype' => 'multipart/form-data',
                        'class' => 'row g-3 needs-validation',
                        'novalidate' => true,
                        'autocomplete' => 'off'
                    ]; ?>
                    <?= form_open('', $attributes); ?>

                    <input type="hidden" name="id_publicaciones" id="id_publicaciones" value=""
                           style="display: none">
                    <input type="hidden" name="tipo_publicaciones" id="tipo_publicaciones" value=""
                           style="display: none">

                    <div class="col-md-6">
                        <label for="correlativo" class="form-label">Correlativo</label>
                        <input type="text" class="form-control clear-input" name="correlativo" id="correlativo"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="links" class="form-label">Links</label>
                        <input type="text" class="form-control clear-input" name="links" id="links" required>
                    </div>

                    <div class="col-md-12">
                        <label for="titulo" class="form-label">Titulo de Publicaci&oacute;n</label>
                        <input type="text" class="form-control clear-input" name="titulo" id="titulo" required>
                    </div>

                    <div class="col-md-12">
                        <label for="subtitulo" class="form-label">SubTitulo</label>
                        <input type="text" class="form-control clear-input" name="subtitulo" id="subtitulo"
                               required>
                    </div>

                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">Descripci&oacute;n de la
                            Publicaci&oacute;n</label>
                        <textarea class="form-control clear-input" style="height: 792px;" name="descripcion"
                                  id="descripcion" required></textarea>
                    </div>


                    <!-- Seccion de archivos pdf y Img -->
                    <!--                    <div class="col-md-6">-->
                    <!--                        <div class="text-center mx-auto d-block"-->
                    <!--                             style="border: 1px solid #014464;border-radius: 13px">-->
                    <!--                            <div class="d-flex flex-column align-items-center text-center"-->
                    <!--                                 style="display: flex;-->
                    <!--                        width: 100%;-->
                    <!--                        justify-content: space-around;-->
                    <!--                        flex-wrap: wrap;-->
                    <!--                        max-width: 10000px;-->
                    <!--                        margin: auto;">-->
                    <!--                                <img id="img_show_publicacion" width="130px"-->
                    <!--                                     style="border-radius: 15px;-->
                    <!--                            padding: 10px;-->
                    <!--                            width: 100%;-->
                    <!--                            height: 344px;-->
                    <!--                            object-fit: cover;"-->
                    <!--                                     src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="imagen">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-md-6">-->
                    <!--                        <div class="text-center mx-auto d-block" id="visor_pdf_publicacion"-->
                    <!--                             style="border: 1px solid #014464;border-radius: 13px">-->
                    <!--                            <img id="img_show_pdf_convenio" width="130px"-->
                    <!--                                 style=" padding: 10px;-->
                    <!--                             width: 100%;-->
                    <!--                             object-fit: cover;-->
                    <!--                             object-position: center center;"-->
                    <!--                                 src="https://cdn-icons-png.flaticon.com/512/3143/3143460.png" alt="imagen">-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div class="col-md-6" style="display: none;">
                        <label for="url" class="form-label">Imagen</label>
                        <input class="form-control clear-input" type="file" id="url" name="url">
                        <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
                    </div>


                    <div class="col-md-6" style="display: none;">
                        <label for="nombre_archivo" class="form-label">fff</label>
                        <input class="form-control clear-input" type="file" id="nombre_archivo" name="nombre_archivo[]"
                               multiple>
                        <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
                    </div>
                    <!-- End Seccion de archivos pdf y Img -->


                    <div class="col-md-2">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="estado" required>
                            <option selected value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <!-- End parte dos de tabla dato_enlace -->


                    <div class="col-12 d-flex justify-content-end">
                        <!--                        <button class="btn btn-primary" type="submit">Submit form</button>-->
                        <button type="button" class="btn btn-outline-danger btn-sm ms-auto" data-bs-dismiss="modal"><i
                                    class="bi bi-backspace me-1"></i> Cancelar
                        </button>
                        <button type="button" id="btn-action" class="btn btn-outline-primary btn-sm btn-action"
                                style="margin-left: 5px"><i
                                    class="bi bi-check-square me-1"></i> Guardar
                        </button>
                    </div>
                    <!-- </form> -->
                    <?= form_close(); ?><!-- End Custom Styled Validation -->


                </div>
            </div><!-- End Default Card -->

        </div>

        <div class="col-lg-3 flex-fill">

            <!-- Card with an image on top -->
            <!--            <div style="position: sticky;top: 60px">-->
            <div>


                <div class="card">
                    <div style="padding: 19px;">
                        <img id="img_show_publicacion"
                             src="https://lh3.google.com/u/0/d/1WDPQ9Xwrqofa9RT4pmBZnEipzrwjjFwz=w1366-h635-iv1"
                             class="card-img-top" alt="..."
                             style="border-radius: 5px;box-shadow: 0 5px 5px #888, 0 0 10px #444;">
                    </div>

                    <div class=" card-body">
                        <!--                    <h5 class="card-title">Card with an image on top</h5>-->
                        <div class="d-grid gap-2">
                            <button type="button" id="btn-file-img" class="btn btn-outline-primary btn-sm btn-file-img"
                                    onclick="document.getElementById('url').click()">
                                <i class="bi bi-cloud-upload"></i> Subir Imagen
                            </button>

                        </div>
                        <p class="card-text" style="text-align: justify">para subir la imagen tiene que tener las
                            siguiente
                            tamaño 1024px x 710px o 750px x 20px</p>
                    </div>
                </div><!-- End Card with an image on top -->

                <div class="card">

                    <div class="card-body">
                        <!--                        <h5 class="card-title">Card with an image on top</h5>-->
                        <div class="d-grid gap-2 card-title">
                            <button type="button" id="btn-file-img"
                                    class="btn btn-outline-primary btn-sm btn-file-img"
                                    onclick="document.getElementById('nombre_archivo').click()">
                                <i class="bi bi-cloud-upload"></i> Subir Documento
                            </button>

                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="dt_file_publicacion" style="width: 100%">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Archivo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="tabla-archivos">

                            </tbody>
                        </table>

                        <div class="wrapper mt-5" style="display: none">

                            <div class="progress progress-wrapper">
                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated progress_bar"
                                     role="progressbar" style="width: 0">0%
                                </div>

                            </div>
                        </div>

                        <div class="wrapper_files">

                        </div>


                        <!--                        <div class="progress">-->
                        <!--                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"-->
                        <!--                                 aria-valuemax="100"></div>-->
                        <!--                        </div>-->

                        <!-- End Table with stripped rows -->
                    </div>
                </div><!-- End Card with an image on top -->
            </div>

        </div>

    </div>
</section>


