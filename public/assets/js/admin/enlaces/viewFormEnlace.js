$(document).ready(function () {
    $('#url_enlace').on('change', function (e) {
        document.getElementById('img_show_logo').src = window.URL.createObjectURL(this.files[0]);
    });

    $(".action-insert").click(function (event) {
        // Evita el comportamiento por defecto del formulario
        event.preventDefault()

        // Crea un objeto FormData
        var formData = new FormData($('#formEnlace')[0])

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
            text: 'Se registrara los datos de la persona en el sistema',
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
                    url: '<?= route_to("enlace_store")?>',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function (response) {
                        // Maneja la respuesta del servidor
                        if (!response.success) {

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
                            // Si hay errores de validación, muestra los mensajes de error
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

                            /*********************************
                             * LIMPIAR INPUTS DEL FORMULARIO *
                             *********************************/
                            $(".limpiar-input").val('');

                            /**********************************
                             * CERRRAR MODAL Y LIMPIAR IMPUTS *
                             **********************************/
                            $('#modal_convenio').modal('hide');

                            /* recargar datatable */
                            $('#dt_enlaces').DataTable().draw(false);

                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Maneja los errores de la petición Ajax
                        alert("Error: " + errorThrown)
                    }
                });


            }
        })


    });

    $(".action-update").click(function (event) {
        // Evita el comportamiento por defecto del formulario
        event.preventDefault()

        // Crea un objeto FormData
        var formData = new FormData($('#formEnlace')[0])

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
            text: 'Se Actualizara los datos de la persona en el sistema',
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
                    url: '<?= base_url(route_to("enlace_update"))?>',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function (response) {
                        console.log(response.html)
                        // Maneja la respuesta del servidor
                        if (!response.success) {

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
                            /*********************************
                             * LIMPIAR INPUTS DEL FORMULARIO *
                             *********************************/
                            $(".limpiar-input").val('');

                            /**********************************
                             * CERRRAR MODAL Y LIMPIAR IMPUTS *
                             **********************************/
                            $('#modal_convenio').modal('hide');

                            /* recargar datatable */
                            $('#dt_enlaces').DataTable().draw(false);

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

    });
});