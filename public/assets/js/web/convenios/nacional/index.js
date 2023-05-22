$(document).ready(function () {

    var dataTable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            "url": "<?= base_url(route_to('webConvenioNacional_list')); ?>",
            "type": "GET"
        },
        columns: [
            {"data": "id_convenios"},
            // {"data": "id_detalle_grupo"},
            // {"data": "id_tipo_convenio"},
            // {"data": "nombre_convenio"}
        ],
        dom: '<"d-flex justify-content-between"  p>',
        drawCallback: function (settings) {
            var api = this.api();
            var cards = $('#card-list');

            // Obtener información de la tabla
            var pageInfo = api.page.info();
            // Actualizar contenido del label con la información de la tabla
            $('#text-table-info').html('Mostrando registros del ' + (pageInfo.start + 1) + ' al  ' + pageInfo.end + ' de un total de ' + pageInfo.recordsTotal + ' registros');

            /* para aumentar un css o clase */
            // $('#datatable_paginate').addClass('paginations-jf');

            cards.empty();


            api.rows().every(function () {
                var data = this.data();
                // var card = $('<div class="col-md-4">' +
                //     '<div class="card">' +
                //     '<div class="card-body">' +
                //     '<h5 class="card-title">' + data.nombre_convenio + '</h5>' +
                //     '<p class="card-text">' + data.nombre_convenio + '</p>' +
                //     '<a href="#" class="btn btn-primary">Ver más</a>' +
                //     '</div>' +
                //     '</div>' +
                //     '</div>');

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
                <div>
                      <div class="card-job hover-up wow animate__animated animate__fadeIn">
                                <div class="card-job-top">
                                    <div class="card-job-top--image">
                                        <figure>
                                            <!-- <img alt="jobhub" src="<?= base_url() ?>web/assets/imgs/page/job/digital.png" /> -->
                                            <img alt="jobhub"
                                                 src="<?= base_url() ?>web/assets/imgs/img-pagina/home-convenios/bolivia-cubo.png"/>
                                        </figure>
                                    </div>
                                    <div class="card-job-top--info">
                                        <h6 class="card-job-top--info-heading"><a
                                                    href="<?= route_to('webConvenioNacional_show','` + data.id_convenios + `')?>">${data.nombre_convenio}</a></h6>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                Entidad o Instituci&oacute;n:<a href="employers-grid.html"> <a
                                                            href="javascript:void(0)"><span
                                                                class="card-job-top--company">${data.nombre_enlace}</span></a></a>
                                                <span class="card-job-top--location text-sm"><i
                                                            class="fi-rr-marker"></i> ${data.pais}</span>
                                                <!-- <span class="card-job-top--type-job text-sm">
                                                    <i class="fi-rr-briefcase"></i>
                                                    Full time
                                                </span>
                                                <span class="card-job-top--post-time text-sm">
                                                    <i class="fi-rr-clock"></i>
                                                    3 mins ago
                                                </span> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-job-description mt-20">
                                    OBJETIVOS : <br>
                                   ${data.objetivo_convenio}
                                </div>
                                <div class="card-job-bottom mt-25">
                                    <div class="row">
                                        <div class="col-lg-9 col-sm-8 col-12">
                                            <button class="btn-jf-personalizado-cards-verde mt-10">
                                               <i class="fa fa-pdf"></i>   Inicio: ${data.fecha_firma}
                                            </button>
                                            <button class="btn-jf-personalizado-cards-rojo mt-10">
                                               <i class="fa fa-pdf"></i>  Fin: ${data.fecha_finalizacion}
                                            </button>

                                            <button class="btn-jf-personalizado-cards-red mt-10" onclick="window.open('<?= base_url() ?>uploads/` + data.pdf_convenio + `', '_blank')">
                                               <i class="fa fa-pdf"></i>  PDF
                                            </button>
                                                        
                                            <button class="btn-jf-personalizado-cards mt-10" onclick="window.location.href='<?= route_to('webConvenioNacional_show', '` + data.id_convenios + `') ?>'">
                                                <i class="fa fa-eye"></i> M&aacute;s Detalle
                                            </button>
                                                
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12 text-lg-end d-lg-block d-none">

                                            <span style="position: relative;bottom: -40px;right: 0;">
                                            <i class="` + iconCard + `" style="` + styleCard + `"></i>
<!--                                                <i class="fi-rr-shield-check" style="color:green"></i>-->
                                                <strong>${textEstadoCard}</strong>
                                            </span>
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

    $('#datatable').hide();


    $('#searchInput').on('keyup', function () {
        // Obtener el valor del input
        var value = $(this).val();

        // Buscar en el DataTable
        dataTable.search(value).draw();
    });
});



