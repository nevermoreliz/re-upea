$(document).ready(function () {

    var dataTableConvenioInternacional = $('#dt_web_convenio_internacional').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            "url": "<?= base_url(route_to('webConvenioInternacional_list')); ?>",
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
            var cards = $('#card-list-convenio-internacional');

            // Obtener información de la tabla
            var pageInfo = api.page.info();
            // Actualizar contenido del label con la información de la tabla
            $('#text-table-info').html('Mostrando registros del ' + (pageInfo.start + 1) + ' al  ' + pageInfo.end + ' de un total de ' + pageInfo.recordsTotal + ' registros');

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
                <div>
                      <div class="card-job hover-up wow animate__animated animate__fadeIn">
                                <div class="card-job-top">
                                    <div class="card-job-top--image">
                                        <figure>
                                            <!-- <img alt="jobhub" src="<?= base_url() ?>web/assets/imgs/page/job/digital.png" /> -->
                                            <img alt="Imagen de referido al Convenio Internacional"
                                                 src="<?= base_url() ?>web/assets/imgs/img-pagina/home-convenios/en-todo-el-mundo.png"/>
                                        </figure>
                                    </div>
                                    <div class="card-job-top--info">
                                        <h6 class="card-job-top--info-heading"><a
                                                    href="<?= route_to('webConvenioNacional_show','` + data.id_convenios + `')?>">${data.nombre_convenio}</a></h6>
                                        <div class="row">
                                            <div class="col-lg-10">
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
                                            <div class="col-lg-2 text-lg-end">
                                                <div class="row pb-10">
                                                    <button class="btn-jf-personalizado-cards-verde">
                                                 Inicio: ${data.fecha_firma}
                                            </button>
                                          
                                                </div>
                                                <div class="row">
                                                      <button class="btn-jf-personalizado-cards-rojo">
                                                 Fin: ${data.fecha_finalizacion}
                                            </button>
                                                </div>

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

                                            <button class="btn-jf-personalizado-cards-red" onclick="window.open('<?= base_url() ?>uploads/` + data.pdf_convenio + `', '_blank')">
                                               <i class="fa fa-pdf"></i>  PDF
                                            </button>
                                                        
                                            <button class="btn-jf-personalizado-cards" onclick="window.location.href='<?= route_to('webConvenioInternacional_show', '` + data.id_convenios + `') ?>'">
                                                <i class="fa fa-eye"></i> M&aacute;s Detalle
                                            </button>
                                                
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12 text-lg-end d-lg-block d-none">

                                            <span>
                                            <i class="` + iconCard + `" style="` + styleCard + `"></i>
<!--                                                <i class="fi-rr-shield-check" style="color:green"></i>-->
                                                ${textEstadoCard}
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

    $('#dt_web_convenio_internacional').hide();


     $('#searchInput').on('keyup', function () {
         // Obtener el valor del input
         var value = $(this).val();
        // Buscar en el DataTable
        dataTableConvenioInternacional.search(value).draw();
     });
});



