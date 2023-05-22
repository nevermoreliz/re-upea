<div class="breacrumb-cover">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="javascript:void(0)">Inicio</a></li>
            <li><a href="javascript:void(0)">Noticia</a></li>
            <li>Detalle</li>
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
                <img alt="jobhub" src="<?= base_url() ?>/assets/img-global/profile/user-2.png"/>
                <span style="font-family: 'Muli','Calibri Light',sans-serif;color: #003061"><strong>Relaciones Internacionales UPEA</strong></span>
            </div>
            <div class="date mr-30">
                <span style="font-family: 'Muli','Calibri Light',sans-serif;color: #003061"><i class="fi-rr-edit mr-5 text-grey-6"></i><?= $publicacion->fecha ?></span>
            </div>
            <div class="icons">
                <a href="#"><i class="fi fi-rr-bookmark mr-5 text-muted"></i></a>
                <a href="#"><i class="fi fi-rr-heart text-muted"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="post-loop-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="single-body">
                    <figure class="mb-30">
                        <img src="<?= base_url('uploads/') . $publicacion->url ?>"
                             alt="<?= $publicacion->titulo ?>">
                    </figure>
                    <div class="excerpt mb-30">
                        <p><?= ucwords($publicacion->subtitulo) ?></p>
                    </div>
                    <div class="single-content">

                        <h4>Detalle</h4>
                        <p><?= $publicacion->descripcion ?></p>
                       
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
