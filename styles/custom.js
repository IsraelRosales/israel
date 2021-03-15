function MostrarModal(nombre, ruta) {
    jQuery.ajax({
        type: "POST",
        url: ruta,
        data: "nombre=" + nombre,
        success: function(data) {
            $('#mostrar_modal').html(data);
            $('#myModal').modal('show');
        }
    });
}

function EditarArchivo(nombre) {
    jQuery.ajax({
        type: "POST",
        url: $('#form').attr("action"),
        data: $('#form').serialize() + "&nombre=" + nombre,
        success: function(data) {
            $('#mostrar_mensaje').html(data);
        }
    });
}