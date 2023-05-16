<section class="section-box-2">
    <div class="box-head-single none-bg">
        <div class="container">
            <h4>Publicaciones</h4>
            <div class="row mt-15 mb-40">
                <div class="col-lg-7 col-md-9">
                            <span class="text-mutted">Realize su busqueda de nuestras publicaciones.</span>
                </div>
                <div class="col-lg-5 col-md-3 text-lg-end text-start">
                    
                    <!-- <ul class="breadcrumbs mt-sm-15">
                        <li><a href="#">Home</a></li>
                        <li>Jobs listing</li>
                    </ul> -->

                </div>
            </div>
            <div class="box-shadow-bdrd-15 box-filters">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="box-search-job">
                            <form class="form-search-job">
                                <input id="searchInput" type="text" class="input-search-job" placeholder="UI Designer"/>
                            </form>
                        </div>

                    </div>

                    <!-- <div class="col-lg-7">
                        <div class="d-flex job-fillter">
                            <div class="d-block d-lg-flex">
                                <div class="dropdown job-type">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownJobType"
                                            data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true"
                                            data-bs-display="static"><i class="fi-rr-briefcase"></i>
                                        <span>Full time</span> <i class="fi-rr-angle-small-down"></i></button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownJobType">
                                        <li><a class="dropdown-item active" href="#">Full time</a></li>
                                        <li><a class="dropdown-item" href="#">Part time</a></li>
                                        <li><a class="dropdown-item" href="#">Freelancer</a></li>
                                        <li><a class="dropdown-item" href="#">Online work</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownLocation"
                                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><i
                                                class="fi-rr-marker"></i> <span>New
                                                    York, USA</span> <i class="fi-rr-angle-small-down"></i></button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownLocation">
                                        <li><a class="dropdown-item active" href="#">New York, USA</a></li>
                                        <li><a class="dropdown-item" href="#">Dallas, USA</a></li>
                                        <li><a class="dropdown-item" href="#">Chicago, USA</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownLocation2"
                                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><i
                                                class="fi-rr-dollar"></i> <span>Salary Range</span> <i
                                                class="fi-rr-angle-small-down"></i></button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownLocation2">
                                        <li><a class="dropdown-item active" href="#">$100 - $500</a></li>
                                        <li><a class="dropdown-item" href="#">$500 - $1000</a></li>
                                        <li><a class="dropdown-item" href="#">$1000 - $1500</a></li>
                                        <li><a class="dropdown-item" href="#">$1500 - $2000</a></li>
                                        <li><a class="dropdown-item" href="#">Over $2000</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-button-find">
                                <button class="btn btn-default float-right">Find Now</button>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-80">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
                <div class="content-page">
                    <div class="box-filters-job mt-15 mb-10">

                        <div class="row">

                            <div class="col-lg-7">
                                <span class="text-small" id="text-table-info"></span>
                            </div>

                            <div class="col-lg-5 text-lg-end mt-sm-15">
                                <div class="display-flex2">
                                    <!--                                    <span class="text-sortby">Sort by:</span>-->
                                    <!---->
                                    <!--                                    <div class="dropdown dropdown-sort">-->
                                    <!--                                        <button class="btn dropdown-toggle" type="button" id="dropdownSort"-->
                                    <!--                                                data-bs-toggle="dropdown" aria-expanded="false"-->
                                    <!--                                                data-bs-display="static">-->
                                    <!--                                            <span>Newest Post</span>-->
                                    <!--                                            <i class="fi-rr-angle-small-down"></i>-->
                                    <!--                                        </button>-->
                                    <!--                                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">-->
                                    <!--                                            <li><a class="dropdown-item active" href="#">Newest Post</a></li>-->
                                    <!--                                            <li><a class="dropdown-item" href="#">Oldest Post</a></li>-->
                                    <!--                                            <li><a class="dropdown-item" href="#">Rating Post</a></li>-->
                                    <!--                                        </ul>-->
                                    <!--                                    </div>-->
                                    <!--                                    -->
                                    <div class="box-view-type">
                                        <a href="job-grid.html" class="view-type"><img
                                                    src="<?= base_url('web/') ?>assets/imgs/theme/icons/icon-list.svg"
                                                    alt="jobhub"/></a>
                                        <a href="job-list.html" class="view-type"><img
                                                    src="<?= base_url('web/') ?>assets/imgs/theme/icons/icon-grid.svg"
                                                    alt="jobhub"/></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="card-list-publicacion" class="row">
                        <!-- se agregara cards dinamicametne por el datatable -->
                    </div>

                    <table class="table" id="dt_list_publicacion">
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</section>
