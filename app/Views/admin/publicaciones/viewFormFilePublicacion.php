<div class="">
    <div class="card-body" style="padding-top:20px;">
        <!-- Custom Styled Validation -->

        <!-- <form class="row g-3 needs-validation" novalidate autocomplete="off"> -->
        <?php $attributes = [
            'id' => 'formFilePublicacion',
            'enctype' => 'multipart/form-data',
            'class' => 'row g-3 needs-validation',
            'novalidate' => true,
            'autocomplete' => 'off'
        ]; ?>
        <?= form_open('', $attributes); ?>

        <input type="hidden" name="id_publicaciones_archivo" id="id_publicaciones_archivo" value="" style="display: none">


        <!-- Seccion de archivos pdf y Img -->

        <div class="col-md-6">
            <div class="text-center mx-auto d-block" id="visor_pdf_file_publicacion"
                 style="border: 1px solid #014464;border-radius: 13px">
                <img id="img_show_pdf_file_publicacion" width="130px"
                     style=" padding: 10px;
                             width: 100%;
                             object-fit: cover;
                             object-position: center center;"
                     src="https://cdn-icons-png.flaticon.com/512/3143/3143460.png" alt="imagen">
            </div>
        </div>

        <div class="col-md-6">
            <label for="nombre_archivo_publicacion" class="form-label">Documento Publicaci&oacute;n</label>
            <input class="form-control clear-input" type="file" id="nombre_archivo_publicacion" name="nombre_archivo_publicacion">
            <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
        </div>
        <!-- End Seccion de archivos pdf y Img -->

        <!--<div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>-->
        <!-- </form> -->
        <?= form_close(); ?><!-- End Custom Styled Validation -->

    </div>
</div>

