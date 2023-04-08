<div class="card">
    <div class="card-body">
        <h5 class="card-title"></h5>


        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="validationCustom01" value="John" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="validationCustom02" value="Doe" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Materno</label>
                <input type="text" class="form-control" id="validationCustom02" value="Doe" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Correo Electronico</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Cargo</label>
                <select class="form-select" id="validationCustom04" required>
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
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>

            <!--<div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>-->

        </form><!-- End Custom Styled Validation -->

    </div>
</div>