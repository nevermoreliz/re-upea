$(document).ready(function (e) {



    $("#dt_convenio_nacional").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
        },
        ajax: {
            method: 'get',
            url: '<?= base_url(route_to("convenioNacional_list"))?>',
        },
        columnDefs: [
            {responsivePriority: 1, targets: -1}
        ],
        columns: [
            {data: 'id_convenios', visible: true},
            // {data: 'id_detalle_grupo'},
            // {data: 'id_tipo_convenio'},
            // {data: 'nombre_convenio'},
            // {data: 'objetivo_convenio'},
            // {data: 'img_convenio'},
            // {data: 'pdf_convenio'},
            // {data: 'tiempo_duracion'},
            // {data: 'fecha_firma'},
            // {data: 'fecha_finalizacion'},
            // {data: 'fecha_publicacion'},
            // {data: 'direccion'},
            // {data: 'entidad'},
            // {data: 'telefono'},
            // {data: 'email'},
            // {data: 'estado'},
            {data: 'tiempo'},
            {
                searchable: false,
                orderable: false,
                data: null,
                render: function (data, type, row) {
                    return '<button class="btn btn-primary">' + data['name'] + '</button>';
                }
            }
        ],
        order: [[0, "desc"]]
    });
});