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
            {data: 'estado'},
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
                            <li><a class="dropdown-item edit-publicacion" data-publicacion="` + data['id_publicaciones'] + `" href="javascript:void(0)"><i class="bi bi-pencil-square"></i> Modificar </a></li>                     
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
    $(document).on('click', 'a.edit-publicacion', function (e) {
        $.ajax({
            url: '<?= base_url(route_to("publicacion_edit"))?>',
            type: 'get',
            data: {
                param: e.target.getAttribute('data-publicacion'),
                param2: $('#param').val()
            },
            success: function (response) {
                // Manejar la respuesta del servidor

                parametrosModal(
                    '#modal_publicacion',
                    'MODIFICAR PUBLICACIÓN',
                    'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                    false,
                    'static');

                /* elimina cualquier contenido anterior */
                $('#modal_publicacion-body').html('');
                /* agregar el contenido html en el contenido del model */
                $('#modal_publicacion-body').html(response.html);

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
                let rutaImgPublicacion = `<?= base_url()?>uploads/${data.publicacion.url}`;
                let rutaFilePublicacion = `<?= base_url()?>uploads/${(Object.keys(data.archivosPublicacion).length === 0) ? '' : data.archivosPublicacion[0].nombre_archivo}`;
                // console.log(rutaFilePublicacion)

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


    /* agregar usuario y abrir el modal */
    $('button.btn-new-publicacion').click(function (e) {

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

    $('.btn-back').click(function (e) {

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