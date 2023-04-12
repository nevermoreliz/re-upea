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
            { responsivePriority: 1, targets: -1 }
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
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Modificar</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Desabilitar</a></li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="bi bi-info"></i> Más Detalle</a>
                          </ul>
                        </div>
                    `;
                }
            }
        ],
    });

    /* agregar usuario y abrir el modal */
    $('button.btn-new-user').click(function (e) {

        $.ajax({
            url: '<?= base_url(route_to("form_usuario"))?>',
            method: 'post',
            success: function (response) {
                // Código en caso de éxito
                if (typeof response == "object") {
                    console.log("es ajax abrir modal");
                    if (response.success) {

                        // $('.draggable-modal').draggable({
                        //     handle: ".modal-header" // Define la zona del modal que se puede usar para arrastrar
                        // });

                        parametrosModal(
                            '#modal_usuario',
                            'CREAR USUARIO',
                            'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                            true,
                            'static');

                        /* elimina cualquier contenido anterior */
                        $('#modal_usuario-body').html('');
                        /* agregar el contenido html en el contenido del model */
                        $('#modal_usuario-body').html(response.html);
                        /* end agregar el contenido html en el contenido del model */

                        /* agregar clase para insertar al boton de insertar */



                        document.querySelector("title").innerText =
                            "Admin RI | " + response.title;
                    }
                } else {
                    console.log("no es");
                    // content.hide().html(response).fadeIn("slow");
                    // content.html(response.html).fadeIn("slow");
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

    /* agregar usuario y abrir el modal */
    $('button.btn-new-person').click(function (e) {

        $.ajax({
            url: '<?= base_url(route_to("form_persona"))?>',
            method: 'post',
            success: function (response) {
                // Código en caso de éxito
                if (typeof response == "object") {
                    console.log("es ajax abrir modal");
                    if (response.success) {
                        // $('.draggable-modal').draggable({
                        //     handle: ".modal-header" // Define la zona del modal que se puede usar para arrastrar
                        // });
                        parametrosModal(
                            '#modal_usuario',
                            'REGISTRAR PERSONA',
                            'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg',
                            false,
                            'static');

                        /* agregar el contenido html en el contenido del model */
                        $('#modal_usuario-body').html('');
                        $('#modal_usuario-body').html(response.html);
                        /* end agregar el contenido html en el contenido del model */

                        /* eliminar clases de insertar update or delete */
                        $('#btn-action').removeClass('action-insert');
                        $('#btn-action').removeClass('action-update');
                        $('#btn-action').removeClass('action-delete');

                        /* agregar clase action-insert para registrar en la base dedatos */
                        $('#btn-action').addClass('action-insert');
                        $('#btn-action').html('');
                        $('.action-insert').html('<i class="bi bi-check-square me-1"></i> Guardar');


                        document.querySelector("title").innerText =
                            "Admin RI | " + response.title;
                    }
                } else {
                    console.log("no es");
                    // content.hide().html(response).fadeIn("slow");
                    // content.html(response.html).fadeIn("slow");
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
