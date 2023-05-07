<div class="">
    <div class="card-body" style="padding-top:20px;">
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

        <input type="hidden" name="id_publicaciones" id="id_publicaciones" value="" style="display: none">
        <input type="hidden" name="tipo_publicaciones" id="tipo_publicaciones" value="" style="display: none">

        <div class="col-md-12">
            <label for="titulo" class="form-label">Titulo de Publicaci&oacute;n</label>
            <input type="text" class="form-control clear-input" name="titulo" id="titulo" required>
        </div>

        <div class="col-md-12">
            <label for="subtitulo" class="form-label">SubTitulo</label>
            <input type="text" class="form-control clear-input" name="subtitulo" id="subtitulo" required>
        </div>

        <div class="col-md-12">
            <label for="descripcion" class="form-label">Descripci&oacute;n de la Publicaci&oacute;n</label>
            <textarea class="form-control clear-input" style="height: 130px;" name="descripcion"
                      id="descripcion" required></textarea>
        </div>

        <div class="col-md-6">
            <label for="correlativo" class="form-label">Correlativo</label>
            <input type="text" class="form-control clear-input" name="correlativo" id="correlativo" required>
        </div>

        <div class="col-md-6">
            <label for="links" class="form-label">Links</label>
            <input type="text" class="form-control clear-input" name="links" id="links" required>
        </div>

        <!-- Seccion de archivos pdf y Img -->
        <div class="col-md-6">
            <div class="text-center mx-auto d-block" style="border: 1px solid #014464;border-radius: 13px">
                <div class="d-flex flex-column align-items-center text-center"
                     style="display: flex;
                        width: 100%;
                        justify-content: space-around;
                        flex-wrap: wrap;
                        max-width: 10000px;
                        margin: auto;">
                    <img id="img_show_publicacion" width="130px"
                         style="border-radius: 15px;
                            padding: 10px;
                            width: 100%;
                            height: 344px;
                            object-fit: cover;"
                         src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="imagen">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center mx-auto d-block" id="visor_pdf_publicacion"
                 style="border: 1px solid #014464;border-radius: 13px">
                <img id="img_show_pdf_convenio" width="130px"
                     style=" padding: 10px;
                             width: 100%;
                             object-fit: cover;
                             object-position: center center;"
                     src="https://cdn-icons-png.flaticon.com/512/3143/3143460.png" alt="imagen">
            </div>
        </div>

        <div class="col-md-6">
            <label for="url" class="form-label">Imagen</label>
            <input class="form-control clear-input" type="file" id="url" name="url">
            <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
        </div>

        <div class="col-md-6">
            <label for="nombre_archivo" class="form-label">Documento Publicaci&oacute;n</label>
            <input class="form-control clear-input" type="file" id="nombre_archivo" name="nombre_archivo">
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


        <!--<div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>-->
        <!-- </form> -->
        <?= form_close(); ?><!-- End Custom Styled Validation -->

    </div>
</div>

