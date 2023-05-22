<div class="breacrumb-cover">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#">Inicio</a></li>
            <li>Noticias</li>
        </ul>
    </div>
</div>
<div class="archive-header pt-50 pb-50 text-center">
    <div class="container">

        <h3 class="mb-30 text-center w-75 mx-auto">
            Revise Nuestras Ultimas Noticias
        </h3>

    </div>
</div>

<div class="post-loop-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="post-listing" id="card-list-noticias">
                    <!-- recomendado 5 en linea -->

                </div>

                <table class="table" id="dt_list_noticias">
                    <tbody>

                    </tbody>
                </table>
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">

                <div class="widget_search mb-40">
                    <div class="search-form">
                        <form action="#">
                            <input id="searchInput" type="text" placeholder="Buscar. . ."
                                   style="border: 1px solid #0CC074 !important;">
                            <button><i class="fi-rr-search"></i></button>
                        </form>
                    </div>
                </div>

                <!-- <div class="sidebar-shadow widget-categories">
                    <h5 class="sidebar-title">Category</h5>
                    <ul>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="blog-grid.html">Recruitment News</a>
                            <span class="count">28</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="blog-grid.html">Job Venues</a>
                            <span class="count">32</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="blog-grid.html">Full Time Job</a>
                            <span class="count">45</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="blog-grid.html">Work From Home</a>
                            <span class="count">68</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="blog-grid.html">Job Tips</a>
                            <span class="count">43</span>
                        </li>
                    </ul>
                </div> -->

                <div class="sidebar-shadow sidebar-news-small" style="background-color: #003061">
                    <h5 class="sidebar-title" style="color: #0CC074">Ultimas Publicaciones</h5>
                    <div class="post-list-small">
                        <article>
                            <?php foreach ($publicaciones as $publicacion): ?>
                                <div class="post-list-small-item d-flex align-items-center">
                                    <figure class="thumb mr-15">
                                        <a href="<?= route_to('webPrensaPublicacion_show', $publicacion->id_publicaciones) ?>"
                                           target="_blank">
                                            <img style="width: 85px;height: 85px; object-fit: cover;border-radius: 5px"
                                                 src="<?= base_url('uploads/') . $publicacion->url ?>"
                                                 alt="<?= $publicacion->titulo ?>">
                                        </a>

                                    </figure>

                                    <a href="<?= route_to('webPrensaPublicacion_show', $publicacion->id_publicaciones) ?>"
                                       target="_blank">
                                        <div class="content">

                                            <h5 class="texto-truncado-jf-2-line text-white">
                                                <?= strtoupper($publicacion->titulo) ?>
                                            </h5>

                                            <div class="post-meta text-muted d-flex align-items-center mb-15">
                                                <div class="date">
                                                    <span style="color: #0CC074"><?= $publicacion->fecha ?></span>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </article>
                    </div>
                </div>

                <!-- <div class="sidebar-shadow">
                    <h5 class="sidebar-title">Popular Tags</h5>
                    <div class="block-tags">
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Figma</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Adobe XD</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">PSD</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">HTML 5</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Css 3</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Javascript</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Jquery</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">NodeJS</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">MongoDb</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">SEO expert</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Gimp</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">PSD</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Photo editing</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Sketch</a>
                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">jam</a>
                    </div>
                </div> -->

            </div>
        </div>


    </div>
</div>

<!--<section class="section-box mt-50 mb-60">-->
<!--    <div class="container">-->
<!--        <div class="box-newsletter">-->
<!--            <h5 class="text-md-newsletter">Sign up to get</h5>-->
<!--            <h6 class="text-lg-newsletter">the latest jobs</h6>-->
<!--            <div class="box-form-newsletter mt-30">-->
<!--                <form class="form-newsletter">-->
<!--                    <input type="text" class="input-newsletter" value="" placeholder="contact.alithemes@gmail.com"/>-->
<!--                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="box-newsletter-bottom">-->
<!--            <div class="newsletter-bottom"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->