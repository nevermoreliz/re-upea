$(document).ready(function () {

    /* ir a otra ventana */
    $('button.btn-category-publicacion').click(function (e) {

        $.ajax({
            url: '<?= base_url(route_to("publicacion_listCat")) ?>',
            type: 'get',
            data: {param: e.target.getAttribute('data-category')},
            success: function (response) {
                // console.log(response)

                // Manejar la respuesta del servidor
                $('#main').html(response.html).fadeIn("slow");

                /* poner titulo al title<header> */
                document.querySelector("title").innerText = "Admin RI | " + response.title;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Manejar los errores de la petición
                console.log('Ocurrió un error en la petición AJAX');
                console.log("Error: " + errorThrown);
            }
        });
    })

});
