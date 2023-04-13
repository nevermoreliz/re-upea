$(document).ready(function () {
    /* data table de enlace */
    $("#dt_enlaces").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            method: 'get',
            url: '<?= base_url(route_to("enlace_list"))?>',
        },
        columnDefs: [
            {responsivePriority: 1, targets: -1}
        ],
        columns: [
            {data: 'id_enlace', visible: false},
            {data: 'orden'},
            {data: 'url_enlace'},
            {data: 'links_enlace'},
            {data: 'nombre_enlace'},
            {data: 'tipo_enlace'},
            {data: 'telefono'},
            {data: 'fax'},
            {data: 'fecha'},
            {
                data: 'estado',
                render: function (data, type, row) {

                    let $html;
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
                            <li><a class="dropdown-item edit-convenio" data-convenio="` + data['id_enlace'] + `" href="#"><i class="bi bi-pencil-square"></i> Modificar </a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Desabilitar</a></li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="bi bi-info"></i> Más Detalle</a>
                          </ul>
                        </div>
                    `;
                }
            }
        ],
        order: [[0, "desc"]]
    });

    /* modificar convenio */
    $(document).on('click', 'a.edit-convenio', function (e) {

        $.ajax({
            url: '<?= base_url(route_to("enlace_edit"))?>',
            method: 'get',
            data: {param: e.target.getAttribute('data-convenio')},
            success: function (response) {
                // Manejar la respuesta del servidor

                parametrosModal(
                    '#modal_convenio',
                    'MODIFICAR CONVENIO',
                    'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                    false,
                    'static');

                /* elimina cualquier contenido anterior */
                $('#modal_convenio-body').html('');
                /* agregar el contenido html en el contenido del model */
                $('#modal_convenio-body').html(response.html);

                /* eliminar clases de insertar update or delete */
                $('#btn-action').removeClass('action-insert');
                $('#btn-action').removeClass('action-update');
                $('#btn-action').removeClass('action-delete');

                /* agregar clase action-update para registrar en la base de datos */
                $('#btn-action').addClass('action-update');
                $('#btn-action').html('');
                $('.action-update').html('<i class="bi bi-pencil-square me-1"></i> Actualizar');

                var data = response.data;
                var ruta = `<?= base_url()?>uploads/${data.url_enlace}`;
                $('#img_show_logo').attr('src', ruta);
                $.each(data, function (key, value) {
                    if (key != 'url_enlace') {
                        console.log('esta dentro')
                        $('input[name=' + key + ']').val(value)
                    }
                });

                /* poner titulo al title<header> */
                document.querySelector("title").innerText = "Admin RI | " + response.title;

            },
            error: function () {
                // Manejar los errores de la petición
                console.log('Ocurrió un error en la petición AJAX');
            }
        });
    });

    /* agregar usuario y abrir el modal */
    $('button.btn-new-convenio').click(function (e) {

        $.ajax({
            url: '<?= base_url(route_to("enlace_create"))?>',
            method: 'get',
            success: function (response) {
                // Código en caso de éxito
                if (typeof response == "object") {
                    console.log("es ajax abrir modal");
                    if (response.success) {

                        parametrosModal(
                            '#modal_convenio',
                            'CREAR NUEVO CONVENIO Y/O ENLACE',
                            'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                            false,
                            'static');

                        /* elimina cualquier contenido anterior */
                        $('#modal_convenio-body').html('');
                        /* agregar el contenido html en el contenido del model */
                        $('#modal_convenio-body').html(response.html);

                        /* eliminar clases de insertar update or delete */
                        $('#btn-action').removeClass('action-insert');
                        $('#btn-action').removeClass('action-update');
                        $('#btn-action').removeClass('action-delete');

                        /* agregar clase action-insert para registrar en la base dedatos */
                        $('#btn-action').addClass('action-insert');
                        $('#btn-action').html('');
                        $('.action-insert').html('<i class="bi bi-check-square me-1"></i> Registrar Instituci&oacute;n');

                        /* poner titulo al title<header> */
                        document.querySelector("title").innerText = "Admin RI | " + response.title;
                    }
                } else {
                    console.log("no es");
                }

            },
            error: function (xhr, status, error) {
                try {
                    throw new Error("Error en la petición: " + xhr.responseText);
                } catch (e) {
                    console.log(e.name + ": " + e.message);
                }
            }

        });
    });

})