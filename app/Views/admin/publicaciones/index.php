<div class="pagetitle">
    <h1><?= $titleHeadContent; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item active"><?= $titleHeadContent ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">

                        <h5> Lista de Categorias para su publicaci&oacute;n</h5>

                    </div>

                    <!-- alerta o mensaje -->
                    <?php if (session('msg')) : ?>
                        <div class="alert alert-<?= session('msg.type'); ?> fade show" role="alert"
                             style="margin: 0px;">
                            <h6 style="margin: auto;"><?= session('msg.body'); ?></h6>
                        </div>
                    <?php endif; ?>


                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="dt_publicaciones" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NOMBRE CATEGORIA</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="col">1</td>
                            <td class="col">Publicaciones</td>
                            <td class="col">
                                <button type="button" class="btn btn-outline-primary btn-sm btn-category-publicacion"
                                        data-category="Publicaciones">
                                    Ver Lista
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col">2</td>
                            <td class="col">Noticias</td>
                            <td class="col">
                                <button type="button" class="btn btn-outline-primary btn-sm btn-category-publicacion"
                                        data-category="Noticias">
                                    Ver Lista
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col">3</td>
                            <td class="col">Idiomas</td>
                            <td class="col">
                                <button type="button" class="btn btn-outline-primary btn-sm btn-category-publicacion"
                                        data-category="Idiomas">
                                    Ver Lista
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col">4</td>
                            <td class="col">Becas</td>
                            <td class="col">
                                <button type="button" class="btn btn-outline-primary btn-sm btn-category-publicacion"
                                        data-category="Becas">
                                    Ver Lista
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col">5</td>
                            <td class="col">Pasantias</td>
                            <td class="col">
                                <button type="button" class="btn btn-outline-primary btn-sm btn-category-publicacion"
                                        data-category="Pasantias">
                                    Ver Lista
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

