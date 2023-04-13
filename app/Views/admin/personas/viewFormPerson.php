<div class="">
    <div class="card-body" style="padding-top:20px;">
        <!-- Custom Styled Validation -->

        <!-- <form class="row g-3 needs-validation" novalidate autocomplete="off"> -->
        <?php $attributes = [
            'id' => 'formPerson',
            'enctype' => 'multipart/form-data',
            'class' => 'row g-3 needs-validation',
            'novalidate' => true,
            'autocomplete' => 'off'
        ]; ?>
        <?= form_open('', $attributes);; ?>

        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control clear-input" name="nombre" id="nombre" required>

        </div>

        <div class="col-md-4">
            <label for="paterno" class="form-label">Paterno</label>
            <input type="text" class="form-control clear-input" name="paterno" id="paterno" required>

        </div>

        <div class="col-md-4">
            <label for="materno" class="form-label">Materno</label>
            <input type="text" class="form-control clear-input" name="materno" id="materno" required>

        </div>

        <div class="col-md-4">
            <label for="ci" class="form-label">C.I.</label>
            <input type="text" class="form-control clear-input" name="ci" id="ci" required>
        </div>

        <div class="col-md-4">
            <label for="cargo" class="form-label">Cargo</label>
            <select class="form-select" name="cargo" id="cargo" required>
                <option selected disabled value="">Elija Un Cargo</option>
                <option>DIRECTOR</option>
                <option>TECNICO</option>
                <option>SECRETARIA</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Celular</label>
            <input type="text" class="form-control clear-input" name="telefono" id="validationCustom05"
                   required>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3" style="margin: auto;">
                    <div class="d-flex flex-column align-items-center text-center"
                         style="border: 1px solid #014464 ;
                          width: 160px;
                          height: 160px;
                          overflow: hidden;
                          border-radius: 15px">
                        <img id="img_show_profile" class="rounded-circle" width="130px"
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
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="text" class="form-control clear-input" name="email" id="email" required>
                    </div>

                    <div class="col-md-12" style="margin-top: 16px">
                        <label for="img" class="form-label">Selecione la imagen de Perfil</label>
                        <div class="col-sm-12">
                            <input class="form-control clear-input" type="file" id="img" name="img">
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

<!--<script src="--><?//= base_url(); ?><!--dashboard/assets/vendor/tinymce/tinymce.min.js"></script>-->