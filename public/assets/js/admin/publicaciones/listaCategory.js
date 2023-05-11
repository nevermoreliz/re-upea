$(document).ready(function () {

    $("#dt_publicaciones").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            url: '<?= base_url(route_to("publicacion_list"))?>',
            type: 'get',
            data: {param: $('#param').val()}
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
            {data: 'id_publicaciones', visible: false},
            {data: 'titulo'},
            {data: 'tipo_publicaciones'},
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

                    let clase, textCamp, iconAction, $li;

                    if (data['estado'] == 1) {
                        clase = 'delete-category-publicacion';
                        textCamp = 'Deshabilitar';
                        iconAction = 'bi bi-trash';
                        $li = `<li><a id="dinamic-text-enlace-active" class="dropdown-item texto-ext ` + clase + `" data-publicacion="` + data['id_publicaciones'] + `" href="javascript:void(0)"><i class="` + iconAction + `"></i> ` + textCamp + `</a></li>`;
                    } else {
                        clase = 'active-category-publicacion';
                        textCamp = 'Activar';
                        iconAction = 'bi bi-check-square';
                        $li = `<li><a id="dinamic-text-enlace-active" class="dropdown-item texto-ext ` + clase + `" data-publicacion="` + data['id_publicaciones'] + `" href="javascript:void(0)"><i class="` + iconAction + `"></i> ` + textCamp + `</a></li>`;
                    }

                    return `
                        <!-- Example single danger button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-view-stacked"></i>  Action
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item edit-publicaciones" data-publicacion="` + data['id_publicaciones'] + `" href="javascript:void(0)"><i class="bi bi-pencil-square"></i> Modificar </a></li>                     
                            ` + $li + `
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item show-publicacion" data-publicacion="` + data['id_publicaciones'] + `" href="javascript:void(0)"><i class="bi bi-info"></i> Más Detalle</a>
                          </ul>
                        </div>
                    `;
                }
            }
        ],
        order: [[0, "desc"]]
    });

    /* modificar Publicación */
    $(document).off('click').on('click', 'a.edit-publicaciones', function (e) {
        // alert('cuantes veces repite');
        $.ajax({
            url: '<?= base_url(route_to("publicacion_edit"))?>',
            type: 'get',
            data: {
                param: e.target.getAttribute('data-publicacion'),
                param2: $('#param').val()
            },
            success: function (response) {

                // console.log(response)
                const tipo_publicaciones = $('#param').val();
                const id_publicaiones = e.target.getAttribute('data-publicacion');
                // Manejar la respuesta del servidor
                $('#main').html(response.html);

                /* poner el valor input hidden el tipo publicacion */
                $('#tipo_publicaciones').val(tipo_publicaciones);
                // $('#id_publicaciones').val(id_publicaiones);

                /* eliminar clases de insertar update or delete */
                $('#btn-action').removeClass('action-insert');
                $('#btn-action').removeClass('action-update');
                $('#btn-action').removeClass('action-delete');

                /* agregar clase action-update para registrar en la base de datos */
                $('#btn-action').addClass('action-update');
                $('#btn-action').html('');
                $('.action-update').html('<i class="bi bi-pencil-square me-1"></i> Actualizar ' + tipo_publicaciones);

                const data = response.data.publicacion;
                const dataArchivosPublicacion = response.data.archivosPublicacion;

                // console.log(data);
                // console.log('++++');
                // console.log('\n>');

                /* capturando ruta de archivos */
                let rutaImgPublicacion = `<?= base_url()?>uploads/${data.url}`;

                // console.log(rutaFilePublicacion)

                /* colocando src la ruta que tiene el archivo*/
                if (data.url == null || data.url == '') {
                    $('#img_show_publicacion').attr('src', 'https://cdn-icons-png.flaticon.com/512/3135/3135768.png');
                } else {
                    $('#img_show_publicacion').attr('src', rutaImgPublicacion);
                }

                $.each(data, function (key, value) {

                    if ($('#' + key).is('input')) {
                        if (key != 'url') {
                            $('input[name=' + key + ']').val(value)
                        }
                        if (key == 'id_publicaciones') {

                            $('input[name=' + key + ']').val(btoa(value));
                        }
                    } else if ($('#' + key).is('select')) {
                        $('select[name=' + key + ']').val(value);
                    } else if ($('#' + key).is('textarea')) {
                        $('textarea[name=' + key + ']').val(value)
                    }
                });

                /* poner titulo al title<header> */
                document.querySelector("title").innerText = "Admin RI | " + response.title;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Maneja los errores de la petición Ajax
                alert("Error: " + errorThrown)
                console.log('Error: Ocurrió un error en la petición AJAX - ' + errorThrown);
            },

        });
    });

    /* eliminar Publicacion */
    $(document).on('click', 'a.delete-category-publicacion, a.active-category-publicacion', function (e) {
        var text;
        if ($('#dinamic-text-enlace-active').hasClass('delete-category-publicacion')) {
            text = 'Deshabilitara';
        } else if ($('#dinamic-text-enlace-active').hasClass('active-category-publicacion')) {
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
                    url: '<?= base_url(route_to("publicacion_delete"))?>',
                    type: 'post',
                    data: {param: e.target.getAttribute('data-publicacion')},
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
                            $('#dt_publicaciones').DataTable().draw(false);

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

    /* agregar usuario y abrir el modal */
    $('button.btn-new-publicacion').off('click').click(function (e) {
        $.ajax({
            url: '<?= base_url(route_to("publicacion_create"))?>',
            type: 'get',
            data: {param: $('#param').val()},
            success: function (response) {
                // Código en caso de éxito
                if (typeof response == "object") {

                    if (response.success) {
                        const tipo_publicaciones = $('#param').val();
                        $('#main').html(response.html).fadeIn("slow");

                        /* poner el valor input hidden el tipo publicacion */
                        $('#tipo_publicaciones').val(tipo_publicaciones);

                        // /* eliminar clases de insertar update or delete */
                        $('#btn-action').removeClass('action-insert');
                        $('#btn-action').removeClass('action-update');
                        $('#btn-action').removeClass('action-delete');

                        /* agregar clase action-insert para registrar en la base dedatos */
                        $('#btn-action').addClass('action-insert');
                        $('#btn-action').html('');
                        $('.action-insert').html('<i class="bi bi-check-square me-1"></i> Registrar ' + tipo_publicaciones);

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

    /* volver al la lista de categorias de publicaciones */
    $('.btn-back').off('click').click(function (e) {
        $.ajax({
            url: '<?= base_url(route_to("publicacion_index"))?>',
            method: 'get',
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (response) {
                // console.log(response);
                // Maneja la respuesta del servidor
                if (!response.success) {

                } else {
                    $('#main').html(response.html).fadeIn("slow");
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Maneja los errores de la petición Ajax
                alert("Error: " + errorThrown);
                console.log("Error: " + errorThrown);

            }
        });
    });

});