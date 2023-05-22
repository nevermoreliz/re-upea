<section class="section-box">
    <div class="box-head-single box-head-single-candidate">
        <div class="container">
            <div class="heading-image-rd online">
                <a href="#">
                    <figure><img alt="jobhub"
                                 src="http://reupea.test/web/assets/imgs/img-pagina/home-convenios/bolivia-cubo.png">
                    </figure>
                </a>
            </div>
            <div class="heading-main-info">

                <h4><?= $convenioNacional->nombre_convenio ?></h4>
                <div class="head-info-profile">
                    <span class="text-small mr-20"><i
                                class="fi-rr-marker text-mutted"></i> <?= $convenioNacional->pais ?></span>
                    <span class="text-small mr-20"><i
                                class="fi-rr-briefcase text-mutted"></i> <?= $convenioNacional->nombre_enlace ?></span>

                    <span class="text-small mr-20"><i
                                class="fi-rr-clock text-mutted"></i> <strong>Fecha de Publicaci&oacute;n:</strong> <?= $convenioNacional->fecha_publicacion ?></span>
                </div>

                <div class="row align-items-end">
                    <div class="col-lg-6">

                        <a href="#" class="btn btn-tags-sm mb-10 mr-5"><?= $convenioNacional->estado_convenio ?></a>
                    </div>
                    <div class="col-lg-3">
                        <a href="<?= base_url('uploads/') ?><?= $convenioNacional->pdf_convenio ?>"
                           class="btn btn-default" target="_blank" download>Descargar
                            Pdf</a>
                    </div>

                    <!-- <div class="col-lg-3 text-lg-end">
                        <ul class="breadcrumbs mt-10">
                            <li><a href="#">Home</a></li>
                            <li>Danica Lewis</li>
                        </ul>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="content-single">
                    <img src="<?= base_url('uploads/') ?><?= $convenioNacional->img_convenio ?>"
                         alt="jobhub">
                    <div class="divider"></div>

                    <h4 class="mb-20">Objetivo del Convenio</h4>
                    <p>
                        <?= $convenioNacional->objetivo_convenio ?>
                    </p>

                    <div class="divider"></div>
                    <h4 class="mb-20 mt-25" style="display: none">Detalle Convenio Facultar</h4>
                    <div class="row" style="display: none">
                        <div class="col-lg-6">
                            <ul>
                                <li><strong>Tipo Facultad:</strong> Carrera</li>
                                <li><strong>Nombre:</strong> Ingenieria de Sistemas</li>
                            </ul>
                        </div>
                        <!--<div class="col-lg-6">
                            <p class="text-muted lh-32">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis illum fuga eveniet.
                                Deleniti asperiores, commodi quae ipsum quas est itaque
                            </p>
                        </div>-->
                    </div>

                    <div class="divider"></div>
                    <h4 class="mb-20 mt-25">Estado del Convenio</h4>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12 mb-30">
                            <strong class="text-md-bold">Fecha Inicio</strong>
                            <span class="dis-block text-muted text-md-lh24">
                                    <?= $convenioNacional->fecha_firma ?>
                            </span>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-30">
                            <strong class="text-md-bold">Fecha Finalización</strong>
                            <span class="dis-block text-muted text-md-lh24">
                                        <?= $convenioNacional->fecha_finalizacion ?>
                            </span>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-30">
                            <strong class="text-md-bold">Duración</strong>
                            <span class="dis-block text-muted text-md-lh24">
                                       <?= $convenioNacional->tiempo_duracion ?>
                            </span>
                        </div>

                    </div>


                </div>

                <!-- <div class="single-apply-jobs">
                    <div class="row ">

                        <div class="col-md-7  social-share">
                            <a href="#" class="btn btn-border btn-sm mr-10">
                                <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/theme/icons/share-fb.svg"/>
                                Compartir Facebook
                            </a>
                            <a href="#" class="btn btn-border btn-sm mr-10">
                                <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/theme/icons/share-tw.svg"/>
                                Compartir Tweet
                            </a>

                        </div>
                    </div>
                </div> -->

            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                <div class="sidebar-shadow">
                    <h5 class="font-bold">Datos Instituci&oacute;n Convenio</h5>
                    <div class="sidebar-list-job mt-10">
                        <ul>
                            <li>

                                <div class="col-12">
                                    <div style="padding: var(--spacing-2xs) var(--spacing-sm); display: flex !important;">
                                        <div class="sidebar-icon-item" style="margin: auto">
                                            <i class="fas fa-university fa-lg"></i>
                                        </div>
                                        <span class="text-description"
                                              style="padding-left: 6px;font-family: 'Montserrat', 'Calibri Light',sans-serif;">Nombre Instituci&oacute;n</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-text-info">
                                        <p class="text-muted lh-32">
                                            <strong class="small-heading"><?= $convenioNacional->nombre_enlace ?></strong>
                                        </p>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="col-12">
                                    <div style="padding: var(--spacing-2xs) var(--spacing-sm); display: flex !important;">
                                        <div class="sidebar-icon-item" style="margin: auto">
                                            <i class="fas fa-globe-africa fa-lg"></i>
                                        </div>
                                        <span class="text-description"
                                              style="padding-left: 6px;font-family: 'Montserrat', 'Calibri Light',sans-serif;">
                                            Pais
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-text-info">
                                        <p class="text-muted lh-32">
                                            <strong class="small-heading"><?= $convenioNacional->pais ?></strong>
                                        </p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="col-12">
                                    <div style="padding: var(--spacing-2xs) var(--spacing-sm); display: flex !important;">
                                        <div class="sidebar-icon-item" style="margin: auto">
                                            <i class="fas fa-flag fa-lg"></i>
                                        </div>
                                        <span class="text-description"
                                              style="padding-left: 6px;font-family: 'Montserrat', 'Calibri Light',sans-serif;">
                                            Departamento o Estado
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-text-info">
                                        <p class="text-muted lh-32">
                                            <strong class="small-heading"><?= $convenioNacional->departamento ?></strong>
                                        </p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="col-12">
                                    <div style="padding: var(--spacing-2xs) var(--spacing-sm); display: flex !important;">
                                        <div class="sidebar-icon-item" style="margin: auto">
                                            <i class="fas fa-city fa-lg"></i>
                                        </div>
                                        <span class="text-description"
                                              style="padding-left: 6px;font-family: 'Montserrat', 'Calibri Light',sans-serif;">
                                            Ciudad
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-text-info">
                                        <p class="text-muted lh-32">
                                            <strong class="small-heading"><?= $convenioNacional->ciudad ?></strong>
                                        </p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="col-12">
                                    <div style="padding: var(--spacing-2xs) var(--spacing-sm); display: flex !important;">
                                        <div class="sidebar-icon-item" style="margin: auto">
                                            <i class="fa-solid fa-diamond-turn-right fa-lg"></i>
                                        </div>
                                        <span class="text-description"
                                              style="padding-left: 6px;font-family: 'Montserrat', 'Calibri Light',sans-serif;">
                                            Direcci&oacute;n
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-text-info">
                                        <p class="text-muted lh-32">
                                            <strong class="small-heading"><?= $convenioNacional->direccion ?></strong>
                                        </p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="col-12">
                                    <div style="padding: var(--spacing-2xs) var(--spacing-sm); display: flex !important;">
                                        <div class="sidebar-icon-item" style="margin: auto">
                                            <i class="fa-regular fa-envelope fa-lg"></i>
                                        </div>
                                        <span class="text-description"
                                              style="padding-left: 6px;font-family: 'Montserrat', 'Calibri Light',sans-serif;">
                                            Correo Electronico
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-text-info">
                                        <p class="text-muted lh-32">
                                            <strong class="small-heading"><?= $convenioNacional->correo ?></strong>
                                        </p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <button class="btn-jf-personalizado" style="margin-top: 10px; width: 100%"
                                        onclick="window.location.href="<?= $convenioNacional->links_enlace ?>">
                                IR PAGINA WEB
                                </button>
                            </li>
                        </ul>
                    </div>


                    <div class="sidebar-team-member none-bd pt-10">
                        <h6 class="small-heading">LOGO INSTITUCI&Oacute;N</h6>

                        <div class="sidebar-list-member sidebar-list-follower">

                            <img alt="jobhub"
                                 src="<?= base_url('uploads/') ?><?= $convenioNacional->url_enlace ?>"/>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
</section>

