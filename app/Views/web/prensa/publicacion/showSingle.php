<section class="section-box">
    <div class="box-head-single">
        <div class="container">
            <h3><?= $publicacion->titulo ?></h3>
            <ul class="breadcrumbs">
                <li><?= $publicacion->subtitulo ?></li>

            </ul>
        </div>
    </div>
</section>
<section class="section-box mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="single-image-feature">
                    <figure>
                        <img alt="<?= $publicacion->titulo ?>"
                             src="<?= base_url('uploads/') ?><?= $publicacion->url ?>"
                             class="img-rd-15"/>
                    </figure>
                </div>
                <div class="content-single">
                    <h5>Descripci&oacute;n</h5>
                    <p>
                        <?= $publicacion->descripcion ?>
                    </p>

                </div>

                <div class="author-single">
                    <span>Relaciones Internacionales UPEA</span>
                </div>

                <div class="single-apply-jobs">
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
                </div>

            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                <div class="sidebar-shadow">
                    <div class="sidebar-heading">
                        <div class="avatar-sidebar">
                            <figure><img alt="jobhub"
                                         src="<?= base_url('web/') ?>assets/imgs/page/job-single/avatar-job.png"/>
                            </figure>
                            <div class="sidebar-info">
                                <span class="sidebar-company">Relaciones <br> Internacionales</span>
                                <span class="sidebar-website-text"><?= base_url() ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-description mt-15">
                        <?= $publicacion->correlativo ?>
                    </div>


                </div>

                <?php if (!empty($publicacion->links)): ?>


                    <div class=" widget-categories ">
                        <div class="col-12">

                            <div class="d-grid gap-2">
                                <button class="btn-jf-personalizado"
                                        onclick="window.open('<?= $publicacion->links ?>', '_blank')">
                                    <i class="fa-brands fa-chrome"></i> Ir al Enlace
                                </button>
                            </div>

                        </div>

                    </div>
                <?php endif; ?>


                <?php if (!empty($archivosPublicacion)): ?>
                    <div class="sidebar-shadow widget-categories mt-40">
                        <h5 class="sidebar-title">Archivos Adjuntos</h5>
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

            </div>
        </div>
    </div>
</section>
