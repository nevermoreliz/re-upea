$(document).ready(function () {

    var dataTablePublicaciones = $('#dt_list_publicacion').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        pageLength: 9,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            "url": "<?= base_url(route_to('webPrensaPublicacion_list')); ?>",
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
            var cards = $('#card-list-publicacion');

            // Obtener información de la tabla
            var pageInfo = api.page.info();

            console.log(pageInfo)
            // Actualizar contenido del label con la información de la tabla
            $('#text-table-info').html("Mostrando registros del <strong>" + (pageInfo.start + 1) + "</strong> al  <strong>" + pageInfo.end + "</strong> de un total de <strong>" + pageInfo.recordsDisplay + "</strong> registros");

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
                    <div class="col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                 data-wow-delay=".0s">
                                <div class="text-center card-grid-2-image contenedor-img">
                                    <a href="<?= route_to('webPrensaPublicacion_show','` + data.id_publicaciones + `')?>">
                                        <figure>
                                            <img class="img-content" alt="jobhub" src="<?= base_url('uploads/') ?>${data.url}"/>
                                        </figure>
                                    </a>
                                    <label class="btn-urgent btn-jf-personalizado-header" style="background-color: white">${data.fecha}</label>
                                </div>
                                <div class="card-block-info">
                                    <div class="row">
                                        <div class="col-lg-12 col-6">
                                            <a href="<?= route_to('webPrensaPublicacion_show','` + data.id_publicaciones + `')?>" class="card-2-img-text">
                                                <span class="card-grid-2-img-small bg-warning">
                                                    <img alt="jobhub" src="https://cdn-icons-png.flaticon.com/512/4113/4113045.png"/>
                                                </span>
                                                <span>Relaciones Internacionales UPEA</span>
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <h5 class="mt-20 texto-truncado-jf"><a href="<?= route_to('webPrensaPublicacion_show','` + data.id_publicaciones + `')?>">${data.titulo}</a></h5>
                                   
                                </div>
                            </div>
                        </div>
                 `);

                cards.append(card);
            });
        },
        order: [[0, "desc"]]
    });

    $('#dt_list_publicacion').hide();


    $('#searchInput').on('keyup', function () {
        // Obtener el valor del input
        var value = $(this).val();

        // Buscar en el DataTable
        dataTablePublicaciones.search(value).draw();
    });
});



