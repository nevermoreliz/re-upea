$(document).ready(function () {
    /****************************************
     * INICIALIZANDO DATATABLE PARA USUARIO *
     ****************************************/
    $("#dt_usuarios").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            method: 'get',
            url: '<?= base_url(route_to("lista_usuario"))?>',
        },
        columnDefs: [
            {responsivePriority: 1, targets: -1}
        ],
        columns: [
            {
                data: 'id_usuario',
                visible: false
            },
            {
                data: 'id_persona'
            },
            {
                data: 'usuario'
            },
            {
                data: 'password'
            },
            {
                data: 'fecha_registro'
            },
            {
                data: 'estado',
                render: function (data, type, row) {
                    // return '<button class="btn btn-primary">' + data['name'] + '</button>';
                    if (data == 1) {

                        $html = `<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>`;
                    } else {
                        $html = `<span class="badge bg-dark"><i class="bi bi-x-circle me-1"></i> Inactivo</span>`;
                    }
                    return $html;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    // return '<button class="btn btn-primary">' + data['name'] + '</button>';
                    return `
                        <!-- Example single danger button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-view-stacked"></i>  Action
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Modificar</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Desabilitar</a></li>
                          </ul>
                        </div>
                    `;
                }
            }
        ],
    });


    $('button.btn-new-user').click(function (e) {
        $('.draggable-modal').draggable({
            handle: ".modal-header" // Define la zona del modal que se puede usar para arrastrar
        });


        parametrosModal(
            '#modal_usuario_dt',
            'Insertar Datos de Usuario 12',
            'modal-dialog modal-dialog-centered modal-dialog-scrollable',
            true,
            'static'
        );

        // $('#modal_usuario_dt').modal({
        //     backdrop: 'static',
        //     keyboard: false,
        //     focus: true,
        //     show: true,
        //     scrollable: true,
        //     backdropClass: 'my-backdrop'
        // });

    });
});
