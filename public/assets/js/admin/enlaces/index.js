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
            {responsivePriority: 1, targets: -1},
            {responsivePriority: 1, targets: -2},
            {responsivePriority: 1, targets: -3},
        ],
        columns: [
            {data: 'id_enlace', visible: false},
            {data: 'orden'},
            {
                data: 'nombre_enlace',
                render: function (data, type, row) {
                    return data.toUpperCase();
                }
            },
            {
                data: 'url_enlace',
                render: function (data, type, row) {
                    return `
                        <div class="d-flex justify-content-center align-items-center" style="height: auto;">
                          <img src="<?= base_url() ?>uploads/` + data + `" class="img-fluid" alt="Imagen">
                        </div>
                    `;
                }
            },
            {
                data: 'links_enlace',
                render: function (data, type, row) {
                    return `
                        <a href="` + data + `" class="btn btn-outline-primary btn-sm" target="_blank"><i class="bi bi-window"></i> Visitar</a>
                    `;
                }
            },
            {data: 'tipo_enlace'},
            {
                data: 'telefono',
                render: function (data, type, row) {
                    if (data == 0 || data == null || data == '' || data == '00000000') {
                        return `<span class="badge bg-warning text-dark"><i class="bi bi-telephone-x me-1"></i> Sin Numero</span>`;
                    }
                    return data;
                }
            },
            {data: 'fax'},
            {
                data: 'fecha',
                render: function (data, type, row) {
                    return `<button type="button" class="btn btn-outline-primary btn-sm" disabled="">` + data + `</button>`;
                }
            },
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
                searchable: false,
                orderable: false,
                data: null,
                render: function (data, type, row) {
                    // return '<button class="btn btn-primary">' + data['name'] + '</button>';

                    var clase, textCamp, iconAction;

                    if (data['estado'] == 1) {
                        clase = 'delete-convenio';
                        textCamp = 'Deshabilitar';
                        iconAction = 'bi bi-trash';
                    } else {
                        clase = 'active-convenio';
                        textCamp = 'Activar';
                        iconAction = 'bi bi-check-square';
                    }

                    return `
                        <!-- Example single danger button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-view-stacked"></i>  Action
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item edit-convenio" data-convenio="` + data['id_enlace'] + `" href="javascript:void(0)"><i class="bi bi-pencil-square"></i> Modificar </a></li>
                            <li><a id="dinamic-text-enlace-active" class="dropdown-item texto-ext ` + clase + `" data-convenio="` + data['id_enlace'] + `" href="javascript:void(0)"><i class="` + iconAction + `"></i> ` + textCamp + `</a></li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item show-convenio" data-convenio="` + data['id_enlace'] + `" href="javascript:void(0)"><i class="bi bi-info"></i> Más Detalle</a>
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
            type: 'get',
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
                    if ($('#' + key).is('input')) {
                        if (key != 'url_enlace') {

                            $('input[name=' + key + ']').val(value)
                        }
                        if (key == 'id_enlace') {
                            // $('input[name=' + key + ']').val('<?= base64_encode(' + value + '); ?>')
                            $('input[name=' + key + ']').val(btoa(value));
                        }

                    } else if ($('#' + key).is('select')) {
                        $('select[name=' + key + ']').val(value)
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

    /* eliminar o deshabilitar convenio */
    $(document).on('click', 'a.delete-convenio, a.active-convenio', function (e) {
        var text;
        if ($('#dinamic-text-enlace-active').hasClass('delete-convenio')) {
            text = 'Deshabilitara';
        } else if ($('#dinamic-text-enlace-active').hasClass('active-convenio')) {
            text = 'Activara';
        }


        Swal.fire({
            title: '¿Está seguro?',
            text: 'Se ' + text + ' el registro en el sistema',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar!',
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url(route_to("enlace_delete"))?>',
                    type: 'post',
                    data: {param: e.target.getAttribute('data-convenio')},
                    success: function (response) {
                        // Manejar la respuesta del servidor

                        if (!response.success) {

                            alert('algo paso comuniquese con el administrador ' + response.error);
                            console.log(response.error);

                        } else {
                            /* muestra en consola */
                            // console.log(response);
                            Swal.fire({
                                title: response.message + '!',
                                // title: 'Registro Deshabilitado Correctamente!',
                                // text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Continuar',
                                confirmButtonColor: '#3085d6',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });
                            /* recargar datatable */
                            $('#dt_enlaces').DataTable().draw(false);

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Manejar los errores de la petición
                        console.log('Ocurrió un error en la petición AJAX');
                        // console.log("ERROR" + errorThrown + textStatus + jqXHR);
                        console.log("Error: " + errorThrown);
                    }
                });


            }
        });


    });

    /* mostrar informacion completa del convenio */
    $(document).on('click', 'a.show-convenio', function (e) {
        $.ajax({
            url: '<?= base_url(route_to("enlace_show"))?>',
            type: 'get',
            data: {param: e.target.getAttribute('data-convenio')},
            success: function (response) {
                console.log(response)
                // Manejar la respuesta del servidor

                $('#main').html(response.html).fadeIn("slow");
                // parametrosModal(
                //     '#modal_convenio_info',
                //     'INFORMACIÓN COMPLETA DEL CONVENIO',
                //     'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                //     false,
                //     'static');
                //
                // /* elimina cualquier contenido anterior */
                // $('#modal_convenio_info-body').html('');
                // /* agregar el contenido html en el contenido del model */
                // $('#modal_convenio_info-body').html(response.html);


                /* poner titulo al title<header> */
                document.querySelector("title").innerText = "Admin RI | " + response.title;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Manejar los errores de la petición
                console.log('Ocurrió un error en la petición AJAX');
                console.log("Error: " + errorThrown);
            }
        });
    })

    /* agregar usuario y abrir el modal */
    $('button.btn-new-convenio').click(function (e) {

        $.ajax({
            url: '<?= base_url(route_to("enlace_create"))?>',
            method: 'get',
            success: function (response) {
                // Código en caso de éxito
                if (typeof response == "object") {

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

