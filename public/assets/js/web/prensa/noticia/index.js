$(document).ready(function () {

    var dataTableNoticias = $('#dt_list_noticias').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        pageLength: 5,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            "url": "<?= base_url(route_to('webPrensaNoticia_list')); ?>",
            "type": "GET"
        },
        columns: [
            {"data": "id_publicaciones"},
            // {"data": "id_detalle_grupo"},
            // {"data": "id_tipo_convenio"},
            // {"data": "nombre_convenio"}
        ],
        dom: '<"d-flex justify-content-between"  p>',
        drawCallback: function (settings) {
            var api = this.api();
            var cards = $('#card-list-noticias');

            // Obtener información de la tabla
            var pageInfo = api.page.info();

            console.log(pageInfo)

            /* para aumentar un css o clase */
            // $('#datatable_paginate').addClass('paginations-jf');

            cards.empty();


            api.rows().every(function () {
                var data = this.data();


                let iconCard = 'fa-regular fa-circle-xmark';
                let styleCard = 'color:green';
                let textEstadoCard = 'ACTIVO';

                let fechaActual = new Date();
                let anio = fechaActual.getFullYear();
                let mes = ('0' + (fechaActual.getMonth() + 1)).slice(-2);
                let dia = ('0' + fechaActual.getDate()).slice(-2);
                let fechaActualFormato = anio + '-' + mes + '-' + dia;


                if (fechaActualFormato > data.fecha_finalizacion) {
                    iconCard = 'fa-regular fa-circle-check';
                    styleCard = 'color:red';
                    textEstadoCard = 'CONCLUIDO'
                }

                let card = $(`
                    <div class="card-blog-1 mb-30 post-list hover-up wow animate__animated animate__fadeIn"
                         data-wow-delay=".0s">
                        <figure class="post-thumb contenedor-img">
                            <a href="<?= route_to('webPrensaNoticia_show','` + data.id_publicaciones + `')?>" class="">
                                <img alt="${data.titulo}" class="img-content" src="<?= base_url('uploads/') ?>${data.url}"/>
                            </a>
                        </figure>
                        <div class="card-block-info">
                            <h3 class="post-title mb-15 texto-truncado-jf"><a href="<?= route_to('webPrensaNoticia_show','` + data.id_publicaciones + `')?>">${data.titulo}</a></h3>
                            <div class="post-meta text-muted d-flex align-items-center mb-15">
                                <div class="author d-flex align-items-center mr-30">
                                    <img alt="jobhub" src="<?= base_url('web/') ?>assets/imgs/avatar/ava_16.png"/>
                                    <span>Relaciones Internacionales UPEA</span>
                                </div>
                                <div class="date">
                                    <span><i class="fi-rr-edit mr-5 text-grey-6"></i>${data.fecha}</span>
                                </div>
                            </div>
                            
                            
                            <div class="sub-texto-truncado-jf">
                                <p class="post-excerpt text-muted d-none d-lg-block ">
                                   ${data.subtitulo}
                                </p>
                                </div>
                      
                            <div class="card-2-bottom mt-30">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="keep-reading">
                                        <a href="<?= route_to('webPrensaNoticia_show','` + data.id_publicaciones + `')?>" class="btn btn-border btn-brand-hover">Ver M&aacute;s Detalle</a>
                                    </div>
                                    <div class="tags text-lg-end">
<!--                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Full-time</a>-->
<!--                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Brand</a>-->
                                        <a href="#" class="mt-10">
                                        <img alt="jobhub"  src="<?= base_url('web/') ?>assets/imgs/theme/icons/bookmark.svg"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 `);

                cards.append(card);
            });
        },
        order: [[0, "desc"]]
    });

    $('#dt_list_noticias').hide();


    $('#searchInput').on('keyup', function () {
        // Obtener el valor del input
        var value = $(this).val();

        // Buscar en el DataTable
        dataTableNoticias.search(value).draw();
    });
});



