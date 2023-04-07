$(document).ready(function () {

    /****************************************
     * INICIALIZANDO DATATABLE PARA USUARIO *
     ****************************************/

    $('#dt_usuarios').DataTable({
        processing: true,
        serverSide: true,
        // language: {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        // },
        ajax: {
            type: 'get',
            url: '<?= base_url(route_to("lista_usuario"))?>'
        },
        columns: [
            { data: 'id_usuario' },
            { data: 'id_persona' },
            { data: 'usuario' },
            { data: 'password' },
            { data: 'fecha_registro' },
            { data: 'estado' }
        ]
    });


});