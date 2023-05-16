<div class="breacrumb-cover">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li>Blog</li>
        </ul>
    </div>
</div>
<div class="archive-header pt-50 pb-50 text-center">
    <div class="container">
        <h3 class="mb-30 text-center w-75 mx-auto">
            <?= $publicacion->titulo ?>
        </h3>
        <div class="post-meta text-muted d-flex align-items-center mx-auto justify-content-center">
            <div class="author d-flex align-items-center mr-30">
                <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_16.png"/>
                <span>Relaciones Internacionales UPEA</span>
            </div>
            <div class="date mr-30">
                <span><i class="fi-rr-edit mr-5 text-grey-6"></i><?= $publicacion->fecha ?></span>
            </div>
            <div class="icons">
                <a href="javascript:void(0)"><i class="fi fi-rr-bookmark mr-5 text-muted"></i></a>
                <a href="javascript:void(0)"><i class="fi fi-rr-heart text-muted"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="post-loop-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-body">
                    <figure class="mb-30">
                        <img src="<?= base_url('uploads/') ?><?= $publicacion->url ?>" alt="">
                    </figure>
                    <div class="excerpt mb-30">
                        <p><?= ucfirst(strtolower($publicacion->subtitulo)); ?></p>
                    </div>
                    <div class="single-content">

                        <h4>Descripci&oacute;n</h4>
                        <p><?= ucfirst(strtolower($publicacion->descripcion)); ?></p>


                    </div>


                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">

                <?php if (!empty($publicacion->links)): ?>
                    <div class="widget_search mb-40">
                        <div class="search-form">
                            <div class="d-grid gap-2">
                                <button class="btn-jf-personalizado"
                                        onclick="window.open('<?= $publicacion->links ?>', '_blank')">
                                    <i class="fa-brands fa-chrome"></i> IR AL ENLACE
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($archivosPublicacion)): ?>
                    <div class="sidebar-shadow widget-categories">
                        <h5 class="sidebar-title">Category</h5>
                        <ul>
                            <?php foreach ($archivosPublicacion as $key => $archivoPublicacion) : ?>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="<?= base_url('uploads/' . $archivoPublicacion->nombre_archivo) ?>">Documento</a>
                                    <span class="count"><?= ($key + 1) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="sidebar-shadow sidebar-news-small">
                    <h5 class="sidebar-title">Latest news</h5>
                    <div class="post-list-small">
                        <div class="post-list-small-item d-flex align-items-center">
                            <figure class="thumb mr-15">
                                <img src="<?= base_url('web/') ?>assets/imgs/blog/thumb-1.png" alt="">
                            </figure>
                            <div class="content">
                                <h5>You Should Have This Info Before Job Interview</h5>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-20">
                                        <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_1.png">
                                        <span>Sarah</span>
                                    </div>
                                    <div class="date">
                                        <span>02 Oct</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-list-small-item d-flex align-items-center">
                            <figure class="thumb mr-15">
                                <img src="<?= base_url('web/') ?>assets/imgs/blog/thumb-2.png" alt="">
                            </figure>
                            <div class="content">
                                <h5>How To Create a Resume for a Job in Social</h5>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-20">
                                        <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_3.png">
                                        <span>Harding</span>
                                    </div>
                                    <div class="date">
                                        <span>17 Sep</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-list-small-item d-flex align-items-center">
                            <figure class="thumb mr-15">
                                <img src="<?= base_url('web/') ?>assets/imgs/blog/thumb-3.png" alt="">
                            </figure>
                            <div class="content">
                                <h5>10 Ways to Avoid a Referee Disaster Zone</h5>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-20">
                                        <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_5.png">
                                        <span>Steven</span>
                                    </div>
                                    <div class="date">
                                        <span>23 Sep</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-list-small-item d-flex align-items-center">
                            <figure class="thumb mr-15">
                                <img src="<?= base_url('web/') ?>assets/imgs/blog/thumb-4.png" alt="">
                            </figure>
                            <div class="content">
                                <h5>How To Set Work-Life Boundaries From Any Location</h5>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-20">
                                        <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_6.png">
                                        <span>Merias</span>
                                    </div>
                                    <div class="date">
                                        <span>14 Sep</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-list-small-item d-flex align-items-center">
                            <figure class="thumb mr-15">
                                <img src="<?= base_url('web/') ?>assets/imgs/blog/thumb-5.png" alt="">
                            </figure>
                            <div class="content">
                                <h5>How to Land Your Dream Marketing Job</h5>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-20">
                                        <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_7.png">
                                        <span>Rosie</span>
                                    </div>
                                    <div class="date">
                                        <span>12 Sep</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-shadow">
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
                </div>
                <div class="sidebar-normal">
                    <div>
                        <h6 class="small-heading">Are you also hiring?</h6>
                        <ul class="ul-lists">
                            <li><a href="#">Writing & Translation</a></li>
                            <li><a href="#">Video & Animation</a></li>
                            <li><a href="#">Music & Audio</a></li>
                            <li><a href="#">Digital Marketing</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Programming & Tech</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
