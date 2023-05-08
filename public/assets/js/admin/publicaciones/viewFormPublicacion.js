$(document).ready(function () {

    $(".action-insert").off('click').click(function (event) {
        // Evita el comportamiento por defecto del formulario
        event.preventDefault()

        // Parametros para progresos
        let form = $('#formPublicacion'),
            wrapper = $('.wrapper'),
            wrapper_f = $('.wrapper_files'),
            progress_bar = $('.progress_bar');

        // Crea un objeto FormData
        let formData = new FormData($('#formPublicacion')[0]);

        // inicializacion  de la barra de progreso
        progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
        progress_bar.css('witdh', '0%');
        progress_bar.html('Preparando...');
        wrapper.fadeIn();

        // Elimina los mensajes de error existentes
        $('.error').remove();

        /********************************************************************************
         * ELIMINA LOS MENSAJES DE ERROR EXISTENTES Y PONER VERDE SI YA CAMBIO EL VALOR *
         *                                  DEL INPUT                                   *
         ********************************************************************************/
        $(document).on('input', '.is-invalid', function () {
            $(this).removeClass('is-invalid')
            $(this).addClass('is-valid')
            $(this).next('.invalid-feedback').remove()
        })

        Swal.fire({
            title: '¿Está seguro?',
            text: 'Se registrara los datos de la publicación en el sistema',
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
                // Deshabilita el botón de envío y muestra la barra de progreso

                // Realiza una petición Ajax
                $.ajax({
                    url: '<?= base_url(route_to("publicacion_store"))?>',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: true,
                    xhr: function () {
                        // var xhr = $.ajaxSettings.xhr();
                        let xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            if (e.lengthComputable) {
                                let percentComplete = Math.floor((e.loaded / e.total) * 100);
                                progress_bar.css('width', percentComplete + '%');
                                progress_bar.html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    beforeSend: () => {
                        $('button#btn-action', form).attr('disabled', true);
                    },
                    success: function (response) {
                        // Maneja la respuesta del servidor
                        if (!response.success) {

                            /* seccion de barra de progreso */
                            progress_bar.css('witdh', '0%');
                            progress_bar.html('verificar otros datos');

                            Swal.fire({
                                title: 'Verifique los Datos!',
                                text: response.message,
                                icon: 'warning',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#3085d6',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });

                            $.each(response.errors, function (key, value) {
                                $('[name="' + key + '"]').val(response.key)
                            })

                            /******************************************
                             * MOSTRAR LAS VALIDACIONES EN LOS INPUTS *
                             ******************************************/
                            /* Si hay errores de validación, muestra los mensajes de error */
                            $.each(response.errors, function (key, value) {
                                var field = $('[name="' + key + '"]')

                                field.addClass('is-invalid')

                                field.after('<div class="error" style="width: 100%;25rem;font-size: .875em;color: #dc3545"><b>' + value + '</b></div>')

                                // Oculta el mensaje de error cuando el usuario escriba en el input
                                field.on('input', function () {
                                    $(this).next('.error').remove()
                                })

                            })

                        } else {

                            /************************************************************
                             * ABRIR SWEET ALERT2 Y CONFIRMAR SI ESTA SEGURO DE GUARDAR *
                             *                       EL REGISTRO                        *
                             ************************************************************/
                            Swal.fire({
                                title: 'Registro Correcto!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Continuar',
                                confirmButtonColor: '#3085d6',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });

                            progress_bar.removeClass('bg-info').addClass('bg-success');
                            progress_bar.html('¡Listo¡');
                            form.trigger('reset'); // reseteamos el formulario


                            // wrapper_f.append('<button class="d-block btn btn-light btn-sm mt-2">Descargar: Archivo</button>');

                            setTimeout(() => {
                                wrapper.fadeOut();
                                progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
                                progress_bar.css('witdh', '0%');
                            }, 1500);

                            /* limpiar formulario */
                            $(".limpiar-input").val('');

                            /* recargar datatable */
                            $('#dt_file_publicacion').DataTable().draw(false);

                            /* volver a la lista de categorias publicacion */
                            ajaxRetornarListaPublicacionCategori();

                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        progress_bar.removeClass('bg-success bg-info').addClass('bg-danger');
                        progress_bar.html('!Hubo un Error!');

                        // Maneja los errores de la petición Ajax
                        alert("Error: " + errorThrown)
                        console.log('Error Console:' + errorThrown)
                    },
                    complete: () => {
                        $('button#btn-action', form).attr('disabled', false);
                    }
                });


            }
        })

    });

    $(".action-update").off('click').click(function (event) {
        // Evita el comportamiento por defecto del formulario
        event.preventDefault();

        // Parametros para progresos
        let form = $('#formPublicacion'),
            wrapper = $('.wrapper'),
            wrapper_f = $('.wrapper_files'),
            progress_bar = $('.progress_bar');

        // Crea un objeto FormData
        let formData = new FormData($('#formPublicacion')[0]);

        // inicializacion  de la barra de progreso
        progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
        progress_bar.css('witdh', '0%');
        progress_bar.html('Preparando...');
        wrapper.fadeIn();

        // Elimina los mensajes de error existentes
        $('.error').remove()

        /********************************************************************************
         * ELIMINA LOS MENSAJES DE ERROR EXISTENTES Y PONER VERDE SI YA CAMBIO EL VALOR *
         *                                  DEL INPUT                                   *
         ********************************************************************************/
        $(document).on('input', '.is-invalid', function () {
            $(this).removeClass('is-invalid')
            $(this).addClass('is-valid')
            $(this).next('.invalid-feedback').remove()
        })


        Swal.fire({
            title: '¿Está seguro?',
            text: 'Se Actualizara los datos de la publicación en el sistema.',
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

                // Realiza una petición Ajax
                $.ajax({
                    url: '<?= base_url(route_to("publicacion_update"))?>',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    beforeSend: () => {
                        $('button#btn-action', form).attr('disabled', true);
                    },
                    xhr: function () {
                        // var xhr = $.ajaxSettings.xhr();
                        let xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            if (e.lengthComputable) {
                                let percentComplete = Math.floor((e.loaded / e.total) * 100);
                                progress_bar.css('width', percentComplete + '%');
                                progress_bar.html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function (response) {
                        // console.log(response.html)
                        // Maneja la respuesta del servidor
                        if (!response.success) {

                            /* seccion de barra de progreso */
                            progress_bar.css('witdh', '0%');
                            progress_bar.html('verificar otros datos');

                            Swal.fire({
                                title: 'Verifique los Datos!',
                                text: response.message,
                                icon: 'warning',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#3085d6',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });

                            // $.each(response.errors, function (key, value) {
                            //     $('[name="' + key + '"]').val(response.key)
                            //     console.log('estasaqui');
                            //     console.log(key);
                            // });


                            /******************************************
                             * MOSTRAR LAS VALIDACIONES EN LOS INPUTS *
                             ******************************************/
                            // Si hay errores de validación, muestra los mensajes de error
                            $.each(response.errors, function (key, value) {
                                var field = $('[name="' + key + '"]')

                                field.addClass('is-invalid')

                                field.after('<div class="error" style="width: 100%;25rem;font-size: .875em;color: #dc3545"><b>' + value + '</b></div>')

                                // Oculta el mensaje de error cuando el usuario escriba en el input
                                field.on('input', function () {
                                    $(this).next('.error').remove();
                                })

                            });

                        } else {

                            /************************************************************
                             * ABRIR SWEET ALERT2 Y CONFIRMAR SI ESTA SEGURO DE GUARDAR *
                             *                       EL REGISTRO                        *
                             ************************************************************/
                            Swal.fire({
                                title: 'Registro Correcto!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Continuar',
                                confirmButtonColor: '#3085d6',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });
                            console.log(response.html)


                            progress_bar.removeClass('bg-info').addClass('bg-success');
                            progress_bar.html('¡Listo¡');
                            form.trigger('reset'); // reseteamos el formulario


                            // wrapper_f.append('<button class="d-block btn btn-light btn-sm mt-2">Descargar: Archivo</button>');

                            setTimeout(() => {
                                wrapper.fadeOut();
                                progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
                                progress_bar.css('witdh', '0%');
                            }, 1500);

                            /* limpiar formulario */
                            $(".limpiar-input").val('');

                            /* recargar datatable */
                            $('#dt_file_publicacion').DataTable().draw(false);

                            /* volver a la lista de categorias publicacion */
                            ajaxRetornarListaPublicacionCategori();

                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Maneja los errores de la petición Ajax
                        alert("Error: " + errorThrown);
                        console.log("Error: " + errorThrown);
                    },
                    complete: () => {
                        $('button#btn-action', form).attr('disabled', false);
                    }
                });

            }
        });

    });

    /* SECCION DE DATATABLE PARA ARCHIVOS DE LA PUBLICACION */
    $("#dt_file_publicacion").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        searching: false,
        pageLength: 10,
        bLengthChange: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            type: 'get',
            url: '<?= base_url(route_to("publicacionArchivo_list"))?>',
            data: {param: $('input[name="id_publicaciones"]').val()}
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
        ],
        columns: [
            {searchable: false, orderable: false, data: null},
            {searchable: false, orderable: false, data: 'id_publicaciones_archivo', visible: false},
            {searchable: false, orderable: false, data: 'id_publicaciones'},
            {
                searchable: false,
                orderable: false,
                data: null,
                render: function (data, type, row) {
                    return `activar`;
                }
            }
        ],
        order: [[0, "desc"]]
    });

    /* SECCION DE INICIALIZAR PLUGINS O ACCIONES */

    /* volver a la lista de categoria de publicacion */
    $('button.btn-back').off('click').click(function (e) {
        ajaxRetornarListaPublicacionCategori();
    });

    /* cancelar accion y volver a la lista de categoria de publicacion */
    $('button.btn-cancel').off('click').click(function (e) {

        Swal.fire({
            title: '¿Está seguro?',
            text: 'Se Cancelara El Procedimiento Que Esta Realizando.',
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
                ajaxRetornarListaPublicacionCategori();
            }
        })
    });


    /* cuando haya un cambio en el boton cambiara la imagen*/
    $('#url').off('click').on('change', function (e) {
        document.getElementById('img_show_publicacion').src = window.URL.createObjectURL(this.files[0]);
    });

    /* previsualizacion de un pdf */
    // $('#nombre_archivo').on('change', function (event) {
    //     var pdfUrl = URL.createObjectURL(event.target.files[0]);
    //     $('#visor_pdf_publicacion').html('<embed src="' + pdfUrl + '" width="100%" height="338px" ' +
    //         'style="border-radius: 15px; padding: 10px; width: 100%; object-fit: cover; object-position: center center;" />');
    // });


    // Detectar cambios en el input file
    $('#nombre_archivo').off('click').on('change', function () {
        // Obtener los archivos seleccionados
        var archivos = $(this).prop('files');

        // console.log(archivos);
        /* remover todos los campos*/
        $('#dt_file_publicacion tbody tr.campo-virtual').each(function () {
            // hacer algo con cada elemento que tenga la clase .active
            $(this).remove();
        });

        // Recorrer los archivos y crear las filas de la tabla
        $.each(archivos, function (i, archivo) {

            // Crear una fila de la tabla con la información del archivo
            const iconPdf = 'https://cdn-icons-png.flaticon.com/512/3143/3143460.png';
            const iconWord = 'https://cdn-icons-png.flaticon.com/512/888/888933.png';
            const iconImg = 'https://cdn-icons-png.flaticon.com/512/6632/6632582.png ';

            let iconFilter;
            if (archivo.type === 'application/pdf') {
                iconFilter = iconPdf
            } else if (archivo.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                iconFilter = iconWord;
            } else {
                iconFilter = iconImg;
            }

            let fila = '<tr class="campo-virtual">';
            fila += '<td>' + (i + 1) + '</td>';
            fila += `<td class="text-center">
                        <img src="${iconFilter}" style="width: 25px;" />
                    </td>`;
            fila += `<td> <div class="">
                               <button type="button" class="btn btn-outline-primary btn-sm eliminar-archivo" disabled>
                                   <i class="bi bi-backspace"></i>
                               </button>
                               
                               <button type="button" class="btn btn-outline-primary btn-sm" disabled>
                                   <i class="bi bi-eye"></i>
                               </button>
                               
                          </div>
                    </td>`;
            fila += '</tr>';
            // Agregar la fila a la tabla
            $('#dt_file_publicacion tbody').append(fila);
        });
    });

    // Detectar clicks en el botón "Eliminar" de la tabla
    $('#dt_file_publicacion').off('click').on('click', '.eliminar-archivo', function () {
        // Obtener la fila correspondiente al botón "Eliminar"
        const fila = $(this).closest('tr');
        // const fileId = fila.data('file-id');
        const archivo = fila.find('td:eq(0)').text();
        // Eliminar la fila de la tabla
        fila.remove();

        const archivos = $('#nombre_archivo')[0].files;
        const nuevos_archivos = new FormData();
        for (let i = 0; i < archivos.length; i++) {
            if (archivos[i].name !== archivo) {
                nuevos_archivos.append('nombre_archivo[]', archivos[i]);
            }
        }
        $('#nombre_archivo').prop('files', nuevos_archivos);

    });

    /* reutilizar ajax comun */

    function ajaxRetornarListaPublicacionCategori() {
        $.ajax({
            url: '<?= base_url(route_to("publicacion_listCat")) ?>',
            type: 'get',
            data: {param: $('#tipo_publicaciones').val()},
            success: function (response) {
                // console.log(response);
                // Maneja la respuesta del servidor
                if (!response.success) {

                } else {
                    $('#main').html(response.html).fadeIn("slow");

                    /* poner titulo al title<header> */
                    document.querySelector("title").innerText = "Admin RI | " + response.title;
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Maneja los errores de la petición Ajax
                alert("Error: " + errorThrown);
                console.log("Error: " + errorThrown);

            }
        });
    }

});