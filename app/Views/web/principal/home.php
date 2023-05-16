<section class="section-box fondo-gradiente">
    <div class="banner-hero hero-1">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-8" style="margin:auto">

                    <div class="block-banner">
                        <!-- <span class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">Best jobs place</span> -->
                        <!-- <h1 class="heading-banner wow animate__animated animate__fadeInUp">The Easiest Way to Get Your New Job</h1> -->
                        <h1 class="heading-banner wow animate__animated animate__fadeInUp mt-50">UNIDAD DE
                            RELACIONES INTERNACIONALES</h1>
                        <!-- <div class="banner-description mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Each month, more than 3 million job seekers turn to website in their search for work, making over 140,000 applications every single day</div> -->
                        <div class="banner-description mt-30 mb-50 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s"
                             style="color:#fff;font-size: 18px;font-family: 'Lato Light';text-align: justify">
                            Visita el sitio web, de Relaciones Nacionales e Internacionales DRNI de la UPEA, en
                            búsca de becas, convenios, movilidad, etc.
                        </div>


                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin: auto">

                    <div class="banner-imgs" style="padding-top: 0px;">
                        <!-- IMAGEN 1 ANIAMTION -->
                        <!-- <img alt="jobhub" src="assets/imgs/banner/banner.png" class="img-responsive shape-1" /> -->
                        <img alt="logo-upea" src="<?= base_url(); ?>web/assets/imgs/banner/logo-upea.png"
                             class="img-responsive shape-1" style="z-index:9;"/>
                        <!-- <img alt="jobhub" src="assets/imgs/img-pagina/ESCUDO UPEA 21 .png"
                                class="img-responsive shape-1" style="z-index:9;" /> -->

                        <!-- IMAGEN 2 ANIAMTION -->
                        <!-- <span class="union-icon"><img alt="jobhub" src="assets/imgs/banner/union.svg"
                                    class="img-responsive shape-3" /></span> -->
                        <!-- <span class="union-icon"><img alt="jobhub"
                                    src="assets/imgs/banner/relaciones-internacionales.svg"
                                    class="img-responsive shape-3" /></span> -->

                        <!-- IMAGEN 3 ANIAMTION -->
                        <!-- <span class="congratulation-icon"><img alt="jobhub"
                                    src="assets/imgs/banner/congratulation.svg"
                                    class="img-responsive shape-2" /></span> -->


                        <!-- IMAGEN 4 ANIAMTION -->
                        <!-- <span class="docs-icon"><img alt="jobhub" src="assets/imgs/banner/docs.svg"
                                    class="img-responsive shape-2" /></span> -->
                        <!-- <span class="docs-icon"><img alt="jobhub" src="assets/imgs/banner/convenios.svg"
                                    class="img-responsive shape-2" /></span> -->

                        <!-- IMAGEN 5 ANIAMTION -->
                        <!-- <span class="course-icon"><img alt="jobhub" src="assets/imgs/banner/course.svg"
                                    class="img-responsive shape-3" /></span> -->

                        <!-- IMAGEN 6 ANIAMTION -->
                        <!-- <span class="web-dev-icon"><img alt="jobhub" src="assets/imgs/banner/web-dev.svg"
                                    class="img-responsive shape-3" /></span> -->

                        <!-- IMAGEN 7 ANIAMTION -->
                        <!-- <span class="tick-icon"><img alt="jobhub" src="assets/imgs/banner/tick.svg"
                                    class="img-responsive shape-3" /></span> -->
                        <!-- <span class="tick-icon"><img alt="jobhub" src="assets/imgs/banner/becas.svg"
                                    class="img-responsive shape-3" /></span> -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-65">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Buscar por Categoria
                </h2>
                <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">Encuentre el tipo
                    de
                    convenio, beca, movilidad que necesita saber,
                    toda informaci&oacute;n clara que nesesite saber.</p>
            </div>
            <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <!--                <a href="job-grid-2.html" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Mostrar-->
                <!--                    M&aacute;s</a>-->

                <button class="btn-jf-personalizado" onclick="window.location.href='<?= route_to('en_construccion')?>'">
                    Mostrar M&aacute;s
                </button>
            </div>
        </div>

        <div class="row mt-70">
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">

                <a href="<?= route_to('convenio_index') ?>">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp">
                        <div class="text-center">
                            <figure>
                                <img alt="jobhub"
                                     src="<?= base_url(); ?>web/assets/imgs/img-pagina/categorias-pagina/convenio.png"
                                     style="width: 85px"/>
                            </figure>
                        </div>
                        <h5 class="text-center mt-20 card-heading">
                            Convenios
                        </h5>
                        <!--<p class="text-center text-stroke-40 mt-20">156 Available Vacancy</p>-->
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <a href="<?= route_to('en_construccion')?>">
                        <div class="text-center">

                            <figure>
                                <img alt="jobhub"
                                     src="<?= base_url(); ?>web/assets/imgs/img-pagina/categorias-pagina/beca.png"
                                     style="width: 85px"/>
                            </figure>
                        </div>
                        <h5 class="text-center mt-20 card-heading">Becas </h5>
                        <!--<p class="text-center text-stroke-40 mt-20">268 Available Vacancy</p>-->
                    </a>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                 data-wow-delay=".2s">
                <a href="<?= route_to('en_construccion')?>">
                    <div class="card-grid hover-up">
                        <div class="text-center">

                            <figure>
                                <img alt="jobhub"
                                     src="<?= base_url(); ?>web/assets/imgs/img-pagina/categorias-pagina/movilidad.png"
                                     style="width: 85px"/>
                            </figure>
                        </div>
                        <h5 class="text-center mt-20 card-heading">Movilidad</h5>
                        <!--<p class="text-center text-stroke-40 mt-20">145 Available Vacancy</p>-->
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <a href="<?= route_to('en_construccion')?>">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="text-center">

                            <figure>
                                <img alt="jobhub"
                                     src="<?= base_url(); ?>web/assets/imgs/img-pagina/categorias-pagina/idiomas.png"
                                     style="width: 85px"/>
                            </figure>
                        </div>
                        <h5 class="text-center mt-20 card-heading">Idiomas </h5>
                        <!--<p class="text-center text-stroke-40 mt-20">236 Available Vacancy</p>-->
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>