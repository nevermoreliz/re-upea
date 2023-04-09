<div class="">
    <div class="card-body" style="padding-top:20px;">
        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" novalidate autocomplete="off">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Paterno</label>
                <input type="text" class="form-control" name="paterno" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Materno</label>
                <input type="text" class="form-control" name="materno" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Correo Electronico</label>
                <input type="text" class="form-control" name="email" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Cargo</label>
                <select class="form-select" name="cargo" id="validationCustom04" required>
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
                <label for="validationCustom05" class="form-label">C.I.</label>
                <input type="text" class="form-control" name="ci" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4" style="margin: auto;">
                        <div class="d-flex flex-column align-items-center text-center"
                             style="border: 1px solid #014464 ; border-radius: 15px">
                            <img class="rounded-circle" width="130px"
                                 src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

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