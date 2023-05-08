$(document).ready(function (e) {
    $("#dt_convenio_nacional").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            method: 'get',
            url: '<?= base_url(route_to("convenioNacional_list"))?>',
        },
        drawCallback: function (settings) {
            const api = this.api();
            const startIndex = api.context[0]._iDisplayStart;
            api.column(0, {order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = startIndex + i + 1;
                $(cell).addClass('align-middle');
            });
        },
        columnDefs: [
            {responsivePriority: 1, targets: -1},
            {responsivePriority: 1, targets: -2}
        ],
        columns: [
            {data: null},
            {data: 'id_convenios', visible: false},
            {data: 'nombre_enlace'},
            {data: 'nombre_convenio'},
            {data: 'fecha_finalizacion'},
            {
                data: 'estado_convenio',
                render: function (data, type, row) {

                    let $html;
                    // return '<button class="btn btn-primary">' + data['name'] + '</button>';
                    if (data === 'Activo') {
                        $html = `<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>`;
                    } else if (data === 'Concluido') {
                        $html = `<span class="badge bg-warning"><i class="bi bi-x-circle me-1"></i> Concluido</span>`;
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

                    let clase, textCamp, iconAction, $li;

                    if (data['estado_convenio'] === 'Activo') {
                        clase = 'delete-convenio-nacional';
                        textCamp = 'Deshabilitar';
                        iconAction = 'bi bi-trash';
                        $li = `<li><a id="dinamic-text-enlace-active" class="dropdown-item texto-ext ` + clase + `" data-convenio-nacional="` + data['id_convenios'] + `" href="javascript:void(0)"><i class="` + iconAction + `"></i> ` + textCamp + `</a></li>`;
                    } else if (data['estado_convenio'] === 'Concluido') {
                        $li = ``;
                    } else {
                        clase = 'active-convenio-nacional';
                        textCamp = 'Activar';
                        iconAction = 'bi bi-check-square';
                        $li = `<li><a id="dinamic-text-enlace-active" class="dropdown-item texto-ext ` + clase + `" data-convenio-nacional="` + data['id_convenios'] + `" href="javascript:void(0)"><i class="` + iconAction + `"></i> ` + textCamp + `</a></li>`;
                    }

                    return `
                        <!-- Example single danger button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-view-stacked"></i>  Action
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item edit-convenio-nacional" data-convenio-nacional="` + data['id_convenios'] + `" href="javascript:void(0)"><i class="bi bi-pencil-square"></i> Modificar </a></li>                     
                            ` + $li + `
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item show-convenio" data-convenio-nacional="` + data['id_convenios'] + `" href="javascript:void(0)"><i class="bi bi-info"></i> Más Detalle</a>
                          </ul>
                        </div>
                    `;
                }
            }
        ],
        order: [[0, "desc"]]
    });

    /* modificar convenio nacional */
    $(document).on('click', 'a.edit-convenio-nacional', function (e) {
        $.ajax({
            url: '<?= base_url(route_to("convenioNacional_edit"))?>',
            type: 'get',
            data: {param: e.target.getAttribute('data-convenio-nacional')},
            success: function (response) {
                // Manejar la respuesta del servidor

                parametrosModal(
                    '#modal_convenio_nacional',
                    'MODIFICAR CONVENIO NACIONAL',
                    'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                    false,
                    'static');

                /* elimina cualquier contenido anterior */
                $('#modal_convenio_nacional-body').html('');
                /* agregar el contenido html en el contenido del model */
                $('#modal_convenio_nacional-body').html(response.html);

                /* eliminar clases de insertar update or delete */
                $('#btn-action').removeClass('action-insert');
                $('#btn-action').removeClass('action-update');
                $('#btn-action').removeClass('action-delete');

                /* agregar clase action-update para registrar en la base de datos */
                $('#btn-action').addClass('action-update');
                $('#btn-action').html('');
                $('.action-update').html('<i class="bi bi-pencil-square me-1"></i> Actualizar');

                const data = response.data;

                // console.log(data);
                // console.log('++++');
                // console.log('\n>');

                /* capturando ruta de archivos */
                let rutaImgConvenio = `<?= base_url()?>uploads/${data.img_convenio}`;
                let rutaPdfConvenio = `<?= base_url()?>uploads/${data.pdf_convenio}`;

                /* colocando src la ruta que tiene el archivo*/
                if (data.img_convenio == null || data.img_convenio == '') {
                    $('#img_show_convenio').attr('src', 'https://cdn-icons-png.flaticon.com/512/3135/3135768.png');
                } else {
                    $('#img_show_convenio').attr('src', rutaImgConvenio);
                }

                /* colocando un embed del archivo que tiene el convenio*/
                if (data.pdf_convenio == null || data.pdf_convenio == '') {
                    $('#img_show_pdf_convenio').attr('src', 'https://cdn-icons-png.flaticon.com/512/3143/3143460.png');
                } else {
                    $('#visor_pdf_convenio').html('<embed src="' + rutaPdfConvenio + '" width="100%" height="338px" ' +
                        'style="border-radius: 15px; padding: 10px; width: 100%; object-fit: cover; object-position: center center;" />');
                }


                $.each(data, function (key, value) {

                    /* por que tiene otro nombre en la vista y en la tabla*/
                    if (key == 'estado_convenio') {
                        $('select[name="estado"]').val(value);
                    }

                    if ($('#' + key).is('input')) {

                        if (key != 'img_convenio' && key != 'pdf_convenio') {
                            $('input[name=' + key + ']').val(value)
                        }
                        if (key == 'id_convenios') {

                            // $('input[name=' + key + ']').val('<?= base64_encode(' + value + '); ?>')
                            $('input[name=' + key + ']').val(btoa(value));
                        }

                    } else if ($('#' + key).is('select')) {
                        if (key != 'estado') {
                            $('select[name=' + key + ']').val(value);
                        }
                    } else if ($('#' + key).is('textarea')) {
                        $('textarea[name=' + key + ']').val(value)
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

    /* eliminar o deshabilitar convenio nacional */
    $(document).on('click', 'a.delete-convenio-nacional, a.active-convenio-nacional', function (e) {
        var text;
        if ($('#dinamic-text-enlace-active').hasClass('delete-convenio-nacional')) {
            text = 'Deshabilitara';
        } else if ($('#dinamic-text-enlace-active').hasClass('active-convenio-nacional')) {
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
                    url: '<?= base_url(route_to("convenioNacional_delete"))?>',
                    type: 'post',
                    data: {param: e.target.getAttribute('data-convenio-nacional')},
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
                            $('#dt_convenio_nacional').DataTable().draw(false);

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

    /* agregar convenio y abrir el modal */
    $('button.btn-new-convenio-nacional').click(function (e) {

        $.ajax({
            url: '<?= base_url(route_to("convenioNacional_create"))?>',
            method: 'get',
            success: function (response) {
                // Código en caso de éxito
                if (typeof response == "object") {

                    if (response.success) {

                        parametrosModal(
                            '#modal_convenio_nacional',
                            'CREAR NUEVO CONVENIO',
                            'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                            false,
                            'static');

                        /* elimina cualquier contenido anterior */
                        $('#modal_convenio_nacional-body').html('');
                        /* agregar el contenido html en el contenido del model */
                        $('#modal_convenio_nacional-body').html(response.html);

                        /* eliminar clases de insertar update or delete */
                        $('#btn-action').removeClass('action-insert');
                        $('#btn-action').removeClass('action-update');
                        $('#btn-action').removeClass('action-delete');

                        /* agregar clase action-insert para registrar en la base dedatos */
                        $('#btn-action').addClass('action-insert');
                        $('#btn-action').html('');
                        $('.action-insert').html('<i class="bi bi-check-square me-1"></i> Registrar Convenio');

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

});