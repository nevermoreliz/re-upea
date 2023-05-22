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
                        <div class="col-lg-5">
                            <figure class="post-thumb">
                                <a href="blog-single.html">
                                    <img style="width: 275px;height: 272px;object-fit: cover;"
                                         alt="${data.titulo}"
                                         src="<?= base_url('uploads/') ?>${data.url}"/>
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-7">
                            <div class="card-block-info">
                                <h3 class="post-title mb-15 texto-truncado-jf"><a href="<?= route_to('webPrensaNoticia_show','` + data.id_publicaciones + `')?>">${data.titulo}</a></h3>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-30">
                                        <img alt="jobhub" src="<?= base_url() ?>/assets/img-global/profile/user-2.png"/>
                                        <span style="font-family: 'Montserrat', 'Calibri Light',sans-serif;color: #003061"><strong>Relaciones Internacionales UPEA</strong></span>
                                    </div>
                                    
                                </div>
                               <div class="texto-truncado-jf-4-line">
                                    <p class="post-excerpt d-none d-lg-block" 
                                       style="font-family: 'Muli','Calibri Light',sans-serif;color: #003061">
                                       ${data.subtitulo.toLowerCase()}
                                    </p>
                               </div>
                               
                                <div class="card-2-bottom mt-30">
                                    <div class="d-flex align-items-center justify-content-between">
                                         <button class="btn-jf-personalizado-blog-list-azul"
                                                 onclick="window.location.href='<?= route_to('webPrensaNoticia_show','` + data.id_publicaciones + `')?>'">
                                             Ver Detalle Noticia
                                         </button>
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



