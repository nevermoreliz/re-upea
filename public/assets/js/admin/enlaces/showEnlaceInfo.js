$(document).ready(function (e) {


    $("#img-preview").on("click", function () {
        // Obtener la ruta de la imagen
        var rutaImagen = $(this).attr("src");
        // Obtener la imagen del modal con el ID modal-image
        var imagenModal = $("#modal-image");
        // Establecer la ruta de la imagen en el modal
        imagenModal.attr("src", rutaImagen);
        // Mostrar el modal
        $("#previewImage").modal("show");
    });

    $('#btn-back').click(function (e) {
        $.ajax({
            url: '<?= base_url(route_to("enlace_index"))?>',
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