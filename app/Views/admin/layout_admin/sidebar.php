<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link menu--link" href="<?= base_url(route_to('dashboard')); ?>">
                <i class="bi bi-grid"></i>
                <span>Panel Principal</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item" style="display: none">
            <a class="nav-link collapsed menu--link" href="<?= base_url(route_to('index_publicacion')); ?>">
                <i class="bi bi-grid"></i>
                <span>Publicaciones</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Convenios</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url(route_to('convenioNacional_index')) ?>" class="menu--link">
                        <i class="bi bi-circle"></i><span>Nacionales</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(route_to('index_internacional')) ?>" class="menu--link">
                        <i class="bi bi-circle"></i><span>Internacionales</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item" style="display: none">
            <a class="nav-link collapsed" data-bs-target="#components-movilidad" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Movilidad</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-movilidad" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="components-alerts.html" class="menu--link">
                        <i class="bi bi-circle"></i><span>Becas</span>
                    </a>
                </li>

                <li>
                    <a href="components-alerts.html" class="menu--link">
                        <i class="bi bi-circle"></i><span>Docente - Administrativa</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html" class="menu--link">
                        <i class="bi bi-circle"></i><span>Estudiantil</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-heading">Convenios Instituciones</li>

        <li class="nav-item">
            <a class="nav-link collapsed menu--link" href="<?= base_url(route_to('enlace_index')) ?>">
                <i class="bi bi-person"></i>
                <span>Instituciones</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-heading">Administraci&oacute;n Sistemas</li>


        <li class="nav-item" style="display: none">
            <a class="nav-link collapsed" data-bs-target="#components-tipos" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Tipos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-tipos" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#" class="menu--link">
                        <i class="bi bi-circle"></i><span>Enlace - Instituci&oacute;n</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html" class="menu--link">
                        <i class="bi bi-circle"></i><span>Publicaci&oacute;n</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item" style="display: none">
            <a class="nav-link collapsed menu--link" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Gesti&oacute;n</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item" style="display: none">
            <a class="nav-link collapsed menu--link" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Paises</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed menu--link" href="<?= base_url(route_to('index_usuario')); ?>">
                <i class="bi bi-person"></i>
                <span>Usuarios</span>
            </a>
        </li><!-- End Usuarios Page Nav -->

        <li class="nav-heading">Configuracion de la Pagina</li>

        <li class="nav-item">
            <a class="nav-link collapsed menu--link" href="<?= base_url(route_to('index_internacional')) ?>">
                <i class="bi bi-person"></i>
                <span>Perfil Instituci&oacute;n</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed menu--link" href="<?= base_url(route_to('index_internacional')) ?>">
                <i class="bi bi-envelope"></i>
                <span>Contacto</span>
            </a>
        </li><!-- End Contact Page Nav -->

    </ul>

</aside>