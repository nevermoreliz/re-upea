<div class="">
    <div class="card-body" style="padding-top:20px;">
        <!-- Custom Styled Validation -->

        <!-- <form class="row g-3 needs-validation" novalidate autocomplete="off"> -->
        <?php $attributes = [
            'id' => 'formConvenioNacional',
            'enctype' => 'multipart/form-data',
            'class' => 'row g-3 needs-validation',
            'novalidate' => true,
            'autocomplete' => 'off'
        ]; ?>
        <?= form_open('', $attributes); ?>

        <input type="hidden" name="id_convenios" id="id_convenios" value="" style="display: none">


        <div class="col-md-12">
            <label for="" class="form-label">Seleccion Instituci&oacute;n</label>
            <select class="form-select" name="id_enlace" id="id_enlace" required>
                <option selected disabled value="">Elija la Instituci&oacute;n</option>
                <?php foreach ($enlaces as $enlace): ?>
                    <option value="<?= $enlace->id_enlace ?>"><?= $enlace->nombre_enlace ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-12">
            <label for="nombre_convenio" class="form-label">Titulo del Convenio</label>
            <input type="text" class="form-control clear-input" name="nombre_convenio" id="nombre_convenio" required>
        </div>

        <div class="col-md-12">
            <label for="objetivo_convenio" class="form-label">Objetivo de Convenio</label>
            <textarea class="form-control clear-input" style="height: 130px;" name="objetivo_convenio"
                      id="objetivo_convenio" required></textarea>
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
                    <img id="img_show_convenio" width="130px"
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
            <div class="text-center mx-auto d-block" id="visor_pdf_convenio"
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
            <label for="img_convenio" class="form-label">Imagen</label>
            <input class="form-control clear-input" type="file" id="img_convenio" name="img_convenio">
            <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
        </div>
        <div class="col-md-6">
            <label for="pdf_convenio" class="form-label">Documento Pdf</label>
            <input class="form-control clear-input" type="file" id="pdf_convenio" name="pdf_convenio">
            <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
        </div>
        <!-- End Seccion de archivos pdf y Img -->


        <div class="col-md-4">
            <label for="fecha_firma" class="form-label">Fecha Inicio Convenio</label>
            <input type="date" class="form-control" name="fecha_firma" id="fecha_firma"
                   value="<?= date('Y-m-d') ?>">
        </div>

        <div class="col-md-4">
            <label for="fecha_finalizacion" class="form-label">Fecha Fin Convenio</label>
            <input type="date" class="form-control" name="fecha_finalizacion" id="fecha_finalizacion"
                   value="<?= date('Y-m-d') ?>">
        </div>

        <div class="col-md-4">
            <label for="id_tipo_convenio" class="form-label">Tipo Convenio</label>
            <select class="form-select" name="id_tipo_convenio" id="id_tipo_convenio" required>
                <option selected disabled value="">Elige el tipo</option>
                <?php foreach ($tiposConvenio as $tipoConvenio): ?>
                    <option value="<?= $tipoConvenio->id_tipo_convenio ?>"><?= $tipoConvenio->nombre_tipo_convenio ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" name="estado" id="estado" required>
                <option selected  value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Concluido">Concluido</option>
            </select>
        </div>

        <!-- </form> -->
        <?= form_close(); ?><!-- End Custom Styled Validation -->

    </div>
</div>

