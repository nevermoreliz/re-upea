<div class="">
    <div class="card-body" style="padding-top:20px;">
        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" novalidate autocomplete="off">
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" name="paterno" id="paterno" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="materno" class="form-label">Materno</label>
                <input type="text" class="form-control" name="materno" id="materno" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="text" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="cargo" class="form-label">Cargo</label>
                <select class="form-select" name="cargo" id="cargo" required>
                    <option selected disabled value="">Elija Un Cargo</option>
                    <option>DIRECTOR</option>
                    <option>TECNICO</option>
                    <option>SECRETARIA</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="ci" class="form-label">C.I.</label>
                <input type="text" class="form-control" name="ci" id="ci" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4" style="margin: auto;">
                        <div class="d-flex flex-column align-items-center text-center" style="border: 1px solid #014464 ; border-radius: 15px">
                            <img class="rounded-circle" width="130px" style="padding: 10px;" src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <label for="inputNumber" class="form-label">Selecione la imagen de Perfil</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 16px">
                            <label for="validationCustom05" class="form-label">Celular</label>
                            <input type="text" class="form-control" name="telefono" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!--<div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>-->

        </form><!-- End Custom Styled Validation -->

    </div>
</div>