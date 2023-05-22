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
                        <!--<div class="banner-description mt-30 mb-50 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s"
                             style="color:#fff;font-size: 18px;font-family: 'Lato Light';text-align: justify">
                            Visita el sitio web, de Relaciones Nacionales e Internacionales DRNI de la UPEA, en
                            búsca de becas, convenios, movilidad, etc.
                        </div>-->

                        <div class="banner-description mt-30 mb-50 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s"
                             style="color:#fff;font-size: 18px;font-family: 'Lato Light';text-align: justify">
                            Descubre la Unidad de Relaciones Internacionales de nuestra universidad, impulsando la
                            interculturalidad y la colaboración global. Conectando estudiantes y promoviendo
                            oportunidades internacionales para un futuro sin fronteras.
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

<section class="section-box mt-65 mb-50">
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

                <button class="btn-jf-personalizado mt-15"
                        onclick="window.location.href='<?= route_to('en_construccion') ?>'">
                    Ir a Categorias
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
                    <a href="<?= route_to('en_construccion') ?>">
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
                <a href="<?= route_to('en_construccion') ?>">
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
                <a href="<?= route_to('en_construccion') ?>">
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

<section class="section-box mt-50 mb-50">
    <div class="container">

        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Publicaciones Recientes
                </h2>
                <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">
                    Explora nuestras <strong>publicaciones</strong> y mantente actualizado con lo último, descubre
                    contenido relevante y de calidad cuidadosamente seleccionado para mantenerte
                    informado.</p>
            </div>
            <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <!--                <a href="job-grid-2.html" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Mostrar-->
                <!--                    M&aacute;s</a>-->

                <button class="btn-jf-personalizado mt-15"
                        onclick="window.location.href='<?= route_to('webPrensaPublicacion_index') ?>'">
                    Mostrar M&aacute;s Publicaciones
                </button>
            </div>
        </div>

        <div class="mt-70">
            <article>
                <div class="row">
                    <?php foreach ($publicaciones as $publicacion): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up wow animate__animated animate__fadeInUp">
                                <div class="text-center card-grid-2-image contenedor-img">
                                    <a href="<?= route_to('webPrensaPublicacion_show', $publicacion->id_publicaciones) ?>">
                                        <figure>
                                            <img class="img-content"
                                                 src="<?= base_url('uploads/') . $publicacion->url ?>"
                                                 alt="<?= $publicacion->titulo ?>">
                                        </figure>
                                    </a>
                                    <label class="btn-urgent btn-jf-personalizado-header"
                                           style="background-color: white"><?= $publicacion->fecha ?></label>
                                    <!--<label class="btn-urgent"><? /*= $publicacion->fecha */ ?></label>-->
                                </div>
                                <div class="card-block-info" style="padding: 15px">
                                    <div class="row">
                                        <div class="col-lg-12 col-6">
                                            <a href="<?= route_to('webPrensaPublicacion_show', $publicacion->id_publicaciones) ?>"
                                               class="card-2-img-text">
                                                <span class="card-grid-2-img-small bg-warning">
                                                    <img alt="jobhub"
                                                         src="<?= base_url() ?>/assets/img-global/profile/user-2.png">
                                                </span>
                                                <span style="font-family: 'Montserrat', 'Calibri Light',sans-serif;"><strong>Relaciones Internacionales UPEA</strong></span>
                                            </a>
                                        </div>

                                    </div>
                                    <h5 class="mt-20 texto-truncado-jf">
                                        <a href="<?= route_to('webPrensaPublicacion_show', $publicacion->id_publicaciones) ?>"><strong><?= strtoupper($publicacion->titulo) ?></strong></a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>

        </div>
    </div>
</section>


<section class="section-box mt-50 mb-50 bg-patern" style="background-color: #fab005">
    <div class="container">
        <article>
            <div class="row">
                <div class="col-lg-6 col-sm-12" style="margin: auto">
                    <div class="content-job-inner">
                        <h2 class="section-title heading-lg wow animate__animated animate__fadeInUp">
                            Noticia<br> <?= $noticia->fecha ?>
                        </h2>

                        <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp texto-truncado-jf-2-line">
                        <span style="font-family:  'Montserrat', sans-serif;
                        font-size: 20px;
                        color: #003061;
                        font-weight: 700;
                        line-height: 24px;"><?= $noticia->titulo ?></span>
                        </div>
                        <div style="text-align: justify"
                             class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp texto-truncado-jf-3-line">
                            <?= $noticia->subtitulo ?>
                        </div>
                        <div class="mt-40">
                            <!--<div class="box-button-shadow wow animate__animated animate__fadeInUp">
                                <a href="#" class="btn btn-default">Post
                                    a job now
                                </a>
                            </div>-->


                            <button class="btn-jf-personalizado wow animate__animated animate__fadeInUp mt-10"
                                    style="width: 100%"
                                    onclick="window.location.href='<?= route_to('webPrensaNoticia_show', $noticia->id_publicaciones) ?>'">
                                Ir a la Noticia
                            </button>

                            <button class="btn-jf-personalizado-azul wow animate__animated animate__fadeInUp mt-10"
                                    style="width: 100%"
                                    onclick="window.location.href='<?= route_to('webPrensaNoticia_index') ?>'">
                                Mostrar M&aacute;s Noticias
                            </button>
                            <!--<a href="#" class="btn btn-link wow animate__animated animate__fadeInUp">Learn more</a>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="box-image-job contenedor-img-noticia">
                        <figure class=" wow animate__animated animate__fadeIn">
                            <a href="<?= route_to('webPrensaNoticia_show', $noticia->id_publicaciones) ?>">
                                <img style="object-fit: cover; border: 1px solid slategrey; border-radius: 5px"
                                     class="img-content-noticia"
                                     alt="jobhub"
                                     src="<?= base_url('uploads/') . $noticia->url ?>"/>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>


<section class="section-box mt-50 mb-50 mb-md-0">
    <div class="container">
        <div class="mw-650">
            <h4 class="text-center wow animate__animated animate__fadeInUp">
                Visitas y convenios en crecimiento, impulsando nuestras alianzas internacionales.
            </h4>
        </div>
        <div class="row mt-60">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30">
                <div class="card-none-bd hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    <div class="block-image">
                        <figure><img alt="jobhub"
                                     src="<?= base_url('web/') ?>assets/imgs/page/services/ready-project.svg"/></figure>
                    </div>
                    <div class="card-info-bottom">
                        <h3><span class="count">15</span>00+</h3>
                        <strong>Visitas</strong>
                        <!--<p class="text-mutted">Gracias por tu visita</p>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30">
                <div class="card-none-bd hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="block-image">
                        <figure><img alt="jobhub"
                                     src="<?= base_url('web/') ?>assets/imgs/page/services/candidate-call.svg"/>
                        </figure>
                    </div>
                    <div class="card-info-bottom">
                        <h3><span class="count">8</span>00K</h3>
                        <strong>Convenios</strong>
                        <!--<p class="text-mutted">Revisa nuestros convenios</p>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

