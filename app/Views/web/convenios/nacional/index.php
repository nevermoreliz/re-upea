<section class="section-box">
    <div class="box-head-single">
        <div class="container">
            <h3>BUSQUE Y DESCUBRA</h3>
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li>Jobs listing</li>
            </ul>
        </div>
    </div>
</section>

<section class="section-box mt-50">
    <div class="container">
        <div class="row flex-row-reverse">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
                <div class="content-page">

                    <div class="box-filters-job mt-15 mb-10">
                        <div class="row">
                            <div class="col-lg-7">
                                <span id="text-table-info"
                                      class="text-small">

                                </span>
                            </div>
                            <div class="col-lg-5 text-lg-end mt-sm-15">

                                <div class="display-flex2">
                                    <!--                                    <span class="text-sortby">mostrar :</span>-->
                                    <!--                                    <div class="dropdown dropdown-sort">-->
                                    <!--                                        <button class="btn dropdown-toggle" type="button" id="dropdownSort"-->
                                    <!--                                                data-bs-toggle="dropdown" aria-expanded="false"-->
                                    <!--                                                data-bs-display="static"><span>vigentes</span> <i-->
                                    <!--                                                    class="fi-rr-angle-small-down"></i></button>-->
                                    <!--                                        <ul class="dropdown-menu dropdown-menu-light"-->
                                    <!--                                            aria-labelledby="dropdownSort">-->
                                    <!--                                            <li><a class="dropdown-item active" href="#">vigentes</a></li>-->
                                    <!--                                            <li><a class="dropdown-item" href="#">pasados</a></li>-->
                                    <!---->
                                    <!--                                        </ul>-->
                                    <!--                                    </div>-->
                                    <div class="box-view-type">
                                        <a href="job-grid.html"
                                           class="view-type">
                                            <img src="<?= base_url() ?>web/assets/imgs/theme/icons/icon-list.svg"
                                                 alt="jobhub"/>
                                        </a>
                                        <a href="list-nacional-tabla.html" class="view-type">
                                            <img src="<?= base_url() ?>web/assets/imgs/theme/icons/icon-grid.svg"
                                                 alt="jobhub"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-30">
                        <label for="inputName5" class="form-label">Buscar por: [ Titulo, Institucion, Objetivos, Fecha
                            de Inicio o Fin ]</label>
                        <!--                        <input type="text" id="searchInput" class="form-control input" name="searchInput" style="border: #013953">-->
                        <input type="text" placeholder="Criterio de Busqueda" id="searchInput" name="searchInput"
                               class="input" autocomplete="off">
                    </div>


                    <div class="job-list-list">
                            <div class="list-recent-jobs">

                                <div id="card-list" class="row"></div>

                            </div>
                    </div>

                    <table class="table" id="datatable">
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</section>