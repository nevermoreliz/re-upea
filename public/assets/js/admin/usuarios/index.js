$(document).ready(function () {

    /****************************************
     * INICIALIZANDO DATATABLE PARA USUARIO *
     ****************************************/

    $('#dt_usuarios').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        ajax: 'scripts/server_processing.php',

    });


});