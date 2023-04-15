<div class="">
    <div class="card-body" style="padding-top:20px;">
        <!-- Custom Styled Validation -->

        <!-- <form class="row g-3 needs-validation" novalidate autocomplete="off"> -->
        <?php $attributes = [
            'id' => 'formEnlace',
            'enctype' => 'multipart/form-data',
            'class' => 'row g-3 needs-validation',
            'novalidate' => true,
            'autocomplete' => 'off'
        ]; ?>
        <?= form_open('', $attributes); ?>

        <input type="hidden" name="id_enlace" id="id_enlace" value="" style="display: none">

        <div class="col-md-12">
            <label for="nombre_enlace" class="form-label">Nombre Institución</label>
            <input type="text" class="form-control clear-input" name="nombre_enlace" id="nombre_enlace" required>

        </div>

        <div class="col-md-6">
            <label for="telefono" class="form-label">Telefono de la Instituci&oacute;n</label>
            <input type="text" class="form-control clear-input" name="telefono" id="telefono" required>

        </div>

        <div class="col-md-6">
            <label for="fax" class="form-label">Fax de la Instituci&oacute;n</label>
            <input type="text" class="form-control clear-input" name="fax" id="fax" required>
        </div>


        <div class="col-md-4">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" value="<?= date('Y-m-d') ?>">
        </div>

        <div class="col-md-4">
            <label for="tipo_enlace" class="form-label">Tipo de Institución</label>
            <select class="form-select" name="tipo_enlace" id="tipo_enlace" required>
                <option selected disabled value="">Elija Un Cargo</option>
                <option value="enlace">enlace</option>
                <option value="embajada">embajada</option>
                <option value="consulado">consulado</option>
                <option value="ministerio">ministerio</option>
                <option value="org_estado">organismo del estado</option>
                <option value="org_cooperacion">organismo de coperación</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" name="estado" id="estado" required>
                <option selected value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="orden" class="form-label">Orden</label>
            <input type="text" class="form-control clear-input" name="orden" id="orden" value="0" required>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3" style="margin: auto;">
                    <div class="d-flex flex-column align-items-center text-center"
                         style="border: 1px solid #014464 ;
                          width: 160px;
                          height: 160px;
                          overflow: hidden;">
                        <img id="img_show_logo" width="130px"
                             style="
                             padding: 10px;
                             width: 100%;
                             height: 100%;
                             object-fit: cover;
                             object-position: center center;"
                             src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png">
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="col-md-12">
                        <label for="links_enlace" class="form-label">Pagina Web (url)</label>
                        <input type="text" class="form-control clear-input" name="links_enlace" id="links_enlace"
                               required>
                    </div>

                    <div class="col-md-12" style="margin-top: 16px">
                        <label for="url_enlace" class="form-label">Logo Institución</label>
                        <div class="col-sm-12">
                            <input class="form-control clear-input" type="file" id="url_enlace" name="url_enlace">
                            <span class="text-muted">cargar imagen menor a 1024 KB - (jpg, jpeg, png)</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--<div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>-->

        <!-- </form> -->
        <?= form_close(); ?><!-- End Custom Styled Validation -->

    </div>
</div>

