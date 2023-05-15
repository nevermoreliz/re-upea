<header class="header sticky-bar">
    <!-- nav-menu -->
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <!-- <a href="index.html" class="d-flex"><img alt="jobhub" src="assets/imgs/theme/jobhub-logo.svg" /></a> -->
                    <a href="<?= route_to('web_index') ?>" class="d-flex">
                        <img alt="jobhub"
                             src="<?= base_url(); ?>web/assets/imgs/img-pagina/LOGO-MEJORADO-dorado.svg"/>
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li class="">
                                <a class="active" href="<?= route_to('web_index') ?>">Inicio</a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                </ul> -->
                            </li>
                            <li class="has-children">
                                <a href="javascript:void(0)">Institucional</a>
                                <ul class="sub-menu">
                                    <li><a href="<?= route_to('institucional_index') ?>">Visi&oacute;n Y
                                            Misi&oacute;n</a></li>
                                </ul>
                            </li>

                            <li class="has-children">
                                <a href="javascript:void(0)">Convenios</a>
                                <ul class="sub-menu">
                                    <li><a href="<?= route_to('webConvenioNacional_index') ?>">Nacional</a></li>
                                    <li><a href="<?= route_to('webConvenioInternacional_index') ?>">Internacional</a></li>
                                    <!--<li><a href="<? /*= route_to('convenioIdioma_index') */ ?>">Idiomas</a></li>-->
                                    <!--                                    <li class="hr"><span></span></li>-->
                                    <!--                                    <li><a href="employers-list.html">Membresias</a></li>-->
                                </ul>
                            </li>

                            <!-- <li class="has-children">
                                 <a href="javascript:void(0)">Becas Y Movilidad</a>
                                 <ul class="sub-menu">
                                     <li><a href="candidates-grid.html">Becas</a></li>
                                     <li><a href="candidates-grid-2.html">Movilidad Docente/Administrativo</a></li>
                                     <li><a href="candidates-list.html">Movilidad Estudiante</a></li>
                                 </ul>
                             </li>-->

                            <li class="has-children">
                                <a href="javascript:void(0)">Prensa</a>
                                <ul class="sub-menu">
                                    <li><a href="<?= route_to('prensaPublicacion_index') ?>">Publicaciones</a></li>
                                    <li><a href="<?= route_to('prensaNoticia_index') ?>">Noticias</a></li>
                                    <!--<li><a href="<? /*= route_to('prensaIdioma_index') */ ?>">Idiomas</a></li>-->
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>

            <!-- SECCION 2 DEL MENU DE NAVEGACIÓN -->
            <!--<div class="header-right">
                <div class="block-signin">
                    <a href="<? /*= route_to('login'); */ ?>" class="btn btn-default btn-shadow ml-40 hover-up">Iniciar Sesi&oacute;n</a>
                </div>
            </div>-->

        </div>
    </div>

    <!-- nav-menu.mobile -->
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">

            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-search mobile-header-border mb-30 d-grid">
                        <a href="<?= route_to('login'); ?>" class="btn d-md-block btn-default btn-shadow hover-up">Iniciar
                            Sesi&oacute;n</a>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="">
                                    <a class="active" href="index.html">Inicio</a>
                                </li>

                                <li class="has-children">
                                    <a href="job-grid.html">Institucional</a>
                                    <ul class="sub-menu">
                                        <li><a href="job-grid.html">Visi&oacute;n y Misi&oacute;n</a></li>
                                    </ul>
                                </li>

                                <li class="has-children">
                                    <a href="employers-grid.html">Convenios</a>
                                    <ul class="sub-menu">
                                        <li><a href="employers-grid.html">Nacional</a></li>
                                        <li><a href="employers-grid-2.html">Internacional</a></li>
                                        <li><a href="employers-list.html">Idiomas</a></li>
                                        <li class="hr"><span></span></li>
                                        <li><a href="employers-single.html">Membresias</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="candidates-grid.html">Becas Y Movilidad</a>
                                    <ul class="sub-menu">
                                        <li><a href="candidates-grid.html">Becas</a></li>
                                        <li><a href="candidates-grid-2.html">Movilidad Docente/Administrativo</a></li>
                                        <li><a href="candidates-list.html">Movilidad Estudiante</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">Publicaciones</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid.html">Noticias</a></li>
                                        <li><a href="blog-grid-2.html">Eventos</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>

                    <div class="mobile-social-icon mt-10 mb-50">
                        <h6 class="mb-25">Follow Us</h6>
                        <a href="#"><img src="<?= base_url('web/') ?>assets/imgs/theme/icons/icon-facebook.svg"
                                         alt="jobhub"/></a>
                        <a href="#"><img src="<?= base_url('web/') ?>assets/imgs/theme/icons/icon-instagram.svg"
                                         alt="jobhub"/></a>
                        <a href="#"><img src="<?= base_url('web/') ?>assets/imgs/theme/icons/icon-youtube.svg"
                                         alt="jobhub"/></a>
                    </div>
                    <div class="site-copyright">2022 ©URNI <br/><strong>Designed By</strong> Unidad Relaciones
                        Nacionales e Internacionales de
                        la UPEA.
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>